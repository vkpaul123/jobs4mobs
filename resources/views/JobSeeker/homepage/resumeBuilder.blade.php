@extends('JobSeeker.homepage.layouts.app')
@section('title', 'JobSeekers')

@section('extraPageSpecificHeadContent')
<link rel="stylesheet" href="{{asset('assets/userPage/bower_components/select2/dist/css/select2.min.css')}}">

<style type="text/css">
	[class^='select2'] {
		border-radius: 0px !important;
	}

	.select2-container {
		padding: 0px;
		border-width: 0px;
	}
	.select2-container .select2-choice {
		height: 38px;
		line-height: 38px;
	}

	.select2-container.form-control {
		height: auto !important;
	}

	.form-control{
		-webkit-appearance:none;
		-moz-appearance: none;
		-ms-appearance: none;
		-o-appearance: none;
		appearance: none;
	}
</style>
@endsection

@section('body')
<!-- Content Header (Page header) -->
<section class="content-header">
	<h1>
		<span style="color:#367fa9;"><b>JobSeeker</b> </span> Resume Builder
		<small>Build Your Resume</small>
	</h1>
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
		<li class="active">Resume Builder</li>
	</ol>
</section>

<!-- Main content -->
<section class="content">

	<!-- Default box -->
	<div class="box">

		<div class="box-body">
			<br>
		
			<div class="container-fluid">
				<div class="row">
					<div class="jumbotron">
						<center>
							<h1>
								<img class="img img-responsive" src="{{ asset('assets/staticImages/Logos/Logo_Main.png') }}" alt="logo" width="400">
								<span class="text-primary"><strong>Resume Builder</strong></span>
							</h1>
						</center>
					</div>
				</div>
				<hr>
				<div class="row">
					<div class="col-md-4 col-md-offset-2">
						<div class="box box-primary">
							<div class="box-header">
								<center>
									<a href="/home/resumeBuilder/uploadResume"><button class="btn btn-block btn-primary btn-lg"><strong>Upload Existing</strong></button></a>
									
								</center>
							</div>
						</div>
					</div>
					<div class="col-md-4">
						<div class="box box-success">
							<div class="box-header">
								<center>
									<a href="/home/resumeBuilder/viewResume"><button class="btn btn-block btn-success btn-lg"><strong>Build New Resume</strong></button></a>
									
								</center>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

	</div>
<!-- /.box -->

</section>
<!-- /.content -->

@endsection



@section('extraPageSpecificLoadScriptsContent')

<script src="{{ asset('assets/userPage/bower_components/select2/dist/js/select2.full.min.js')}}"></script>

<script>
	$('#dateOfBirth').datepicker({
		autoclose: true
	})

	$('.select2').select2({
		placeholder: "Select…"
	})
</script>

@endsection