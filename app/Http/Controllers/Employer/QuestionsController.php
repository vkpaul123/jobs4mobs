<?php

namespace App\Http\Controllers\Employer;

use App\Http\Controllers\Controller;
use App\JobCategory;
use App\Question;
use App\Questionnaire;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class QuestionsController extends Controller
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
        $questionnares = Questionnaire::where('employers_id', Auth::user()->id)->get();

        foreach ($questionnares as $questionnare) {
            $questionnare->job_category_id = JobCategory::where('id', $questionnare->job_category_id)->get()->first()->name;
        }

        return view('Employer.homepage.addQuestion')
        ->with(compact('questionnares'));
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
            'quesText' => 'required',
            'correctAns' => 'required',
            'WrongAns1' => 'required',
            'WrongAns2' => 'required',
            'WrongAns3' => 'required',
            'questionnaire_id' => 'required',
            ]);

        $question = new Question;
        $question->quesText = $request->quesText;
        $question->correctAns = $request->correctAns;
        $question->WrongAns1 = $request->WrongAns1;
        $question->WrongAns2 = $request->WrongAns2;
        $question->WrongAns3 = $request->WrongAns3;
        $question->questionnaire_id = $request->questionnaire_id;
        $question->save();

        return redirect(route('question.show', $request->questionnaire_id));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $questions = Question::where('questionnaire_id', $id)->get();

        return view('Employer.homepage.viewQuestions')
        ->with(compact('questions'))
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
        $question = Question::find($id);
        $questionnares = Questionnaire::where('employers_id', Auth::user()->id)->get();

        foreach ($questionnares as $questionnare) {
            $questionnare->job_category_id = JobCategory::where('id', $questionnare->job_category_id)->get()->first()->name;
        }

        return view('Employer.homepage.editQuestion')
        ->with(compact('questionnares'))
        ->with(compact('question'));
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
            'quesText' => 'required',
            'correctAns' => 'required',
            'WrongAns1' => 'required',
            'WrongAns2' => 'required',
            'WrongAns3' => 'required',
            'questionnaire_id' => 'required',
            ]);

        $question = Question::find($id);
        $question->quesText = $request->quesText;
        $question->correctAns = $request->correctAns;
        $question->WrongAns1 = $request->WrongAns1;
        $question->WrongAns2 = $request->WrongAns2;
        $question->WrongAns3 = $request->WrongAns3;
        $question->questionnaire_id = $request->questionnaire_id;
        $question->save();

        return redirect(route('question.show', $request->questionnaire_id));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Question::find($id)->delete();

        return redirect()->back();
    }
}
