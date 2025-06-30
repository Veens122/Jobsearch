<?php

namespace App\Http\Controllers;

use App\Mail\ApplicationShortlistedMail;
use App\Mail\ApplicationUnderReviewMail;
use App\Models\Application;
use App\Models\EmployerProfile;
use App\Models\Job;
use App\Models\User;
use App\Notifications\ApplicationShortlistedNotification;
use App\Notifications\CandidateShortlisted;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

use Illuminate\Support\Facades\Log; // Add this at the top


class JobApplicationController extends Controller
{
    // Apply for a job

    public function apply(Request $request, $id) // $id is the job_id
    {
        $request->validate([
            'resume' => 'required|file|mimes:pdf,doc,docx|max:5120',
            'cover_letter' => 'nullable|file|mimes:pdf,doc,docx|max:5120',
        ]);

        // Check for duplicate application
        if (Application::where('user_id', auth()->id())
            ->where('job_id', $id)
            ->exists()
        ) {
            return back()->with('error', 'You have already applied for this job.');
        }

        // Store resume
        $resumePath = $request->file('resume')->store('applications/resumes', 'public');

        if (!$resumePath) {
            Log::error('Resume upload failed for user: ' . auth()->id());
            return back()->with('error', 'Resume upload failed. Please try again.');
        }

        Log::info('Resume uploaded by user ' . auth()->id() . ': ' . $resumePath);

        // Store cover letter if provided
        $coverLetterPath = null;
        if ($request->hasFile('cover_letter')) {
            $coverLetterPath = $request->file('cover_letter')->store('applications/cover_letters', 'public');
        }

        // Create application
        $application = Application::create([
            'job_id' => $id,
            'user_id' => auth()->id(),
            'resume' => $resumePath,
            'cover_letter' => $coverLetterPath,
            'status' => 'pending'
        ]);

        Log::info('Application created: ' . $application->id . ' | Resume Path: ' . $resumePath);

        return back()->with('success', 'Application submitted successfully!');
    }






    public function index(Request $request)
    {
        $employerId = auth()->id();

        $applications = Application::whereHas('job', function ($query) use ($employerId) {
            $query->where('employer_id', $employerId);
        })
            ->when($request->filled('search'), function ($query) use ($request) {
                $query->whereHas('job', function ($q) use ($request) {
                    $q->where('title', 'like', '%' . $request->search . '%');
                });
            })
            ->when($request->filled('status'), function ($query) use ($request) {
                $query->where('status', $request->status);
            })
            ->with(['candidateProfile.user', 'job'])
            ->latest()
            ->paginate(10);

        // Preserve filters in pagination links
        $applications->appends($request->all());

        $employer = auth()->user()->load('employerProfile');

        return view('employer.applications.index', compact('applications', 'employer'));
    }


    // Show  application
    public function showCandidate($id)
    {
        $application = Application::with('job', 'user')->findOrFail($id);
        $candidate = $application->user;
        $candidateProfile = $candidate->candidateProfile;

        // ✅ Send email ONLY if not under review
        if (!$application->is_under_review) {
            $application->is_under_review = true;
            $application->save();

            // Send one-time email to candidate
            Mail::to($candidate->email)->send(new ApplicationUnderReviewMail($application));
        }

        $relatedCandidates = $candidateProfile
            ? \App\Models\CandidateProfile::where('job_title', $candidateProfile->job_title)
            ->where('id', '!=', $candidateProfile->id)
            ->take(4)
            ->get()
            : collect();

        $hasApplied = true;

        return view('employer.applications.show-candidate', compact(
            'application',
            'candidate',
            'candidateProfile',
            'relatedCandidates',
            'hasApplied'
        ));
    }



    public function downloadResume($applicationId)
    {
        $application = Application::with('job')->findOrFail($applicationId);

        // Verify employer owns this application
        if (auth()->id() !== $application->job->employer_id) {
            abort(403, 'Unauthorized action.');
        }

        if (!$application->resume) {
            abort(404, 'No resume was submitted with this application.');
        }

        $path = storage_path('app/public/' . $application->resume);

        if (!file_exists($path)) {
            abort(404, 'File not found in storage.');
        }

        return response()->download($path);
    }

    public function downloadCoverLetter($applicationId)
    {
        $application = Application::with('job')->findOrFail($applicationId);

        if (auth()->id() !== $application->job->employer_id) {
            abort(403, 'Unauthorized action.');
        }

        if (!$application->cover_letter) {
            abort(404, 'No cover letter was submitted with this application.');
        }

        $path = storage_path('app/public/' . $application->cover_letter);

        if (!file_exists($path)) {
            abort(404, 'File not found in storage.');
        }

        return response()->download($path);
    }




    // Update application status 
    public function updateStatus(Application $application, string $status)
    {
        $validStatuses = ['shortlisted', 'rejected', 'approved', 'ignored'];

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

    public function showRelatedJobs($id)
    {
        // Load job with its employer relationship
        $job = Job::with('employerProfile')->findOrFail($id);

        // Get employer info from the job relationship
        $employer = $job->employerProfile;

        // Get related jobs using same industry and category, exclude current job
        $relatedJobs = Job::where('id', '!=', $job->id)
            ->where(function ($query) use ($job) {
                $query->where('industry', $job->industry)
                    ->orWhere('category_id', $job->category_id);
            })
            ->latest()
            ->limit(5)
            ->get();

        return view('job-detail', compact('job', 'employer', 'relatedJobs'));
    }





    public function shortlist($id)
    {
        $application = Application::where('id', $id)
            ->whereHas('job', function ($query) {
                $query->where('employer_id', auth()->id());
            })->firstOrFail();

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

    // TO VIEW SHORTLISTED CANDIDATES
    public function shortlistedCandidates(Request $request)
    {
        $employerId = auth()->id();

        $applications = Application::whereHas('job', function ($query) use ($employerId) {
            $query->where('employer_id', $employerId);
        })
            ->where('status', 'shortlisted')
            ->with(['candidateProfile.user', 'job'])
            ->latest()
            ->paginate(10);

        // Preserve filters in pagination links
        $applications->appends($request->all());

        return view('employer.shortlisted-candidates', compact('applications'));
    }

    public function removeShortlist($id)
    {
        $application = Application::findOrFail($id);

        // Ensure employer owns this job
        if ($application->job->employer_id !== auth()->id()) {
            abort(403, 'Unauthorized');
        }

        if ($application->status === 'shortlisted') {
            $application->status = 'pending';
            $application->save();

            return redirect()->back()->with('success', 'Candidate removed from shortlist and set back to pending.');
        }

        return redirect()->back()->with('info', 'Candidate is not shortlisted.');
    }
}
