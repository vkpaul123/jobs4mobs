@extends('JobSeeker.homepage.layouts.app')
@section('title', 'JobSeekers')

@section('body')
<!-- Content Header (Page header) -->
<section class="content-header">
	<h1>
		<span style="color:#367fa9;"><b>JobSeeker</b> </span> Profile
		<small>View Profile</small>
	</h1>
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
		<li class="active">Profile</li>
	</ol>
</section>

<!-- Main content -->
<section class="content">

	<div class="box">
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
        				@isset (Auth::user()->photo)
	        				<img src="{{ Auth::user()->photo }}"  class="img-rounded img-responsive" alt="Profile Image">
        				@else
    						<img src="{{ asset('assets/staticImages/user.png') }}"  class="img-rounded img-responsive" alt="Profile Image">
        				@endisset
        					
        				</img>
        				<a href="{{ route('profilePic.upload', Auth::user()->id ) }}"><button class="btn btn-default btn-xs pull-right btn-block">Change Picture</button></a>
        			</div>
        			<div class="col-md-7">
	        			<div class="row">
	    					<h2><strong>{{ $jobseekerProfile->firstname." ".$jobseekerProfile->middlename." ".$jobseekerProfile->lastname }}</strong></h2>
	    					<h4>"{{ $jobseekerProfile->tagline }}"</h4>

	        			</div>
        			</div>
        			<div class="col-md-3">
        				<a href="{{ route('resume.show', $jobseekerProfile->id) }}">
        					<button class="pull-right btn btn-info btn-lg"><strong>View Resume</strong></button>
        				</a>
        			</div>
        		</div>

        		<div class="row">
	        		<hr>
					
					<div class="col-md-5">
						<h4><span style="color: #367fa9;">About me</span></h4>
						
						<div class="box box-border box-body">

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
							<div class="col-md-7">
								@isset($address)
									{{ $address->primaryPhoneNo }}
								@else
									N/A
								@endisset
							</div>
						</div>

						<div class="row box-header">
							<div class="col-md-5"><strong>Email</strong></div>
							<div class="col-md-7">{{ Auth::user()->email }}</div>
						</div>
						
						</div>
					</div>
					
					<div class="col-md-offset-1 col-md-5">
						<h4><span style="color: #367fa9;">Experience</span></h4>
						
						<div class="box box-border box-body">

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
        <div class="box-footer">
        	<div class="pull-right">
	        	<a href="{{ route('address.show', $jobseekerProfile->id) }}"><button class="btn btn-primary"><strong>Add Address</strong></button></a>
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
											<h4><span class="fa fa-exclamation-triangle"></span> &nbsp <span class="text-danger">You Don't have any Skills Detiails yet.<br><small>Please add your skills detials.</small></span></h4>
										</center>
									</div>
								</div>
							@endforelse
        			</div>
        		</div>
			</div>
		</div>
		<div class="box-footer">
			<div class="pull-right">
				<a href="{{ route('skills.show', $id) }}"><button type="button" class="btn btn-primary"><strong>Add Skills</strong></button></a>
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
												<h4><span class="fa fa-exclamation-triangle"></span> &nbsp <span class="text-danger">You Don't have any Academics Detiails yet.<br><small>Please add your academics detials.</small></span></h4>
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
		<div class="box-footer">
			<div class="pull-right">
				<a href="{{ route('academics.show', $id) }}"><button type="button" class="btn btn-primary"><strong>Add Academics</strong></button></a>
			</div>
		</div>
	</div> 
</section>
<!-- /.content -->

@endsection