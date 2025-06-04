<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    use HasFactory;
    protected $guarded = [];
    /**
     * Get the job that this application belongs to.
     */
    public function job()
    {
        return $this->belongsTo(Job::class);
    }
    /**
     * Get the user who applied for this job.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the candidate who applied for this job.
     */
    public function candidateProfile()
    {
        return $this->belongsTo(CandidateProfile::class, 'user_id', 'user_id');
    }
}