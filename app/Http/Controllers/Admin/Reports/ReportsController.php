<?php

namespace App\Http\Controllers\Admin\Reports;

use App\Employer;
use App\Http\Controllers\Controller;
use App\Vacancy;
use Illuminate\Http\Request;

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
}
