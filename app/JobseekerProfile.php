<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class JobseekerProfile extends Model
{
    use Searchable;
    /**
     * Get the index name for the model.
     *
     * @return string
     */
    public function searchableAs()
    {
        return 'jobseeker_profiles';
    }

    public function toSearchableArray()
    {
        $jobseeker = $this->toArray();

        if($this->jobCategory_recentJobCategory)
            $jobseeker['recentJobCategoryId'] = $this->jobCategory_recentJobCategory->name;

        $jobseeker['preferedJobCategoryId1'] = $this->jobCategory_preferedJobCategoryId1->name;
        $jobseeker['preferedJobCategoryId2'] = $this->jobCategory_preferedJobCategoryId2->name;

        if($this->address)
            $jobseeker['address_id'] = $this->address->toArray();

        $skills = $this->jobseekerSkill->toArray();
        array_push($jobseeker, $skills);

        return $jobseeker;
    }


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
        return $this->hasMany(JobseekerSkill::class, 'jobseeker_profiles_id');
    }

    public function results() {
        return $this->hasMany(Results::class);
    }
}
