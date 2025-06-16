<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobHistory extends Model
{
    use HasFactory;

    protected $guarded = [];



    public function candidateProfile()
    {
        return $this->belongsTo(CandidateProfile::class);
    }
}
