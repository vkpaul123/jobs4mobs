<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\adminMail;
use App\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class MailController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function send(Request $request)
    {
    	$this->validate($request, [
    		'fromName' => 'required|regex:/^[\pL\s\-]+$/u',
    		'mailTo' => 'required|email',
    		'mailToName' => 'required|regex:/^[\pL\s\-]+$/u',
    		'toSubject' => 'required',
    		'mailBody' => 'required',
    	]);

    	Mail::send(new adminMail());

    	Session::flash('message', 'Email sent to '.$request->mailToName.' ('.$request->mailTo.') Successfully!');
    	return redirect()->back();
    }
}


