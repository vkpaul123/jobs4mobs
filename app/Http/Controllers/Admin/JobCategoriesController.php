<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\JobCategory;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class JobCategoriesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jobcategories = JobCategory::all();

        return view('Admin.homepage.viewJobCategories')
        ->with(compact('jobcategories'));
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
            'name' => 'required',
            ]);

        if($request->id == null)
            $jobcategory = new JobCategory;
        else
            $jobcategory = JobCategory::find($request->id);

        $jobcategory->name = $request->name;
        $jobcategory->save();

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        JobCategory::where('id', $id)->delete();

        return redirect()->back();
    }

    public function uploadCategories(Request $request)
    {   
        $this->validate($request, [
            'import_file' => 'required',
            ]);

        if($request->hasFile('import_file')){
            $path = $request->file('import_file')->getRealPath();

            $data = Excel::load($path, function($reader) {})->get(['name']);

            if(!empty($data) && $data->count()){

                foreach ($data->toArray() as $key => $value) {
                    if(!empty($value)){
                        foreach ($value as $v) {        
                            $insert[] = ['name' => $v];
                        }
                    }
                }

                
                if(!empty($insert)){
                    JobCategory::insert($insert);
                    return redirect()->back();
                }

            }

        }

        return redirect()->back();
    }
}
