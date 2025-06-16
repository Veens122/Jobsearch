<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CandidateProfile extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    // CandidateProfile.php

    public function educationHistory()
    {
        return $this->hasMany(EducationHistory::class, 'user_id', 'user_id');
    }

    public function jobHistory()
    {
        return $this->hasMany(JobHistory::class, 'user_id', 'user_id');
    }
}
