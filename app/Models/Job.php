<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Job extends Model
{
    use HasFactory;

    protected $guarded = [];


    public function employer()
    {
        return $this->belongsTo(User::class, 'employer_id');
    }

    public function applications()
    {
        return $this->hasMany(Application::class);
    }

    public function employerProfile()
    {
        return $this->belongsTo(EmployerProfile::class, 'employer_id');
    }


    public function category()
    {
        return $this->belongsTo(JobCategory::class);
    }


    public function applicants()
    {
        return $this->hasMany(Application::class, 'job_id');
    }



    protected static function boot()
    {

        parent::boot();

        // Creating
        static::creating(function ($job) {
            $job->slug = Str::slug($job->title, '-' . uniqid());
        });

        // Updating
        static::updating(function ($job) {
            $job->slug = Str::slug($job->title, '-' . uniqid());
        });
    }
}