<?php

namespace App\Providers;

use App\Models\Job;
use App\Models\User;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
        View::composer('*', function ($view) {
            $totalJobCount = Job::count();
            $totalUserCount = User::count();
            $totalEmployerCount = User::where('role_id', 2)->count();


            $view->with([
                'totalJobCount' => $totalJobCount,
                'totalUserCount' => $totalUserCount,
                'totalEmployerCount' => $totalEmployerCount
            ]);
        });
    }
}