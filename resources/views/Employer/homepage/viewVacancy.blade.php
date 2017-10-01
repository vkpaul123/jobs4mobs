@extends('Employer.homepage.layouts.app')
@section('title', 'Employers')

@section('extraPageSpecificHeadContent')
<style>
	#contactwrap {
		text-align:center;
		background-attachment: relative;
		background-position: center center;
		min-height: 400px;
		width: 100%;
		
	    -webkit-background-size: 100%;
	    -moz-background-size: 100%;
	    -o-background-size: 100%;
	    background-size: 100%;

	    -webkit-background-size: cover;
	    -moz-background-size: cover;
	    -o-background-size: cover;
	    background-size: cover;
	}
</style>
@endsection

@section('body')
<!-- Content Header (Page header) -->
<section class="content-header">
	<h1>
		<span style="color:#e08e0b;"><b>Employer</b> </span> Vacancy
		<small>View Vacancy</small>
	</h1>
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
		<li class="active">Vacancy</li>
	</ol>
</section>

<!-- Main content -->
<section class="content">

	<div class="box">
		<div class="box-header with-border">
			<h3 class="box-title">Vacancy</h3>

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
				</div>
				<div class="col-md-7">
					<div class="row">
						<h2><strong>{{ Auth::user()->companyname }}</strong></h2>
						<h4>"{{ Auth::user()->tagline }}"</h4>

					</div>
				</div>

				<div class="col-md-3">
					<div class="row">
						<div class="box box-info">
							<div class="box-header with-border">
								<h3>Tools&nbsp <small>Add these Items</small></h3>
							</div>
							<div class="box-body">
								<a href="{{ route('vacancy.edit', $vacancy->id) }}"><button class="pull-right btn-block btn btn-default"><strong>Edit Vacancy</strong></button></a>
								<br><br>
								<a href="{{ route('vacancySkills.show', $vacancy->id) }}"><button class="pull-right btn-block btn btn-default"><strong>Edit Skills</strong></button></a>
								<br><br>
								<a href="{{ route('vacancyAddress.show', $vacancy->id) }}"><button class="pull-right btn-block btn btn-default"><strong>Edit Address</strong></button></a>
								
								@if($vacancy->testrequired)
									<br><hr>
									<a href="{{ route('vacancy.questionnare.link', $vacancy->id) }}"><button class="pull-right btn-block btn btn-info"><strong>Link Questionnare</strong></button></a>
								@endif
							</div>
							<div class="box-footer">
								@if (Session::has('message'))
									<div class="alert alert-danger">{{ Session::get('message') }}</div>
								@endif
								<form action="{{ route('vacancy.toggleVacancyStatus', $vacancy->id) }}" method="post">
								{{ csrf_field() }}
								{{ method_field('PUT') }}
									<center>
										<div class="checkbox icheck">
											<label>
												<input type="checkbox" name="vacancyStatus"
												@if($vacancy->vacancyStatus)
													checked
												@endif 
												> &nbsp Active
											</label>
										</div>
									</center>
									<input type="submit" class="pull-right btn-block btn btn-success" value="Toggle Vacancy Status">
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="row">
				<hr>

				<div class="col-md-5">
					<h4><span style="color: #e08e0b;">Vacancy Specification</span></h4>

					<div class="box box-border box-body">

						<div class="row box-header">
							<div class="col-md-5"><strong>Industry</strong></div>
							<div class="col-md-7">
								@foreach($jobcategories as $jobcategory)
									@if($jobcategory->id == $vacancy->jobcategoryId)
										{{ $jobcategory->name }}
									@endif
								@endforeach
							</div>
						</div>

						<div class="row box-header">
							<div class="col-md-5"><strong>Opening Date</strong></div>
							<div class="col-md-7 text-success">{{ $vacancy->openingDate }}</div>
						</div>

						<div class="row box-header">
							<div class="col-md-5"><strong>Closing Date</strong></div>
							<div class="col-md-7 text-danger">{{ $vacancy->closingDate }}</div>
						</div>

						<div class="row box-header">
							<div class="col-md-5"><strong>Commitment Type</strong></div>
							<div class="col-md-7">{{ $vacancy->preferedworktype }}</div>
						</div>

						<div class="row box-header">
							<div class="col-md-5"><strong>Number of Openings</strong></div>
							<div class="col-md-7">{{ $vacancy->noOfVacancies }}</div>
						</div>
						
					</div>
				</div>

				<div class="col-md-offset-1 col-md-5">
					<h4><span style="color: #e08e0b;">Vacancy Preferances</span></h4>

					<div class="box box-border box-body">

						<div class="row box-header">
							<div class="col-md-5"><strong>Education Level</strong></div>
							<div class="col-md-7">{{ $vacancy->preferedednlevel }}</div>
						</div>

						<div class="row box-header">
							<div class="col-md-5"><strong>Skills</strong></div>
							<div class="col-md-7">
								<div>
									<span style="color: #e08e0b;">
										@if(count($vacancySkills))
											@foreach($vacancySkills as $vacancySkill)
												{{ $vacancySkill->skillName }} &nbsp &nbsp
											@endforeach
										@else
											<strong class="text-danger">(Please Enter some Skills Required for this Vacancy)</strong>
										@endif
									</span>
								</div>
							</div>
						</div>

						<div class="row box-header">
							<div class="col-md-5"><strong>Salary</strong></div>
							<div class="col-md-7">{{ $vacancy->salary }}</div>
						</div>

						<div class="row box-header">
							<div class="col-md-5"><strong>Prefered Experience</strong></div>
							<div class="col-md-7">{{ $vacancy->preferedworkexp }}</div>
						</div>

					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="box">
	<div class="box-header with-border">
		<h3 class="box-title"><strong>Job Location</strong></h3> &nbsp
		<button type="button" class="btn btn-xs btn-default" onclick="loadMap()"><i class="fa">&#xf021;</i></button>

		<div class="box-tools pull-right">
			<button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
			title="Collapse">
			<i class="fa fa-minus"></i></button>
		</div>
	</div>
	<div class="box-body">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-6">
					<div class="box">
						@isset($address)
						<div class="box-header with-border">
							<h4>Address</h4>
						</div>
						<div class="box-body">
							<div class="row">
								<div class="col-md-4">
									<strong>Phone No.</strong>
								</div>
								<div class="col-md-8">
									{{ $address->primaryPhoneNo}} &nbsp {{$address->secondaryPhnoeNo}} &nbsp {{$address->faxNo}}
								</div>
							</div>
							<br>
							<div class="row">
								<div class="col-md-4">
									<strong>Address</strong>
								</div>
								<div class="col-md-8">
									<p>
										{{ $address->address }}
									</p>
								</div>
							</div>
							<br>
							<div class="row">
								<div class="col-md-4">
									<strong>Postal Code</strong>
								</div>
								<div class="col-md-8">
									{{ $address->postalCode }}
								</div>
							</div>
							<br>
							<div class="row">
								<div class="col-md-4">
									<strong>City</strong>
								</div>
								<div class="col-md-8">
									{{ $address->cityName }}
								</div>
							</div>
							<br>
							<div class="row">
								<div class="col-md-4">
									<strong>State</strong>
								</div>
								<div class="col-md-8">
									{{ $address->stateName }}
								</div>
							</div>
							<br>
							<div class="row">
								<div class="col-md-4">
									<strong>Country</strong>
								</div>
								<div class="col-md-8">
									{{ $address->countryName }}
								</div>
							</div>
							<br>
							<div class="row">
								<div class="col-md-4">
									<strong>Website</strong>
								</div>
								<div class="col-md-8">
									<a href="https://{{$address->website}}">{{ $address->website }}</a>
								</div>
							</div>
							<input type="hidden" name="lat" id="lat" value="{{ $address->lat }}">
							<input type="hidden" name="lang" id="lang" value="{{ $address->lang }}">

						</div>
						@else
							<div class="box-header">
								<div class="container-fluid">
									<div class="jumbotron">
										<center>
											<h4><span class="fa fa-exclamation-triangle"></span> &nbsp <br><br><span class="text-danger">Address Details not given.<br><small>Please give the address Details for this Vacancy.</small></span></h4>
										</center>
									</div>
								</div>
								
							</div>
						@endisset
					</div>
				</div>
				
				<div class="col-md-6">
					<div class="box box-header with-border box-warning">
						 @isset($address->lat)
							 <div id="contactwrap"></div>
								 <script>
								 	var map;
								 	function loadMap() {
								 	var myLat = document.getElementById('lat').value;
								 	var myLang = document.getElementById('lang').value;

								 		var mapOptions = {
								 			center:new google.maps.LatLng(myLat,myLang),
								 			zoom:15,
								 			draggable: false,
								 			scrollwheel: false,
								 		}

								 		var map = new google.maps.Map(document.getElementById("contactwrap"),mapOptions);

								 		var marker = new google.maps.Marker({
								 			position: new google.maps.LatLng(myLat,myLang),
								 			map: map,
								 		});

								 		google.maps.event.addDomListener(window, "resize", function() {
								 			var center = map.getCenter();
								 			google.maps.event.trigger(map, "resize");
								 			map.setCenter(center);
								 		});
								 	}
								 </script>
								<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAS7wZg-KLMUWnonuxXQLnYd5yHETxrKDQ&callback=loadMap"></script>
							@else
								<div class="container-fluid">
									<div class="jumbotron">
										<center>
											<h4><span class="fa fa-exclamation-triangle"></span> &nbsp <br><br><span class="text-danger">Map for the given Address Could not be loaded.<br><small>Map not available for the given address.</small></span></h4>
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

