@extends('WelcomePage.layouts.app')
@section('title', 'About')

@section('select_HOME', '')
@section('select_ABOUT', '')
@section('select_CONTACT', '')
@section('select_SINGLEPROJECT', 'class=active')

@section('body')
	<!-- *****************************************************************************************************************
	 BLUE WRAP
	 ***************************************************************************************************************** -->
	 <div id="blue">
	 	<div class="container">
	 		<div class="row">
	 			<h3>Register NOW!</h3>
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
		 		<h4>REGISTER</h4><hr>
		 		<p>The   registeration   process   is   pretty   simple .   All   you   need   to   do   is   click   the   login   form   below   which   there   is   a register   button.  Ofcourse   you   must   login   into   the   apprpriate   portal,  that is Employer or Jobseeker </p><br>
		 		<h4>PROCESS</h4><hr>
		 		<p>Please enter valid details and information else you could be blocked by our intelligent middleware ;) </p>
		 	</div>
	 	</div>
	 </div>

	<!-- *****************************************************************************************************************
	 TEEAM MEMBERS
	 ***************************************************************************************************************** -->

	
	 @endsection