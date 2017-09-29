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
}
