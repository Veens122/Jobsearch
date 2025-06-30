<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobCategory extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function jobs()
    {
        return $this->hasMany(Job::class, 'category_id');
    }

    protected $table = 'job_categories';

    public function activeJobs()
    {
        return $this->hasMany(Job::class)->where('status', 'open');
    }
}