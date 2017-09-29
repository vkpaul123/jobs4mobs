<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JobseekerProfile extends Model
{
    public function user() {
    	return $this->belongsTo(User::class);
    }

    public function jobCategory_recentJobCategory() {
    	return $this->belongsTo(JobCategory::class, 'recentJobCategoryId');
    }

    public function jobCategory_preferedJobCategoryId1() {
    	return $this->belongsTo(JobCategory::class, 'preferedJobCategoryId1');
    }

    public function jobCategory_preferedJobCategoryId2() {
    	return $this->belongsTo(JobCategory::class, 'preferedJobCategoryId2');
    }

    public function address() {
        return $this->belongsTo(Address::class);
    }

    public function jobseekerExperience() {
        return $this->hasMany(JobseekerExperience::class);
    }

    public function jobseekerAcademics() {
        return $this->hasMany(JobseekerAcademics::class);
    }
    
    public function jobseekerAchievements() {
        return $this->hasMany(JobseekerAchievement::class);
    }
    
    public function jobseekerSkill() {
        return $this->hasMany(JobseekerSkill::class);
    }

    public function results() {
        return $this->hasMany(Results::class);
    }
}
