<?php

namespace App\Http\Controllers\Employer;

use App\Address;
use App\Http\Controllers\Controller;
use App\JobseekerAcademics;
use App\JobseekerAchievement;
use App\JobseekerExperience;
use App\JobseekerProfile;
use App\JobseekerSkill;
use Illuminate\Http\Request;

class JobSeekerResumeController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth:employer');
    }

    public function showResume($id)
    {
    	$resume = JobseekerProfile::find($id);
    	$jobseekerExperience = JobseekerExperience::where('jobseeker_profiles_id', $id)->get();
    	$jobseekerAcademics = JobseekerAcademics::where('jobseeker_profiles_id', $id)->get();
    	$jobseekerSkills = JobseekerSkill::where('jobseeker_profiles_id', $id)->get();
    	$jobseekerAchievements = JobseekerAchievement::where('jobseeker_profiles_id', $id)->get();

        $address = null;
        if($resume->address_id)
            $address = Address::where('id', $resume->address_id)->get()->first();

        return view('Employer.homepage.viewJobseekerResume')
        ->with(compact('resume'))
    	->with(compact('jobseekerExperience'))
    	->with(compact('jobseekerAcademics'))
    	->with(compact('jobseekerSkills'))
    	->with(compact('jobseekerAchievements'))
        ->with(compact('address'));
    }

    public function showResumeNotFound()
    {
        return view('Employer.homepage.viewJobseekerResumeNotFound');
    }
}
