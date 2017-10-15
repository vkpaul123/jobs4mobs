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
						@isset ($employer->photo)
	        				<img src="{{ $employer->photo }}"  class="img-rounded img-responsive" alt="Profile Image">
        				@else
    						<img src="{{ asset('assets/staticImages/user.png') }}"  class="img-rounded img-responsive" alt="Profile Image">
        				@endisset

					</img>
				</div>
				<div class="col-md-7">
					<div class="row">
						<h2><strong>{{ $employer->companyname }}</strong></h2>
						<h4>"{{ $employer->tagline }}"</h4>

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
								{{ $employer->description }} 
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
							<div class="col-md-5 col-md-offset-1">{{ $employer->companyType }}</div>
						</div>

						<div class="box-body">
							<div class="col-md-5"><strong>Company Category</strong></div>
							<div class="col-md-5 col-md-offset-1">{{ $employer->companyCategory }}</div>
						</div>

						<div class="box-body">
							<div class="col-md-5"><strong>Industry Type</strong></div>
							<div class="col-md-5 col-md-offset-1">
								@foreach($jobcategories as $jobcategory)
									@if($jobcategory->id == $employer->jobCategoryId)
										{{ $jobcategory->name }}
									@endif
								@endforeach
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
							@isset($address)
								<div class="box-body">
									<div class="col-md-5"><strong>Contact No.</strong></div>
									<div class="col-md-5 col-md-offset-1">{{$address->primaryPhoneNo}} &nbsp {{$address->secondaryPhnoeNo}}</div>
								</div>

								<div class="box-body">
									<div class="col-md-5"><strong>Fax No.</strong></div>
									<div class="col-md-5 col-md-offset-1">{{$address->faxNo}}</div>
								</div>

								<div class="box-body">
									<div class="col-md-5"><strong>Address</strong></div>
									<div class="col-md-5 col-md-offset-1">
									{{$address->address}}
									<br>
									{{$address->cityName}} - {{$address->postalCode}}
									<br>
									{{$address->stateName}}, {{$address->countryName}}
									</div>
								</div>

								
								<div class="box-body">
									<div class="col-md-5"><strong>Website</strong></div>
									<div class="col-md-5 col-md-offset-1"><a href="http://{{$address->website}}" target="_blank">{{$address->website}}</a></div>
								</div>	
								
								<div class="box-body">
									<div class="col-md-5"><strong>e-Mail</strong></div>
									<div class="col-md-5 col-md-offset-1">{{ $employer->email }}</div>
								</div>
							@else
								<div class="container-fluid">
									<div class="jumbotron">
										<center>
											<h4><span class="fa fa-exclamation-triangle"></span><br><br><span class="text-danger">No Address Found!<br><small>Employer does not have any Address set up.</small></span></h4>
										</center>
									</div>
								</div>
							@endisset	
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