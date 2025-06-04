<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    //

    public function login(Request $request)
    {
        $request->validate([
            'email'    => 'required|email',
            'password' => 'required',
        ]);

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

        return redirect()->back()->withErrors([
            'email' => 'Invalid credentials.',
        ]);
    }
}
