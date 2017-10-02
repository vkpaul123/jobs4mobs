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

	<!-- Default box -->
	<div class="box">

		<div class="box-body">
			<br>
			@if (Session::has('message'))
				<div class="alert alert-danger">{{ Session::get('message') }}</div>
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
				<hr>

				<div class="form-group">
					<div class="col-md-offset-5 col-md-2">
						<button type="submit" class="btn btn-primary btn-block pull-right"><strong>Submit</strong></button>
					</div>
				</div>
				{{-- end form --}}
			</form>
		</div>

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