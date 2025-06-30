<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Mail\OtpMail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    public function register(Request $request)
    {
        $isEmployer = $request->has('company_name');

        $validator = Validator::make($request->all(), [
            'email' => 'required|email|unique:users,email',
            'username' => 'required|string|max:255|unique:users,username',
            'password' => 'required|min:5|max:40|confirmed',
            $isEmployer ? 'company_name' : 'name' => 'required|string|max:255',
        ], [
            'email.unique' => 'This email is already registered. Please log in instead.',
            'username.unique' => 'This username is already taken.',
            'password.confirmed' => 'Passwords do not match.',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        // Check if email exists but not verified
        $existingUser = User::where('email', $request->email)->first();
        if ($existingUser && !$existingUser->is_email_verified) {
            return $this->handleUnverifiedUser($existingUser);
        }

        if ($existingUser) {
            return redirect()->route('login')->with('error', 'Email already registered. Please login.');
        }

        $user = User::create([
            'name' => $isEmployer ? $request->company_name : $request->name,
            'email' => $request->email,
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'role_id' => $isEmployer ? 2 : 3,
            'is_email_verified' => false,
        ]);

        if ($isEmployer) {
            $user->employerProfile()->create([
                'company_name' => $request->company_name,
                'email' => $user->email,
                'is_approved' => false,
            ]);
        } else {
            $user->candidateProfile()->create([
                'full_name' => $request->name,
                'email' => $user->email,
            ]);
        }


        // Generate and save OTP
        $user->email_verification_otp = rand(100000, 999999);
        $user->otp_expires_at = now()->addMinutes(1);
        $user->save();

        // Send OTP email
        Mail::to($user->email)->send(new OtpMail($user->email_verification_otp));

        return redirect()->route('verify.otp', ['email' => $user->email])
            ->with('message', 'OTP sent to your email. Valid for 1 minutes.');
    }

    protected function handleUnverifiedUser(User $user)
    {
        $user->email_verification_otp = rand(100000, 999999);
        $user->otp_expires_at = now()->addMinutes(1);
        $user->save();

        Mail::to($user->email)->send(new OtpMail($user->email_verification_otp));

        return redirect()->route('verify.otp', ['email' => $user->email])
            ->with('message', 'Email exists but not verified. New OTP sent.');
    }


    public function showOtpForm($email)
    {
        $user = User::where('email', $email)->firstOrFail();

        return view('auth.verify-otp', [
            'email' => $email,
            'otpExpiryTimestamp' => optional($user->otp_expires_at)->timestamp * 1000,
        ]);
    }



    public function submitOtp(Request $request, $email)
    {
        $request->validate([
            'otp' => 'required|numeric|digits:6'
        ]);

        $user = User::where('email', $email)
            ->where('email_verification_otp', $request->otp)
            ->where('otp_expires_at', '>=', now())
            ->first();

        if (!$user) {
            return redirect()->back()
                ->with('error', 'Invalid or expired OTP.')
                ->withInput();
        }

        $user->is_email_verified = true;
        $user->email_verified_at = now();
        $user->email_verification_otp = null;
        $user->otp_expires_at = null;
        $user->save();

        return redirect()->route('login')->with('message', 'Email verified successfully. Please login.');
    }

    public function resendOtp($email)
    {
        $user = User::where('email', $email)->first();

        if (!$user) {
            return redirect()->route('login')->with('error', 'User not found.');
        }

        if ($user->otp_expires_at && now()->lt($user->otp_expires_at)) {
            $remaining = now()->diffInSeconds($user->otp_expires_at);
            return back()->with('error', "Please wait {$remaining} seconds before requesting another OTP.");
        }

        $user->email_verification_otp = rand(100000, 999999);
        $user->otp_expires_at = now()->addMinutes(1);
        $user->save();

        Mail::to($user->email)->send(new OtpMail($user->email_verification_otp));

        return back()->with('message', 'A new OTP has been sent to your email.');
    }
}
