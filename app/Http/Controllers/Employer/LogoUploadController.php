<?php

namespace App\Http\Controllers\Employer;

use App\Employer;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class LogoUploadController extends Controller
{
	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
	    $this->middleware('auth:employer');
	}
	
    public function showUploadForm($id) {
    	$employer = Employer::where('id', $id)->get()->first();

    	return view('Employer.homepage.logoUpload')
    	->with(compact('employer'));
    }

    public function uploadPicture(Request $request, $id) {
    	$this->validate($request, [
    		'logo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    		]);

    	$user = Employer::where('id', $id)->get()->first();

    	if($request->hasFile('logo')){
    		$filename = "employer_logo_DP_".$id.".".$request->logo->getClientOriginalExtension();
            $image = $request->file('logo');
            $t = Storage::disk('s3')->put('employer/DPs'.$filename, file_get_contents($image), 'public');
            $filename = Storage::disk('s3')->url('employer/DPs'.$filename);
    		//$request->logo->storeAs('public/upload/employer/DPs', $filename);

    		$user->photo = $filename;

    		$user->save();
    		
    		return redirect()->back();
    	}
    }
}
