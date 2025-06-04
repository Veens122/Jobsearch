<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckIfBanned
{
    public function handle(Request $request, Closure $next)
    {
        $user = Auth::user();

        if ($user) {
            // Automatically unban if ban period is over
            if ($user->banned_until && now()->greaterThanOrEqualTo($user->banned_until)) {
                $user->update([
                    'banned_until' => null,
                    'status' => 'active', // optional if you're also using status
                ]);
            }

            // Still banned
            if ($user->banned_until && now()->lessThan($user->banned_until)) {
                Auth::logout();
                return redirect()->route('login')->withErrors([
                    'email' => 'Your account is banned until ' . $user->banned_until->format('d M Y H:i') . '.',
                ]);
            }
        }

        return $next($request);
    }
}
