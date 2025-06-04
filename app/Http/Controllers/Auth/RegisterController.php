<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{

    // public function register(Request $request, $role)
    // {
    //     $roles = [
    //         'superadmin' => 1,
    //         'employer' => 2,
    //         'candidate' => 3
    //     ];

    //     if (!array_key_exists($role, $roles)) {
    //         abort(404, 'Invalid role');
    //     }

    //     $rules = [
    //         'email'        => 'required|email|unique:users,email|max:255',
    //         'username'     => 'required|string|max:255|unique:users,username',
    //         'password'     => 'required|min:5|max:40|confirmed',
    //     ];

    //     if ($role === 'employer') {
    //         $rules['company_name'] = 'required|string|max:255';
    //     } elseif ($role === 'candidate') {
    //         $rules['full_name'] = 'required|string|max:255';
    //     }

    //     $validator = Validator::make($request->all(), $rules, [
    //         "email.unique"     => "This email is already registered.",
    //         "username.unique"  => "This username is already taken.",
    //         "password.confirmed" => "Passwords do not match.",
    //     ]);

    //     if ($validator->fails()) {
    //         return redirect()->back()->withErrors($validator)->withInput();
    //     }

    //     $user = User::create([
    //         'name'     => $request->company_name ?? $request->full_name ?? 'Admin',
    //         'email'    => $request->email,
    //         'username' => $request->username,
    //         'password' => Hash::make($request->password),
    //         'role_id'  => $roles[$role],
    //     ]);

    //     Auth::login($user);

    //     // Redirect based on role
    //     return match ($roles[$role]) {
    //         1 => redirect()->route('superadmin.dashboard'),
    //         2 => redirect()->route('employer.dashboard'),
    //         3 => redirect()->route('candidate.dashboard'),
    //     };
    // }
}
