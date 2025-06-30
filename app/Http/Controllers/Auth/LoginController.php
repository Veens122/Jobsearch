<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Str;


class LoginController extends Controller
{
    //

    public function login(Request $request)
    {
        $request->validate([
            'email'    => 'required|email',
            'password' => 'required',
        ]);


        $throttleKey = Str::lower($request->input('email')) . '|' . $request->ip();

        if (RateLimiter::tooManyAttempts($throttleKey, 3)) {
            $seconds = RateLimiter::availableIn($throttleKey);
            $minutes = ceil($seconds / 60);

            return redirect()->back()->with('error', "Too many login attempts. Please try again in {$minutes} minute(s).");
        }


        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $user = Auth::user();

            if ($user->banned_until && now()->greaterThanOrEqualTo($user->banned_until)) {
                $user->banned_until = null;
                $user->status = 'active';
                $user->save();
            }

            if ($user->banned_until && now()->lessThan($user->banned_until)) {
                $remaining = now()->diffInDays($user->banned_until);
                Auth::logout();
                return redirect()->route('login')->with('error', "Your account is banned for {$remaining} more day(s) until " . $user->banned_until->format('d M Y H:i'));
            }

            if ($user->email_verification_otp !== null) {
                Auth::logout();
                return redirect()->route('verify.otp', ['email' => $user->email])
                    ->with('error', 'Please verify your email before logging in.');
            }

            if ($user->role_id == 2 && !$user->is_approved) {
                Auth::logout();
                return redirect()->route('login')->withErrors([
                    'email' => 'Your employer account is pending approval by the administrator.',
                ]);
            }

            switch ($user->role_id) {
                case 3:
                    return redirect()->route('candidate.dashboard');
                case 2:
                    return redirect()->route('employer.dashboard');
                case 1:
                    return redirect()->route('superadmin.dashboard');
                default:
                    Auth::logout();
                    return redirect()->route('login')->with('error', 'Unauthorized role.');
            }
        }


        RateLimiter::hit($throttleKey, 300); // 300 seconds = 5 minutes
        $attemptsLeft = 3 - RateLimiter::attempts($throttleKey);

        if ($attemptsLeft === 1) {
            return redirect()->back()->withErrors([
                'email' => 'Unrecognized credentials. You have only 1 attempt left before lockout.',
            ]);
        }

        return redirect()->back()->withErrors([
            'email' => 'Unrecognized credentials.',
        ]);
    }
}
