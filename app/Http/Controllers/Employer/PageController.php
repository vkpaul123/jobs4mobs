<?php

namespace App\Http\Controllers\Employer;

use App\Address;
use App\Employer;
use App\Http\Controllers\Controller;
use App\JobseekerAcademics;
use App\JobseekerExperience;
use App\JobseekerProfile;
use App\JobseekerSkill;
use App\User;
use App\Vacancy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PageController extends Controller
{
    public function index() {
        $popEmployers = null;
        if(env('DB_CONNECTION') == "mysql")
            $popEmployers = Employer::orderByRaw('RAND()')->take(30)->get();
        elseif (env('DB_CONNECTION') == "pgsql")
            $popEmployers = Employer::orderByRaw('RANDOM()')->take(30)->get();

        $recVacancies = Vacancy::where('employers_id', Auth::user()->id)->orderBy('id', 'desc')->take(5)->get();

        foreach ($recVacancies as $recVacancy) {
            $recVacancy->employers_id = Employer::where('id', $recVacancy->employers_id)->get()->first()->name;
        }

    	return view('Employer.homepage.home')
        ->with(compact('popEmployers'))
        ->with(compact('recVacancies'));
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

    public function questionnareUpload($id) {
        return view('Employer.homepage.questionnareUpload')
        ->with(compact('id'));
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
