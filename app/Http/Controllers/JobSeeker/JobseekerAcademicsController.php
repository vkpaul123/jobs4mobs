<?php

namespace App\Http\Controllers\JobSeeker;

use App\Http\Controllers\Controller;
use App\JobseekerAcademics;
use App\JobseekerProfile;
use Illuminate\Http\Request;

class JobseekerAcademicsController extends Controller
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
            'qualificationText' => 'required',
            'boardName' => 'required',
            'academyName' => 'required',
            'marks' => 'required',
            'yearOfPassing' => 'required',
            ]);

        $jobseekerAcademics = new JobseekerAcademics;
        $jobseekerAcademics->qualificationText = $request->qualificationText;
        $jobseekerAcademics->boardName = $request->boardName;
        $jobseekerAcademics->academyName = $request->academyName;
        $jobseekerAcademics->marks = $request->marks;
        $jobseekerAcademics->yearOfPassing = $request->yearOfPassing;

        $jobseekerResume = JobseekerProfile::find($request->jobseeker_profiles_id);
        $jobseekerAcademics->jobseekerProfile()->associate($jobseekerResume);

        $jobseekerAcademics->save();

        $t = $jobseekerResume->tagline;
        $jobseekerResume->tagline = "";
        $jobseekerResume->save();
        $jobseekerResume->tagline = $t;
        $jobseekerResume->save();

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
        $academics = JobseekerAcademics::where('jobseeker_profiles_id', $id)->get();

        return view('JobSeeker.homepage.academicDetails')
        ->with(compact('academics'))
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
        $academicsEdit = JobseekerAcademics::find($id);
        
        return view('JobSeeker.homepage.academicDetailsEdit')
        ->with(compact('academicsEdit'));
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
            'qualificationText' => 'required',
            'boardName' => 'required',
            'academyName' => 'required',
            'marks' => 'required',
            'yearOfPassing' => 'required',
            ]);

        $jobseekerAcademics = JobseekerAcademics::find($id);
        $jobseekerAcademics->qualificationText = $request->qualificationText;
        $jobseekerAcademics->boardName = $request->boardName;
        $jobseekerAcademics->academyName = $request->academyName;
        $jobseekerAcademics->marks = $request->marks;
        $jobseekerAcademics->yearOfPassing = $request->yearOfPassing;

        $jobseekerAcademics->save();

        $jobseekerResume = JobseekerProfile::find($jobseekerAcademics->jobseeker_profiles_id);
        $t = $jobseekerResume->tagline;
        $jobseekerResume->tagline = "";
        $jobseekerResume->save();
        $jobseekerResume->tagline = $t;
        $jobseekerResume->save();

        return redirect(route('resume.show', $jobseekerAcademics->jobseeker_profiles_id));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $jp_id = JobseekerAcademics::find($id)->jobseeker_profiles_id;

        JobseekerAcademics::where('id', $id)->delete();

        $jobseekerResume = JobseekerProfile::find($jp_id);
        $t = $jobseekerResume->tagline;
        $jobseekerResume->tagline = "";
        $jobseekerResume->save();
        $jobseekerResume->tagline = $t;
        $jobseekerResume->save();

        return redirect()->back();
    }
}
