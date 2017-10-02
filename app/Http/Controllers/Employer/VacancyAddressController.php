<?php

namespace App\Http\Controllers\Employer;

use App\Address;
use App\Http\Controllers\Controller;
use App\Vacancy;
use Geocoder\Laravel\Facades\Geocoder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class VacancyAddressController extends Controller
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
        
            $urlString = 'https://maps.googleapis.com/maps/api/geocode/json?address='
                .urlencode($request->address.', '.$request->cityName)
                .'&key=AIzaSyDhhJHWbRp_rh15XKRS-t8zwfZLX-KuSIU';

            $geocode = file_get_contents($urlString);

            $output = json_decode($geocode);
            if($output->status == 'OK') {
                $address->lat = $output->results[0]->geometry->location->lat;
                $address->lang = $output->results[0]->geometry->location->lng;
            }
            else {
                $urlString = 'https://maps.googleapis.com/maps/api/geocode/json?address='
                    .urlencode($request->cityName)
                    .'&key=AIzaSyDhhJHWbRp_rh15XKRS-t8zwfZLX-KuSIU';

                $geocode = file_get_contents($urlString);

                $output = json_decode($geocode);
                if($output->status == 'OK') {
                    $address->lat = $output->results[0]->geometry->location->lat;
                    $address->lang = $output->results[0]->geometry->location->lng;
                }
                else {
                    $address->lat = $address->lang = null;
                }
            }

        $address->save();
        
        $vacancy = Vacancy::find($request->id);
        $vacancy->address()->associate($address);

        $vacancy->save();

        return redirect(route('vacancy.show', $request->id));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $vacancy = Vacancy::where('id', $id)
        ->get()
        ->first();

        $address = null;

        $vacancy->addresses_id;

        if($vacancy->addresses_id) {
            $address = Address::where('id', $vacancy->addresses_id)->get()->first();
            return view('Employer.homepage.vacancyAddressEdit')
            ->with(compact('address'))
            ->with(compact('id'));
        }
        else
            return view('Employer.homepage.vacancyAddress')
            ->with(compact('id'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        
        $urlString = 'https://maps.googleapis.com/maps/api/geocode/json?address='
            .urlencode($request->address.', '.$request->cityName)
            .'&key=AIzaSyAS7wZg-KLMUWnonuxXQLnYd5yHETxrKDQ';

        $geocode = file_get_contents($urlString);

        $output = json_decode($geocode);
        if($output->status == 'OK') {
            $address->lat = $output->results[0]->geometry->location->lat;
            $address->lang = $output->results[0]->geometry->location->lng;
        }
        else {
            $urlString = 'https://maps.googleapis.com/maps/api/geocode/json?address='
                .urlencode($request->cityName)
                .'&key=AIzaSyAS7wZg-KLMUWnonuxXQLnYd5yHETxrKDQ';

            $geocode = file_get_contents($urlString);

            $output = json_decode($geocode);
            if($output->status == 'OK') {
                $address->lat = $output->results[0]->geometry->location->lat;
                $address->lang = $output->results[0]->geometry->location->lng;
            }
            else {
                $address->lat = $address->lang = null;
            }
        }

        $address->save();

        $vacancy = Vacancy::find($address->vacancy->first()->id);
        
        $tempDescr = $vacancy->vacancydescription;
        $vacancy->vacancydescription = null;
        $vacancy->save();
        $vacancy->vacancydescription = $tempDescr;
        $vacancy->save();

        return redirect(route('vacancy.show', $request->id));
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
