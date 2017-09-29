@extends('Admin.homepage.layouts.app')
@section('title', 'Admins')

@section('body')
<!-- Content Header (Page header) -->
<section class="content-header">
	<h1>
		<span style="color:#d73925;"><b>Admin</b> </span> View JobSeeker Profile
		<small>see JobSeeker's Profile</small>
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
        				<img src="{{ asset('assets/welcomePage/img/team/team01.jpg') }}"  class="img-rounded img-responsive" alt="Profile Image">
        					
        				</img>
        			</div>
        			<div class="col-md-7">
	        			<div class="row">
	    					<h2><strong>Vikram Paul</strong></h2>
	    					<h4>"Because I can."</h4>

	        			</div>
	    				<div class="row">
		    				<h5>BCA</h5>
	    				</div>
        			</div>
        			<div class="col-md-3">
        				<a href="/admin/viewProfile/viewJobseekerProfile/viewJobseekerResume">
        					<button class="pull-right btn btn-danger btn-block btn-lg"><strong>View Resume</strong></button>
        				</a>
        				<br><br><br>
        				<a href="/admin/adminEMail">
        					<button class="pull-right btn btn-danger btn-block btn-lg"><strong>Contact</strong></button>
        				</a>
        			</div>
        		</div>

        		<div class="row">
	        		<hr>
					
					<div class="col-md-5">
						<h4><span style="color: #367fa9;">About me</span></h4>
						
						<div class="box box-border box-body box-primary">

						<div class="row box-header">
							<div class="col-md-5"><strong>Gender</strong></div>
							<div class="col-md-7">Male</div>
						</div>

						<div class="row box-header">
							<div class="col-md-5"><strong>Date of Birth</strong></div>
							<div class="col-md-7">13 July 1995</div>
						</div>

						<div class="row box-header">
							<div class="col-md-5"><strong>Contact No</strong></div>
							<div class="col-md-7">8296765476</div>
						</div>

						<div class="row box-header">
							<div class="col-md-5"><strong>Email</strong></div>
							<div class="col-md-7">vkpaul123@gmail.com</div>
						</div>
						
						</div>
					</div>
					
					<div class="col-md-offset-1 col-md-5">
						<h4><span style="color: #367fa9;">Experience</span></h4>
						
						<div class="box box-border box-body box-primary">

						<div class="row box-header">
							<div class="col-md-5"><strong>Wroking as</strong></div>
							<div class="col-md-7">Software Developer</div>
						</div>

						<div class="row box-header">
							<div class="col-md-5"><strong>Working at</strong></div>
							<div class="col-md-7">Google Inc.</div>
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

							{{-- use @foreach here --}}
							<div class="btn btn-default">Laravel</div> &nbsp
							<div class="btn btn-default">Java</div> &nbsp
							<div class="btn btn-default">C</div> &nbsp
						
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

								{{-- use @foreach here --}}
								<div class="box-body">
									{{-- EXAMPLE 1 --}}
				        			<div class="col-md-4" id="boardNameShow">
										CBSE
									</div>
									<div class="col-md-6" id="academyNameShow">
										Army Public School, Jaipur
									</div>
									<div class="col-md-2" id="yearOfPassingShow">
										<b>2011</b>
									</div>
									
								</div>
								
								<div class="box-body">
				        			{{-- EXAMPLE 2 --}}
				        			<div class="col-md-4" id="boardNameShow">
										CBSE
									</div>
									<div class="col-md-6" id="academyNameShow">
										Army Public School, Jaipur
									</div>
									<div class="col-md-2" id="yearOfPassingShow">
										<b>2013</b>
									</div>									
								</div>

								<div class="box-body">
									<div class="col-md-4" id="boardNameShow">
										University of Pune
									</div>
									<div class="col-md-6" id="academyNameShow">
										MAEER's MIT-SOM College, Pune
									</div>
									<div class="col-md-2" id="yearOfPassingShow">
										<b>2015</b>
									</div>
									
								</div>
							</div>
        			</div>
        		</div>
			</div>
		</div>
	</div>        	

</section>
<!-- /.content -->

@endsection