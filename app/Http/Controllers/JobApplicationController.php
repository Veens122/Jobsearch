<?php

namespace App\Http\Controllers;

use App\Mail\ApplicationShortlistedMail;
use App\Models\Application;
use App\Notifications\ApplicationShortlistedNotification;
use App\Notifications\CandidateShortlisted;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class JobApplicationController extends Controller
{
    // Apply for a job
    public function apply(Request $request)
    {
        $request->validate([
            'job_id' => 'required|exists:jobs,id',
            'resume' => 'required|file|mimes:pdf,doc,docx|max:2048',
            'cover_letter' => 'nullable|file|mimes:pdf,doc,docx|max:2048',

        ]);

        $jobId = $request->input('job_id');

        if (Application::where('user_id', auth()->id())->where('job_id', $jobId)->exists()) {
            return back()->with('error', 'You have already applied for this job.');
        }

        $resumePath = $request->file('resume')->storeAs(
            'resumes',
            uniqid() . '_' . $request->file('resume')->getClientOriginalName(),
            'public'
        );

        if ($request->hasFile('cover_letter')) {
            $coverLetter = $request->file('cover_letter');
            $coverLetterName = time() . '_cover_' . $coverLetter->getClientOriginalName();
            $coverLetterPath = $coverLetter->storeAs('applications/cover_letters', $coverLetterName, 'public');
        }


        Application::create([
            'job_id' => $jobId,
            'user_id' => auth()->id(),
            'resume' => $resumePath,
            'cover_letter' => $coverLetterPath ?? null,
        ]);

        return back()->with('success', 'Application submitted successfully!');
    }


    // Show list of applications for jobs owned by the employer
    public function index()
    {
        $employerId = auth()->id();

        $applications = Application::whereHas('job', function ($query) use ($employerId) {
            $query->where('employer_id', $employerId);
        })->with(['candidateProfile.user', 'job'])
            ->latest()
            ->paginate(10);

        $employer = auth()->user()->load('employerProfile');

        return view('employer.applications.index', compact('applications', 'employer'));
    }

    // Show  application
    public function showCandidate($id)
    {
        $application = Application::with('job', 'user')->findOrFail($id);
        $candidate = $application->user;
        $candidateProfile = $candidate->candidateProfile;

        // Check if profile exists before fetching related candidates
        if ($candidateProfile) {
            $relatedCandidates = \App\Models\CandidateProfile::where('job_title', $candidateProfile->job_title)
                ->where('id', '!=', $candidateProfile->id)
                ->take(4)
                ->get();
        } else {
            $relatedCandidates = collect(); // Empty collection to avoid blade error
        }

        return view('employer.applications.show-candidate', compact(
            'application',
            'candidate',
            'candidateProfile',
            'relatedCandidates'
        ));
    }




    // Update application status 
    public function updateStatus(Application $application, string $status)
    {
        $validStatuses = ['shortlisted', 'rejected', 'approved', 'ignored']; // your statuses

        if (!in_array($status, $validStatuses)) {
            return back()->withErrors(['Invalid status.']);
        }

        $application->status = $status;
        $application->save();

        // Optionally notify candidate based on status
        if ($status === 'shortlisted') {
            $application->user->notify(new CandidateShortlisted($application));
        } elseif ($status === 'rejected') {
            // $application->user->notify(new CandidateRejected($application));
        }

        return back()->with('success', "Candidate has been {$status}.");
    }




    public function shortlist($id)
    {
        $application = Application::findOrFail($id);
        $application->status = 'shortlisted';
        $application->save();

        // You can also send in-app or email notifications here
        $application->user->notify(new ApplicationShortlistedNotification($application));

        return redirect()->back()->with('success', 'Candidate shortlisted.');
    }

    public function reject($id)
    {
        $application = Application::findOrFail($id);
        $application->status = 'rejected';
        $application->save();

        return redirect()->back()->with('success', 'Candidate rejected.');
    }

    public function destroy($id)
    {
        $application = Application::findOrFail($id);
        $application->delete();

        return redirect()->back()->with('success', 'Application deleted.');
    }
}