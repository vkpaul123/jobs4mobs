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

    // public function __construct()
    // {
    //     $this->middleware('auth:employer');
    // }
}
