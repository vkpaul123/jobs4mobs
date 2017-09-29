<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Results extends Model
{
    public function questionnaire() {
    	return $this->belongsTo(Questionnaire::class, 'questionnaire_id');
    }

    public function jobseekerProfile() {
    	return $this->belongsTo(Questionnaire::class, 'jobseeker_profile_id');
    }
}
