<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    //
   	protected $fillable = ['user_id','job_title','job_description','salary','location','country'];
    public function user()
    {
    	return $this->belongTo('App\User');
    }
    public function jobApplications()
    {
    	return $this->hasMany('App\JobApplication');
    }
}
