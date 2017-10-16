<?php

namespace App\Http\Controllers\JobSeeker;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class UserEditController extends Controller
{
    public function editPassword(Request $request)
    {
    	$this->validate($request, [
    		'password' => 'required|string|min:6|confirmed',
    		'yourPassword' => 'required',
    		'remember' => 'required',
    	]);

    	if(Hash::check($request->yourPassword, Auth::user()->password)) {
    		$admin = User::find(Auth::user()->id);
    		$admin->password = bcrypt($request->password);
    		$admin->save();

    		Session::flash('messageSuccess', 'Your Password is changed Successfully');
    		return redirect()->back();
    	}
    	else {
    		Session::flash('messageFail', 'Your Password Did Not Match! Please Enter your correct Password');
    		return redirect()->back();
    	}
    }
}
