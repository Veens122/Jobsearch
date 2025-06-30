<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Mail\EmployerApprovedMail;
use App\Mail\EmployerDeclinedMail;
use App\Models\Application;
use App\Models\Job;
use App\Models\JobCategory;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class SuperAdminController extends Controller
{
    //

    public function admin_dashboard()
    {
        $admin = Auth::user();

        $totalJobs = Job::count();
        $totalEmployers = User::where('role_id', 2)->count();
        $totalUsers = User::where('role_id', '!=', 1)->count();
        $totalCandidates = User::where('role_id', 3)->count();
        $totalCategories = JobCategory::count();
        $expiredJobs = Job::where('expiry_date', '<', now())->count();
        $appliedJobs = Application::count();

        $activeJobs = Job::where('status', 'open')
            ->where('expiry_date', '>=', now())
            ->count();


        $jobs = Job::withCount('applications')->latest()->get();


        return view('superadmin.dashboard', compact(
            'admin',
            'totalJobs',
            'totalEmployers',
            'totalUsers',
            'totalCandidates',
            'totalCategories',
            'activeJobs',
            'expiredJobs',
            'appliedJobs',
            'jobs'
        ));
    }

    public function employerList(Request $request)
    {
        $status = $request->get('status', 'pending');

        $query = User::where('role_id', 2);
        if ($status === 'approved') {
            $query->where('is_approved', 1);
        } elseif ($status === 'pending') {
            $query->where('is_approved', 0);
        }

        $employers = $query->orderBy('created_at', 'desc')->get();

        return view('superadmin.employer-list', compact('employers', 'status'));
    }

    public function approveEmployer($id)
    {
        $employer = User::findOrFail($id);
        $employer->is_approved = 1;
        $employer->save();

        Mail::to($employer->email)->send(new EmployerApprovedMail($employer));


        return redirect()->back()->with('success', 'Employer approved successfully.');
    }


    public function declineEmployer($id)
    {
        $employer = User::findOrFail($id);

        Mail::to($employer->email)->send(new EmployerDeclinedMail($employer));

        $employer->delete();

        return redirect()->back()->with('success', 'Employer declined and deleted.');
    }

    public function pendingEmployers()
    {
        $pendingEmployers = User::where('role_id', 2)
            ->where('is_approved', false)
            ->with('employerProfile')
            ->get();

        return view('superadmin.pending-employers', compact('pendingEmployers'));
    }

    // View users list
    public function usersList(Request $request)
    {
        $query = User::query();

        if ($request->status == 'active') {
            $query->where(function ($q) {
                $q->whereNull('banned_until')->orWhere('banned_until', '<', now());
            });
        } elseif ($request->status == 'banned') {
            $query->where('banned_until', '>', now());
        }

        $users = $query->orderBy('created_at', 'desc')->get();

        return view('superadmin.users.users-list', compact('users'));
    }


    public function deleteUser($id)
    {
        $user = User::findORFail($id);
        if ($user->role_id === 1) {
            return redirect()->back()->with('error', 'Super Admin cannot be deleted.');
        }

        $user->delete();

        return redirect()->route('superadmin.users-list')->with('success', 'User deleted successfully!');
    }

    // View all jobs
    public function manageJobs(Request $request)
    {
        $query = Job::with('employer')->latest();

        if ($request->has('employer')) {
            $query->whereHas('employer', function ($q) use ($request) {
                $q->where('name', 'like', '%' . $request->employer . '%');
            });
        }

        $jobs = $query->paginate(20);

        return view('superadmin.jobs.manage-jobs', compact('jobs'));
    }

    // Delete job
    /**
     * Delete a job posting
     *
     * @param int $id Job ID
     * @return \Illuminate\Http\RedirectResponse
     */
    public function deleteJob($id)
    {
        $job = Job::findOrFail($id);

        // Delete the job
        $job->delete();

        return redirect()->back()->with('success', 'Job deleted successfully.');
    }

    public function showEmployer(User $employer)
    {
        return view('superadmin.employers.employer-details', compact('employer'));
    }



    // To Ban user

    public function banUser(Request $request, $id)
    {
        $request->validate([
            'ban_days' => 'required|integer|min:1',
        ]);

        $user = User::findOrFail($id);
        $banUntil = Carbon::now()->addDays($request->ban_days);

        $user->update([
            'banned_until' => $banUntil,
            'status' => 'banned',
        ]);

        return redirect()->back()->with('success', "{$user->name} has been banned until {$banUntil->format('d M Y H:i')}");
    }

    public function unbanUser($id)
    {
        $user = User::findOrFail($id);

        $user->banned_until = null;
        $user->status = 'active';

        if ($user->save()) {
            return redirect()->back()->with('success', "{$user->name} has been unbanned.");
        } else {
            return redirect()->back()->with('error', "Failed to unban {$user->name}.");
        }
    }





    // View all users 
    public function allUsers(Request $request)
    {
        $status = $request->get('status');

        $query = User::query();

        if ($status === 'banned') {
            $query->where('banned_until', '>', now());
        } elseif ($status === 'active') {
            $query->where(function ($q) {
                $q->whereNull('banned_until')->orWhere('banned_until', '<=', now());
            });
        }

        $users = $query->orderBy('created_at', 'desc')->get();

        return view('superadmin.users.users-list', compact('users', 'status'));
    }

    // category management

    public function jobCategories()
    {
        $categories = JobCategory::all();
        return view('superadmin.job-categories.index', compact('categories'));
    }

    public function createCategory(Request $request)
    {
        $request->validate(['title' => 'required|unique:job_categories']);
        JobCategory::create(['title' => $request->title]);

        return back()->with('success', 'Category created.');
    }


    public function editCategoryForm($id)
    {
        $category = JobCategory::findOrFail($id);
        return view('superadmin.job-categories.edit', compact('category'));
    }

    public function updateCategory(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
        ]);

        $category = JobCategory::findOrFail($id);
        $category->update(['title' => $request->title]);

        return redirect()->route('categories.index')->with('success', 'Category updated successfully.');
    }




    public function deleteCategory($id)
    {
        $category = JobCategory::findOrFail($id);

        if ($category->jobs()->exists()) {
            return back()->with('error', 'Cannot delete category with assigned jobs.');
        }

        $category->delete();
        return back()->with('success', 'Category deleted.');
    }

    public function store(Request $request)
    {

        $category = new JobCategory();
        $category->title = $request->title;
        $category->save();

        return redirect()->route('categories.index')->with('success', 'Category created successfully');
    }


    public function create()
    {
        return view('superadmin.categories.create-new-category');
    }
}
