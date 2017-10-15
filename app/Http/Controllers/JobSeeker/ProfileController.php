<?php

namespace App\Http\Controllers\JobSeeker;

use App\Address;
use App\Http\Controllers\Controller;
use App\JobCategory;
use App\JobseekerAcademics;
use App\JobseekerExperience;
use App\JobseekerProfile;
use App\JobseekerSkill;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class ProfileController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $jobseekerProfiles = JobseekerProfile::where('user_id', $id)->get();
        $jobcategories = JobCategory::all();

        return view('JobSeeker.homepage.jobseekerAllProfiles', ['jobseekerProfiles' => $jobseekerProfiles], ['jobcategories' => $jobcategories]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $jobcategories = DB::table('job_categories')->get();

        return view('JobSeeker.homepage.registerProfile', ['jobcategories' => $jobcategories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'firstname' => 'required',
            'lastname' => 'required',
            'dateOfBirth' => 'required',
            'gender' => 'required',
            'educationlevel' => 'required',
            'experience' => 'required',
            'preferedJobCategoryId1' => 'required',
            'preferedJobCategoryId2' => 'required',
            'preferedworktype' => 'required',
            'preferedsalary' => 'required',
            'preferedcityofwork' => 'required',
            'preferedcountryofwork' => 'required',
            'tagline' => 'required',

            'remember' => 'required',
            ]);

        $jobseekerProfile = new JobseekerProfile;

        $jobseekerProfile->firstname = $request->firstname;
        $jobseekerProfile->middlename = $request->middlename;
        $jobseekerProfile->lastname = $request->lastname;
        $jobseekerProfile->dateOfBirth = $request->dateOfBirth;
        $jobseekerProfile->gender = $request->gender;
        $jobseekerProfile->educationlevel = $request->educationlevel;
        $jobseekerProfile->experience = $request->experience;
        $jobseekerProfile->recentJobCategoryId = $request->recentJobCategoryId;
        $jobseekerProfile->preferedJobCategoryId1 = $request->preferedJobCategoryId1;
        $jobseekerProfile->preferedJobCategoryId2 = $request->preferedJobCategoryId2;
        $jobseekerProfile->preferedworktype = $request->preferedworktype;
        $jobseekerProfile->preferedsalary = $request->preferedsalary;
        $jobseekerProfile->preferedcityofwork = $request->preferedcityofwork;
        $jobseekerProfile->preferedcountryofwork = $request->preferedcountryofwork;
        $jobseekerProfile->tagline = $request->tagline;
        $jobseekerProfile->user_id = $request->user_id;

        $jobseekerProfile->save();

        return redirect(route('profile.index', $request->user_id));
       
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $jobseekerProfile = JobseekerProfile::find($id);
        $academics = JobseekerAcademics::where('jobseeker_profiles_id', $id)->get();
        $skills = JobseekerSkill::where('jobseeker_profiles_id', $id)->get();
        $experiences = JobseekerExperience::where('jobseeker_profiles_id', $id)->get()->first();

        $address = null;
        if($jobseekerProfile->address_id)
            $address = Address::where('id', $jobseekerProfile->address_id)->get();

        return view('JobSeeker.homepage.viewProfile', ['jobseekerProfile' => $jobseekerProfile])
        ->with(compact('academics'))
        ->with(compact('skills'))
        ->with(compact('address'))
        ->with(compact('id'))
        ->with(compact('experiences'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $jobcategories = DB::table('job_categories')->get();
        $jobseekerProfile = JobseekerProfile::where('id', $id)->first();

        return view('JobSeeker.homepage.registerProfileEdit', ['jobcategories' => $jobcategories], ['jobseekerProfile' => $jobseekerProfile]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'firstname' => 'required',
            'lastname' => 'required',
            'dateOfBirth' => 'required',
            'gender' => 'required',
            'educationlevel' => 'required',
            'experience' => 'required',
            'preferedJobCategoryId1' => 'required',
            'preferedJobCategoryId2' => 'required',
            'preferedworktype' => 'required',
            'preferedsalary' => 'required',
            'preferedcityofwork' => 'required',
            'preferedcountryofwork' => 'required',
            'tagline' => 'required',

            'remember' => 'required',
            ]);

        $jobseekerProfile = JobseekerProfile::find($id);

        $jobseekerProfile->firstname = $request->firstname;
        $jobseekerProfile->middlename = $request->middlename;
        $jobseekerProfile->lastname = $request->lastname;
        $jobseekerProfile->dateOfBirth = $request->dateOfBirth;
        $jobseekerProfile->gender = $request->gender;
        $jobseekerProfile->educationlevel = $request->educationlevel;
        $jobseekerProfile->experience = $request->experience;
        $jobseekerProfile->recentJobCategoryId = $request->recentJobCategoryId;
        $jobseekerProfile->preferedJobCategoryId1 = $request->preferedJobCategoryId1;
        $jobseekerProfile->preferedJobCategoryId2 = $request->preferedJobCategoryId2;
        $jobseekerProfile->preferedworktype = $request->preferedworktype;
        $jobseekerProfile->preferedsalary = $request->preferedsalary;
        $jobseekerProfile->preferedcityofwork = $request->preferedcityofwork;
        $jobseekerProfile->preferedcountryofwork = $request->preferedcountryofwork;
        $jobseekerProfile->tagline = $request->tagline;
        $jobseekerProfile->user_id = $request->user_id;

        $jobseekerProfile->save();

        return redirect(route('profile.index', $request->user_id));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function editMisc($id) {
        $jobseekerProfile = JobseekerProfile::find($id);

        return view('JobSeeker.homepage.registerMiscDetailsEdit')
        ->with(compact('jobseekerProfile'))
        ->with(compact('id'));
    }

    public function storeMisc(Request $request, $id) {
        $this->validate($request, [
            'languagesSpoken' => 'required',
            ]);

        $jobseekerProfile = JobseekerProfile::find($id);

        $jobseekerProfile->projectsWorkedOn = $request->projectsWorkedOn;
        $jobseekerProfile->languagesSpoken = $request->languagesSpoken;

        $jobseekerProfile->save();

        return redirect(route('resume.show', $jobseekerProfile->id));
    }
}
