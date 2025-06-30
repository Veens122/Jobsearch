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

    public function updateProfile(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'name' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users,username,' . $user->id,
            'email' => 'required|email',
            'phone' => 'nullable|string',
            'job_title' => 'nullable|string',
            'age' => 'nullable|integer',
            'education' => 'nullable|string',
            'experience' => 'nullable|string',
            'language' => 'nullable|string',
            'bio' => 'nullable|string',
            'address' => 'nullable|string',
            'country' => 'nullable|string',
            'city' => 'nullable|string',
            'zipcode' => 'nullable|string',
            'profile_picture' => 'nullable|image|max:5020|mimes:jpeg,png,jpg,webp',
        ]);

        $user->name = $request->input('name');
        $user->username = $request->input('username');
        $user->email = $request->input('email');

        if ($request->hasFile('profile_picture')) {
            $path = $request->file('profile_picture')->store('profile_pictures', 'public');
            $user->profile_picture = $path;
        }

        $user->save();

        $user->adminProfile()->updateOrCreate(
            ['user_id' => $user->id],
            $request->only([
                'job_title',
                'phone',
                'age',
                'education',
                'experience',
                'language',
                'bio',
                'address',
                'country',
                'city',
                'zipcode'
            ])
        );

        return redirect()->route('admin-profile')->with('success', 'Profile updated successfully.');
    }
}
