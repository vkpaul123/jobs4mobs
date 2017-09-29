<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Questionnaire extends Model
{
    public function questions() {
    	return $this->hasMany(Question::class);
    }

    public function vacancies() {
        return $this->hasMany(Vacancy::class, 'questionnaire_id');
    }

    public function employer() {
    	return $this->belongsTo(Employer::class, 'employers_id');
    }

    public function jobcategory() {
    	return $this->belongsTo(JobCategory::class, 'job_category_id');
    }

    public function results() {
        return $this->hasOne(Results::class);
    }
}
