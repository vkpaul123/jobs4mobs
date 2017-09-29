<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Answers extends Model
{
    public function question() {
        return $this->belongsTo(Question::class, 'question_id');
    }

    public function jobseekerProfile() {
    	return $this->belongsTo(JobseekerProfile::class, 'jobseeker_profile_id');
    }
}
