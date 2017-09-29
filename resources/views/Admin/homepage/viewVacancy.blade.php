@extends('Admin.homepage.layouts.app')
@section('title', 'Admins')

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
		<span style="color:#d73925;"><b>Admin</b> </span> Vacancy
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
						<img src="{{ asset('assets/welcomePage/img/team/team01.jpg') }}"  class="img-rounded img-responsive" alt="Profile Image">

					</img>
				</div>
				<div class="col-md-7">
					<div class="row">
						<h2><strong>Company Name</strong></h2>
						<h4>"Company Tag Line"</h4>

					</div>
				</div>

				<div class="col-md-3">
					<div class="row">
						<div class="box box-info">
							<div class="box-header with-border">
								<h3>Status: &nbsp <span class="text-success"><strong>Active</strong></span></h3>
								<h4>Test: &nbsp <span class="text-info">Required</span></h4>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="row">
				<hr>

				<div class="col-md-5">
					<h4><span style="color: #d73925;">Vacancy Specification</span></h4>

					<div class="box box-border box-body">

						<div class="row box-header">
							<div class="col-md-5"><strong>Industry</strong></div>
							<div class="col-md-7">Aviation</div>
						</div>

						<div class="row box-header">
							<div class="col-md-5"><strong>Opening Date</strong></div>
							<div class="col-md-7">13 July 2017</div>
						</div>

						<div class="row box-header">
							<div class="col-md-5"><strong>Closing Date</strong></div>
							<div class="col-md-7">13 August 2017</div>
						</div>

						<div class="row box-header">
							<div class="col-md-5"><strong>Commitment Type</strong></div>
							<div class="col-md-7">Full Time</div>
						</div>
						
					</div>
				</div>

				<div class="col-md-offset-1 col-md-5">
					<h4><span style="color: #d73925;">Vacancy Preferances</span></h4>

					<div class="box box-border box-body">

						<div class="row box-header">
							<div class="col-md-5"><strong>Qualifications</strong></div>
							<div class="col-md-7">Software Developer</div>
						</div>

						<div class="row box-header">
							<div class="col-md-5"><strong>Skills</strong></div>
							<div class="col-md-7">
								<div>
									<span style="color: #d73925;">
										PHP &nbsp &nbsp
										Laravel &nbsp &nbsp
										C &nbsp &nbsp
									</span>
								</div>
							</div>
						</div>

						<div class="row box-header">
							<div class="col-md-5"><strong>Salary</strong></div>
							<div class="col-md-7">50000</div>
						</div>	

					</div>
				</div>
			</div>
		</div>
			<div class="row">
				<div class="col-md-offset-2 col-md-5">
					<a href="/admin/viewProfile/viewEmployerProfile">
						<button class="pull-right btn btn-primary btn-md"><strong>View Employer Profile</strong></button>
					</a>
				</div>
			</div>
	</div>
</div>

<div class="box">
	<div class="box-header with-border">
		<h3 class="box-title">Job Location</h3> &nbsp
		<button type="button" class="btn btn-xs btn-default" onclick="loadMap()"><i class="fa">&#xf021;</i></button>

		<div class="box-tools pull-right">
			<button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
			title="Collapse">
			<i class="fa fa-minus"></i></button>
		</div>
	</div>
	<div class="box-body">
		<div class="container-fluid">
			<div class="box-body">
					<div class="container-fluid">
						<div class="row">
							<div class="col-md-6">
								<div class="box">
									<div class="box-header with-border">
										<h4>Address</h4>
									</div>
									<div class="box-body">
										<div class="row">
											<div class="col-md-4">
												<strong>Phone No.</strong>
											</div>
											<div class="col-md-8">
												{{ $address->primaryPhoneNo.' &nbsp '.$address->secondaryPhnoeNo.' &nbsp '.$address->faxNo }}
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
									</div>
								</div>
							</div>
							<input type="hidden" name="lat" id="lat" value="{{ $address->lat }}">
							<input type="hidden" name="lang" id="lang" value="{{ $address->lang }}">
							<div class="col-md-6">
								<div class="box box-header with-border box-warning">
									 @isset($address->lat && $address->lang)
									 <div id="contactwrap"></div>
										 <script>
										 	var map;
										 	var myLat = document.getElementById('lat').value;
										 	var myLang = document.getElementById('lang').value;
										 	function loadMap() {

										 		var mapOptions = {
										 			center:new google.maps.LatLng(lat,lang),
										 			zoom:16,
										 			draggable: false,
										 			scrollwheel: false,
										 		}

										 		var map = new google.maps.Map(document.getElementById("contactwrap"),mapOptions);

										 		var marker = new google.maps.Marker({
										 			position: new google.maps.LatLng(lat,lang),
										 			map: map,
										 		});

										 		google.maps.event.addDomListener(window, "resize", function() {
										 			var center = map.getCenter();
										 			google.maps.event.trigger(map, "resize");
										 			map.setCenter(center);
										 		});
										 	}
										 </script>
										<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAvqZVAd1Z2utIGG4W8qhHcoc8PLyaFZTU&callback=loadMap"></script>
									@else
										lallu
									@endisset
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
						<h4><span style="color: #d73925;">Job Designation</span></h4>

						<p>Web Developer</p>
					</div>
				</div>
				<div class="row">
					<div class="box-body">
						<h4><span style="color: #d73925;">Job Specification</span></h4>

						<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
					</div>
				</div>
				<div class="row">
					<div class="box-body">
						<h4><span style="color: #d73925;">Job Description</span></h4>

						<p>
							Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. 
						</p>

					</div>

				</div>
			</div>
		</div>

	</div>
</div>

<div class="box">
	<div class="box-header with-border">
		<h3 class="box-title"><strong><span style="color: #d73925;">Vacancy Description</span></strong></h3>

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
							Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. 	
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