<?php

namespace App\Http\Controllers\JobSeeker;

use App\Address;
use App\Http\Controllers\Controller;
use App\JobseekerAcademics;
use App\JobseekerAchievement;
use App\JobseekerExperience;
use App\JobseekerProfile;
use App\JobseekerSkill;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class ResumeController extends Controller
{
    private $resumeCompletion;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');

        $this->resumeCompletion = 0;
    }

    public function show($id)
    {
    	$resume = JobseekerProfile::find($id);
    	$jobseekerExperience = JobseekerExperience::where('jobseeker_profiles_id', $id)->get();
    	$jobseekerAcademics = JobseekerAcademics::where('jobseeker_profiles_id', $id)->get();
    	$jobseekerSkills = JobseekerSkill::where('jobseeker_profiles_id', $id)->get();
    	$jobseekerAchievements = JobseekerAchievement::where('jobseeker_profiles_id', $id)->get();

        $address = null;
        if($resume->address_id)
            $address = Address::where('id', $resume->address_id)->get()->first();


        if(isset($resume->firstname))
            $this->resumeCompletion += 10;

        if(isset($resume->tagline))
            $this->resumeCompletion += 10;

        if(isset($resume->languagesSpoken))
            $this->resumeCompletion += 10;

        if(isset($resume->projectsWorkedOn))
            $this->resumeCompletion += 10;

        if(count($jobseekerExperience))
            $this->resumeCompletion += 10;

        if(count($jobseekerAcademics))
            $this->resumeCompletion += 10;

        if(count($jobseekerSkills))
            $this->resumeCompletion += 10;

        if(count($jobseekerAchievements))
            $this->resumeCompletion += 10;

        if(count($address))
            $this->resumeCompletion += 10;

        if(isset($address->secondaryPhnoeNo))
            $this->resumeCompletion += 10;

        $resumeCompletion = $this->resumeCompletion;

    	return view('JobSeeker.homepage.resumeTemplate')
    	->with(compact('resume'))
    	->with(compact('jobseekerExperience'))
    	->with(compact('jobseekerAcademics'))
    	->with(compact('jobseekerSkills'))
    	->with(compact('jobseekerAchievements'))
        ->with(compact('address'))
        ->with(compact('resumeCompletion'));
    }

    public function attachResume(Request $request, $id) {
        $jobseekerProfile = JobseekerProfile::find($id);

        if($request->resumeCompletion >= 60) {
            $address = null;
            if($jobseekerProfile->address_id)
                $address = Address::where('id', $jobseekerProfile->address_id)->get()->first();

            if(count($address) == 0) {
                Session::flash('message', 'Address is required for contacting you. Please add your address.');
                return redirect()->back();
            }

            $jobseekerProfile->resume = $request->attachResume;
            $jobseekerProfile->save();
        }
        else {
            Session::flash('message', 'Your Resume looks too Empty! Please add a few more Aspects to it.');
        }

        return redirect()->back();
    }

    public function uploadResume(Request $request, $id) {
        $this->validate($request, [
            'resumePath' => 'required|mimes:pdf',
            ]);

        $user = JobseekerProfile::where('id', $id)->get()->first();

        if($request->hasFile('resumePath')){
            $filename = "jobseeker_Resume_".$id.".".$request->resumePath->getClientOriginalExtension();
            $image = $request->file('resumePath');
            $t = Storage::disk('s3')->put('jobseeker/Resumes/'.$filename, file_get_contents($image), 'public');
            $filename = Storage::disk('s3')->url('jobseeker/Resumes/'.$filename);
            //$request->profilePic->storeAs('public/upload/jobseeker/DPs', $filename);

            $user->resume = $filename;

            $user->save();
            
            return redirect(route('profile.show', $id));
        }
    }
}
