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
		<span style="color:#367fa9;"><b>Employer</b> </span> Vacancy Search Results
		<small>View Vacancy Search Results</small>
	</h1>
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
		<li class="active">Vacancy Search Results</li>
	</ol>
</section>

<!-- Main content -->
<section class="content">

<hr>

<div class="box">
	<div class="box-header with-border">
		<h3 class="box-title"><strong><span style="color: #367fa9;">Nvidia</span></strong></h3>

		<div class="box-tools pull-right">
			<button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
			title="Collapse">
			<i class="fa fa-minus"></i></button>
		</div>
	</div>

	<div class="box-body">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-12">
					<h5><strong>Systems Developer</strong></h5>
					<div class="row">
						<div class="col-md-10">
							<table>
								<tr>
									<th>
										<i class="fa fa-graduation-cap"></i> &nbsp
									</th>
									<td>
										&nbsp BCA &nbsp
										&nbsp MCA &nbsp
										&nbsp B.Sc. &nbsp
									</td>
								</tr>
	
								<tr>
									<th>
										<i class="fa fa-black-tie"></i> &nbsp
									</th>
									<td>
										&nbsp PHP &nbsp
										&nbsp Laravel &nbsp
										&nbsp C &nbsp 
										&nbsp Java &nbsp 
									</td>
								</tr>
							</table>
						</div>

						<div class="col-md-2">
							<button class="btn btn-primary btn-block"><b class="glyphicon glyphicon-copy"></b> <strong>View</strong></button>
						</div>
					</div>

				</div>
			</div>
		</div>
	</div>

	<div class="box-footer">
		<div class="container">
			<div class="row">
				<div class="col-md-3">
					<b class="glyphicon glyphicon-map-marker"></b> <strong>&nbsp Pune</strong>					
				</div>
				<div class="col-md-3">
					<b class="fa fa-calendar"></b> <strong>&nbsp Last Date: &nbsp</strong><span class="text-danger">19 Aug 2017</span>	
				</div>
				<div class="col-md-3">
					<b class="fa fa-briefcase"></b> &nbsp 2 Years
				</div>
				<div class="col-md-3">
					
					<b class="fa fa-clock-o"></b> &nbsp 3 Days ago
				</div>
			</div>
		</div>
	</div>

</div>

<div class="box">
	<div class="box-header with-border">
		<h3 class="box-title"><strong><span style="color: #367fa9;">Nvidia</span></strong></h3>

		<div class="box-tools pull-right">
			<button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
			title="Collapse">
			<i class="fa fa-minus"></i></button>
		</div>
	</div>

	<div class="box-body">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-12">
					<h5><strong>Systems Developer</strong></h5>
					<div class="row">
						<div class="col-md-10">
							<table>
								<tr>
									<th>
										<i class="fa fa-graduation-cap"></i> &nbsp
									</th>
									<td>
										&nbsp BCA &nbsp
										&nbsp MCA &nbsp
										&nbsp B.Sc. &nbsp
									</td>
								</tr>
	
								<tr>
									<th>
										<i class="fa fa-black-tie"></i> &nbsp
									</th>
									<td>
										&nbsp PHP &nbsp
										&nbsp Laravel &nbsp
										&nbsp C &nbsp 
										&nbsp Java &nbsp 
									</td>
								</tr>
							</table>
						</div>

						<div class="col-md-2">
							<button class="btn btn-primary btn-block"><b class="glyphicon glyphicon-copy"></b> <strong>View</strong></button>
						</div>
					</div>

				</div>
			</div>
		</div>
	</div>

	<div class="box-footer">
		<div class="container">
			<div class="row">
				<div class="col-md-3">
					<b class="glyphicon glyphicon-map-marker"></b> <strong>&nbsp Pune</strong>					
				</div>
				<div class="col-md-3">
					<b class="fa fa-calendar"></b> <strong>&nbsp Start Date: &nbsp</strong><span class="text-danger">19 Aug 2016</span>	
				</div>
				<div class="col-md-3">
					<b class="fa fa-calendar"></b> <strong>&nbsp End Date: &nbsp</strong><span class="text-danger">19 Aug 2017</span>	
				</div>
				<div class="col-md-3">
					<b class="fa fa-briefcase"></b> &nbsp 2 Years
				</div>
				<div class="col-md-3">
					
					<b class="fa fa-clock-o"></b> &nbsp 3 Days ago
				</div>
			</div>
		</div>
	</div>

</div>

