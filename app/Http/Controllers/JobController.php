<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\EmployerProfile;
use App\Models\Job;
use App\Models\JobCategory;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class JobController extends Controller
{


    // Edit job
    public function editJob($id)
    {
        $employer = Auth::user();
        $job = Job::findOrFail($id);
        $categories = JobCategory::all();

        return view('employer.jobs.edit-job', compact('job', 'categories', 'employer'));
    }


    // Job detail

    public function jobDetail($id)
    {
        $job = Job::with('employerProfile')->findOrFail($id);
        $employer = User::with('employerProfile')->find($job->user_id);

        // Fetch related jobs
        $relatedJobs = Job::where('id', '!=', $job->id)
            ->where(function ($query) use ($job) {
                $query->where('category_id', $job->category_id)
                    ->orWhere('industry', $job->industry);
            })
            ->latest()
            ->take(5)
            ->get();

        return view('job-detail', compact('job', 'employer', 'relatedJobs'));
    }






    // Job List
    public function jobList(Request $request)
    {
        $employer = Auth::user();

        $query = Job::with(['employer.employerProfile'])
            ->where('employer_id', $employer->id);

        if ($search = $request->input('search')) {
            $query->where(function ($q) use ($search) {
                $q->where('title', 'LIKE', "%{$search}%")
                    ->orWhere('description', 'LIKE', "%{$search}%");
            });
        }

        $jobs = $query->orderBy('created_at', 'desc')->get();

        return view('employer.jobs.job-list', compact('jobs', 'employer'));
    }





    // Create a new job
    public function create()
    {
        $categories = JobCategory::all();

        $employer = Auth::user();

        return view('employer.jobs.create-job', compact('categories', 'employer'));
    }

    // Edit 
    public function edit($id)
    {
        $job = Job::where('id', $id)->where('employer_id', auth()->id())->firstOrFail();
        $categories = JobCategory::all();
        return view('employer.jobs.form', compact('job', 'categories'));
    }

    // Update job
    public function update(Request $request, $id)
    {
        $job = Job::findOrFail($id);

        $validated = $request->validate([
            'company_logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'company_name' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'industry' => 'required|string|max:255',
            'description' => 'required|string',
            'category_id' => 'required|exists:job_categories,id',
            'type' => 'required|string',
            'experience' => 'nullable|string|max:255',
            'age_limit' => 'nullable|string|max:255',
            'education_level' => 'required|string',
            'skills' => 'nullable|string',
            'country' => 'required|string|max:100',
            'city' => 'required|string|max:100',
            'start_date' => 'nullable|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
            'expiry_date' => 'nullable|date',
            'status' => 'required|in:open,closed',
            'salary_min' => 'nullable|numeric',
            'salary_max' => 'nullable|numeric|gte:salary_min',
            'salary_type' => 'nullable|in:weekly,monthly',
            'responsibilities' => 'nullable|string',
            'other_qualifications' => 'nullable|string',
        ]);

        // Handle logo upload
        if ($request->hasFile('company_logo')) {
            // Delete old logo if exists
            if ($job->company_logo && Storage::exists($job->company_logo)) {
                Storage::delete($job->company_logo);
            }

            // Store new logo
            $validated['company_logo'] = $request->file('company_logo')->store('company_logos', 'public');
        }

        // Update job with validated data
        $job->update($validated);

        return redirect()->route('employer.jobs.job-list')->with('success', 'Job updated successfully!');
    }



    // filter
    public function filter(Request $request)
    {
        $jobs = Job::latest()->paginate(10);
        $categories = JobCategory::all();
        $cities = Job::distinct()->pluck('city'); // fetch unique cities

        return view('search-jobs', compact('jobs', 'categories', 'cities'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'company_name' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'category_id' => 'required|exists:job_categories,id',
            'type' => 'required|string',
            'education_level' => 'required|string',
            'skills' => 'nullable|string',
            'country' => 'required|string|max:100',
            'city' => 'required|string|max:100',
            'status' => 'required|in:open,closed',
            'start_date' => 'nullable|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
            'expiry_date' => 'nullable|date|after_or_equal:start_date',
            'salary_min' => 'nullable|numeric',
            'salary_max' => 'nullable|numeric|gte:salary_min',
            'salary_type' => 'nullable|in:weekly,monthly',
            'age_limit' => 'nullable|string',
            'responsibilities' => 'nullable|string',
            'other_qualifications' => 'nullable|string',
            'company_logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $job = new Job();
        $job->user_id = auth()->id();
        $job->employer_id = auth()->id();
        $employerProfile = EmployerProfile::where('user_id', auth()->id())->first();
        $job->employer_profile_id = $employerProfile->id ?? null;
        $job->company_name = $request->company_name;
        $job->title = $request->title;
        $job->industry = $request->industry;
        $job->description = $request->description;
        $job->category_id = $request->category_id;
        $job->type = $request->type;
        $job->education_level = $request->education_level;
        $job->skills = $request->skills;
        $job->country = $request->country;
        $job->city = $request->city;
        $job->status = $request->status;
        $job->start_date = $request->start_date;
        $job->end_date = $request->end_date;
        $job->expiry_date = $request->expiry_date;
        $job->salary_min = $request->salary_min;
        $job->salary_max = $request->salary_max;
        $job->salary_type = $request->salary_type;
        $job->experience = $request->experience;
        $job->age_limit = $request->age_limit;
        $job->responsibilities = $request->responsibilities;
        $job->other_qualifications = $request->other_qualifications;

        // Company logo upload (corrected)
        if ($request->hasFile('company_logo')) {
            $job->company_logo = $request->file('company_logo')->store('company_logos', 'public');
        }

        $job->save();

        return redirect()->route('employer.jobs.job-list')->with('success', 'Job created successfully!');
    }




    // delete job

    public function destroy($id)
    {
        $job = Job::where('id', $id)->where('employer_id', auth()->id())->firstOrFail();
        $job->delete();

        return redirect()->route('employer.jobs.job-list')->with('success', 'Job successfully deleted..!');
    }


    // Search Jobs
    public function searchJobs(Request $request)
    {
        $query = Job::query();

        // Handle keyword (from either search bar)
        if ($request->filled('keyword')) {
            $query->where(function ($q) use ($request) {
                $q->where('title', 'like', '%' . $request->keyword . '%')
                    ->orWhere('description', 'like', '%' . $request->keyword . '%')
                    ->orWhere('skills', 'like', '%' . $request->keyword . '%');
            });
        }

        // Handle category 
        if ($request->filled('category_id')) {
            $query->where('category_id', $request->category_id);
        } elseif ($request->filled('category')) {
            $query->where('category_id', $request->category);
        }

        // Handle job type
        if ($request->filled('type')) {
            $query->where('job_type', $request->type);
        }

        // Handle job level
        if ($request->filled('level')) {
            $query->where('type', $request->level);
        }

        // Handle experience
        if ($request->filled('experience')) {
            $query->where('experience', 'like', '%' . $request->experience . '%');
        }

        // Filter by salary range (expects value like "500-1000")
        if ($request->filled('salary')) {
            [$min, $max] = explode('-', $request->salary);
            $query->whereBetween('salary', [(int) $min, (int) $max]);
        }

        // Filter by salary type (MONTHLY, YEARLY, etc.)
        if ($request->filled('salary_type')) {
            $query->where('salary_type', $request->salary_type);
        }

        //  Filter by country 
        if ($request->filled('country')) {
            $query->where('country', $request->country);
        }

        // Handle city (optional)
        if ($request->filled('city')) {
            $query->where('city', $request->city);
        }

        $countries = Job::select('country')
            ->whereNotNull('country')
            ->where('country', '!=', '')
            ->distinct()
            ->pluck('country');


        // Fetch results
        $jobs = $query->latest()->paginate(10);
        $categories = JobCategory::all();
        $cities = Job::select('city')->distinct()->pluck('city');

        return view('search-jobs', compact('jobs', 'categories', 'cities', 'countries'));
    }





    public function allJobs(Request $request)
    {
        $categories = JobCategory::all();
        $cities = Job::select('city')->distinct()->pluck('city');

        // Basic example - get all jobs or filtered jobs here
        $query = Job::query();

        // Example filters - adapt as needed
        if ($request->filled('keyword')) {
            $keyword = $request->keyword;
            $query->where('title', 'like', "%$keyword%")
                ->orWhere('description', 'like', "%$keyword%");
        }

        if ($request->filled('category_id')) {
            $query->where('category_id', $request->category_id);
        }

        if ($request->filled('city')) {
            $query->where('city', $request->city);
        }

        $jobs = $query->latest()->paginate(10);

        return view('all-jobs', compact('categories', 'cities', 'jobs'));
    }



    public function jobCategories()
    {
        $categories = JobCategory::all();
        return view('superadmin.categories.index', compact('categories'));
    }

    public function createCategory(Request $request)
    {
        $request->validate(['name' => 'required|unique:job_categories']);
        JobCategory::create(['name' => $request->name]);

        return back()->with('success', 'Category created.');
    }

    public function editCategory(Request $request, $id)
    {
        $category = JobCategory::findOrFail($id);
        $category->update(['name' => $request->name]);

        return back()->with('success', 'Category updated.');
    }

    public function deleteCategory($id)
    {
        $category = JobCategory::findOrFail($id);
        $category->delete();

        return back()->with('success', 'Category deleted.');
    }

    // For job category on the home page 


}