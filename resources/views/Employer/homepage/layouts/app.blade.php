<!DOCTYPE html>
<html lang="en">
<head>
	@include('Employer.homepage.layouts.headcontent')
</head>
<body class="hold-transition skin-yellow sidebar-mini">
	<div class="wrapper">
		@include('Employer.homepage.layouts.header')

		@include('Employer.homepage.layouts.sidebar')

		<div class="content-wrapper">
			@section('body')
				@show
		</div>
		@include('Employer.homepage.layouts.footer')
	</div>
	@include('Employer.homepage.layouts.loadscripts')
</body>
</html>