@extends('Employer.homepage.layouts.app')
@section('title', 'Employers')


@section('body')
<!-- Content Header (Page header) -->
<section class="content-header">
	<h1>
		<span style="color:#e08e0b;"><b>Employer</b> </span> Profile
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
						<a href="{{ route('logo.upload', Auth::user()->id ) }}"><button class="btn btn-default btn-xs pull-right btn-block">Change Logo</button></a>

					</img>
				</div>
				<div class="col-md-7">
					<div class="row">
						<h2><strong>{{ Auth::user()->companyname }}</strong></h2>
						<h4>@isset(Auth::user()->tagline) "{{ Auth::user()->tagline }}" @endisset</h4>

					</div>
				</div>
			</div>

			<div class="row">
				<hr>

				<div class="col-md-12">
					<h4><span style="color: #e08e0b;">Description</span></h4>

					<div class="box box-border box-body">

						<div class="row box-header">
							@isset(Auth::user()->description)
							<p>
								{{ Auth::user()->description }} 
							</p>
							@else
								<div class="container-fluid">
									<div class="jumbotron">
										<center>
											<h4><span class="fa fa-exclamation-triangle"></span><br><br><span class="text-danger">You Don't have any Description added.<br><small>Please add a Description.</small></span></h4>
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
	<div class="box-footer">
		<a href="{{ route('employerProfile.edit', Auth::user()->id) }}"><button class="btn btn-warning pull-right"><strong>Edit Profile</strong></button></a>
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
							<div class="col-md-5 col-md-offset-1">{{ Auth::user()->companyType }}</div>
						</div>

						<div class="box-body">
							<div class="col-md-5"><strong>Company Category</strong></div>
							<div class="col-md-5 col-md-offset-1">{{ Auth::user()->companyCategory }}</div>
						</div>

						<div class="box-body">
							<div class="col-md-5"><strong>Industry Type</strong></div>
							<div class="col-md-5 col-md-offset-1">
								@foreach($jobcategories as $jobcategory)
									@if($jobcategory->id == Auth::user()->jobCategoryId)
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
								<div class="col-md-5 col-md-offset-1">{{ Auth::user()->email }}</div>
							</div>
						@else
							<div class="container-fluid">
								<div class="jumbotron">
									<center>
										<h4><span class="fa fa-exclamation-triangle"></span><br><br><span class="text-danger">You Don't have any Address set up.<br><small>Please set up an address.</small></span></h4>
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
	<div class="box-footer">
		<a href="{{ route('employerAddress.show', Auth::user()->id) }}"><button class="btn btn-warning pull-right"><strong>Edit Address</strong></button></a>
	</div>
</div>        	

</section>
<!-- /.content -->

@endsection