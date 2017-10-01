<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JobCategory extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
    ];

    public function jobSeekerProfile_recentJobCategory() {
        return $this->hasMany(JobseekerProfile::class, 'recentJobCategoryId');
    }

    public function jobSeekerProfile_preferedJobCategoryId1() {
        return $this->hasMany(JobseekerProfile::class, 'preferedJobCategoryId1');
    }

    public function jobSeekerProfile_preferedJobCategoryId2() {
        return $this->hasMany(JobseekerProfile::class, 'preferedJobCategoryId2');
    }

    public function vacancy() {
        return $this->hasMany(Vacancy::class, 'jobcategoryId');
    }

    public function employer() {
        return $this->hasMany(Employer::class, 'jobCategoryId');
    }

    public function questionnaire() {
        return $this->hasMany(Questionnaire::class, 'job_category_id');
    }
}
