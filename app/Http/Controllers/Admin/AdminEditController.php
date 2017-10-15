<?php

namespace App\Http\Controllers\Admin;

use App\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AdminEditController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function showAddAdminForm() {
    	return view('Admin.homepage.addAdmin');
    }

    public function editPasswordForm()
    {
    	return view('Admin.homepage.editPassword');
    }

    public function editPassword(Request $request)
    {
    	$this->validate($request, [
    		'password' => 'required|string|min:6|confirmed',
    		'yourPassword' => 'required',
    		'remember' => 'required',
    	]);

    	if(Hash::check($request->yourPassword, Auth::user()->password)) {
    		$admin = Admin::find(Auth::user()->id);
    		$admin->password = bcrypt($request->password);
    		$admin->save();

    		Session::flash('messageSuccess', 'Your Password is changed Successfully');
    		return redirect(route('admin.viewAdmins'));
    	}
    	else {
    		Session::flash('messageFail', 'Your Password Did Not Match! Please Enter your correct Password');
    		return redirect()->back();
    	}
    }

    public function viewAdmins() {
    	$admins = Admin::all();

    	return view('Admin.homepage.viewAdmins')
    	->with(compact('admins'));
    }

    public function addNewAdmin(Request $request) {
    	$this->validate($request, [
    		'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:admins',
            'password' => 'required|string|min:6|confirmed',
            'phoneNo' => 'required',
            'yourPassword' => 'required',
            'remember' => 'required',
    	]);

    	if(Hash::check($request->yourPassword, Auth::user()->password)) {
    		$admin = new Admin;
    		$admin->name = $request->name;
    		$admin->email = $request->email;
    		$admin->phoneNo = $request->phoneNo;
    		$admin->password = bcrypt($request->password);
    		$admin->save();

    		Session::flash('messageSuccess', 'Admin added Successfully');
    		return redirect(route('admin.viewAdmins'));
    	}
    	else {
    		Session::flash('messageFail', 'Your Password Did Not Match! Please Enter your correct Password');
    		return redirect()->back();
    	}
    }
}
