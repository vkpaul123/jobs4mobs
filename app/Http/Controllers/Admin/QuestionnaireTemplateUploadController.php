<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class QuestionnaireTemplateUploadController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function showUploadForm() {
    	return view('Admin.homepage.questionnaireTemplateUpload');
    }

    public function uploadTemplate(Request $request) {
    	$this->validate($request, [
    		'import_file' => 'required',
    		]);

    	$filename = "Questionnaire_Template.".$request->import_file->getClientOriginalExtension();
        $image = $request->file('import_file');
        $t = Storage::disk('s3')->put('Questionnaire_Template/'.$filename, file_get_contents($image), 'public');
        $filename = Storage::disk('s3')->url('Questionnaire_Template/'.$filename);

        Session::flash('message', '<b>Questionnaire_Template.xlsx</b> uploaded Successfully!');
        return redirect()->back();
    }
}
