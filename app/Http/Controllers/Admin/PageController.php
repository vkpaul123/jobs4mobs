<?php

namespace App\Http\Controllers\Admin;

use App\Admin;
use App\Employer;
use App\Http\Controllers\Controller;
use App\JobApplication;
use App\JobCategory;
use App\JobseekerProfile;
use App\Question;
use App\User;
use App\Vacancy;
use App\VacancySkill;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PageController extends Controller
{
    public function index() {
        $employerCount = Employer::all()->count();
        $userCount = User::all()->count();
        $jobseekerProfile = JobseekerProfile::all()->count();
        $testCount = JobApplication::where('testResult', 'Fail')->orWhere('testResult', 'Pass')->orWhere('testResult', 'Pending')->get()->count();
        $vacancyCount = Vacancy::all()->count();
        $questionsCount = Question::all()->count();

        $employers = Employer::orderBy('id', 'desc')->take(5)->get();
        $vacancies = Vacancy::orderBy('id', 'desc')->take(5)->get();
        $users = User::orderBy('id', 'desc')->take(5)->get();

    	return view('Admin.homepage.home')
        ->with(compact('employerCount'))
        ->with(compact('userCount'))
        ->with(compact('jobseekerProfile'))
        ->with(compact('testCount'))
        ->with(compact('vacancyCount'))
        ->with(compact('employers'))
        ->with(compact('vacancies'))
        ->with(compact('users'))
        ->with(compact('questionsCount'));
    }

    public function saveNote(Request $request)
    {
        $admin = Admin::find($request->admin_id);
        $admin->scribblePad = $request->scribblePad;
        $admin->save();

        Session::flash('messageSuccess', 'Notes Saved in your Scribble Pad!');
        return redirect()->back();
    }

    public function addAdmin() {
        return view('Admin.homepage.addAdmin');
    }

    public function viewAdmins() {
        return view('Admin.homepage.viewAdmins');
    }
    
    public function editAdmin() {
        return view('Admin.homepage.editAdmin');
    }

    public function adminInbox() {
        return view('Admin.homepage.adminInbox');
    }

    public function adminInboxMessage() {
        return view('Admin.homepage.adminInboxMessage');
    }

    public function adminEMail() {
        return view('Admin.homepage.adminEMail');
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
        return view('Admin.homepage.viewJobseekerResume');
    }

    public function viewEmployerProfile($id) {
        $employer = Employer::where('id', $id)->get()->first();
        $jobcategories = JobCategory::all();

        $address = null;
        if($employer->address_id)
            $address = Address::find($employer->address_id)->get()->first();

        return view('JobSeeker.homepage.viewEmployerProfile')
        ->with(compact('employer'))
        ->with(compact('address'))
        ->with(compact('jobcategories'));
    }

    public function viewVacancy($id) {
        $vacancy = Vacancy::where('id', $id)->get()->first();
        $skills = VacancySkill::where('vacancies_id', $vacancy->id)->get();
        $employer = Employer::where('id', $vacancy->employers_id)->get()->first();
        $jobcategories = JobCategory::all();

        $address = null;
        if($vacancy->addresses_id)
            $address = Address::where('id', $vacancy->addresses_id)->get()->first();

        return view('Admin.homepage.viewVacancy')
        ->with(compact('vacancy'))
        ->with(compact('address'))
        ->with(compact('skills'))
        ->with(compact('jobcategories'))
        ->with(compact('employer'));
    }

    public function jobseekerSearchResults() {
        return view('Admin.homepage.jobseekerSearchResults');
    }

    public function employerSearchResults() {
        return view('Admin.homepage.employerSearchResults');
    }

    public function vacancySearchResults() {
        return view('Admin.homepage.vacancySearchResults');
    }

    public function questionnareBuilder() {
        return view('Admin.homepage.questionnareBuilder');
    }
    
    public function questionnareUpload() {
        return view('Admin.homepage.questionnareUpload');
    }
    
    public function addQuestion() {
        return view('Admin.homepage.addQuestion');
    }

    public function editQuestion() {
        return view('Admin.homepage.editQuestion');
    }

    public function viewQuestions() {
        return view('Admin.homepage.viewQuestions');
    }




    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
}
