@extends('Admin.homepage.layouts.app')
@section('title', 'Admins')

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
		<span style="color:#d73925;"><b>Admin</b> </span> Questionnare Builder
		<small>Build Your Questionnare</small>
	</h1>
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
		<li class="active">Questionnare Builder</li>
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
								<span class="text-danger"><strong>Questionnare Builder</strong></span>
							</h1>
						</center>
					</div>
				</div>
				<hr>
				<div class="row">
					<div class="col-md-4 col-md-offset-2">
						<div class="box box-danger">
							<div class="box-header">
								<center>
									<a href="/employer/home/tests/questionnareUpload"><button class="btn btn-block btn-danger btn-lg"><strong>Upload Existing</strong></button></a>
									
								</center>
							</div>
						</div>
					</div>
					<div class="col-md-4">
						<div class="box box-success">
							<div class="box-header">
								<center>
									<a href="/employer/home/tests/viewQuestions"><button class="btn btn-block btn-success btn-lg"><strong>Build New Questionnare</strong></button></a>
									
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