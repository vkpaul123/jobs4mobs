@extends('Employer.homepage.layouts.app')
@section('title', 'Employers')

@section('extraPageSpecificHeadContent')
<link rel="stylesheet" href="{{asset('assets/userPage/bower_components/select2/dist/css/select2.min.css')}}">

<style type="text/css">
[class^='select2'] {
	border-radius: 0px !important;
}

.select2-container {
	padding: 0px;
	border-width: 0px;
}
.select2-container .select2-choice {
	height: 38px;
	line-height: 38px;
}

.select2-container.form-control {
	height: auto !important;
}

.form-control{
	-webkit-appearance:none;
	-moz-appearance: none;
	-ms-appearance: none;
	-o-appearance: none;
	appearance: none;
}
</style>
@endsection

@section('body')
<!-- Content Header (Page header) -->
<section class="content-header">
	<h1>
		<span style="color:#e08e0b;"><b>Employer</b> </span> Create Questionnare
		<small>Set up your Profile</small>
	</h1>
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
		<li class="active">Create Questionnare</li>
	</ol>
</section>

<!-- Main content -->
<section class="content">

	<!-- Default box -->
	<div class="box">
		<div class="box-header with-border">
			<h3 class="box-title"><b>Create Question</b></h3>
		</div>

		<div class="box-body">
			@if (Session::has('messageFail'))
			<div class="alert alert-danger">{!! Session::get('messageFail') !!}
				<button type="button" class="close" data-dismiss="alert"><i class="fa fa-times"></i></button>
			</div>
			@endif
			@if (Session::has('messageSuccess'))
			<div class="alert alert-success">{!! Session::get('messageSuccess') !!}
				<button type="button" class="close" data-dismiss="alert"><i class="fa fa-times"></i></button>
			</div>
			@endif
			@if(count($errors) > 0)
			<center>
				<div class="alert alert-danger">
					<button type="button" class="close" data-dismiss="alert"><i class="fa fa-times"></i></button>
					<strong>
						You Have Errors while submitting. Please Fill up the information in the Fields that are Highlighted in Red.
					</strong>
					<hr>
					@foreach ($errors->all() as $error)
					{{ $error }} <br>
					@endforeach
				</div>
			</center>
			@endif
			<form action="{{ route('question.store') }}" method="post" class="form-horizontal">
				{{csrf_field()}}
				
				<h4><span style="color: #e08e0b;">Question</span></h4>
				
				<div class="form-group{{ $errors->has('quesText') ? ' has-error' : '' }}">
					<label for="quesText" class="col-md-3 control-label">Question Text<span class="text-red">*</span></label>
					<div class="col-md-6">
						<textarea class="form-control pull-right" id="quesText" name="quesText" placeholder="Question Text" rows="7">{{old('quesText')}}</textarea>
					</div>
				</div>

				<div class="form-group{{ $errors->has('correctAns') ? ' has-error' : '' }}">
					<label for="correctAns" class="col-md-3 control-label">Correct Answer<span class="text-red">*</span></label>
					<div class="col-md-6">
						<input type="text" class="form-control pull-right" id="correctAns" name="correctAns" placeholder="Correct Answer" value="{{old('correctAns')}}">
					</div>
				</div>

				<hr>
				<h4><span style="color: #e08e0b;">Wrong Answers</span></h4>
				
				<div class="form-group{{ $errors->has('WrongAns1') ? ' has-error' : '' }}">
					<label for="WrongAns1" class="col-md-3 control-label">Wrong Answer 1<span class="text-red">*</span></label>
					<div class="col-md-6">
						<input type="text" class="form-control pull-right" id="WrongAns1" name="WrongAns1" placeholder="Wrong Answer 1" value="{{old('WrongAns1')}}">
					</div>
				</div>

				<div class="form-group{{ $errors->has('WrongAns2') ? ' has-error' : '' }}">
					<label for="WrongAns2" class="col-md-3 control-label">Wrong Answer 2<span class="text-red">*</span></label>
					<div class="col-md-6">
						<input type="text" class="form-control pull-right" id="WrongAns2" name="WrongAns2" placeholder="Wrong Answer 2" value="{{old('WrongAns2')}}">
					</div>
				</div>

				<div class="form-group{{ $errors->has('WrongAns3') ? ' has-error' : '' }}">
					<label for="WrongAns3" class="col-md-3 control-label">Wrong Answer 3<span class="text-red">*</span></label>
					<div class="col-md-6">
						<input type="text" class="form-control pull-right" id="WrongAns3" name="WrongAns3" placeholder="Wrong Answer 3" value="{{ old('WrongAns3') }}">
					</div>
				</div>

				<hr>
				<h4><span style="color: #e08e0b;">Questionnaire Parent</span></h4>

				<div class="form-group{{ $errors->has('questionnaire_id') ? ' has-error' : '' }}">
					<label for="questionnaire_id" class="col-md-3 control-label">Questionnaire<span class="text-red">*</span></label>
					<div class="col-md-6">
						<select style="width: 100%;" class="select2 form-control" id="questionnaire_id" name="questionnaire_id">
							<option value="">Choose an Questionnaire…</option>

							@foreach($questionnares as $questionnare)
							
							<option value="{{ $questionnare->id }}">{{ $questionnare->id }} - {{ $questionnare->job_category_id }}</option>

							@endforeach

						</select>	
					</div>
				</div>

				<hr>

				<div class="form-group">
					<div class="col-md-offset-5 col-md-2">
						<button type="submit" class="btn btn-warning btn-block pull-right">Submit</button>
					</div>
				</div>
				{{-- end form --}}
			</form>
		</div>

		<div class="box-footer">
			<span class="text-red"><strong>*</strong></span>Required Fields
		</div>
		<!-- /.box-footer-->
	</div>
	<!-- /.box -->

</section>
<!-- /.content -->

@endsection



@section('extraPageSpecificLoadScriptsContent')

<script src="{{ asset('assets/userPage/bower_components/select2/dist/js/select2.full.min.js')}}"></script>

<script>
	$('#dateOfBirth').datepicker({
		autoclose: true
	})

	$('.select2').select2({
		placeholder: "Select…"
	})
</script>

@endsection