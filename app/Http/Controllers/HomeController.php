<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\JobCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    //
    public function index()
    {
        $jobs = Job::latest()->take(8)->get();
        $categories = JobCategory::all();
        return view('home', compact('jobs', 'categories'));
    }

    public function logout()
    {
        Auth::guard('web')->logout();
        return redirect('/')->with('message', 'You have been logged out successfully');
    }
}