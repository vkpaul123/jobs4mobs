<?php

namespace App\Http\Controllers\JobSeeker;

use App\Http\Controllers\Controller;
use App\JobApplication;
use App\JobCategory;
use App\JobseekerProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class ApplyJobVacancyController extends Controller
{
    public function showApplyForm($id)
    {
    	$jobseekerProfiles = JobseekerProfile::where('user_id', Auth::user()->id)->get();

    	$vacancies = JobApplication::where('vacancy_id', $id)->get();

    	$jobApplication = null;
    	foreach ($vacancies as $vacancy) {
    		foreach ($jobseekerProfiles as $jobseekerProfile) {
    			if($vacancy->jobseeker_profile_id == $jobseekerProfile->id)
    				$jobApplication = JobApplication::find($vacancy->id);
    		}
    	}

    	foreach ($jobseekerProfiles as $jobseekerProfile) {
    		$jobseekerProfile->preferedJobCategoryId1 = JobCategory::where('id', $jobseekerProfile->preferedJobCategoryId1)->get()->first()->name;
    	}

    	return view('JobSeeker.homepage.selectProfile')
    	->with(compact('id'))
    	->with(compact('jobseekerProfiles'))
    	->with(compact('jobApplication'));
    }

    public function applyForVacancy(Request $request) {
    	$this->validate($request, [
    		'jobseeker_profile_id' => 'required'
    	]);

    	$jobApplication = JobApplication::where('jobseeker_profile_id', $request->jobseeker_profile_id)->where('vacancy_id', $request->vacancy_id)->get();

    	$jobseekerProfile = JobseekerProfile::find($request->jobseeker_profile_id);

    	if($jobseekerProfile->resume == null) {
    		Session::flash('messageFail', 'This Profile does not have a <b>Resume</b> attached to it! Please select a Profile with an attached Resume.');
    		return redirect()->back();
    	}

    	if(count($jobApplication) == 0) {
    		$jobApplication1 = new JobApplication;
    		$jobApplication1->jobseeker_profile_id = $request->jobseeker_profile_id;
    		$jobApplication1->vacancy_id = $request->vacancy_id;
    		$jobApplication1->applicationStatus = "Applied";
    		$jobApplication1->save();

    		Session::flash('messageSuccess', 'You have successfully applied for this vacancy.');
    	}
    	else {
    		Session::flash('messageFail', 'You had already applied for this vacancy. You cannot Apply again!');
    	}

    	return redirect()->back();
    }
}
