@extends('JobSeeker.homepage.layouts.app')
@section('title', 'JobSeekers')

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
		<span style="color:#367fa9;"><b>JobSeeker</b> </span> Apply For Job
		<small>Select your Profile</small>
	</h1>
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
		<li class="active">Apply For Job</li>
	</ol>
</section>

<!-- Main content -->
<section class="content">

	<!-- Default box -->
	<div class="box">
		<div class="box-header with-border">
			<h3 class="box-title"><b>Profile Select</b></h3>
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
				<p class="alert alert-danger">
					<strong>
						You Have Errors while submitting. Please Fill up the information in the Fields that are Highlighted in Red.
					</strong>
					<button type="button" class="close" data-dismiss="alert"><i class="fa fa-times"></i></button>
				</p>
			</center>
		@endif

			<form action="{{ route('applyForJob.profileSelectForm.apply') }}" method="post" class="form-horizontal">
				{{csrf_field()}}

				<div class="form-group{{ $errors->has('jobseeker_profile_id') ? ' has-error' : '' }}">
					<label for="jobseeker_profile_id" class="col-md-3 control-label">Select Profile</label>
					<div class="col-md-6">
						<select style="width: 100%;" class="select2 form-control" id="jobseeker_profile_id" name="jobseeker_profile_id">
							<option value="">Profiles…</option>

							@foreach($jobseekerProfiles as $jobseekerProfile)
							
							<option value="{{ $jobseekerProfile->id }}">{{ $jobseekerProfile->id }} - {{ $jobseekerProfile->preferedJobCategoryId1 }}</option>

							@endforeach

						</select>	
					</div>
				</div>

				<hr>
				<input type="hidden" name="vacancy_id" id="vacancy_id" value="{{ $id }}">
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

	{{-- Entered Detials --}}
	<h4>Submitted Application</h4>

	<div class="container-fluid">
		@isset($jobApplication)
		<div class="row">
			<div class="col-md-12">
				<div class="box box-defaults">
					<div class="box-header with-border">
						<h3 class="box-title" id="qualificationTextShow"><strong>Application ID:&nbsp &nbsp</strong><span class="text-danger">{{ $jobApplication->id }}</span></h3>

						<div class="box-tools pull-right">
							<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
							</button>
						</div>
						<!-- /.box-tools -->
					</div>
					<!-- /.box-header -->
					<div class="box-body">
						<div class="container-fluid">
							<div class="row">
								<div class="col-md-4" id="boardNameShow">
									<h4>Jobseeker Profile ID:</h4>
									<strong class="text-primary">{{ $jobApplication->jobseeker_profile_id }}</strong> &nbsp &nbsp
									<a href="{{ route('profile.show', $jobApplication->jobseeker_profile_id) }}"><button class="btn-primary btn btn-xs"><strong>View Profile</strong></button></a><hr>
								</div>
								<div class="col-md-4" id="academyNameShow">
									<h4>Vacancy ID:</h4>
									<strong class="text-info">{{ $jobApplication->vacancy_id }}</strong> &nbsp &nbsp
									<a href="/home/viewVacancy/{{$jobApplication->vacancy_id}}"><button class="btn-info btn btn-xs"><strong>View Vacancy</strong></button></a><hr>
								</div>
								<div class="col-md-4">
									<h4>Application Status:</h4>
									<span class="@if($jobApplication->applicationStatus == 'Applied') text-yellow @elseif($jobApplication->applicationStatus == 'Rejected') text-red @elseif($jobApplication->applicationStatus == 'Approved') text-green @endif">
										<strong>{{ $jobApplication->applicationStatus }}</strong>
									</span><hr>
								</div>
							</div>
						</div>
					</div>
					<!-- /.box-body -->
				</div>
			</div>
		</div>
		@endisset

		<div class="row">
			<div class="col-md-offset-8 col-md-4">
				<a href="/home/vacancySearchResults"><button type="button" class="btn btn-success btn-block pull-right btn-lg"><strong>Done</strong></button></a>
			</div>
		</div>
	</div>
	
	
	{{-- Dummy --}}


	{{-- @endforeach --}}


	

</section>
<!-- /.content -->

@endsection



@section('extraPageSpecificLoadScriptsContent')

<script src="{{ asset('assets/userPage/bower_components/select2/dist/js/select2.full.min.js')}}"></script>

<script>
	$('#dateOfBirth').datepicker({
		autoclose: true
	})

	$("#jobCategoryId").val("{{ old('jobCategoryId') }}").trigger('change');

	$('.select2').select2({
		placeholder: "Select…"
	})
</script>

@endsection