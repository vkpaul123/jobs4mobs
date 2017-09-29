@extends('Admin.auth.layouts.app')
@section('title', 'Login')

@section('body')

<div class="login-logo">
	<a href="/"><img src="{{ asset('assets/staticImages/Logos/Logo_Main.png') }}" height="80"></a>
</div>
<!-- /.login-logo -->

<div class="login-box-body">
	<p class="login-box-msg">Enter your <b><span class="text-red">Admin</span> Email</b> to Reset your Password...</p>

	@if (session('status'))
	<div class="alert alert-success">
		{{ session('status') }}
	</div>
	@endif

	<form action="{{ route('password.email') }}" method="post">

	{{ csrf_field() }}

		<div class="form-group has-feedback{{ $errors->has('email') ? ' has-error' : '' }}">
			<input type="email" name="email" class="form-control" placeholder="Email" value="{{ old('email') }}" required>
			<span class="glyphicon glyphicon-envelope form-control-feedback"></span>
			@if ($errors->has('email'))
			<span class="help-block">
				<strong>{{ $errors->first('email') }}</strong>
			</span>
			@endif
		</div>
		
		<div class="row">
			<div class="col-xs-8 pull-right">
				<button type="submit" class="btn btn-primary btn-block">Send Password Reset Link</button>
			</div>
			<!-- /.col -->
		</div>
	</form>
</div>
<!-- /.login-box-body -->

@endsection