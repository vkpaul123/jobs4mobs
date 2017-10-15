@extends('WelcomePage.layouts.app')
@section('title', 'About')

@section('select_HOME', '')
@section('select_ABOUT', '')
@section('select_CONTACT', '')
@section('select_SINGLEPROJECT1', 'class=active')

@section('body')
	<!-- *****************************************************************************************************************
	 BLUE WRAP
	 ***************************************************************************************************************** -->
	 <div id="blue">
	 	<div class="container">
	 		<div class="row">
	 			<h3>Expenses</h3>
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
		 		<h4>EXPENSES</h4><hr>
		 		<p>Absolutely not!Jobs4mobs is  <strong>FREE</strong>.  We make sure that our customers  are benifitted  by our service to the extent you choose us to find your perfect job instead of other! </p>
		 		
		 		<p>Just register and you're already one step closer to your dreams! How cool is that?</p>
		 	</div>
	 	</div>
	 </div>

	<!-- *****************************************************************************************************************
	 TEEAM MEMBERS
	 ***************************************************************************************************************** -->

	
	 @endsection