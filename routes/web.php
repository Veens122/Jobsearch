<?php

use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\OtpController;
use App\Http\Controllers\Auth\PasswordController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\Candidate\CandidateController;
use App\Http\Controllers\CandidateProfileController;
use App\Http\Controllers\Employer\EmployerController;
use App\Http\Controllers\EmployerProfileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\JobApplicationController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\SuperAdmin\SuperAdminController;
use App\Http\Controllers\SuperAdminProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MessageController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Default homepage
Route::get('/', function () {
    return view('home');
});
Route::get('/home', function () {
    return view('home');
})->name('home');

// ===========================
// Registration Routes
// ===========================
Route::get('/sign-up', function () {
    return view('auth.register');
})->name('sign-up');

// Universal Registration
Route::post('/register', [RegisterController::class, 'register'])->name('register');

// OTP Verification
Route::get('/verify-otp/{email}', [RegisterController::class, 'showOtpForm'])->name('verify.otp');
Route::post('/verify-otp/{email}', [RegisterController::class, 'submitOtp'])->name('submit.otp');
Route::get('/resend-otp/{email}', [RegisterController::class, 'resendOtp'])->name('resend.otp');

// Registration pages (forms only)
Route::get('/sign-up-candidate', [CandidateController::class, 'signUp'])->name('candidate.sign-up');
Route::get('/sign-up-employer', [EmployerController::class, 'signUp'])->name('employer.sign-up');



// Candidate Registration
// Route::get('/sign-up-candidate', [CandidateController::class, 'signUp'])->name('candidate.sign-up');
// Route::post('/register-candidate', [CandidateController::class, 'registerCandidate'])->name('candidate.register');

// Employer Registration
// Route::get('/sign-up-employer', [EmployerController::class, 'signUp'])->name('employer.sign-up');
// Route::post('/register-employer', [EmployerController::class, 'registerEmployer'])->name('employer.register');

// Super Admin Registration
// Route::get('/sign-up-superadmin', [SuperAdminController::class, 'signUp'])->name('superadmin.sign-up');
// Route::post('/register-superadmin', [SuperAdminController::class, 'registerSuperAdmin'])->name('superadmin.register');

// ===========================
// Login & Logout
// ===========================
Route::get('/login', function () {
    return view('auth.login');
})->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.submit');
Route::post('/logout', [HomeController::class, 'logout'])->name('logout');
Route::get('/', [HomeController::class, 'index']);
Route::get('/home', [HomeController::class, 'index'])->name('home');

// ===========================
// Dashboards
// ===========================
Route::middleware(['auth', 'role:1'])->group(function () {
    Route::get('/superadmin/dashboard', [SuperAdminController::class, 'admin_dashboard'])->name('superadmin.dashboard');
});




// Super Admin
Route::middleware(['auth', 'role:1'])->prefix('admin')->group(function () {
    Route::get('dashboard', [SuperAdminController::class, 'admin_dashboard'])->name('admin.dashboard');
    Route::get('/profile/admin-profile', [SuperAdminProfileController::class, 'showProfile'])->name('admin-profile');
    Route::get('profile/admin-edit', [SuperAdminProfileController::class, 'editProfile'])->name('admin-profile.edit');
    Route::put('profile/admin-update', [SuperAdminProfileController::class, 'updateProfile'])->name('admin-profile.update');
});

// ===========================
// Forgot Password
// ===========================
Route::get('/forgot-password', [ForgotPasswordController::class, 'forgotPassword'])->name('forgotPassword');
Route::post('/forgot-password', [ForgotPasswordController::class, 'forgetPassword'])->name('forgotPassword.email');
Route::post('submit-password-reset-code', [ForgotPasswordController::class, 'submitPasswordResetCode'])->name('submitPasswordResetCode');
Route::get('/password-reset', [ForgotPasswordController::class, 'passwordReset'])->name('password-reset');
Route::post('/create-new-password', [ForgotPasswordController::class, 'createNewPassword'])->name('create.newPassword');
Route::get('/resend.code/{email}/send', [ForgotPasswordController::class, 'resendCode'])->name('resend.code');
Route::get('/confirm-code', [ForgotPasswordController::class, 'confirmCode'])->name('confirmCode.email');

// ===========================
// Resume Upload/Delete
// ===========================
Route::get('/profile/resume', [CandidateController::class, 'showResumeForm'])->name('profile.resume');
Route::post('/profile/resume', [CandidateController::class, 'uploadResume'])->name('profile.resume.upload');
Route::delete('/profile/resume', [CandidateController::class, 'deleteResume'])->name('profile.resume.delete');

// ===========================
// Job Routes public
// ===========================
Route::get('/job-details/{id}', [JobController::class, 'jobDetail'])->name('job-detail');
Route::get('/all-jobs', [JobController::class, 'allJobs'])->name('all-jobs');
Route::get('/search-jobs', [JobController::class, 'searchJobs'])->name('search-jobs');
Route::get('/jobs/filter', [JobController::class, 'filter'])->name('jobs.filter');