<div class="box">
	<div class="box-header with-border">
		<h3 class="box-title">Job Details</h3>

		<div class="box-tools pull-right">
			<button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
			title="Collapse">
			<i class="fa fa-minus"></i></button>
		</div>
	</div>
	<div class="box-body">
		<div class="container-fluid">
			<div class="col-md-12">
				<div class="row">
					<div class="box-body">
						<h4><span style="color: #e08e0b;">Job Designation</span></h4>

						<p>{{ $vacancy->jobdesignation }}</p>
					</div>
				</div>
				<div class="row">
					<div class="box-body">
						<h4><span style="color: #e08e0b;">Job Specification</span></h4>

						<p>{{ $vacancy->jobSpecification }}</p>
					</div>
				</div>
				<div class="row">
					<div class="box-body">
						<h4><span style="color: #e08e0b;">Job Description</span></h4>

						<p>
							{{ $vacancy->jobDescription }}
						</p>

					</div>

				</div>
			</div>
		</div>

	</div>
</div>

<div class="box">
	<div class="box-header with-border">
		<h3 class="box-title"><strong><span style="color: #e08e0b;">Vacancy Description</span></strong></h3>

		<div class="box-tools pull-right">
			<button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
			title="Collapse">
			<i class="fa fa-minus"></i></button>
		</div>
	</div>
	<div class="box-body">
		<div class="container-fluid">
			<div class="col-md-12">
				<div class="row">
					<div class="box-body">
						<div id="vacancyDescription">
							{!! $vacancy->vacancydescription !!}
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