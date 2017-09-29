<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JobseekerExperience extends Model
{
	public function jobseekerProfile() {
    	return $this->belongsTo(JobseekerProfile::class, 'jobseeker_profiles_id');
    }
}
