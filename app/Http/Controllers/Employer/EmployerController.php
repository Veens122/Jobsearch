<?php

namespace App\Http\Controllers\Employer;

use App\Http\Controllers\Controller;
use App\Mail\OtpMail;
use App\Models\Application;
use App\Models\User;
use App\Models\Job;
use App\Notifications\CandidateShortlisted;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class EmployerController extends Controller
{
    // Show registration view
    public function signUp()
    {
        return view('auth.register');
    }

    public function registerEmployer(Request $request)
    {
        // Check if email already exists
        $existingUser = User::where('email', $request->email)->first();

        if ($existingUser) {
            if (!$existingUser->is_email_verified) {
                $existingUser->email_verification_otp = rand(100000, 999999);
                $existingUser->otp_expires_at = now()->addMinutes(1);
                $existingUser->save();

                // Resend OTP
                Mail::to($existingUser->email)->send(new OtpMail($existingUser->email_verification_otp));

                return redirect()->route('verify.otp', ['email' => $existingUser->email])
                    ->with('message', 'Email already registered but not verified. A new OTP has been sent.');
            } else {
                // Email exists and verified: redirect to login
                return redirect()->route('login')->with('error', 'Email already registered. Please login.');
            }
        }

        // Proceed to register new user if email doesn't exist
        $validator = Validator::make($request->all(), [
            'company_name' => 'required|string|max:255',
            'email'        => 'required|email|max:255',
            'username'     => 'required|string|max:255|unique:users,username',
            'password'     => 'required|min:5|max:40|confirmed',
        ], [
            'username.unique'    => 'This username is already taken.',
            'password.confirmed' => 'Passwords do not match.',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Create the user
        $user = User::create([
            'name'             => $request->company_name,
            'email'            => $request->email,
            'username'         => $request->username,
            'password'         => Hash::make($request->password),
            'role_id'          => 2,
            'is_approved'  => false,
            'is_email_verified' => false,
        ]);

        // Create employer profile
        $user->employerProfile()->create([
            'company_name'    => $request->company_name,
            'is_approved' => false,
            'email'           => $user->email,
        ]);

        // Generate and send OTP
        $user->email_verification_otp = rand(100000, 999999);
        $user->otp_expires_at = now()->addMinutes(1);
        $user->save();

        Mail::to($user->email)->send(new OtpMail($user->email_verification_otp));

        return redirect()->route('verify.otp', ['email' => $user->email])
            ->with('message', 'Registration successful. An OTP has been sent to your email.');
    }



    public function showOtpForm($email)
    {
        return view('auth.verify-otp', ['email' => $email]);
    }

    public function resendOtp($email)
    {
        $user = User::where('email', $email)->first();

        if (!$user) {
            return redirect()->route('login')->with('error', 'User not found');
        }

        // Block if current OTP hasn't expired yet
        if ($user->otp_expires_at && now()->lt($user->otp_expires_at)) {
            return redirect()->back()->with('error', 'Please wait before requesting another OTP');
        }

        // Generate new OTP and set expiration
        $user->email_verification_otp = rand(100000, 999999);
        $user->otp_expires_at = now()->addMinutes(1);
        $user->save();

        // Send new OTP via email
        Mail::to($user->email)->send(new OtpMail($user->email_verification_otp));

        return redirect()->back()->with('message', 'A new OTP has been sent to your email.');
    }


    // Submission of OTP
    public function submitOTP(Request $request, $email)
    {
        $request->validate([
            'otp' => 'required|numeric|digits:6'
        ]);

        $user = User::where('email', $email)
            ->where('email_verification_otp', $request->otp)
            ->where('otp_expires_at', '>=', now())
            ->first();

        if (!$user) {
            return redirect()->back()->with('error', 'Invalid or expired OTP. Please request a new one.');
        }

        // Mark email as verified
        $user->is_email_verified = true;
        $user->email_verified_at = now();
        $user->email_verification_otp = null;
        $user->otp_expires_at = null;
        $user->save();

        return redirect()->route('login')->with('message', 'Email verified successfully. Your account is pending admin approval.');
    }


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

        return view('employer.dashboard', compact(
            'employer',
            'jobs',
            'postedJobsCount',
            'applicantsCount'
        ));
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
}
