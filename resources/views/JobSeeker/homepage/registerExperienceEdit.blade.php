@extends('JobSeeker.homepage.layouts.app')
@section('title', 'JobSeekers')


@section('body')
<!-- Content Header (Page header) -->
<section class="content-header">
	<h1>
		<span style="color:#367fa9;"><b>JobSeeker</b> </span> Edit Experience Registration
		<small>Set up your Resume</small>
	</h1>
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
		<li class="active">Edit Experience Registration</li>
	</ol>
</section>

<!-- Main content -->
<section class="content">

	<!-- Default box -->
	<div class="box">
		<div class="box-header with-border">
			<h3 class="box-title"><b>Edit Experience Details</b></h3>
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

			<form action="{{ route('experience.update', $experiencesEdit->id) }}" method="post" class="form-horizontal">
				{{csrf_field()}}
				{{ method_field('PUT') }}

				<div class="form-group{{ $errors->has('companyName') ? ' has-error' : '' }}">
					<label for="companyName" class="col-md-3 control-label">Company Name<span class="text-red">*</span></label>
					<div class="col-md-6">
						<input type="text" class="form-control pull-right" id="companyName" name="companyName" placeholder="Company Name" value="{{ $experiencesEdit->companyName }}">
					</div>
				</div>

				<div class="form-group{{ $errors->has('companyLocation') ? ' has-error' : '' }}">
					<label for="companyLocation" class="col-md-3 control-label">Company Location<span class="text-red">*</span></label>
					<div class="col-md-6">
						<input type="text" class="form-control pull-right" id="companyLocation" name="companyLocation" placeholder="Company Location" value="{{ $experiencesEdit->companyLocation }}">
					</div>
				</div>

				<div class="form-group{{ $errors->has('jobTitle') ? ' has-error' : '' }}">
					<label for="jobTitle" class="col-md-3 control-label">Job Title<span class="text-red">*</span></label>
					<div class="col-md-6">
						<input type="text" class="form-control pull-right" id="jobTitle" name="jobTitle" placeholder="Job Title" value="{{ $experiencesEdit->jobTitle }}">
					</div>
				</div>

				<div class="form-group{{ $errors->has('fromMonth') ? ' has-error' : '' }}">
					<label for="fromMonth" class="col-md-3 control-label">From (Month)<span class="text-red">*</span></label>
					<div class="col-md-6">
						<div class="input-group date">
							<input type="text" class="form-control pull-right" id="fromMonth" name="fromMonth" placeholder="MM yyyy" value="{{ $experiencesEdit->fromMonth }}">
							<div class="input-group-addon">
								<i class="fa fa-calendar"></i>
							</div>
						</div>
						<!-- /.input group -->
					</div>
				</div>

				<div class="form-group{{ $errors->has('toMonth') ? ' has-error' : '' }}">
					<label for="toMonth" class="col-md-3 control-label">To (Month)<span class="text-red">*</span></label>
					<div class="col-md-6">
						<div class="input-group date">
							<input type="text" class="form-control pull-right" id="toMonth" name="toMonth" placeholder="MM yyyy" value="{{ $experiencesEdit->toMonth }}">
							<div class="input-group-addon" class="btn btn-xs btn-default btn-flat" onclick="document.getElementById('toMonth').value='Present';"><a><i class="fa fa-calendar-plus-o"></i>&nbsp Present</a>
							</div>
							<div class="input-group-addon">
								<i class="fa fa-calendar"></i>
							</div>
						</div>
						<!-- /.input group -->
					</div>
				</div>

				<div class="form-group{{ $errors->has('jobDescription') ? ' has-error' : '' }}">
					<label for="jobDescription" class="col-md-3 control-label">Job Description<span class="text-red">*</span></label>
					<div class="col-md-6">
						<textarea class="form-control pull-right" id="jobDescription" name="jobDescription" placeholder="Description" rows="5" style="resize: none;"">{{ $experiencesEdit->jobDescription }}</textarea>
					</div>
				</div>

				<hr>
				
				<div class="form-group">
					<div class="col-md-offset-5 col-md-2">
						<button type="submit" class="btn btn-primary btn-block pull-right"><strong>Submit</strong></button>
					</div>
				</div>

				
				{{-- end form --}}
			</form>
		</div>

		<div class="box-footer">
			<span class="text-red"><strong>*</strong></span>Required Fields
		</div>
	</div>
	<!-- /.box -->

	{{-- Entered Detials --}}
	<h4>Details Editing For</h4>
	{{-- @foreach() --}}
	<div class="container">

		<div class="row">
			<div class="col-md-11">
				<div class="box box-default">
					<div class="box-header with-border">
						<h3 class="box-title" id="qualificationTextShow"><strong>{{ $experiencesEdit->companyName }}</strong> &nbsp&nbsp {{ $experiencesEdit->companyLocation }}</h3>

						<div class="box-tools pull-right">
							<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
							</button>
						</div>
						<!-- /.box-tools -->
					</div>
					<!-- /.box-header -->
					<div class="box-body">
						<div class="container">
							<div class="row">
								<div class="col-md-4" id="boardNameShow">
									<strong>{{ $experiencesEdit->jobTitle }}</strong>
								</div>
								<div class="col-md-5" id="academyNameShow">
									{{ $experiencesEdit->fromMonth }} &nbsp - &nbsp {{ $experiencesEdit->toMonth }}
								</div>
								{{-- <div class="col-md-2 pull-right">
									<a href="{{ route('experiencesEdit.edit', $experiencesEdit->id, $id) }}"><span class="glyphicon glyphicon-edit"></span></a> | <a href="#"><span class="glyphicon glyphicon-trash"></span></a>

									
								</div> --}}
							</div>
							<div class="row box-body">
								<div class="col-md-12" id="jobDescription">
									{{ $experiencesEdit->jobDescription }}
								</div>
							</div>
						</div>
					</div>
					<!-- /.box-body -->
				</div>
			</div>
		</div>
		
		<div class="row">
			<div class="col-md-offset-7 col-md-4">
				<a href="{{ route('resume.show', $experiencesEdit->jobseeker_profiles_id) }}"><button type="button" class="btn btn-success btn-block pull-right btn-lg"><strong>Done</strong></button></a>
			</div>
		</div>
	</div>

</section>
<!-- /.content -->

@endsection



@section('extraPageSpecificLoadScriptsContent')

<script>
	$('#fromMonth').datepicker({
		autoclose: true,
		format: 'MM yyyy',
		minViewMode: 'months'
	})

	$('#toMonth').datepicker({
		autoclose: true,
		format: 'MM yyyy',
		minViewMode: 'months'
	})
</script>

@endsection