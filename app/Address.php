<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    public function jobseekerProfile() {
    	return $this->hasMany(JobseekerProfile::class);
    }

    public function employer() {
    	return $this->hasMany(Employer::class);
    }

    public function vacancy()
    {
    	return $this->hasMany(Vacancy::class, 'addresses_id');
    }
}
