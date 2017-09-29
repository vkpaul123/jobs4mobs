<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vacancy extends Model
{
	public function jobCategory() {
    	return $this->belongsTo(JobCategory::class, 'jobcategoryId');
    }

    public function address() {
        return $this->belongsTo(Address::class, 'addresses_id');
    }

    public function questionnaire() {
        return $this->belongsTo(Questionnaireio::class, 'questionnaire_id');
    }

    public function vacancySkill() {
        return $this->hasMany(VacancySkill::class, 'vacancies_id');
    }

    public function employer() {
    	return $this->belongsTo(Employer::class, 'employers_id');
    }
}
