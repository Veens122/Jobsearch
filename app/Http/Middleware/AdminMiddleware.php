<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  mixed  ...$roles
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function handle(Request $request, Closure $next, ...$roles): Response
    {


        if (Auth::check()) {
            if (Auth::user()->role_id == 1) {
                return $next($request);
            }

            $user = Auth::user();

            if (!in_array($user->role_id, $roles)) {
                return redirect()->route('login')->with('error', 'Access Denied');
            }

            return $next($request);
        }
    }
}