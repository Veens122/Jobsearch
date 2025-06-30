<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\JobCategory;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    //
    public function index()
    {
        $jobs = Job::latest()->take(8)->get();

        $categories = JobCategory::withCount([
            'jobs as active_jobs_count' => function ($query) {
                $query->where('status', 'open')
                    ->where('expiry_date', '>=', now());
            }
        ])->get();

        $countries = Job::whereNotNull('country')
            ->where('country', '!=', '')
            ->distinct()
            ->pluck('country');


        $activeJobsCount = Job::where('status', 'open')
            ->where('expiry_date', '>=', now())
            ->count();

        $totalEmployers = User::where('role_id', 2)->count();
        $totalCandidates = User::where('role_id', 3)->count();

        return view('home', compact('jobs', 'categories', 'countries', 'activeJobsCount', 'totalEmployers', 'totalCandidates'));
    }


    public function logout()
    {
        Auth::guard('web')->logout();
        return redirect('/')->with('message', 'You have been logged out successfully');
    }

    // Contact Us Page
    public function contact()
    {
        return view('contact-us');
    }

    // About Us Page
    public function about()
    {
        return view('about-us');
    }
}
