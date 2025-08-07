<?php

namespace App\Http\Controllers;

use App\Models\EmployerProfile;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Storage;

class EmployerProfileController extends Controller
{
    //


    public function showProfile($id = null)
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Please login to access the profile.');
        }

        // Viewing own profile (only for employer)
        if (is_null($id)) {
            if (auth()->user()->role_id !== 2) {
                abort(403, 'Only employers can view their own profile.');
            }

            $employer = auth()->user()->load('employerProfile');
        }
        // Viewing someone else's profile (for all authenticated users)
        else {
            $employer = \App\Models\User::where('id', $id)
                ->where('role_id', 2)
                ->with('employerProfile')
                ->firstOrFail();
        }

        return view('profile.employer-profile', compact('employer'));
    }





    // Show edit profile form



    public function editProfile()
    {
        $employer = User::with('employerProfile')->find(Auth::id());

        return view('profile.employer-edit', compact('employer'));
    }

    // Update employer profile


    public function updateProfile(Request $request)
    {
        // Validate incoming request data
        $request->validate([
            'company_name'          => 'required|string|max:255',
            'email'                 => 'required|email|max:255|unique:users,email,' . Auth::id(),
            'phone'                 => 'nullable|string|max:20',
            'industry'              => 'nullable|string|max:255',
            'website'               => 'nullable|url|max:255',
            'company_description'   => 'nullable|string',
            'address'               => 'nullable|string|max:255',
            'country'               => 'nullable|string|max:100',
            'state'                 => 'nullable|string|max:100',
            'founded'               => 'nullable|date|max:100',
            'city'                  => 'nullable|string|max:100',
            'zipcode'               => 'nullable|string|max:20',
            'logo'                  => 'nullable|image|mimes:jpg,jpeg,png|max:5020',
        ]);

        $user = Auth::user();

        // Update user table fields
        $user->name  = $request->input('company_name');
        $user->email = $request->input('email');
        $user->save();

        // Update or create employer profile
        $profile = EmployerProfile::updateOrCreate(
            ['user_id' => $user->id],
            [
                'company_name'          => $request->input('company_name'),
                'email'                => $request->input('email'),
                'industry'             => $request->input('industry'),
                'website'              => $request->input('website'),
                'company_description'  => $request->input('company_description'),
                'address'              => $request->input('address'),
                'country'              => $request->input('country'),
                'state'                => $request->input('state'),
                'zipcode'              => $request->input('zipcode'),
                'city'                 => $request->input('city'),
                'phone'                => $request->input('phone'),
                'founded'              => $request->input('founded'),
            ]
        );

        if ($request->hasFile('logo')) {
            if ($profile->logo) {
                Storage::disk('public')->delete($profile->logo);
            }
            $path = $request->file('logo')->store('logos', 'public');
            $profile->logo = $path;
            $profile->save();
        }


        // Redirect back to edit page with success message
        return redirect()->route('employer-profile')->with('success', 'Profile updated successfully!');
    }
}