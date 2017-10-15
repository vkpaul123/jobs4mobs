@extends('WelcomePageEmployer.layouts.app')
@section('title', 'About')

@section('select_HOME', '')
@section('select_ABOUT', '')
@section('select_CONTACT', '')
@section('select_SINGLEPROJECT3', 'class=active')

@section('body')
	<!-- *****************************************************************************************************************
	 BLUE WRAP
	 ***************************************************************************************************************** -->
	 <div id="blue">
	 	<div class="container">
	 		<div class="row">
	 			<h3>RESPONSES</h3>
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
		 		<h4>RESPONSES</h4><hr>
		 		<p>This entirely depends on your resume and  performance. There are chances that your profile response might get delayed from  the companies end.  We  will make sure that you do get the fastest response.</p>
		 		<br>
		 		
		 	</div>
	 	</div>
	 </div>

	<!-- *****************************************************************************************************************
	 TEEAM MEMBERS
	 ***************************************************************************************************************** -->

	
	 @endsection