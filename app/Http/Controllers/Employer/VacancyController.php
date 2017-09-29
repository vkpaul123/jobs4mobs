<?php

namespace App\Http\Controllers\Employer;

use App\Address;
use App\Http\Controllers\Controller;
use App\JobCategory;
use App\Vacancy;
use App\VacancySkill;
use Illuminate\Http\Request;

class VacancyController extends Controller
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

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $vacancies = Vacancy::where('employers_id', $id)->get();
        $jobcategories = JobCategory::all();

        return view('Employer.homepage.vacancySearchResults')
        ->with(compact('vacancies'))
        ->with(compact('jobcategories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $jobcategories = JobCategory::all();
        return view('Employer.homepage.openVacancy')
        ->with(compact('jobcategories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'jobcategoryId' => 'required',
            'preferedworktype' => 'required',
            'openingDate' => 'required',
            'closingDate' => 'required',
            'preferedednlevel' => 'required',
            'preferedworkexp' => 'required',
            'salary' => 'required',
            'noOfVacancies' => 'required',
            'jobdesignation' => 'required',
            'jobSpecification' => 'required',
            'jobDescription' => 'required',
        
            'remember' => 'required',
            ]);

        $vacancy = new Vacancy;
        $vacancy->jobcategoryId = $request->jobcategoryId;
        $vacancy->preferedworktype = $request->preferedworktype;
        $vacancy->openingDate = $request->openingDate;
        $vacancy->closingDate = $request->closingDate;
        $vacancy->preferedednlevel = $request->preferedednlevel;
        $vacancy->preferedworkexp = $request->preferedworkexp;
        $vacancy->salary = $request->salary;
        $vacancy->noOfVacancies = $request->noOfVacancies;
        $vacancy->jobDescription = $request->jobDescription;
        $vacancy->jobdesignation = $request->jobdesignation;
        $vacancy->jobSpecification = $request->jobSpecification;
        if($request->testrequired)
            $vacancy->testrequired = 1;
        $vacancy->vacancydescription = $request->vacancydescription;
        $vacancy->employers_id = $request->id;

        $vacancy->save();

        return redirect(route('vacancies.index', $request->id));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $vacancy = Vacancy::find($id);
        $jobcategories = JobCategory::all();
        $vacancySkills = VacancySkill::where('vacancies_id', $id)->get();

        $address = null;

        if($vacancy->addresses_id)
            $address = Address::where('id', $vacancy->addresses_id)->get()->first();

        return view('Employer.homepage.viewVacancy')
        ->with(compact('vacancy'))
        ->with(compact('jobcategories'))
        ->with(compact('address'))
        ->with(compact('vacancySkills'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $vacancy = Vacancy::find($id);
        $jobcategories = JobCategory::all();

        return view('Employer.homepage.editVacancy')
        ->with(compact('vacancy'))
        ->with(compact('jobcategories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'jobcategoryId' => 'required',
            'preferedworktype' => 'required',
            'openingDate' => 'required',
            'closingDate' => 'required',
            'preferedednlevel' => 'required',
            'preferedworkexp' => 'required',
            'salary' => 'required',
            'noOfVacancies' => 'required',
            'jobdesignation' => 'required',
            'jobSpecification' => 'required',
            'jobDescription' => 'required',
        
            'remember' => 'required',
            ]);

        $vacancy = Vacancy::find($id);
        $vacancy->jobcategoryId = $request->jobcategoryId;
        $vacancy->preferedworktype = $request->preferedworktype;
        $vacancy->openingDate = $request->openingDate;
        $vacancy->closingDate = $request->closingDate;
        $vacancy->preferedednlevel = $request->preferedednlevel;
        $vacancy->preferedworkexp = $request->preferedworkexp;
        $vacancy->salary = $request->salary;
        $vacancy->noOfVacancies = $request->noOfVacancies;
        $vacancy->jobDescription = $request->jobDescription;
        $vacancy->jobdesignation = $request->jobdesignation;
        $vacancy->jobSpecification = $request->jobSpecification;
        if($request->testrequired)
            $vacancy->testrequired = 1;
        $vacancy->vacancydescription = $request->vacancydescription;

        $vacancy->save();

        return redirect(route('vacancy.show', $id));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function toggleVacancyStatus(Request $request, $id)
    {
        $vacancy = Vacancy::find($id);
        $vacancy->vacancyStatus = $request->vacancyStatus;

        $vacancy->save();

        return redirect(route('vacancy.show', $id));
    }
}
