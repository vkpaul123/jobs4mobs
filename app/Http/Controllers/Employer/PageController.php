<?php

namespace App\Http\Controllers\Employer;

use App\Address;
use App\Http\Controllers\Controller;
use App\JobseekerAcademics;
use App\JobseekerExperience;
use App\JobseekerProfile;
use App\JobseekerSkill;
use App\User;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index() {
    	return view('Employer.homepage.home');
    }

    public function registerAddress() {
        return view('Employer.homepage.registerAddress');
    }

    public function openVacancy() {
        return view('Employer.homepage.openVacancy');
    }

    public function editVacancy() {
        return view('Employer.homepage.editVacancy');
    }

    public function addQuestion() {
        return view('Employer.homepage.addQuestion');
    }

    public function editQuestion() {
        return view('Employer.homepage.editQuestion');
    }

    public function registerProfile() {
        return view('Employer.homepage.registerProfile');
    }

    public function viewProfile() {
        return view('Employer.homepage.viewProfile');
    }

    public function jobseekerSearchResults() {
        return view('Employer.homepage.jobseekerSearchResults');
    }

    public function viewJobseekerProfile($id) {
        $jobseekerProfile = JobseekerProfile::find($id);

        $user = User::where('id', $jobseekerProfile->user_id)->get()->first();
        $academics = JobseekerAcademics::where('jobseeker_profiles_id', $id)->get();
        $skills = JobseekerSkill::where('jobseeker_profiles_id', $id)->get();
        $experiences = JobseekerExperience::where('jobseeker_profiles_id', $id)->get()->last();

        $address = null;
        if($jobseekerProfile->address_id)
            $address = Address::find($jobseekerProfile->address_id)->get()->first();

        return view('Employer.homepage.viewJobseekerProfile')
        ->with(compact('jobseekerProfile'))
        ->with(compact('address'))
        ->with(compact('academics'))
        ->with(compact('skills'))
        ->with(compact('experiences'))
        ->with(compact('user'));
    }

    public function viewJobseekerResume() {
        return view('Employer.homepage.viewJobseekerResume');
    }

    public function viewVacancy() {
        return view('Employer.homepage.viewVacancy');
    }

    public function vacancySkills() {
        return view('Employer.homepage.vacancySkills');
    }

    public function vacancyAddress() {
        return view('Employer.homepage.vacancyAddress');
    }

    public function contactAdmin() {
        return view('Employer.homepage.contactAdmin');
    }

    public function viewQuestions() {
        return view('Employer.homepage.viewQuestions');
    }

    public function questionnareBuilder() {
        return view('Employer.homepage.questionnareBuilder');
    }

    public function questionnareUpload() {
        return view('Employer.homepage.questionnareUpload');
    }

    public function vacancyLinkQuestion() {
        return view('Employer.homepage.vacancyLinkQuestion');
    }

    public function logoUpload() {
        return view('Employer.homepage.logoUpload');
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:employer');
    }
}
