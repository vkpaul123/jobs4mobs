@extends('Employer.homepage.layouts.app')
@section('title', 'Employers')

@section('body')
<!-- Content Header (Page header) -->
<section class="content-header">
	<h1>
		<span style="color:#e08e0b;"><b>Employer</b> </span> View JobSeeker Profile
		<small>see Jobseeker's Profile</small>
	</h1>
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
		<li class="active">View JobSeeker Profile</li>
	</ol>
</section>

<!-- Main content -->
<section class="content">

	<div class="box box-primary">
		<div class="box-header with-border">
          <h3 class="box-title">Profile</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                    title="Collapse">
              <i class="fa fa-minus"></i></button>
          </div>
        </div>

        <div class="box-body">
        	<div class="container-fluid">
        		<div class="row">
        			<div class="col-md-2">
        				<img src="{{ $user->photo }}"  class="img-rounded img-responsive" alt="Profile Image">
        					
        				</img>
        			</div>
        			<div class="col-md-7">
	        			<div class="row">
	    					<h2><strong>{{ $user->firstname }} {{ $user->middlename}} {{ $user->lastname }}</strong></h2>
	    					<h4>"{{ $jobseekerProfile->tagline }}"</h4>

	        			</div>
	    				<div class="row">
		    				<h5>{{ $academics->last()->qualificationText }}</h5>
	    				</div>
        			</div>
        			<div class="col-md-3">
        				<div class="pull-right">
	        				<a href="@if($jobseekerProfile->resume == "on") {{ route('employer.viewJobseekerResume', $jobseekerProfile->id) }} @elseif($jobseekerProfile->resume) {{$jobseekerProfile->resume}} @else {{ route('employer.viewJobseekerResumeNotFound') }} @endif" target="_blank">
	        					<button class="btn btn-primary btn-lg btn-block"><strong>View Resume</strong></button>
	        				</a>
        					
        				</div>
        			</div>
        		</div>

        		<div class="row">
	        		<hr>
					
					<div class="col-md-5">
						<h4><span style="color: #367fa9;">About me</span></h4>
						
						<div class="box box-border box-body box-primary">

						<div class="row box-header">
							<div class="col-md-5"><strong>Gender</strong></div>
							<div class="col-md-7">{{ $jobseekerProfile->gender }}</div>
						</div>

						<div class="row box-header">
							<div class="col-md-5"><strong>Date of Birth</strong></div>
							<div class="col-md-7">{{ $jobseekerProfile->dateOfBirth }}</div>
						</div>

						<div class="row box-header">
							<div class="col-md-5"><strong>Contact No</strong></div>
							<div class="col-md-7">@isset($address) {{ $address->primaryPhoneNo }} @endisset</div>
						</div>

						<div class="row box-header">
							<div class="col-md-5"><strong>Email</strong></div>
							<div class="col-md-7">{{ $user->email }}</div>
						</div>
						
						</div>
					</div>
					
					<div class="col-md-offset-1 col-md-5">
						<h4><span style="color: #367fa9;">Experience</span></h4>
						
						<div class="box box-border box-body box-primary">

						<div class="row box-header">
							<div class="col-md-5"><strong>Wroking as</strong></div>
							<div class="col-md-7">
								@if(isset($experiences->jobTitle))
									{{ $experiences->jobTitle }}
								@else
									<span class="text-muted">
										N/A
									</span>
								@endif
							</div>
						</div>

						<div class="row box-header">
							<div class="col-md-5"><strong>Working at</strong></div>
							<div class="col-md-7">
								@if(isset($experiences->companyName))
									{{ $experiences->companyName }}
								@else
									<span class="text-muted">
										N/A
									</span>
								@endif
							</div>
						</div>

						</div>
					</div>
        		</div>

			</div>
        </div>
	</div>

	<div class="box">
		<div class="box-header with-border">
			<h3 class="box-title"><strong><span style="color: #367fa9;">Skills</span></strong></h3>

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

							@forelse($skills as $skill)
								<div class="btn btn-default">{{ $skill->skillName }}</div> &nbsp
							@empty
								<div class="container-fluid">
									<div class="jumbotron">
										<center>
											<h4><span class="fa fa-exclamation-triangle"></span> &nbsp <span class="text-danger">No Skills details found.<br><small>No Skills details given by Jobseeker Profile.</small></span></h4>
										</center>
									</div>
								</div>
							@endforelse
						
        			</div>
        		</div>
			</div>
		</div>
	</div>

	<div class="box">
		<div class="box-header with-border">
			<h3 class="box-title"><strong><span style="color: #367fa9;">Academics</span></strong></h3>

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
        				
						<div class="box box-border box-body">
							@forelse($academics as $academic)
							<div class="box-body">
								{{-- EXAMPLE 1 --}}
			        			<div class="col-md-3" id="boardNameShow">
									{{ $academic->qualificationText }}
								</div>
								<div class="col-md-4" id="academyNameShow">
									{{ $academic->academyName }}
								</div>
								<div class="col-md-4" id="academyNameShow">
									{{ $academic->boardName }}
								</div>
								<div class="col-md-1" id="yearOfPassingShow">
									<b class="pull-right">{{ $academic->yearOfPassing }}</b>
								</div>
								
							</div>
							@empty
								<div class="box-body">
									<div class="container-fluid">
										<div class="jumbotron">
											<center>
												<h4><span class="fa fa-exclamation-triangle"></span> &nbsp <span class="text-danger">No Academics Detials given.<br><small>There are no academics records for this Jobseeker Profile.</small></span></h4>
											</center>
										</div>
									</div>
								</div>
							@endforelse
								
						</div>
        			</div>
        		</div>
			</div>
		</div>
	</div>        	

</section>
<!-- /.content -->

@endsection