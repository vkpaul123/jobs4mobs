<!DOCTYPE html>
<html lang="en">
<head>
	@include('Employer.auth.layouts.headsection')
</head>
<body class="hold-transition login-page">
	<div class="login-box">
		<div class="login-logo">
			<a href="/employer"><img src="{{ asset('assets/staticImages/Logos/Logo_Main.png') }}" height="80"></a>
		</div>
		<!-- /.login-logo -->

	@section('body')
		@show
		
	</div>

	@include('Employer.auth.layouts.footersection')
</body>
</html>