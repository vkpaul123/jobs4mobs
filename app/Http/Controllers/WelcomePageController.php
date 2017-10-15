<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WelcomePageController extends Controller
{
    public function index() {
    	return view('WelcomePage.index');
    }

    public function about() {
    	return view('WelcomePage.about');
    }

    public function contact() {
    	return view('WelcomePage.contact');
    }

    public function faq1() {
    	return view('WelcomePage.singleproject');
    }
    public function faq2() {
    	return view('WelcomePage.singleproject1');
    }
    public function faq3() {
    	return view('WelcomePage.singleproject2');
    }
    public function faq4() {
    	return view('WelcomePage.singleproject3');
    }
}
