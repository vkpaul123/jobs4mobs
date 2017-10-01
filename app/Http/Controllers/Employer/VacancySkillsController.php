<?php

namespace App\Http\Controllers\Employer;

use App\Http\Controllers\Controller;
use App\JobCategory;
use App\Vacancy;
use App\VacancySkill;
use Illuminate\Http\Request;

class VacancySkillsController extends Controller
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
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'skillName' => 'required',
            'jobCategoryId' => 'required',
            ]);

        $vacancySkill = new VacancySkill;
        $vacancySkill->skillName = $request->skillName;
        $vacancySkill->jobCategoryId = $request->jobCategoryId;

        $vacancy = Vacancy::find($request->vacancies_id);
        $vacancySkill->vacancy()->associate($vacancy);

        $vacancySkill->save();

        $vacancydescription = $vacancy->vacancydescription;
        $vacancy->vacancydescription = "";
        $vacancy->save();
        $vacancy->vacancydescription = $vacancydescription;
        $vacancy->save();

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $skills = VacancySkill::where('vacancies_id', $id)->get();
        $jobcategories = JobCategory::all();

        return view('Employer.homepage.vacancySkills')
        ->with(compact('skills'))
        ->with(compact('jobcategories'))
        ->with(compact('id'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $skillsEdit = VacancySkill::find($id);
        $jobcategories = JobCategory::all();

        return view('Employer.homepage.vacancySkillsEdit')
        ->with(compact('jobcategories'))
        ->with(compact('skillsEdit'));
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
            'skillName' => 'required',
            'jobCategoryId' => 'required',
            ]);

        $vacancySkill = VacancySkill::find($id);
        $vacancySkill->skillName = $request->skillName;
        $vacancySkill->jobCategoryId = $request->jobCategoryId;

        $vacancySkill->save();

        $vacancy = Vacancy::find($vacancySkill->vacancies_id);
        $vacancy->vacancydescription = "";
        $vacancy->save();
        $vacancy->vacancydescription = $vacancydescription;
        $vacancy->save();

        return redirect(route('vacancySkills.show', $id));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $vacancySkill = VacancySkill::find($id);

        $vacancy = Vacancy::find($vacancySkill->vacancies_id);
        $vacancy->vacancydescription = "";
        $vacancy->save();
        $vacancy->vacancydescription = $vacancydescription;
        $vacancy->save();

        VacancySkill::where('id', $id)->delete();

        return redirect()->back();
    }
}
