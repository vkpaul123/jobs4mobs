<?php

namespace App\Http\Controllers\Employer;

use App\Http\Controllers\Controller;
use App\JobCategory;
use App\Questionnaire;
use App\Vacancy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class QuestionnaireVacancyController extends Controller
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

    public function showLinkingPage($id) {
    	$questionnaires = Questionnaire::where('employers_id', Auth::user()->id)->get();
    	$vacancy = Vacancy::where('id', $id)->get()->first();

    	foreach ($questionnaires as $questionnaire) {
    		$questionnaire->job_category_id = JobCategory::where('id', $questionnaire->job_category_id)->get()->first()->name;
    	}

    	$questionnaire_vacancy = null;
    	if($vacancy->questionnaire_id){
    		$questionnaire_vacancy = Questionnaire::where('id', $vacancy->questionnaire_id)->get()->first();
    		$questionnaire_vacancy->job_category_id = JobCategory::find($questionnaire_vacancy->job_category_id)->name;
    	}

    	return view('Employer.homepage.vacancyLinkQuestion')
    	->with(compact('id'))
    	->with(compact('questionnaires'))
    	->with(compact('questionnaire_vacancy'));
    }

    public function storeLink(Request $request) {
    	$this->validate($request, [
            'questionnaire_id' => 'required',
            ]);

    	$vacancy = Vacancy::find($request->vacancy_id);
    	$vacancy->questionnaire_id = $request->questionnaire_id;
    	$vacancy->save();

    	return redirect()->back();
    }

    public function setVacancyNull($id) {
    	$vacancy = Vacancy::find($request->vacancy_id);
    	$vacancy->questionnaire_id = null;
    	$vacancy->save();

    	return redirect()->back();
    }
}
