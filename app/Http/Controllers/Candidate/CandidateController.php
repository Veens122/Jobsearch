<?php

namespace App\Http\Controllers\Candidate;

use App\Http\Controllers\Controller;
use App\Mail\OtpMail;
use App\Models\Application;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class CandidateController extends Controller
{
    // Candidate dashboard

    public function dashboard()
    {
        $user = auth()->user();

        // Paginate shortlisted applications and eager load job and employer info
        $shortlistedApplications = Application::with('job.employer.employerProfile')
            ->where('user_id', $user->id)
            ->where('status', 'shortlisted')
            ->latest('created_at')
            ->paginate(10);

        // Extract jobs from paginated applications
        $shortlistedJobs = $shortlistedApplications->map(function ($application) {
            return $application->job;
        });

        $appliedJobsCount = Application::where('user_id', $user->id)->count();
        $shortlistedJobsCount = Application::where('user_id', $user->id)
            ->where('status', 'shortlisted')
            ->count();
        $pendingJobsCount = Application::where('user_id', $user->id)
            ->where('status', 'pending')
            ->count();

        // Fetch latest 10 notifications
        $notifications = $user->notifications()->latest()->take(10)->get();

        return view('candidate.dashboard', compact(
            'shortlistedJobs',
            'shortlistedApplications',
            'notifications',
            'appliedJobsCount',
            'shortlistedJobsCount',
            'pendingJobsCount'
        ));
    }





    // Resume
    public function uploadResume(Request $request)
    {
        $request->validate([
            'resume' => 'required|file|mimes:pdf,doc,docx|max:5120',
        ]);

        $candidateProfile = auth()->user()->candidateProfile;

        if ($request->hasFile('resume')) {
            // Delete old resume from public disk
            if ($candidateProfile->resume) {
                Storage::disk('public')->delete($candidateProfile->resume);
            }

            // Store new resume in public disk
            $path = $request->file('resume')->store('resumes', 'public');

            $candidateProfile->resume = $path;
            $candidateProfile->save();

            return back()->with('success', 'Resume uploaded successfully.');
        }

        return back()->with('error', 'Please select a valid file.');
    }


    public function showResumeForm()
    {
        return view('profile.resume');
    }

    public function deleteResume()
    {
        $candidate = auth()->user()->candidateProfile;

        if ($candidate && $candidate->resume) {
            Storage::delete($candidate->resume);
            $candidate->resume = null;
            $candidate->save();

            return back()->with('success', 'Resume deleted successfully.');
        }

        return back()->with('error', 'No resume found.');
    }

    public function __construct()
    {
        $this->middleware(['auth', 'check.banned', 'role:3']);
    }

    public function publicProfile($id)
    {
        $candidate = User::with('candidateProfile')->findOrFail($id);
        return view('candidate.public-profile', compact('candidate'));
    }


    public function downloadResume($id)
    {
        $candidate = User::with('candidateProfile')->findOrFail($id);

        if (auth()->user()->role_id == 2 || auth()->id() == $id) {
            return Storage::download('public/' . $candidate->candidateProfile->resume);
        }

        abort(403, 'Unauthorized');
    }

    // To view shortlisted jobs
    public function shortListedJobs(Request $request)
    {
        $user = auth()->user();

        $query = Application::with('job.employer.employerProfile')
            ->where('user_id', $user->id)
            ->where('status', 'shortlisted');

        if ($request->filled('search')) {
            $query->whereHas('job', function ($q) use ($request) {
                $q->where('title', 'like', '%' . $request->search . '%');
            });
        }

        $shortlistedJobs = $query->latest('created_at')->paginate(10);

        return view('candidate.shortlisted-jobs', compact('shortlistedJobs'));
    }



    // To view applied jobs
    public function appliedJobs(Request $request)
    {
        $user = auth()->user();

        $query = Application::with('job.employer.employerProfile')
            ->where('user_id', $user->id);

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        if ($request->filled('search')) {
            $query->whereHas('job', function ($q) use ($request) {
                $q->where('title', 'like', '%' . $request->search . '%');
            });
        }

        $appliedJobs = $query->latest('created_at')->paginate(10);

        $appliedJobs->appends($request->only('status'));

        return view('candidate.applied-jobs', compact('appliedJobs'));
    }
}