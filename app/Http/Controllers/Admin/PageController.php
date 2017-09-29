<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PageController extends Controller
{
    public function index() {
    	return view('Admin.homepage.home');
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

    public function viewJobseekerProfile() {
        return view('Admin.homepage.viewJobseekerProfile');
    }

    public function viewJobseekerResume() {
        return view('Admin.homepage.viewJobseekerResume');
    }

    public function viewEmployerProfile() {
        return view('Admin.homepage.viewEmployerProfile');
    }

    public function viewVacancy() {
        return view('Admin.homepage.viewVacancy');
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
