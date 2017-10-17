<?php

namespace App\Http\Controllers\JobSeeker;

use App\Http\Controllers\Controller;
use App\JobseekerExperience;
use App\JobseekerProfile;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class JobseekerExperienceController extends Controller
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
            'companyName' => 'required|regex:/^[\pL\s\-]+$/u',
            'companyLocation' => 'required|regex:/^[\pL\s\-]+$/u',
            'jobTitle' => 'required|regex:/^[\pL\s\-]+$/u',
            'fromMonth' => 'required|before:'.Carbon::now()->toDateTimeString(),
            'toMonth' => 'required',
            'jobDescription' => 'required|regex:/^[\pL\s\-]+$/u',
            ]);

        if($request->toMonth != "Present") {
            $myFrom = Carbon::parse($request->fromMonth);
            $myTo = Carbon::parse($request->toMonth);

            if($myTo->lte($myFrom)) {
                Session::flash('messageFail', 'From Month cannot be greater than To Month!');
                return redirect()->back();
            }
        }

        $jobseekerExperience = new JobseekerExperience;
        $jobseekerExperience->companyName = $request->companyName;
        $jobseekerExperience->companyLocation = $request->companyLocation;
        $jobseekerExperience->jobTitle = $request->jobTitle;
        $jobseekerExperience->fromMonth = $request->fromMonth;
        $jobseekerExperience->toMonth = $request->toMonth;
        $jobseekerExperience->jobDescription = $request->jobDescription;
        //$jobseekerExperience->resume_id = $request->resume_id;

        $jobseekerResume = JobseekerProfile::find($request->jobseeker_profiles_id);
        $jobseekerExperience->jobseekerProfile()->associate($jobseekerResume);

        $jobseekerExperience->save();

        $t = $jobseekerResume->tagline;
        $jobseekerResume->tagline = "";
        $jobseekerResume->save();
        $jobseekerResume->tagline = $t;
        $jobseekerResume->save();

        Session::flash('messageSuccess', 'Job Experience added successfully.');
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
        $experiences = JobseekerExperience::where('jobseeker_profiles_id', $id)->get();

        return view('JobSeeker.homepage.registerExperience')
        ->with(compact('experiences'))
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
        $experiencesEdit = JobseekerExperience::find($id);

        return view('JobSeeker.homepage.registerExperienceEdit')
        ->with(compact('experiencesEdit'));
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
            'companyName' => 'required|regex:/^[\pL\s\-]+$/u',
            'companyLocation' => 'required|regex:/^[\pL\s\-]+$/u',
            'jobTitle' => 'required|regex:/^[\pL\s\-]+$/u',
            'fromMonth' => 'required|before:'.Carbon::now()->toDateTimeString(),
            'toMonth' => 'required',
            'jobDescription' => 'required|regex:/^[\pL\s\-]+$/u',
            ]);

        if($request->toMonth != "Present") {
            $myFrom = Carbon::parse($request->fromMonth);
            $myTo = Carbon::parse($request->toMonth);

            if($myTo->lte($myFrom)) {
                Session::flash('messageFail', 'From Month cannot be greater than To Month!');
                return redirect()->back();
            }
        }

        $jobseekerExperience = JobseekerExperience::find($id);
        $jobseekerExperience->companyName = $request->companyName;
        $jobseekerExperience->companyLocation = $request->companyLocation;
        $jobseekerExperience->jobTitle = $request->jobTitle;
        $jobseekerExperience->fromMonth = $request->fromMonth;
        $jobseekerExperience->toMonth = $request->toMonth;
        $jobseekerExperience->jobDescription = $request->jobDescription;

        $jobseekerExperience->save();

        $jobseekerResume = JobseekerProfile::find($jobseekerExperience->jobseeker_profiles_id);
        $t = $jobseekerResume->tagline;
        $jobseekerResume->tagline = "";
        $jobseekerResume->save();
        $jobseekerResume->tagline = $t;
        $jobseekerResume->save();

        Session::flash('messageSuccess', 'Job Experience Added Successfully.');
        return redirect(route('resume.show', $jobseekerExperience->jobseeker_profiles_id));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $jp_id = JobseekerExperience::find($id)->jobseeker_profiles_id;

        JobseekerExperience::where('id', $id)->delete();

        $jobseekerResume = JobseekerProfile::find($jp_id);
        $t = $jobseekerResume->tagline;
        $jobseekerResume->tagline = "";
        $jobseekerResume->save();
        $jobseekerResume->tagline = $t;
        $jobseekerResume->save();

        return redirect()->back();
    }
}
