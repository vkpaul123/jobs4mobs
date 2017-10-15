@extends('Employer.auth.layouts.app')
@section('title', 'Register')

@section('body')


<div class="login-box-body">
	<p class="login-box-msg"><b>Register</b> as New <span style="color: gold; font-weight: bold;">Employer</span>...</p>

	<form action="{{ route('employer.register') }}" method="post">

	{{ csrf_field() }}
		<div class="form-group has-feedback{{ $errors->has('companyname') ? ' has-error' : '' }}">
			<input type="text" name="companyname" class="form-control" placeholder="Company Name" value="{{ old('companyname') }}" required autofocus>
			<span class="glyphicon glyphicon-user form-control-feedback"></span>
			@if ($errors->has('companyname'))
			<span class="help-block">
				<strong>{{ $errors->first('companyname') }}</strong>
			</span>
			@endif
		</div>
		<div class="form-group has-feedback{{ $errors->has('firstname') ? ' has-error' : '' }}">
			<input type="text" name="firstname" class="form-control" placeholder="First Name" value="{{ old('firstname') }}" required autofocus>
			<span class="glyphicon glyphicon-user form-control-feedback"></span>
			@if ($errors->has('firstname'))
			<span class="help-block">
				<strong>{{ $errors->first('firstname') }}</strong>
			</span>
			@endif
		</div>
		<div class="form-group has-feedback{{ $errors->has('lastname') ? ' has-error' : '' }}">
			<input type="text" name="lastname" class="form-control" placeholder="Last Name" value="{{ old('lastname') }}" required autofocus>
			<span class="glyphicon glyphicon-user form-control-feedback"></span>
			@if ($errors->has('lastname'))
			<span class="help-block">
				<strong>{{ $errors->first('lastname') }}</strong>
			</span>
			@endif
		</div>
		<div class="form-group has-feedback{{ $errors->has('email') ? ' has-error' : '' }}">
			<input type="email" name="email" class="form-control" placeholder="Email" value="{{ old('email') }}" required autofocus>
			<span class="glyphicon glyphicon-envelope form-control-feedback"></span>
			@if ($errors->has('email'))
			<span class="help-block">
				<strong>{{ $errors->first('email') }}</strong>
			</span>
			@endif
		</div>
		<div class="form-group has-feedback{{ $errors->has('password') ? ' has-error' : '' }}">
			<input type="password" class="form-control" placeholder="Password" name="password" required>
			<span class="glyphicon glyphicon-lock form-control-feedback"></span>
			@if ($errors->has('password'))
			<span class="help-block">
				<strong>{{ $errors->first('password') }}</strong>
			</span>
			@endif
		</div>
		<div class="form-group has-feedback">
			<input type="password" class="form-control" id="password-confirm" placeholder="Confirm Password" name="password_confirmation" required>
			<span class="glyphicon glyphicon-lock form-control-feedback"></span>
		</div>
		
		<div class="row">
			<div class="col-xs-4 pull-right">
				<button type="submit" class="btn btn-primary btn-block">Register</button>
			</div>
			<!-- /.col -->
		</div>
	</form>

	{{-- <div class="social-auth-links text-center">
		<p>- OR -</p>
		<a href="#" class="btn btn-block btn-social btn-facebook"><i class="fa fa-facebook"></i> Sign in using Facebook</a>
		<a href="#" class="btn btn-block btn-social btn-google"><i class="fa fa-google-plus"></i> Sign in using Google+</a>
		<a href="#" class="btn btn-block btn-social btn-twitter"><i class="fa fa-twitter"></i> Sign in using Twitter</a>
		<a href="#" class="btn btn-block btn-social btn-linkedin"><i class="fa fa-linkedin"></i> Sign in using LinkedIn</a>
	</div> --}}
	<!-- /.social-auth-links -->

</div>
<!-- /.login-box-body -->

@endsection