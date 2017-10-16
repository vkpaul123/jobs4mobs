@extends('WelcomePage.layouts.app')
@section('title', 'About')

@section('select_HOME', '')
@section('select_ABOUT', '')
@section('select_CONTACT', 'class=active')

@section('body')


<!-- *****************************************************************************************************************
 BLUE WRAP
 ***************************************************************************************************************** -->
 <div id="blue">
 	<div class="container">
 		<div class="row">
 			<h3>Contact Us.</h3>
 		</div><!-- /row -->
 	</div> <!-- /container -->
 </div><!-- /blue -->

<!-- *****************************************************************************************************************
 CONTACT WRAP
 ***************************************************************************************************************** -->

 <div id="contactwrap"></div>
 <button type="button" class="btn btn-xs pull-left" onclick="loadMap()"><i class="fa">&#xf021;</i></button>
 <script>
 	var map;
 	function loadMap() {

 		var mapOptions = {
 			center:new google.maps.LatLng(12.93443,77.6061315),
 			zoom:16,
 			draggable: false,
 			scrollwheel: false,
 		}

 		var map = new google.maps.Map(document.getElementById("contactwrap"),mapOptions);

 		var marker = new google.maps.Marker({
 			position: new google.maps.LatLng(12.93443,77.6061315),
 			map: map,
 		});

 		google.maps.event.addDomListener(window, "resize", function() {
 			var center = map.getCenter();
 			google.maps.event.trigger(map, "resize");
 			map.setCenter(center);
 		});
 	}
 </script>
 <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDhhJHWbRp_rh15XKRS-t8zwfZLX-KuSIU&callback=loadMap"></script>
 
<!-- *****************************************************************************************************************
 CONTACT FORMS
 ***************************************************************************************************************** -->

 <div class="container mtb">
 	<div class="row">
 		<div class="col-lg-8">
 			<h4>Just Get In Touch!</h4>
 			@if (Session::has('message'))
 				<div class="alert alert-success">{{ Session::get('message') }}</div>
 			@endif
 			@if(count($errors) > 0)
				<center>
					<p class="alert alert-danger">
						<strong>
							You Have Errors while submitting. Please Fill up the information in the Fields that are Highlighted in Red.
						</strong>
					</p>
				</center>
			@endif
 			<div class="hline"></div><br><br>
 			<form method="post" action="{{ route('allUsers.sendMessage') }}">
 				{{ csrf_field() }}
 				<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
 					<label for="name" class="control-label">Your Name</label>
 					<input type="text" class="form-control" id="name" name="name"
 					@if(count($errors)) 
 						value="{{ old('name') }}"
 					@else
 						@unless(Auth::guest())
 							value="{{Auth::user()->firstname.' '.Auth::user()->lastname}}"
 						@endunless
 					@endif>
 				</div>
 				<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
 					<label for="email" class="control-label">Email address</label>
 					<input type="email" class="form-control" id="email" name="email"
 					@if(count($errors)) 
 						value="{{ old('email') }}"
 					@else
 						@unless(Auth::guest())
 							value="{{Auth::user()->email}}"
 						@endunless
 					@endif>
 				</div>
 				<div class="form-group{{ $errors->has('subject') ? ' has-error' : '' }}">
 					<label for="InputSubject1" class="control-label">Subject</label>
 					<input type="text" class="form-control" id="subject" name="subject" value="{{ old('subject') }}">
 				</div>
 				<div class="form-group{{ $errors->has('message') ? ' has-error' : '' }}">
 					<label for="message" class="control-label">Message</label>
 					<textarea class="form-control" id="message" rows="3" name="message">{{ old('message') }}</textarea>
 				</div>
 				<input type="hidden" name="userType" id="userType"
 				@if(Auth::guest())
 					value="jobseekerGuest"
 				@else
 					value="jobseeker - {{Auth::user()->id}}"
 				@endif>
 				<button type="submit" class="btn btn-theme">Submit</button>
 			</form>
 		</div><! --/col-lg-8 -->
 		
 		<div class="col-lg-4">
 			<h4>Our Address</h4>
 			<div class="hline"></div>
 			<p>
 				Christ University<br/>
 				Hosur Road,Bengaluru,<br/>
 				Karnataka-560029<br/>
 			</p>
 			<p>
 				Email: contact.jobs4mobs@gmail.com<br/>
 				Tel: +91 9969453212
 			</p>
 			<p>India's leading website Jobs4Mobs isn't just online.Feel free to drop in by our office.We'd be more than happy to acknowldege your queries! </p>
 		</div>
 	</div><! --/row -->
 </div><! --/container -->

 @endsection