Route::post('/jobs/apply/{id}', [JobApplicationController::class, 'apply'])->middleware('auth')->name('job.apply');
Route::get('/jobs/{id}', [JobApplicationController::class, 'showRelatedJobs'])->name('job.details');



// ===========================
// Super with the role of 1
// ===========================
Route::middleware(['auth', 'role:1'])->prefix('superadmin')->group(function () {
    Route::get('/employer-list', [SuperAdminController::class, 'employerList'])->name('superadmin.employer-list');
    Route::post('/approve-employer/{id}', [SuperAdminController::class, 'approveEmployer'])->name('superadmin.approve-employer');
    Route::post('/decline-employer/{id}', [SuperAdminController::class, 'declineEmployer'])->name('superadmin.decline-employer');

    // User Management
    Route::get('/users-list', [SuperAdminController::class, 'usersList'])->name('users.users-list');
    Route::post('/ban-user/{id}', [SuperAdminController::class, 'banUser'])->name('superadmin.ban.user');
    Route::post('/unban-user/{id}', [SuperAdminController::class, 'unbanUser'])->name('superadmin.unban.user');

    // Jobs Management
    Route::get('/jobs', [SuperAdminController::class, 'manageJobs'])->name('superadmin.jobs.manage-jobs');
    Route::delete('/job/{id}', [SuperAdminController::class, 'deleteJob'])->name('superadmin.job.delete');

    // Categories Management
    Route::get('/categories', [SuperAdminController::class, 'jobCategories'])->name('categories.index');
    Route::get('/categories/create-new-category', [SuperAdminController::class, 'createCategory'])->name('categories.create-new-category');
    Route::post('/categories', [SuperAdminController::class, 'store'])->name('categories.store');

    Route::get('/categories/{id}/edit', [SuperAdminController::class, 'editCategoryForm'])->name('categories.edit');
    Route::put('/categories/{id}', [SuperAdminController::class, 'editCategory'])->name('categories.update');


    Route::put('/categories/{id}', [SuperAdminController::class, 'updateCategory'])->name('categories.update');
    Route::delete('/categories/{id}', [SuperAdminController::class, 'deleteCategory'])->name('categories.delete');

    // Blog categories
    Route::get('/blog-categories', [BlogController::class, 'index'])->name('blog-categories.index');
    Route::get('/blog-categories/create', [BlogController::class, 'create'])->name('blog-categories.create');
    Route::post('/blog-categories', [BlogController::class, 'storeCategory'])->name('blog-categories.store');
    Route::get('/blog-categories/{id}/edit', [BlogController::class, 'editCategory'])->name('blog-categories.edit');
    Route::put('/blog-categories/{id}', [BlogController::class, 'updateCategory'])->name('blog-categories.update');
    Route::delete('/blog-categories/{id}', [BlogController::class, 'destroyCategory'])->name('blog-categories.destroy');

    // Blogs
    Route::get('/blogs/create', [BlogController::class, 'createBlog'])->name('blogs.create');
    Route::post('/blogs', [BlogController::class, 'storeBlog'])->name('blogs.store');
    Route::get('/blogs', [BlogController::class, 'listAllBlogs'])->name('superadmin.blogs.index');
    Route::get('/blogs/{id}/edit', [BlogController::class, 'editBlog'])->name('blogs.edit');
    Route::put('/blogs/{id}', [BlogController::class, 'updateBlog'])->name('blogs.update');
    Route::delete('/blogs/{id}', [BlogController::class, 'destroyBlog'])->name('blogs.destroy');

    Route::patch('/blogs/{id}/publish', [BlogController::class, 'publish'])->name('blogs.publish');
    Route::patch('/blogs/{id}/unpublish', [BlogController::class, 'unpublish'])->name('blogs.unpublish');
});

//Blogs page
Route::get('/blogs', [BlogController::class, 'blogs'])->name('blogs.index');
Route::get('/blogs/{id}', [BlogController::class, 'blogDetail'])->name('blog.details');


