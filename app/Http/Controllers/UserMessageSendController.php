<?php

namespace App\Http\Controllers;

use App\Contactadmin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class UserMessageSendController extends Controller
{
    public function sendMessage(Request $request) {
    	$this->validate($request, [
    		'name' => 'required',
    		'email' => 'required',
    		'subject' => 'required',
    		'message' => 'required',
    	]);

    	$contactamdin = new Contactadmin;
    	$contactamdin->name = $request->name;
    	$contactamdin->email = $request->email;
    	$contactamdin->subject = $request->subject;
    	$contactamdin->message = $request->message;
    	$contactamdin->userType = $request->userType;
    	$contactamdin->markMessageRead = null;
    	$contactamdin->save();

    	Session::flash('message', 'Message sent!');
    	return redirect()->back();
    }

    public function verifyEmailFirst() {
        return view('verifyEmailFirst');
    }

    public function invalidToken() {
        return view('invalidToken');
    }
}
