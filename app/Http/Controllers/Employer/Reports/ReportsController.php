<?php

namespace App\Http\Controllers\Employer\Reports;

use App\Address;
use App\Employer;
use App\Http\Controllers\Controller;
use App\JobCategory;
use App\JobseekerProfile;
use App\JobseekerSkill;
use App\User;
use App\Vacancy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReportsController extends Controller
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

    //	Vacancy Report
    public function showVacancyReport() {
    	$vacancies = Vacancy::where('employers_id', Auth::user()->id)->get();

        foreach ($vacancies as $vacancy) {
            $vacancy->jobcategoryId = Vacancy::find($vacancy->id)->jobCategory;
            $vacancy->address_id = Vacancy::find($vacancy->id)->address;
            $vacancy->employers_id = Vacancy::find($vacancy->id)->employer;
        }

    	return view('Employer.homepage.reports.vacancyDetails')
    	->with(compact('vacancies'));
    }

    public function locationWiseVacancyReport()
    {
        $vacancies = Vacancy::all();
        $jobcategories = JobCategory::all();
        $employers = Employer::where('id', Auth::user()->id)->get();

        $addresses = Address::select('stateName')->distinct()->get();

        foreach ($vacancies as $vacancy) {
            $vacancy->employers_id = Employer::find($vacancy->employers_id)->companyname;

            $vacancy->jobcategoryId = JobCategory::find($vacancy->jobcategoryId)->name;

            if($vacancy->addresses_id)
                $vacancy->addresses_id = Address::find($vacancy->addresses_id);
        }

        return view('Employer.homepage.reports.locationWiseVacancyReport')
        ->with(compact('vacancies'))
        ->with(compact('addresses'))
        ->with(compact('jobcategories'));
    }

    //TO BE DONE
    public function categoryWiseJobseekerProfileReport()
    {
        $jobseekers = JobseekerProfile::all();
        $jobcategories = JobCategory::all();

        foreach ($jobseekers as $jobseekerProfile) {
            $jobseekerProfile->tagline = User::where('id', $jobseekerProfile->user_id)->get()->first()->email;

            if($jobseekerProfile->address_id)
                $jobseekerProfile->address_id = Address::find($jobseekerProfile->address_id);

            $jobseekerProfile->languagesSpoken = JobseekerSkill::where('jobseeker_profiles_id', $jobseekerProfile->id)->get();
        }

        return view('Employer.homepage.reports.categoryWiseJobseekerProfilesReport')
        ->with(compact('jobseekers'))
        ->with(compact('jobcategories'));
    }

    //TO BE DONE
    public function locationWiseJobseekerProfileReport()
    {
        $jobseekers = JobseekerProfile::all();
        $jobcategories = JobCategory::all();

        $addresses = Address::select('stateName')->distinct()->get();

        foreach ($jobseekers as $jobseekerProfile) {
            $jobseekerProfile->preferedJobCategoryId1 = JobCategory::find($jobseekerProfile->preferedJobCategoryId1)->name;

            $jobseekerProfile->tagline = User::where('id', $jobseekerProfile->user_id)->get()->first()->email;

            if($jobseekerProfile->address_id)
                $jobseekerProfile->address_id = Address::find($jobseekerProfile->address_id);

            $jobseekerProfile->languagesSpoken = JobseekerSkill::where('jobseeker_profiles_id', $jobseekerProfile->id)->get();
        }

        return view('Employer.homepage.reports.locationWiseJobseekerDetailsReport')
        ->with(compact('jobseekers'))
        ->with(compact('addresses'))
        ->with(compact('jobcategories'));
    }

    //TO BE DONE
    public function showJobseekerReport() {
        $jobseekerProfiles = JobseekerProfile::all();
        
        foreach ($jobseekerProfiles as $jobseekerProfile) {
            $jobseekerProfile->preferedJobCategoryId1 = JobCategory::find($jobseekerProfile->preferedJobCategoryId1)->name;

            $jobseekerProfile->tagline = User::where('id', $jobseekerProfile->user_id)->get()->first()->email;

            if($jobseekerProfile->address_id)
                $jobseekerProfile->address_id = Address::find($jobseekerProfile->address_id);

            $jobseekerProfile->languagesSpoken = JobseekerSkill::where('jobseeker_profiles_id', $jobseekerProfile->id)->get();
        }

        return view('Employer.homepage.reports.jobseekerDetails')
        ->with(compact('jobseekerProfiles'));
    }
}
