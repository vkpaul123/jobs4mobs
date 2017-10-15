@extends('Admin.auth.layouts.app')
@section('title', 'Register')

@section('body')

<div class="login-logo">
	<a href="/"><img src="{{ asset('assets/staticImages/Logos/Logo_Main.png') }}" height="80"></a>
</div>
<!-- /.login-logo -->

<div class="login-box-body">
	<p class="login-box-msg"><b>Register</b> as New <span style="color: #d73925; font-weight: bold;">Admin</span>...</p>

	<form action="{{ route('admin.register') }}" method="post">

	{{ csrf_field() }}
		<div class="form-group has-feedback{{ $errors->has('name') ? ' has-error' : '' }}">
			<input type="text" name="name" class="form-control" placeholder="Name" value="{{ old('name') }}" required autofocus>
			<span class="glyphicon glyphicon-user form-control-feedback"></span>
			@if ($errors->has('name'))
			<span class="help-block">
				<strong>{{ $errors->first('name') }}</strong>
			</span>
			@endif
		</div>
		<div class="form-group has-feedback{{ $errors->has('phoneNo') ? ' has-error' : '' }}">
			<input type="text" name="phoneNo" class="form-control" placeholder="Phone Number" value="{{ old('phoneNo') }}" required autofocus>
			<span class="glyphicon glyphicon-phone form-control-feedback"></span>
			@if ($errors->has('phoneNo'))
			<span class="help-block">
				<strong>{{ $errors->first('phoneNo') }}</strong>
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