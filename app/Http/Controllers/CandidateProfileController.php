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

        $candidate = auth()->user()->load([
            'candidateProfile',
            'jobHistories',
            'educationHistories'
        ]);

        $jobHistories = $candidate->jobHistories;
        $educationHistories = $candidate->educationHistories;

        return view('profile.candidate-profile', compact('candidate', 'jobHistories', 'educationHistories'));
    }





    public function editProfile()
    {
        $candidate = Auth::user()->load('candidateProfile', 'candidateProfile.educationHistory', 'candidateProfile.jobHistory');

        // Define the variables properly
        $educationHistory = $candidate->candidateProfile->educationHistory ?? collect();
        $jobHistory = $candidate->candidateProfile->jobHistory ?? collect();

        return view('profile.edit', compact('candidate', 'educationHistory', 'jobHistory'));
    }


    // To update profile
    public function updateProfile(Request $request)
    {
        $user = auth()->user();

        $request->validate([
            'full_name' => 'required|string|max:255',
            'username' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'phone' => 'nullable|string|max:20',
            'job_title' => 'nullable|string|max:255',
            'resume' => 'nullable|string|max:255',
            'experience' => 'nullable|string|max:255',
            'skills' => 'nullable|string|max:255',
            'country' => 'nullable|string|max:100',
            'expected_salary' => 'nullable|string|max:100',
            'city' => 'nullable|string|max:100',
            'address' => 'nullable|string|max:255',
            'zipcode' => 'nullable|string|max:20',
            'availability' => 'nullable|string|max:100',
            'bio' => 'nullable|string|max:1000',
            'profile_picture' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',

            'job_history.*.job_title' => 'nullable|string|max:255',
            'job_history.*.company' => 'nullable|string|max:255',
            'job_history.*.company_address' => 'nullable|string|max:255',
            'job_history.*.start_date' => 'nullable|date',
            'job_history.*.end_date' => 'nullable|date|after_or_equal:job_history.*.start_date',

            'education.*.institution' => 'nullable|string|max:255',
            'education.*.year' => 'nullable|string|max:50',
            'education.*.result_acquired' => 'nullable|string|max:255',
        ]);

        $user->update([
            'name' => $request->input('full_name'),
            'username' => $request->input('username'),
            'email' => $request->input('email'),
        ]);
        // Create or update profile
        $profile = CandidateProfile::updateOrCreate(
            ['user_id' => $user->id],
            [
                'full_name' => $request->full_name,
                'job_title' => $request->job_title,
                'resume' => $request->resume,
                'experience' => $request->experience,
                'bio' => $request->bio,
                'phone' => $request->phone,
                'address' => $request->address,
                'country' => $request->country,
                'city' => $request->city,
                'zipcode' => $request->zipcode,
                'skills' => $request->skills,
                'expected_salary' => $request->expected_salary,
                'availability' => $request->availability,
            ]
        );

        // Handle profile picture upload
        if ($request->hasFile('profile_picture')) {
            if ($profile->profile_picture && Storage::disk('public')->exists($profile->profile_picture)) {
                Storage::disk('public')->delete($profile->profile_picture);
            }
            $path = $request->file('profile_picture')->store('profile_picture', 'public');
            $profile->profile_picture = $path;
            $profile->save();
        }

        // === Update Job History ===
        $profile->jobHistory()->delete();
        foreach ($request->input('job_history', []) as $entry) {
            if (!empty($entry['job_title']) || !empty($entry['company']) || !empty($entry['start_date']) || !empty($entry['end_date'])) {
                $profile->jobHistory()->create([
                    'job_title'       => $entry['job_title'] ?? '',
                    'company'         => $entry['company'] ?? '',
                    'company_address' => $entry['company_address'] ?? '',
                    'start_date'      => $entry['start_date'] ?? null,
                    'end_date'        => $entry['end_date'] ?? null,
                ]);
            }
        }

        // === Update Education History ===
        $profile->educationHistory()->delete();
        foreach ($request->input('education', []) as $edu) {
            if (!empty($edu['institution']) || !empty($edu['year']) || !empty($edu['result_acquired'])) {
                $profile->educationHistory()->create([
                    'institution'     => $edu['institution'] ?? '',
                    'year'            => $edu['year'] ?? '',
                    'result_acquired' => $edu['result_acquired'] ?? '',
                ]);
            }
        }

        return redirect()->route('profile.candidate-profile')->with('success', 'Profile updated successfully!');
    }




    // Show public detail of a candidate by user ID
    public function candidateDetail($id)
    {
        $candidateProfile = CandidateProfile::with('educationHistory', 'jobHistory')->where('user_id', $id)->firstOrFail();

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