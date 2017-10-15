<?php

namespace App\Http\Controllers\Admin\Reports;

use App\Address;
use App\Employer;
use App\Http\Controllers\Controller;
use App\JobCategory;
use App\Questionnaire;
use App\Vacancy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReportsController extends Controller
{
	/**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    //  for VACANCY REPORT
    public function showVacancyReport() {
    	$vacancies = Vacancy::all();

        foreach ($vacancies as $vacancy) {
            $vacancy->jobcategoryId = Vacancy::find($vacancy->id)->jobCategory;
            $vacancy->address_id = Vacancy::find($vacancy->id)->address;
            $vacancy->employers_id = Vacancy::find($vacancy->id)->employer;
        }

    	return view('Admin.homepage.reports.vacancyDetails')
    	->with(compact('vacancies'));
    }

    //  for EMPLOYER REPORT
    public function showEmployerReport() {
        $employers = Employer::all();

        foreach ($employers as $employer) {
            $employer->jobCategoryId = Employer::find($employer->id)->jobcategory;
            $employer->address_id = Employer::find($employer->id)->address;
        }

        return view('Admin.homepage.reports.employerDetails')
        ->with(compact('employers'));
    }

    // MAKE SIMILAR REPORT FUNCTIONS HERE
    public function categoryWiseQuestionnaireReport() {
        $questionnaires = Questionnaire::all();
        $jobcategories = JobCategory::all();
        $employer = Employer::all();

        foreach ($questionnaires as $questionnaire) {
            $questionnaire->employer_id = Employer::find($questionnaire->employers_id)->companyname;
        }

        return view('Admin.homepage.reports.categoryWiseQuestionnaireReport')
        ->with(compact('questionnaires'))
        ->with(compact('jobcategories'))
        ->with(compact('employer'));
    }

    public function categoryWiseVacancyReport()
    {
        $vacancies = Vacancy::all();
        $jobcategories = JobCategory::all();
        $employers = Employer::all();

        foreach ($vacancies as $vacancy) {
            $vacancy->employers_id = Employer::find($vacancy->employers_id)->companyname;

            if($vacancy->addresses_id)
                $vacancy->addresses_id = Address::find($vacancy->addresses_id);
        }

        return view('Admin.homepage.reports.categoryWiseVacancyReport')
        ->with(compact('vacancies'))
        ->with(compact('jobcategories'));
    }

    public function locationWiseVacancyReport()
    {
        $vacancies = Vacancy::all();
        $jobcategories = JobCategory::all();
        $employers = Employer::all();

        $addresses = Address::select('stateName')->distinct()->get();

        foreach ($vacancies as $vacancy) {
            $vacancy->employers_id = Employer::find($vacancy->employers_id)->companyname;

            $vacancy->jobcategoryId = JobCategory::find($vacancy->jobcategoryId)->name;

            if($vacancy->addresses_id)
                $vacancy->addresses_id = Address::find($vacancy->addresses_id);
        }

        return view('Admin.homepage.reports.locationWiseVacancyReport')
        ->with(compact('vacancies'))
        ->with(compact('addresses'))
        ->with(compact('jobcategories'));
    }
}
