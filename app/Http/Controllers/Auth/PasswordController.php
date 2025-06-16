<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class PasswordController extends Controller
{
    //
    public function editPassword()
    {
        return view('auth.passwords.change-password');
    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|string|min:5|confirmed',
        ], [
            'new_password.confirmed' => 'New password and confirmation do not match.',
        ]);

        $user = Auth::user();

        if (!Hash::check($request->old_password, $user->password)) {
            return back()->with('error', 'Incorrect password');
        }

        $user->password = Hash::make($request->new_password);
        $user->save();

        switch ($user->role_id) {
            case 1: // Super Admin
                return redirect('/admin/profile/admin-profile')->with('success', 'Password successfully changed');
            case 2: // Employer
                return redirect('/profile/employer-profile')->with('success', 'Password successfully changed');
            case 3: // Candidate
                return redirect('/profile/candidate-profile')->with('success', 'Password successfully changed');
            default:
                return redirect('/')->with('success', 'Password successfully changed');
        }
    }
}