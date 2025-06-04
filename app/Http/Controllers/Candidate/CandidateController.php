<?php

namespace App\Http\Controllers\Candidate;

use App\Http\Controllers\Controller;
use App\Mail\OtpMail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class CandidateController extends Controller
{
    // Show registration form
    public function signUp()
    {
        return view('auth.register');
    }

    // Handle candidate registration
    public function registerCandidate(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name'     => 'required|string|max:255',
            'email'    => 'required|email|unique:users,email|max:255',
            'username' => 'required|string|max:255|unique:users,username',
            'password' => 'required|min:5|max:40|confirmed',
        ], [
            'email.unique' => 'This email is already registered. Please log in instead.',
            "username.unique"  => "This username is already taken.",
            "password.confirmed" => "Passwords do not match.",
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }



        // Create a new candidate user
        $user = User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'role_id'  => 3,
        ]);

        // Generate OTP & Expiry
        $user->email_verification_otp = rand(100000, 999999);
        $user->otp_expires_at = now()->addMinutes(1);
        $user->save();

        // Send OTP via Email
        Mail::to($user->email)->send(new OtpMail($user->email_verification_otp));

        // Only redirect to OTP page — do not login yet
        return redirect()->route('verify.otp', ['email' => $user->email]);
    }


    // Show OTP form
    public function showOtpForm($email)
    {
        return view('auth.verify-otp', ['email' => $email]);
    }



    // Resend OTP

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
        $user->otp_expires_at = now()->addMinutes(1); // 1-minute validity
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

        $user->is_email_verified = true;
        $user->email_verified_at = now();
        $user->email_verification_otp = null;
        $user->otp_expires_at = null;
        $user->save();

        Auth::login($user);

        return redirect()->route('candidate.dashboard')->with('message', 'Email verified and login successful.');
    }





    // Candidate dashboard

    public function dashboard()
    {
        $user = auth()->user();

        // Fetch shortlisted jobs

        $shortlistedJobs = $user->shortlistedJobs()->get();


        // Fetch latest 10 notifications
        $notifications = $user->notifications()->latest()->take(10)->get();

        return view('candidate.dashboard', compact('shortlistedJobs', 'notifications'));
    }




    // Resume
    public function uploadResume(Request $request)
    {
        $request->validate([
            'resume' => 'required|file|mimes:pdf,doc,docx|max:2048', // Max 2MB
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
}