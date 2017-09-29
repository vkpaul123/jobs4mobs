<?php

namespace App\Http\Controllers\JobSeeker;

use App\Http\Controllers\Controller;
use App\JobCategory;
use App\JobseekerProfile;
use App\JobseekerSkill;
use Illuminate\Http\Request;

class JobseekerSkillsController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
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
            'proficiencyLevel' => 'required',
            ]);

        $jobseekerSkill = new JobseekerSkill;
        $jobseekerSkill->skillName = $request->skillName;
        $jobseekerSkill->jobCategoryId = $request->jobCategoryId;
        $jobseekerSkill->proficiencyLevel = $request->proficiencyLevel;

        $jobseekerResume = JobseekerProfile::find($request->jobseeker_profiles_id);
        $jobseekerSkill->jobseekerProfile()->associate($jobseekerResume);

        $jobseekerSkill->save();

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
        $skills = JobseekerSkill::where('jobseeker_profiles_id', $id)->get();
        $jobcategories = JobCategory::all();

        return view('JobSeeker.homepage.registerSkills')
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
        $skillsEdit = JobseekerSkill::find($id);
        $jobcategories = JobCategory::all();

        return view('JobSeeker.homepage.registerSkillsEdit')
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
            'proficiencyLevel' => 'required',
            ]);

        $jobseekerSkill = JobseekerSkill::find($id);
        $jobseekerSkill->skillName = $request->skillName;
        $jobseekerSkill->jobCategoryId = $request->jobCategoryId;
        $jobseekerSkill->proficiencyLevel = $request->proficiencyLevel;

        $jobseekerSkill->save();

        return redirect(route('skills.show', $jobseekerSkill->jobseeker_profiles_id));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        JobseekerSkill::where('id', $id)->delete();

        return redirect()->back();
    }
}
