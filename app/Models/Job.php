<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;

    protected $guarded = [];


    public function employer()
    {
        return $this->belongsTo(User::class, 'employer_id')->with('employerProfile');
    }

    public function applications()
    {
        return $this->hasMany(Application::class);
    }



    public function category()
    {
        return $this->belongsTo(JobCategory::class);
    }


    public function applicants()
    {
        return $this->hasMany(Application::class, 'job_id');
    }

    public function employerProfile()
    {
        return $this->belongsTo(EmployerProfile::class, 'employer_id', 'user_id', 'user_id');
    }
}
