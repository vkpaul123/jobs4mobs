<!DOCTYPE html>
<html lang="en">
<head>
	@include('JobSeeker.homepage.layouts.headcontent')
</head>
<body class="hold-transition skin-blue sidebar-mini" @yield('startBodyScripts')>
	<div class="wrapper">
		@include('JobSeeker.homepage.layouts.header')

		@include('JobSeeker.homepage.layouts.sidebar')

		<div class="content-wrapper">
			@section('body')
				@show
		</div>
		@include('JobSeeker.homepage.layouts.footer')
	</div>
	@include('JobSeeker.homepage.layouts.loadscripts')
</body>
</html>