<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    public function jobseekerProfile() {
    	return $this->hasMany(JobseekerProfile::class);
    }
}
