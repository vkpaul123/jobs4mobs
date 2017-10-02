<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Vacancy extends Model
{
    use Searchable;

    /**
     * Get the index name for the model.
     *
     * @return string
     */
    public function searchableAs()
    {
        return 'vacancies';
    }

    public function toSearchableArray()
    {
        $vacancy = $this->toArray();

        $vacancy['jobcategoryId'] = $this->jobCategory->name;

        $vacancy['employers_id'] = $this->employer->companyname;

        if($this->address)
            $vacancy['addresses_id'] = $this->address->toArray();

        $skills = $this->vacancySkill->toArray();
        array_push($vacancy, $skills);

        return $vacancy;
    }

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
