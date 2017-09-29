<?php

namespace App\Http\Controllers\JobSeeker;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProfilePicUploadController extends Controller
{
    public function showUploadForm($id) {
    	$user = User::where('id', $id)->get()->first();

    	return view('JobSeeker.homepage.profilePictureUpload')
    	->with(compact('user'));
    }

    public function uploadPicture(Request $request, $id) {
    	$this->validate($request, [
    		'profilePic' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    		]);

    	$user = User::where('id', $id)->get()->first();

    	if($request->hasFile('profilePic')){
    		$filename = "jobseeker_DP_".$id.".".$request->profilePic->getClientOriginalExtension();
            $image = $request->file('profilePic');
            $t = Storage::disk('s3')->put('jobseeker/DPs'.$filename, file_get_contents($image), 'public');
            $filename = Storage::disk('s3')->url('jobseeker/DPs'.$filename);
    		//$request->profilePic->storeAs('public/upload/jobseeker/DPs', $filename);

    		$user->photo = $filename;

    		$user->save();
    		
    		return redirect()->back();
    	}
    }
}
