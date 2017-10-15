<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WelcomePageEmployerController extends Controller
{
    public function index() {
    	return view('WelcomePageEmployer.index');
    }

    public function about() {
    	return view('WelcomePageEmployer.about');
    }

    public function contact() {
    	return view('WelcomePageEmployer.contact');
    }

    public function faq1() {
        return view('WelcomePageEmployer.singleproject');
    }
    public function faq2() {
        return view('WelcomePageEmployer.selectproject1');
    }
    public function faq3() {
        return view('WelcomePageEmployer.selectproject2');
    }
    public function faq4() {
        return view('WelcomePageEmployer.selectproject3');
    }
}
