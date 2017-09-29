@extends('Admin.auth.layouts.app')
@section('title', 'Login')

@section('body')

<div class="login-logo">
	<a href="/"><img src="{{ asset('assets/staticImages/Logos/Logo_Main.png') }}" height="80"></a>
</div>
<!-- /.login-logo -->

<div class="login-box-body">
	<p class="login-box-msg">Enter your <b>New</b> Password...</p>

	@if (session('status'))
	<div class="alert alert-success">
		{{ session('status') }}
	</div>
	@endif

	<form action="{{ route('password.request') }}" method="post">

		{{ csrf_field() }}
		<input type="hidden" name="token" value="{{ $token }}">

		<div class="form-group has-feedback{{ $errors->has('email') ? ' has-error' : '' }}">
			<input type="email" name="email" class="form-control" placeholder="Email" value="{{ old('email') }}" required>
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
			@if ($errors->has('password_confirmation'))
                <span class="help-block">
                    <strong>{{ $errors->first('password_confirmation') }}</strong>
                </span>
            @endif
		</div>
		
		<div class="row">
			<div class="col-xs-8 pull-right">
				<button type="submit" class="btn btn-primary btn-block">Reset Password</button>
			</div>
			<!-- /.col -->
		</div>
	</form>
</div>
<!-- /.login-box-body -->

@endsection