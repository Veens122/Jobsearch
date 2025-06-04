<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\CandidateProfile;
use App\Models\User;
use Illuminate\Support\Facades\Storage;

class CandidateProfileController extends Controller
{
    //

    public function showProfile()
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Please login to access your profile.');
        }



        $candidate = auth()->user()->load('candidateProfile');


        return view('profile.candidate-profile', compact('candidate'));
    }

    public function editProfile()
    {
        $candidate = User::with('candidateProfile')->find(Auth::id());

        return view('profile.edit', compact('candidate'));
    }






    // To update profile
    public function updateProfile(Request $request)
    {
        $user = auth()->user();

        $user->name = $request->input('full_name');
        $user->email = $request->input('email');
        $user->save();

        // Get existing profile or create a new one
        $profile = CandidateProfile::updateOrCreate(
            ['user_id' => $user->id],
            [
                'username' => $user->username,
                'email' => $user->email,
            ]
        );

        // Handle profile picture upload if new one is provided
        if ($request->hasFile('profile_picture')) {
            if ($profile->profile_picture) {
                Storage::disk('public')->delete($profile->profile_picture);
            }
            $path = $request->file('profile_picture')->store('profile_picture', 'public');
            $profile->profile_picture = $path;
        }

        // Update other profile fields
        $profile->full_name = $user->name;
        $profile->phone = $request->input('phone');
        $profile->job_title = $request->input('job_title');
        $profile->resume = $request->input('resume');
        $profile->experience = $request->input('experience');
        $profile->skills = $request->input('skills');
        $profile->country = $request->input('country');
        $profile->expected_salary = $request->input('expected_salary');
        $profile->city = $request->input('city');
        $profile->address = $request->input('address');
        $profile->zipcode = $request->input('zipcode');
        $profile->availability = $request->input('availability');
        $profile->education = $request->input('education');
        $profile->bio = $request->input('bio');

        $profile->save();

        return redirect()->route('profile.candidate-profile')->with('success', 'Profile updated successfully!');
    }


    // Candidate details view
    // Show public detail of a candidate by user ID
    public function candidateDetail($id)
    {
        $candidateProfile = CandidateProfile::where('user_id', $id)->firstOrFail();

        $relatedCandidates = CandidateProfile::where('job_title', $candidateProfile->job_title)
            ->where('id', '!=', $candidateProfile->id)
            ->take(4)
            ->get();

        return view('candidate-detail', compact('candidateProfile', 'relatedCandidates'));
    }

    // Contact candidate
    public function contactCandidate(Request $request)
    {
        // Validation
        $request->validate([
            'candidate_id' => 'required|exists:candidate_profiles,user_id',
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'subject' => 'required',
            'message' => 'required',
        ]);


        return back()->with('success', 'Message sent successfully!');
    }
}
