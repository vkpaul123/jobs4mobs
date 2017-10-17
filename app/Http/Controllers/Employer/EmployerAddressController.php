<?php

namespace App\Http\Controllers\Employer;

use App\Address;
use App\Employer;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class EmployerAddressController extends Controller
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
        $this->validate($request, [
            'primaryPhoneNo' => 'required|numeric',
            'address' => 'required',
            'postalCode' => 'required|numeric',
            'cityName' => 'required|regex:/^[\pL\s\-]+$/u',
            'stateName' => 'required|regex:/^[\pL\s\-]+$/u',
            'countryName' => 'required|regex:/^[\pL\s\-]+$/u',

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

        $employer = Employer::find($request->id);
        $employer->address()->associate($address);

        $employer->save();

        Session::flash('messageSuccess', 'Address Added Successfully.');
        return redirect(route('employerProfile.show', $request->id));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $employer = Employer::where('id', $id)
        ->get()
        ->first();

        if($employer->address_id)
        	return redirect(route('employerAddress.edit', $id));
        else {
        	return view('Employer.homepage.registerAddress');
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
        $employer = Employer::where('id', $id)->get()->first();

        $address = Address::find($employer->address_id);

        return view('Employer.homepage.registerAddressEdit')
        ->with(compact('address'))
        ->with(compact('id'));
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
            'primaryPhoneNo' => 'required|numeric',
            'address' => 'required',
            'postalCode' => 'required|numeric',
            'cityName' => 'required|regex:/^[\pL\s\-]+$/u',
            'stateName' => 'required|regex:/^[\pL\s\-]+$/u',
            'countryName' => 'required|regex:/^[\pL\s\-]+$/u',

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

        $employer = Employer::find($address->employer->first()->id);
        
        $tempDescr = $employer->description;
        $employer->description = null;
        $employer->save();
        $employer->description = $tempDescr;
        $employer->save();

        Session::flash('messageSuccess', 'Address Updated Successfully.');
        return redirect(route('employerProfile.show', $request->id));
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
