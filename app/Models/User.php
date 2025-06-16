<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'username',
        'password',
        'role_id',
        'banned_until',
        'status',
    ];

    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
        'banned_until' => 'datetime',

    ];



    public function candidateProfile()
    {
        return $this->hasOne(CandidateProfile::class, 'user_id');
    }



    public function employerProfile()
    {
        return $this->hasOne(EmployerProfile::class);
    }

    public function jobs()
    {
        return $this->hasMany(Job::class, 'employer_id');
    }


    public function shortlistedJobs()
    {
        return $this->belongsToMany(Job::class, 'shortlists', 'user_id', 'job_id')->withTimestamps();
    }


    public function messages()
    {
        return $this->hasMany(Message::class, 'sender_id');
    }

    public function sentMessages()
    {
        return $this->hasMany(Message::class, 'sender_id');
    }

    public function receivedMessages()
    {
        return $this->hasMany(Message::class, 'receiver_id');
    }

    public function adminProfile()
    {
        return $this->hasOne(AdminProfile::class, 'user_id');
    }

    public function jobHistories()
    {
        return $this->hasMany(JobHistory::class);
    }

    public function educationHistories()
    {
        return $this->hasMany(EducationHistory::class);
    }
}
