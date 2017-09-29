<?php

namespace App\Http\Controllers\Employer\Reports;

use App\Http\Controllers\Controller;
use App\Vacancy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReportsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:employer');
    }

    //	Vacancy Report
    public function showVacancyReport() {
    	$vacancies = Vacancy::where('employers_id', Auth::user()->id)->get();

        foreach ($vacancies as $vacancy) {
            $vacancy->jobcategoryId = Vacancy::find($vacancy->id)->jobCategory;
            $vacancy->address_id = Vacancy::find($vacancy->id)->address;
            $vacancy->employers_id = Vacancy::find($vacancy->id)->employer;
        }

    	return view('Employer.homepage.reports.vacancyDetails')
    	->with(compact('vacancies'));
    }

    //	write your functions here

}
