<?php

namespace App\Http\Controllers\Employer;

use App\Http\Controllers\Controller;
use App\JobCategory;
use App\Questionnaire;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class QuestionnaireController extends Controller
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
        $jobcategories = JobCategory::all();
        $questionnares = Questionnaire::where('employers_id', Auth::user()->id)->get();

        foreach ($questionnares as $questionnare) {
            $questionnare->job_category_id = JobCategory::where('id', $questionnare->job_category_id)->get()->first()->name;
        }

        return view('Employer.homepage.questionnareBuilder')
        ->with(compact('jobcategories'))
        ->with(compact('questionnares'));
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
            'job_category_id' => 'required',
            ]);

        $questionnare = new Questionnaire;
        $questionnare->job_category_id = $request->job_category_id;
        $questionnare->employers_id = $request->employers_id;
        $questionnare->save();

        if($request->buildOrUpload == 'upload')
            return redirect(route('questionnare.upload', Questionnaire::orderBy('created_at', 'desc')->get()->first()->id));
        else
            return redirect(route('question.show', Questionnaire::orderBy('created_at', 'desc')->get()->first()->id));
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
        $jobcategories = JobCategory::all();
        $questionnare = Questionnaire::where('id', $id)->get()->first();

        return view('Employer.homepage.questionnareBuilderEdit')
        ->with(compact('questionnare'))
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
            'job_category_id' => 'required',
            ]);

        $questionnare = Questionnaire::find($id);
        $questionnare->job_category_id = $request->job_category_id;
        $questionnare->save();

        return redirect(route('questionnareBuilder.index'));
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

    public function updatePassingMarks(Request $request, $id)
    {
        $this->validate($request, [
            'passingMarks' => 'required',
            'timelimit' => 'required',
            ]);

        if(($request->questionsCount >= $request->passingMarks) && $request->passingMarks != 0) {
            $questionnare = Questionnaire::find($id);
            $questionnare->passingMarks = $request->passingMarks;
            $questionnare->timelimit = $request->timelimit;
            $questionnare->save();
            Session::flash('messageSuccess', 'Questionnare Attributes set Successfully!');
        }
        else
            Session::flash('messageFail', 'Passing Marks was <b>zero</b> or <b>greater</b> than <b>Questions Count</b> in this Questionnaire. Please Add more questions or reduce Passing Marks');



        return redirect()->back();
    }
}
