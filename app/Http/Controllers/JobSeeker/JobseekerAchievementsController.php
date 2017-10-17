<?php

namespace App\Http\Controllers\JobSeeker;

use App\Http\Controllers\Controller;
use App\JobseekerAchievement;
use App\JobseekerProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class JobseekerAchievementsController extends Controller
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
            'achievementTitle' => 'required',
            'achievementDescription' => 'required',
            ]);

        $jobseekerAchievements = new JobseekerAchievement;
        $jobseekerAchievements->achievementTitle = $request->achievementTitle;
        $jobseekerAchievements->achievementDescription = $request->achievementDescription;

        $jobseekerResume = JobseekerProfile::find($request->jobseeker_profiles_id);
        $jobseekerAchievements->jobseekerProfile()->associate($jobseekerResume);

        $jobseekerAchievements->save();

        Session::flash('messageSuccess', 'Achievements Added Successfully.');
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
        $achievements = JobseekerAchievement::where('jobseeker_profiles_id', $id)->get();

        return view('JobSeeker.homepage.registerAchievements')
        ->with(compact('achievements'))
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
        $achievementsEdit = JobseekerAchievement::find($id);

        return view('JobSeeker.homepage.registerAchievementsEdit')
        ->with(compact('achievementsEdit'));
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
            'achievementTitle' => 'required',
            'achievementDescription' => 'required',
            ]);

        $jobseekerAchievements = JobseekerAchievement::find($id);

        $jobseekerAchievements->achievementTitle = $request->achievementTitle;
        $jobseekerAchievements->achievementDescription = $request->achievementDescription;

        $jobseekerAchievements->save();

        Session::flash('messageSuccess', 'Achievements updated Successfully.');
        return redirect(route('resume.show', $jobseekerAchievements->resume_id));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        JobseekerAchievement::where('id', $id)->delete();

        Session::flash('messageSuccess', 'Achievements Deleted Successfully.');
        return redirect()->back();
    }
}