// Employer with the the role:2
Route::middleware(['auth', 'role:2', 'check.banned'])->prefix('employer')->name('employer.')->group(function () {

    Route::get('/profile/employer-profile', [EmployerProfileController::class, 'showProfile'])->name('employer-profile');

    Route::get('/profile/employer-edit', [EmployerProfileController::class, 'editProfile'])->name('employer-profile.edit');
    Route::put('/profile/employer-update', [EmployerProfileController::class, 'updateProfile'])->name('employer-profile.update');


    Route::get('/employer/dashboard', [EmployerController::class, 'dashboard'])->name('dashboard');



    Route::get('jobs/create-job', [JobController::class, 'create'])->name('jobs.create-job');
    Route::post('jobs', [JobController::class, 'store'])->name('jobs.store');
    Route::get('jobs/job-list', [JobController::class, 'jobList'])->name('jobs.job-list');
    Route::get('jobs/{id}/edit', [JobController::class, 'editJob'])->name('jobs.edit-job');
    Route::put('jobs/{job}', [JobController::class, 'update'])->name('jobs.update');
    Route::delete('jobs/{id}', [JobController::class, 'destroy'])->name('jobs.destroy');

    Route::get('/applications', [JobApplicationController::class, 'index'])->name('applications.index');



    Route::post('/applications/{id}/shortlist', [JobApplicationController::class, 'shortlist'])->name('shortlist');
    Route::post('/applications/{id}/reject', [JobApplicationController::class, 'reject'])->name('reject');
    Route::delete('/applications/{id}', [JobApplicationController::class, 'destroy'])->name('destroy');

    // for viewing candidate's profile and downloading resume and cover letter by the employer

    Route::get('/candidate/{id}/view', [JobApplicationController::class, 'showCandidate'])->name('applications.show-candidate');

    // download resume
    Route::get('/applications/{id}/download-resume', [JobApplicationController::class, 'downloadResume'])
        ->name('applications.download-resume');

    Route::get('/applications/{id}/download-coverletter', [JobApplicationController::class, 'downloadCoverLetter'])
        ->name('applications.download-coverletter');

    // to view the shortlisted candidates
    Route::get('/shortlisted-candidates', [JobApplicationController::class, 'shortlistedCandidates'])->name('shortlisted.candidates');

    // Remove candidate from the shortlisted list
    Route::post('/shortlisted-candidates/{id}/remove', [JobApplicationController::class, 'removeShortlist'])
        ->name('applications.remove');
});

// ===========================
// Candidate Routes
Route::middleware(['auth'])->get('/profile/employer-profile/{id?}', [EmployerProfileController::class, 'showProfile'])->name('employer-profile');

Route::middleware(['auth'])->get('/profile/candidate-profile/{id?}', [CandidateProfileController::class, 'showProfile'])->name('profile.candidate-profile');



// Candidate with the role:3
Route::middleware(['auth', 'role:3', 'check.banned'])->group(function () {
    Route::get('/candidate/dashboard', [CandidateController::class, 'dashboard'])->name('candidate.dashboard');



    Route::get('/profile/edit', [CandidateProfileController::class, 'editProfile'])->name('profile.edit');
    Route::put('/candidate/profile', [CandidateProfileController::class, 'updateProfile'])->name('profile.update');

    // for viewing candidate's profile and downloading resume and cover letter by candidates
    Route::get('/candidate/{id}/profile', [CandidateController::class, 'publicProfile'])->name('candidate.profile.public');
    Route::post('/candidate/upload-resume', [CandidateController::class, 'uploadResume'])->name('candidate.upload.resume');
    Route::get('/download/resume/{id}', [CandidateController::class, 'downloadResume'])->name('download.resume');

    // for candidate to view shortlisted jobs
    Route::get('/candidate/shortlisted-jobs', [CandidateController::class, 'shortListedJobs'])->name('candidate.shortListed-jobs');

    // for candidate to view applied jobs
    Route::get('/candidate/applied-jobs', [CandidateController::class, 'appliedJobs'])->name('candidate.applied-jobs');
});

// download resume
Route::middleware(['auth'])->get('/download/resume/{id}', [CandidateController::class, 'downloadResume'])->name('download.resume');

// download cover letter
Route::middleware(['auth'])->get('/download/coverletter/{id}', [JobApplicationController::class, 'downloadCoverLetter'])->name('download.coverletter');







// ===========================
// Messages
// ===========================
Route::middleware(['auth'])->group(function () {
    Route::get('/messages', [MessageController::class, 'inbox'])->name('messages.inbox');
    Route::get('/messages/all', [MessageController::class, 'messages'])->name('messages');
    Route::post('/messages/send', [MessageController::class, 'sendMessage'])->name('messages.send');

    // Change password route
    Route::get('/change-password', [PasswordController::class, 'editPassword'])->name('password.edit');
    Route::post('/change-password', [PasswordController::class, 'updatePassword'])->name('password.update');
});

// ===========================
// Notifications and Contact
// ===========================
Route::post('/candidate/contact', [CandidateProfileController::class, 'contactCandidate'])->name('candidate.contact');
Route::get('/candidate/notifications', function () {
    return view('candidate.notifications');
})->name('candidate.notifications');

// for job categories on the home page
Route::get('/jobs/job-list', [JobController::class, 'listByCategory'])->name('jobs.job-list');

// contact us page
Route::get('/contact', [HomeController::class, 'contact'])->name('contact');
Route::post('/contact-us', [HomeController::class, 'sendContactMessage'])->name('contact.send');

// about us page
Route::get('/about-us', [HomeController::class, 'about'])->name('about');
