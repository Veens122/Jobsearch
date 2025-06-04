<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class SuperAdminProfileController extends Controller
{
    //


    public function showProfile()
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Please login to access your profile.');
        }

        $admin = Auth::user();

        return view('profile.admin-profile', compact('admin'));
    }

    public function editProfile()
    {
        $admin = Auth::user();

        return view('profile.admin-edit', compact('admin'));
    }



    // Update  profile



    public function updateProfile(Request $request)
    {
        $request->validate([
            'name'     => 'required|string|max:255',
            'username'     => 'required|string|max:255',
            'email'    => 'required|email|max:255|unique:users,email,' . Auth::id(),
            'profile_picture' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $user = Auth::user();

        $user->name    = $request->input('name');
        $user->username = $request->input('username');
        $user->email   = $request->input('email');

        if ($request->hasFile('profile_picture')) {
            if ($user->profile_picture) {
                Storage::disk('public')->delete($user->profile_picture);
            }

            $path = $request->file('profile_picture')->store('profile_picture', 'public');
            $user->profile_picture = $path;
        }

        $user->save();

        return redirect()->route('admin-profile')->with('success', 'Profile updated successfully!');
    }
}
