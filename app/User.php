<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name','last_name','business_name', 'email', 'password','user_type'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function applied($job_id)
    {
        $job=Job::find($job_id);

        foreach($this->JobApplications as $jobApplication)
        {
            if($jobApplication->job==$job)
                return true;
        }
        return false;
    }

    public function company()
    {
        if($this->user_type=='company')
        {
            return true;
        }
    }
    public function applicant()
    {
        if($this->user_type=='applicant')
        {
            return true;
        }
    }
    public function jobs()
    {
        return $this->hasMany('App\Job');
    }
    public function profile()
    {
        return $this->hasOne('App\Profile');
    }

    public function jobApplications()
    {
        return $this->hasMany('App\JobApplication');
    }
}
