@extends('Employer.homepage.layouts.app')
@section('title', 'Employers')


@section('body')
<!-- Content Header (Page header) -->
<section class="content-header">
	<h1>
		<span style="color:#e08e0b;"><b>Employer</b> </span> Questionnare Upload
		<small>Upload Your Questionnare</small>
	</h1>
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
		<li class="active">Questionnare Upload</li>
	</ol>
</section>

<!-- Main content -->
<section class="content">

	<div class="box">
		<div class="box-header with-border">
			<h4 class="text-warning"><strong>Download Questionnaire Template</strong>
			<div class="pull-right">
				<a href="{{ route('questionnare.downloadTemplate') }}">
					<button class="btn btn-lg btn-primary btn-block"><strong><i class="fa fa-download"></i>&nbsp Download Template</strong></button>
				</a>
			</div>
			</h4>
			<p>
				This will download an Excel Spread Sheet with the name "<strong class="text-yellow">Questionnaire_Template.xlsx</strong>".
				<br>Use this Template with your Questions for Uploading your own questions in this Questionnaire.
				<br>
			</p>
		</div>
		<div class="box-body">
			<h5 class="text-warning">
				<strong>Usage:</strong>
			</h5>
			Questionnaire is designed to be a <b>Multiple Choice</b> based questionnaire with <b>4</b> Alternatives for each question, with one of them being the correct answer.
			<br>
			<table class="table">
				<thead>
					<tr>
						<th></th>
						<th>Column Head</th>
						<th>Column Name</th>
						<th>Column Description</th>
					</tr>
					<tbody>
						<tr>
							<td><i class="fa fa-question-circle"></i>&nbsp &nbsp</td>
							<td><strong>quesText</strong></td>
							<td><i>Question Text</i></td>
							<td>Put the Question Text in this Column</td>
						</tr>
						<tr>
							<td><i class="fa fa-check-circle-o"></i>&nbsp &nbsp</td>
							<td><strong>correctAns</strong></td>
							<td><i>Correct Answer</i></td>
							<td>Put the Correct answer for this question in this Column</td>
						</tr>
						<tr>
							<td><i class="fa fa-circle-o"></i>&nbsp &nbsp</td>
							<td><strong>WrongAns1</strong></td>
							<td><i>Wrong Answer 1</i></td>
							<td>Put the first Wrong Answer in this Column</td>
						</tr>
						<tr>
							<td><i class="fa fa-circle-o"></i>&nbsp &nbsp</td>
							<td><strong>WrongAns2</strong></td>
							<td><i>Wrong Answer 2</i></td>
							<td>Put the second Wrong Answer in this Column</td>
						</tr>
						<tr>
							<td><i class="fa fa-circle-o"></i>&nbsp &nbsp</td>
							<td><strong>WrongAns3</strong></td>
							<td><i>Wrong Answer 3</i></td>
							<td>Put the third Wrong Answer in this Column</td>
						</tr>
					</tbody>
				</thead>
			</table>
		</div>
	</div>

	<!-- Default box -->
	<div class="box box-warning">
		<div class="box-header with-border">
			<h3 class="text-yellow"><strong>Upload Questionnaire</strong></h3>
		</div>
		<div class="box-body">
			<br>
			@if (Session::has('message'))
				<div class="alert alert-danger">{!! Session::get('message') !!}</div>
			@endif
			@if(count($errors) > 0)
				<center>
					<p class="alert alert-danger">
						<strong>
							You Have Errors while submitting. Please Fill up the information in the Fields that are Highlighted in Red.
						</strong>
					</p>
				</center>
			@endif
			
			<form action="{{ route('questionnare.uploadQuestions') }}" method="post" class="form-horizontal" enctype="multipart/form-data">
				{{csrf_field()}}

				<div class="form-group{{ $errors->has('import_file') ? ' has-error' : '' }}">
					<label for="import_file" class="col-md-3 control-label">Select Questionnare (.xlsx)</label>
					<div class="col-md-6">
						<input type="file" id="import_file" name="import_file" class="form-control pull-right">
					</div>
				</div>
				<input type="hidden" name="questionnaire_id" id="questionnaire_id" value="{{$id}}">


				<div class="form-group">
					<div class="col-md-offset-5 col-md-2">
						<button type="submit" class="btn btn-warning btn-block pull-right"><strong>Submit</strong></button>
					</div>
				</div>
			</form>
		</div>	
	</div>
</section>
@endsection