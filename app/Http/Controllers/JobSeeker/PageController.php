<?php

namespace App\Http\Controllers\JobSeeker;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class PageController extends Controller
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
	
    public function index() {
    	return view('JobSeeker.homepage.home');
    }

    public function registerProfile() {
        $jobcategories = DB::table('jobcategories')->get();

        return view('JobSeeker.homepage.registerProfile', ['jobcategories' => $jobcategories]);
    }

    public function registerAddress() {
        return view('JobSeeker.homepage.registerAddress');
    }

    public function viewProfile() {
        return view('JobSeeker.homepage.viewProfile');
    }

    public function searchEmployer() {
        return view('JobSeeker.homepage.searchEmployer');
    }

    public function viewVacancy() {
        return view('JobSeeker.homepage.viewVacancy');
    }

    public function contactAdmin() {
        return view('JobSeeker.homepage.contactAdmin');
    }

    public function vacancySearchResults() {
        return view('JobSeeker.homepage.vacancySearchResults');
    }

    public function registerExperience() {
        return view('JobSeeker.homepage.registerExperience');
    }

    public function uploadResume() {
        return view('JobSeeker.homepage.resumeUpload');
    }

    public function academicDetails() {
        return view('JobSeeker.homepage.academicDetails');
    }

    public function registerSkills() {
        return view('JobSeeker.homepage.registerSkills');
    }

    public function viewResume() {
        return view('JobSeeker.homepage.resumeTemplate');
    }

    public function registerAchievements() {
        return view('JobSeeker.homepage.registerAchievements');
    }

    public function miscDetails() {
        return view('JobSeeker.homepage.registerMiscDetails');
    }

    public function resumeBuilder() {
        return view('JobSeeker.homepage.resumeBuilder');
    }

    public function searchVacancy() {
        return view('JobSeeker.homepage.searchVacancy');
    }

    public function viewEmployerProfile() {
        return view('JobSeeker.homepage.viewEmployerProfile');
    }

    public function employerSearchResults() {
        return view('JobSeeker.homepage.employerSearchResults');
    }

    public function profilePic() {
        return view('JobSeeker.homepage.profilePictureUpload');
    }

    public function questionnaireShow()
    {
        return view('JobSeeker.homepage.questionnaireShow');
    }
}
