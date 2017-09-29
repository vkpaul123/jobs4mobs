<!DOCTYPE html>
<html lang="en">
<head>
	@include('Admin.homepage.layouts.headcontent')
</head>
<body class="hold-transition skin-red sidebar-mini">
	<div class="wrapper">
		@include('Admin.homepage.layouts.header')

		@include('Admin.homepage.layouts.sidebar')

		<div class="content-wrapper">
			@section('body')
				@show
		</div>
		@include('Admin.homepage.layouts.footer')
	</div>
	@include('Admin.homepage.layouts.loadscripts')
</body>
</html>