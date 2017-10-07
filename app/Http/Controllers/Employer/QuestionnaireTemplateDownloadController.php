<?php

namespace App\Http\Controllers\Employer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class QuestionnaireTemplateDownloadController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth:employer');
    }

    public function downloadQuesTemplate()
    {
        $file = Storage::disk('s3')->get('Questionnaire_Template/Questionnaire_Template.xlsx');

        $headers = [
            'Content-Type' => 'application/vnd.ms-excel',
            'Content-Description' => 'File Transfer',
            'Content-Disposition' => "attachment; filename=Questionnaire_Template.xlsx",
            'filename'=> 'Questionnaire_Template.xlsx'
        ];

        return response($file, 200, $headers);
    }
}
