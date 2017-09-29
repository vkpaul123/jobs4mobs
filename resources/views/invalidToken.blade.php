@extends('WelcomePage.layouts.app')
@section('title', 'About')

@section('select_HOME', '')
@section('select_ABOUT', 'class=active')
@section('select_CONTACT', '')

@section('body')
	<!-- *****************************************************************************************************************
	 BLUE WRAP
	 ***************************************************************************************************************** -->
	 <div id="red">
	 	<div class="container">
	 		<div class="row">
	 			<h3>An Error Occoured!</h3>
	 		</div><!-- /row -->
	 	</div> <!-- /container -->
	 </div><!-- /blue -->
	 <div class="container">
	 	<div class="row">
	 		<div class="jumbotron">
	 			<div class="alert alert-danger">
		 			<h2 style="text-align: center;">
		 				<i class="fa fa-times-circle fa-2x"></i> <br>
		 				The User you requested for not Found! <br>
		 				<small>
		 					Invalid Email or Token used.
		 				</small>
		 			</h2>	 				
	 			</div>
	 		</div>
	 	</div>
	 </div>
	<br>
@endsection