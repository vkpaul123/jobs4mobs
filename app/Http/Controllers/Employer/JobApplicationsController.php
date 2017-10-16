<?php

namespace App\Http\Controllers\Employer;

use App\Http\Controllers\Controller;
use App\JobApplication;
use App\JobseekerProfile;
use App\Mail\adminMail;
use App\User;
use App\Vacancy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class JobApplicationsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:employer');
    }

    public function showJobApplications($id) {
    	$jobApplications = JobApplication::where('vacancy_id', $id)->get();
    	$vacancy = Vacancy::find($id);

    	foreach ($jobApplications as $jobApplication) {
    		$jobApplication->jobseeker_profile_id = JobseekerProfile::find($jobApplication->jobseeker_profile_id);
    		$jobApplication->jobseeker_profile_id->user_id = User::find($jobApplication->jobseeker_profile_id->user_id);
    	}

    	return view('Employer.homepage.vacancyJobApplications')
    	->with(compact('jobApplications'))
    	->with(compact('vacancy'))
    	->with(compact('id'));
    }

    public function setApplicationStatus(Request $request, $id) {
    	$jobApplication = JobApplication::find($id);

    	$jobApplication->applicationStatus = $request->applicationStatus[$id];
    	$jobApplication->save();

        $request->mailBody = $request->mailBody1[$id];

    	Mail::send(new adminMail());

    	return redirect()->back();
    }
}
