@extends('Admin.auth.layouts.app')
@section('title', 'Login')

@section('body')

<div class="login-logo">
	<a href="/"><img src="{{ asset('assets/staticImages/Logos/Logo_Main.png') }}" height="80"></a>
</div>
<!-- /.login-logo -->

<div class="login-box-body">
	<p class="login-box-msg"><b>Sign in</b> as <span style="color: #d73925; font-weight: bold;">Admin</span> to start your session...</p>

	<form action="{{ route('admin.login') }}" method="post">

	{{ csrf_field() }}

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
		<div class="row">
			<div class="col-xs-8">
				<div class="checkbox icheck">
					<label>
						<input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
					</label>
				</div>
			</div>
			<!-- /.col -->
			<div class="col-xs-4">
				<button type="submit" class="btn btn-danger btn-block">Sign In</button>
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
	</div>
	<!-- /.social-auth-links --> --}}

{{-- 	<a href="{{ route('admin.password.request') }}">I forgot my password</a><br>
	
	<div class="text-center">
		<p>- OR -</p>
		<a href="{{ route('admin.register') }}" class="text-center">
			<button class="btn btn-info">Register a new membership</button>
		</a>
	</div>
 --}}
</div>
<!-- /.login-box-body -->

@endsection