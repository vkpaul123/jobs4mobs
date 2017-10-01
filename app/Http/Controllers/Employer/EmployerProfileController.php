<?php

namespace App\Http\Controllers\Employer;

use App\Address;
use App\Employer;
use App\Http\Controllers\Controller;
use App\JobCategory;
use Illuminate\Http\Request;

class EmployerProfileController extends Controller
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

    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $employer = Employer::find($id);
        $jobcategories = JobCategory::all();

        $address = null;
        if ($employer->address_id) {
            $address = Address::find($employer->address_id);
        }

        return view('Employer.homepage.viewProfile')
        ->with(compact('employer'))
        ->with(compact('address'))
        ->with(compact('jobcategories'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $jobcategories = JobCategory::all();

        $employer = Employer::find($id);

        return view('Employer.homepage.registerProfile')
        ->with(compact('employer'))
        ->with(compact('jobcategories'));
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
            'companyname' => 'required',
            'companyType' => 'required',
            'companyCategory' => 'required',
            'jobCategoryId' => 'required',
            'firstname' => 'required',
            'lastname' => 'required',
            'designation' => 'required',
            
            'remember' => 'required',
            ]);

        $employer = Employer::find($id);

        $employer->companyname = $request->companyname;
        $employer->tagline = $request->tagline;
        $employer->companyType = $request->companyType;
        $employer->companyCategory = $request->companyCategory;
        $employer->jobCategoryId = $request->jobCategoryId;
        $employer->firstname = $request->firstname;
        $employer->lastname = $request->lastname;
        $employer->designation = $request->designation;
        $employer->description = $request->description;

        $employer->save();

        return redirect(route('employerProfile.show', $id));
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
}
