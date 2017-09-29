<?php

namespace App\Http\Controllers\JobSeeker;

use App\Address;
use App\Http\Controllers\Controller;
use App\JobseekerProfile;
use Illuminate\Http\Request;

class JobseekerAddressController extends Controller
{
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
        $this->validate($request, [
            'primaryPhoneNo' => 'required',
            'address' => 'required',
            'postalCode' => 'required',
            'cityName' => 'required',
            'stateName' => 'required',
            'countryName' => 'required',

            'remember' => 'required',
            ]);

        $address = new Address;
        $address->primaryPhoneNo = $request->primaryPhoneNo;
        $address->secondaryPhnoeNo = $request->secondaryPhnoeNo;
        $address->faxNo = $request->faxNo;
        $address->address = $request->address;
        $address->postalCode = $request->postalCode;
        $address->cityName = $request->cityName;
        $address->stateName = $request->stateName;
        $address->countryName = $request->countryName;
        $address->website = $request->website;
        
        $address->save();

        $jobseekerProfile = JobseekerProfile::find($request->jobseeker_profiles_id);
        $jobseekerProfile->address()->associate($address);

        $jobseekerProfile->save();

        return redirect(route('profile.show', $request->jobseeker_profiles_id));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $jobseekerProfile = JobseekerProfile::where('id', $id)
        ->get()->first();

        if($jobseekerProfile->address_id) {
            return redirect(route('address.edit', $id));
        }
        else {
            return view('JobSeeker.homepage.registerAddress')
            ->with(compact('id'));
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $jobseekerProfile = JobseekerProfile::where('id', $id)->get()->first();

        $address = Address::find($jobseekerProfile->address_id);

        return view('JobSeeker.homepage.registerAddressEdit')
        ->with(compact('address'));
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
            'primaryPhoneNo' => 'required',
            'address' => 'required',
            'postalCode' => 'required',
            'cityName' => 'required',
            'stateName' => 'required',
            'countryName' => 'required',

            'remember' => 'required',
            ]);

        $address = Address::find($id);
        $address->primaryPhoneNo = $request->primaryPhoneNo;
        $address->secondaryPhnoeNo = $request->secondaryPhnoeNo;
        $address->faxNo = $request->faxNo;
        $address->address = $request->address;
        $address->postalCode = $request->postalCode;
        $address->cityName = $request->cityName;
        $address->stateName = $request->stateName;
        $address->countryName = $request->countryName;
        $address->website = $request->website;
        
        $address->save();

        return redirect()->back();
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
