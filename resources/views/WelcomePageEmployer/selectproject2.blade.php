@extends('WelcomePageEmployer.layouts.app')
@section('title', 'About')

@section('select_HOME', '')
@section('select_ABOUT', '')
@section('select_CONTACT', '')
@section('select_SINGLEPROJECT2', 'class=active')

@section('body')
	<!-- *****************************************************************************************************************
	 BLUE WRAP
	 ***************************************************************************************************************** -->
	 <div id="blue">
	 	<div class="container">
	 		<div class="row">
	 			<h3>TESTS</h3>
	 		</div><!-- /row -->
	 	</div> <!-- /container -->
	 </div><!-- /blue -->

	 
	<!-- *****************************************************************************************************************
	 AGENCY ABOUT
	 ***************************************************************************************************************** -->

	 <div class="container mtb">
	 	<div class="row">
	 		<div class="col-lg-6">
	 			<img class="img-responsive" src="{{ asset('assets/welcomePage/img/agency.jpg') }}" alt="">
	 		</div>
	 		
	 		<div class="col-lg-5 col-lg-offset-1">
			 	<div class="spacing"></div>
		 		<h4>A little about the TEST</h4><hr>
		 		<p>A great man once said "Failing is a stepping stone to success" so do not  get demotivated if you fail a single test.If you do fail the test then make sure you apply for another company and just start preparing for them</p>
		 		<p>Sorry at this moment we do not provide <strong>PRACTICE TESTS</strong>. That would definately be our future enhancement though.Make sure you do refresh your concepts</p>

		 		<br>
		 		
		 	</div>
	 	</div>
	 </div>

	<!-- *****************************************************************************************************************
	 TEEAM MEMBERS
	 ***************************************************************************************************************** -->

	
	 @endsection