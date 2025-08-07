<?php

namespace App\Http\Controllers\Employer;

use App\Http\Controllers\Controller;
use App\Mail\OtpMail;
use App\Models\Application;
use App\Models\User;
use App\Models\Job;
use App\Notifications\CandidateShortlisted;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class EmployerController extends Controller
{

    // Employer dashboard
    public function dashboard()
    {
        $employer = auth()->user();

        if (!$employer || $employer->role_id !== 2) {
            return redirect()->route('login')->with('error', 'Please login as an employer to access the dashboard.');
        }

        // Eager load employer profile
        $employer->load('employerProfile');

        // Fetch jobs posted by this employer
        $jobs = Job::withCount('applications')
            ->where('employer_id', $employer->id)
            ->orderBy('created_at', 'desc')
            ->get();

        // Dashboard stats
        $postedJobsCount = Job::where('employer_id', $employer->id)->count();
        $applicantsCount = Application::whereHas('job', function ($query) use ($employer) {
            $query->where('employer_id', $employer->id);
        })->count();

        //  Active Jobs: expiry_date is today or later
        $activeJobsCount = Job::where('employer_id', $employer->id)
            ->where('status', 'open')
            ->whereDate('expiry_date', '>=', Carbon::today())
            ->count();

        // Expired Jobs: expiry_date is before today
        $expiredJobsCount = Job::where('employer_id', $employer->id)
            ->whereDate('expiry_date', '<', Carbon::today())
            ->count();

        //  Shortlisted applications
        $shortlistedCount = Application::whereHas('job', function ($query) use ($employer) {
            $query->where('employer_id', $employer->id);
        })->where('status', 'shortlisted')->count();



        return view('employer.dashboard', compact(
            'employer',
            'jobs',
            'postedJobsCount',
            'applicantsCount',
            'activeJobsCount',
            'expiredJobsCount',
            'shortlistedCount'
        ));
    }

    public function jobList()
    {
        $jobs = Job::withCount('applications')
            ->where('employer_id', auth()->id())
            ->latest()
            ->paginate(10);

        return view('employer.jobs.job-list', compact('jobs'));
    }



    // notification when shortlisted
    public function shortlist($id)
    {
        // Find the application
        $application = Application::findOrFail($id);

        // Get the candidate (assuming relationship is defined)
        $candidate = $application->candidate;

        // Update application status
        $application->status = 'shortlisted';
        $application->save();

        // Send email + in-app (database) notification
        $candidate->notify(new CandidateShortlisted($application));

        return back()->with('success', 'Candidate shortlisted and notified.');
    }

    // Download Resume
    public function downloadResume($candidateId)
    {
        $candidate = User::with('candidateProfile')->findOrFail($candidateId);

        // Ensure candidate has a profile and resume
        if (!$candidate->candidateProfile || !$candidate->candidateProfile->resume) {
            return redirect()->back()->with('error', 'Resume not found for this candidate.');
        }

        $resumePath = $candidate->candidateProfile->resume;

        // Check if resume file actually exists
        if (Storage::disk('public')->exists($resumePath)) {
            return response()->download(storage_path('app/public/' . $resumePath));
        }

        return redirect()->back()->with('error', 'Resume file not found.');
    }
}