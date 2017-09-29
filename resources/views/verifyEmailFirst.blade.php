@extends('WelcomePage.layouts.app')
@section('title', 'About')

@section('select_HOME', '')
@section('select_ABOUT', 'class=active')
@section('select_CONTACT', '')

@section('body')
	<!-- *****************************************************************************************************************
	 BLUE WRAP
	 ***************************************************************************************************************** -->
	 <div id="green">
	 	<div class="container">
	 		<div class="row">
	 			<h3>Registration Complete.</h3>
	 		</div><!-- /row -->
	 	</div> <!-- /container -->
	 </div><!-- /blue -->
	 <div class="container">
	 	<div class="row">
	 		<div class="jumbotron">
	 			<div class="alert alert-success">
		 			<h2 style="text-align: center;">
		 				<i class="fa fa-info-circle fa-2x"></i> <br>
		 				Please verify your account from your E-mail. <br>
		 				<small>
		 					Please check your inbox for the Activation link to activate your
		 				</small>
		 			</h2>	 				
	 			</div>
	 		</div>
	 	</div>
	 </div>
	<br>
@endsection