<div class="box">
	<div class="box-header with-border">
		<h3 class="box-title"><strong><span style="color: #367fa9;">Nvidia</span></strong></h3>

		<div class="box-tools pull-right">
			<button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
			title="Collapse">
			<i class="fa fa-minus"></i></button>
		</div>
	</div>

	<div class="box-body">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-12">
					<h5><strong>Systems Developer</strong></h5>
					<div class="row">
						<div class="col-md-10">
							<table>
								<tr>
									<th>
										<i class="fa fa-graduation-cap"></i> &nbsp
									</th>
									<td>
										&nbsp BCA &nbsp
										&nbsp MCA &nbsp
										&nbsp B.Sc. &nbsp
									</td>
								</tr>
	
								<tr>
									<th>
										<i class="fa fa-black-tie"></i> &nbsp
									</th>
									<td>
										&nbsp PHP &nbsp
										&nbsp Laravel &nbsp
										&nbsp C &nbsp 
										&nbsp Java &nbsp 
									</td>
								</tr>
							</table>
						</div>

						<div class="col-md-2">
							<button class="btn btn-primary btn-block"><b class="glyphicon glyphicon-copy"></b> <strong>View</strong></button>
						</div>
					</div>

				</div>
			</div>
		</div>
	</div>

	<div class="box-footer">
		<div class="container">
			<div class="row">
				<div class="col-md-3">
					<b class="glyphicon glyphicon-map-marker"></b> <strong>&nbsp Pune</strong>					
				</div>
				<div class="col-md-3">
					<b class="fa fa-calendar"></b> <strong>&nbsp Start Date: &nbsp</strong><span class="text-danger">19 Aug 2016</span>	
				</div>
				<div class="col-md-3">
					<b class="fa fa-calendar"></b> <strong>&nbsp End Date: &nbsp</strong><span class="text-danger">19 Aug 2017</span>	
				</div>
				<div class="col-md-3">
					<b class="fa fa-briefcase"></b> &nbsp 2 Years
				</div>
				<div class="col-md-3">
					
					<b class="fa fa-clock-o"></b> &nbsp 3 Days ago
				</div>
			</div>
		</div>
	</div>

</div>

<div class="box">
	<div class="box-header with-border">
		<h3 class="box-title"><strong><span style="color: #367fa9;">Nvidia</span></strong></h3>

		<div class="box-tools pull-right">
			<button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
			title="Collapse">
			<i class="fa fa-minus"></i></button>
		</div>
	</div>

	<div class="box-body">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-12">
					<h5><strong>Systems Developer</strong></h5>
					<div class="row">
						<div class="col-md-10">
							<table>
								<tr>
									<th>
										<i class="fa fa-graduation-cap"></i> &nbsp
									</th>
									<td>
										&nbsp BCA &nbsp
										&nbsp MCA &nbsp
										&nbsp B.Sc. &nbsp
									</td>
								</tr>
	
								<tr>
									<th>
										<i class="fa fa-black-tie"></i> &nbsp
									</th>
									<td>
										&nbsp PHP &nbsp
										&nbsp Laravel &nbsp
										&nbsp C &nbsp 
										&nbsp Java &nbsp 
									</td>
								</tr>
							</table>
						</div>

						<div class="col-md-2">
							<button class="btn btn-primary btn-block"><b class="glyphicon glyphicon-copy"></b> <strong>View</strong></button>
						</div>
					</div>

				</div>
			</div>
		</div>
	</div>

	<div class="box-footer">
		<div class="container">
			<div class="row">
				<div class="col-md-3">
					<b class="glyphicon glyphicon-map-marker"></b> <strong>&nbsp Pune</strong>					
				</div>
				<div class="col-md-3">
					<b class="fa fa-calendar"></b> <strong>&nbsp Start Date: &nbsp</strong><span class="text-danger">19 Aug 2016</span>	
				</div>
				<div class="col-md-3">
					<b class="fa fa-calendar"></b> <strong>&nbsp End Date: &nbsp</strong><span class="text-danger">19 Aug 2017</span>	
				</div>
				<div class="col-md-3">
					<b class="fa fa-briefcase"></b> &nbsp 2 Years
				</div>
				<div class="col-md-3">
					
					<b class="fa fa-clock-o"></b> &nbsp 3 Days ago
				</div>
			</div>
		</div>
	</div>

</div>

</section>
<!-- /.content -->

@endsection

@section('extraPageSpecificLoadScriptsContent')

<script src="{{ asset('assets/userPage/bower_components/select2/dist/js/select2.full.min.js')}}"></script>

<script>
	$('#dateOfBirth').datepicker({
		autoclose: true
	})
	$('#location').select2({
		placeholder: "Location…"
	})
	$('#experience').select2({
		placeholder: "Experience…"
	})
</script>

@endsectio