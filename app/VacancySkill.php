<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VacancySkill extends Model
{
    public function vacancy() {
    	return $this->belongsTo(Vacancy::class, 'vacancies_id');
    }
}
