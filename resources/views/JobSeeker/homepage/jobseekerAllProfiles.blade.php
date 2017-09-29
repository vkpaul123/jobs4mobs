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
		<span style="color:#367fa9;"><b>JobSeeker</b> </span> All Profiles
		<small>view All Profiles</small>
	</h1>
	
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
		<li class="active">All Profiles</li>
	</ol>
</section>

<!-- Main content -->
<section class="content">
	
	@forelse($jobseekerProfiles as $jobseekerProfile)

	<div class="box">
		<div class="box-header with-border">
			<h3 class="box-title"><strong><span style="color: #367fa9;">{{ $jobseekerProfile->firstname." ".$jobseekerProfile->middlename." ".$jobseekerProfile->lastname }}</span></strong> &nbsp <small>"{{ $jobseekerProfile->tagline }}"</small></h3>

			<div class="box-tools pull-right">
				<button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
				title="Collapse">
				<i class="fa fa-minus"></i></button>
			</div>
		</div>

		<div class="box-body">
			<div class="container-fluid">
				<div class="row">
					<div class="col-md-12">
						<h5><strong>{{ $jobseekerProfile->educationlevel }}</strong></h5>
						<div class="row">
							<div class="col-md-10">
								<div class="row">
									<div class="col-md-4">
										<b class="fa fa-briefcase"></b> &nbsp {{ $jobseekerProfile->experience }} Years
										<br>
										<b class="fa fa-hand-pointer-o"></b> &nbsp
										@foreach($jobcategories as $jobcategory)
											@if($jobcategory->id == $jobseekerProfile->preferedJobCategoryId1)
												{{ $jobcategory->name }}
											@endif
										@endforeach

										<br>
										<b class="fa fa-hand-peace-o"></b> &nbsp
										@foreach($jobcategories as $jobcategory)
											@if($jobcategory->id == $jobseekerProfile->preferedJobCategoryId2)
												{{ $jobcategory->name }}
											@endif
										@endforeach
									</div>
									<div class="col-md-4">
										<b class="fa fa-clock-o"></b> &nbsp {{ $jobseekerProfile->preferedworktype }}
										<br>
										<b class="fa fa-industry"></b> &nbsp {{ $jobseekerProfile->preferedcityofwork }}
										<br>
										<b class="fa fa-globe"></b> &nbsp {{ $jobseekerProfile->preferedcountryofwork }}
									</div>
								</div>
							</div>

							<div class="col-md-2">
								<a href="{{ route('profile.show', $jobseekerProfile->id) }}">
									<button class="btn btn-primary btn-block"><b class="glyphicon glyphicon-copy"></b> <strong>View Profile</strong></button>
								</a>
								<br>
								<a class="pull-right" href="{{ route('profile.edit', $jobseekerProfile->id) }}"><span class="glyphicon glyphicon-edit"></span> &nbsp Edit</a>
							</div>
						</div>

					</div>
				</div>
			</div>
		</div>
	</div>
	

	@empty
		<div class="box">
			<div class="box-body">
				<div class="container-fluid">
					<div class="jumbotron">
						<center>
							<h4><span class="fa fa-exclamation-triangle"></span> &nbsp <span class="text-danger">You Don't have any Profiles created.<br><small>Please Create a Profile.</small></span></h4>
						</center>
					</div>
				</div>
			</div>
		</div>
	@endforelse

	<div class="container">
		<div class="row">
			<div class="col-md-offset-7 col-md-4">
				<a href="{{ route('profile.create') }}"><button type="button" class="btn btn-info btn-block pull-right btn-lg"><strong>Create New Profile</strong></button></a>
			</div>
		</div>
	</div>
	
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
		placeholder: "Select Industry…"
	})
</script>

@endsection