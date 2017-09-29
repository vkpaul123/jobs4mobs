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
		<span style="color:#d73925;"><b>Admin</b> </span> Employer Search Results
		<small>View Employer Search Results</small>
	</h1>
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
		<li class="active">Employer Search Results</li>
	</ol>
</section>

<!-- Main content -->
<section class="content">

	<div class="box box-warning">
		<div class="box-body">
			<div class="container-fluid">
				<div class="row">
					<form action="" method="post" class="form-horizontal">
						{{csrf_field()}}
						<div class="form-group">
							<div class="col-md-12">
								<div class="row">
									<div class="col-md-4">
										<input type="text" id="jobType" name="jobType" class="form-control" placeholder="Job Type">
									</div>

									<div class="col-md-3">
										<select style="width: 100%;" class="select2 form-control" id="location" name="location">
											<option value="">Location…</option>

								{{-- @foreach($jobcategories as $jobcategory)
								
								<option value="{{ $jobcategory->id }}">{{ $jobcategory->name }}</option>

								@endforeach --}}

										</select>	
									</div>
						
									<div class="col-md-3">
										<select style="width: 100%;" class="select2 form-control" id="experience" name="experience">
											<option value="">Experience…</option>

											{{-- @foreach($jobcategories as $jobcategory)
											
											<option value="{{ $jobcategory->id }}">{{ $jobcategory->name }}</option>

											@endforeach --}}

										</select>	
									</div>
						
									<div class="col-lg-2 pull-right">
										<button type="submit" class="form-control btn btn-info"><i class="fa fa-search"></i> &nbsp <strong>Search</strong></button>
									</div>
								</div>
							</div>
						</div>

			{{-- end form --}}
		</form>
	</div>
</div>
</div>
</div>

<hr>

<div class="box">
	<div class="box-header with-border">
		<h3 class="box-title"><strong><span style="color: #e08e0b;">Nvidia</span></strong></h3>

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
					<div class="row">
						<div class="col-md-10">
							<table>
								<tr>
									<th>
										Company Type &nbsp
									</th>
									<td>
										Recruiter
									</td>
								</tr>
	
								<tr>
									<th>
										Company Category &nbsp
									</th>
									<td>
										MNC
									</td>
								</tr>
								
								<tr>
									<th>
										Industry Type &nbsp
									</th>
									<td>
										Computer Graphics
									</td>
								</tr>
														
							</table>
						</div>

						<div class="col-md-2">
							<a href="">
								<button class="btn btn-warning btn-block"><strong>View Profile</strong></button>
							</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="box">
	<div class="box-header with-border">
		<h3 class="box-title"><strong><span style="color: #e08e0b;">Nvidia</span></strong></h3>

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
					<div class="row">
						<div class="col-md-10">
							<table>
								<tr>
									<th>
										Company Type &nbsp
									</th>
									<td>
										Recruiter
									</td>
								</tr>
	
								<tr>
									<th>
										Company Category &nbsp
									</th>
									<td>
										MNC
									</td>
								</tr>
								
								<tr>
									<th>
										Industry Type &nbsp
									</th>
									<td>
										Computer Graphics
									</td>
								</tr>
														
							</table>
						</div>

						<div class="col-md-2">
							<a href="">
								<button class="btn btn-warning btn-block"><strong>View Profile</strong></button>
							</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="box">
	<div class="box-header with-border">
		<h3 class="box-title"><strong><span style="color: #e08e0b;">Nvidia</span></strong></h3>

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
					<div class="row">
						<div class="col-md-10">
							<table>
								<tr>
									<th>
										Company Type &nbsp
									</th>
									<td>
										Recruiter
									</td>
								</tr>
	
								<tr>
									<th>
										Company Category &nbsp
									</th>
									<td>
										MNC
									</td>
								</tr>
								
								<tr>
									<th>
										Industry Type &nbsp
									</th>
									<td>
										Computer Graphics
									</td>
								</tr>
														
							</table>
						</div>

						<div class="col-md-2">
							<a href="">
								<button class="btn btn-warning btn-block"><strong>View Profile</strong></button>
							</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="box">
	<div class="box-header with-border">
		<h3 class="box-title"><strong><span style="color: #e08e0b;">Nvidia</span></strong></h3>

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
					<div class="row">
						<div class="col-md-10">
							<table>
								<tr>
									<th>
										Company Type &nbsp
									</th>
									<td>
										Recruiter
									</td>
								</tr>
	
								<tr>
									<th>
										Company Category &nbsp
									</th>
									<td>
										MNC
									</td>
								</tr>
								
								<tr>
									<th>
										Industry Type &nbsp
									</th>
									<td>
										Computer Graphics
									</td>
								</tr>
														
							</table>
						</div>

						<div class="col-md-2">
							<a href="">
								<button class="btn btn-warning btn-block"><strong>View Profile</strong></button>
							</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="box">
	<div class="box-header with-border">
		<h3 class="box-title"><strong><span style="color: #e08e0b;">Nvidia</span></strong></h3>

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
					<div class="row">
						<div class="col-md-10">
							<table>
								<tr>
									<th>
										Company Type &nbsp
									</th>
									<td>
										Recruiter
									</td>
								</tr>
	
								<tr>
									<th>
										Company Category &nbsp
									</th>
									<td>
										MNC
									</td>
								</tr>
								
								<tr>
									<th>
										Industry Type &nbsp
									</th>
									<td>
										Computer Graphics
									</td>
								</tr>
														
							</table>
						</div>

						<div class="col-md-2">
							<a href="">
								<button class="btn btn-warning btn-block"><strong>View Profile</strong></button>
							</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="box">
	<div class="box-header with-border">
		<h3 class="box-title"><strong><span style="color: #e08e0b;">Nvidia</span></strong></h3>

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
					<div class="row">
						<div class="col-md-10">
							<table>
								<tr>
									<th>
										Company Type &nbsp
									</th>
									<td>
										Recruiter
									</td>
								</tr>
	
								<tr>
									<th>
										Company Category &nbsp
									</th>
									<td>
										MNC
									</td>
								</tr>
								
								<tr>
									<th>
										Industry Type &nbsp
									</th>
									<td>
										Computer Graphics
									</td>
								</tr>
														
							</table>
						</div>

						<div class="col-md-2">
							<a href="">
								<button class="btn btn-warning btn-block"><strong>View Profile</strong></button>
							</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="box">
	<div class="box-header with-border">
		<h3 class="box-title"><strong><span style="color: #e08e0b;">Nvidia</span></strong></h3>

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
					<div class="row">
						<div class="col-md-10">
							<table>
								<tr>
									<th>
										Company Type &nbsp
									</th>
									<td>
										Recruiter
									</td>
								</tr>
	
								<tr>
									<th>
										Company Category &nbsp
									</th>
									<td>
										MNC
									</td>
								</tr>
								
								<tr>
									<th>
										Industry Type &nbsp
									</th>
									<td>
										Computer Graphics
									</td>
								</tr>
														
							</table>
						</div>

						<div class="col-md-2">
							<a href="">
								<button class="btn btn-warning btn-block"><strong>View Profile</strong></button>
							</a>
						</div>
					</div>
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

@endsection