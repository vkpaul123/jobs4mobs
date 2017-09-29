@extends('JobSeeker.homepage.layouts.app')
@section('title', 'JobSeekers')


@section('body')
<!-- Content Header (Page header) -->
<section class="content-header">
	<h1>
		<span style="color:#367fa9;"><b>JobSeeker</b> </span> View Employer Profile
		<small>see Employer's Profile</small>
	</h1>
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
		<li class="active">View Employer Profile</li>
	</ol>
</section>

<!-- Main content -->
<section class="content">

	<div class="box box-warning">
		<div class="box-header with-border">
			<h3 class="box-title">Employer's Profile</h3>

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
						<h2><strong>OnePlus India Pvt. Ltd.</strong></h2>
						<h4>"Never Settle"</h4>

					</div>
				</div>
			</div>

			<div class="row">
				<hr>

				<div class="col-md-12">
					<h4><span style="color: #e08e0b;">Description</span></h4>

					<div class="box box-border box-body box-warning">

						<div class="row box-header">
							<p>
								Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. 
							</p>
						</div>
						
					</div>
				</div>
			</div>

		</div>
	</div>
</div>

<div class="box">
	<div class="box-header with-border">
		<h3 class="box-title"><span style="color: #e08e0b;">Company Specifications</span></h3>

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
					<div class="row">
						
						<div class="box-body">
							<div class="col-md-5"><strong>Company Type</strong></div>
							<div class="col-md-5 col-md-offset-1">Recruiter</div>
						</div>

						<div class="box-body">
							<div class="col-md-5"><strong>Company Category</strong></div>
							<div class="col-md-5 col-md-offset-1">MNC</div>
						</div>

						<div class="box-body">
							<div class="col-md-5"><strong>Industry Type</strong></div>
							<div class="col-md-5 col-md-offset-1">Mobile Maker</div>
						</div>	
						
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="box">
	<div class="box-header with-border">
		<h3 class="box-title"><span style="color: #e08e0b;">Contact Details</span></h3>

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
						<div class="row">

							<div class="box-body">
								<div class="col-md-5"><strong>Address</strong></div>
								<div class="col-md-5 col-md-offset-1">MG Road, Bangaluru</div>
							</div>

							<div class="box-body">
								<div class="col-md-5"><strong>Contact No.</strong></div>
								<div class="col-md-5 col-md-offset-1">9876543210</div>
							</div>
							
							<div class="box-body">
								<div class="col-md-5"><strong>Website</strong></div>
								<div class="col-md-5 col-md-offset-1"><a href="">www.oneplus.in</a></div>
							</div>	
							
							<div class="box-body">
								<div class="col-md-5"><strong>e-Mail</strong></div>
								<div class="col-md-5 col-md-offset-1">{{ Auth::user()->email }}</div>
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