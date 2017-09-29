@extends('Employer.homepage.layouts.app')
@section('title', 'Employers')

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
		<span style="color:#e08e0b;"><b>Employer</b> </span> Vacancy Search Results
		<small>View Vacancy Search Results</small>
	</h1>
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
		<li class="active">Vacancy Search Results</li>
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
									<div class="col-md-6">
										<input type="text" id="jobType" name="jobType" class="form-control" placeholder="Job Type">
									</div>


									<div class="col-md-4">
										<select style="width: 100%;" class="select2 form-control" id="experience" name="experience">
											<option value="">Experience…</option>



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
			<h3 class="box-title"><strong><span style="color: #e08e0b;">jason</span></strong></h3>

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
								<button class="btn btn-warning btn-block"><b class="glyphicon glyphicon-copy"></b> <strong>Approach</strong></button>
							</div>
						</div>

					</div>
				</div>
			</div>
		</div>


	</div>

	<div class="box">
		<div class="box-header with-border">
			<h3 class="box-title"><strong><span style="color: #e08e0b;">lolwa</span></strong></h3>

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
								<button class="btn btn-warning btn-block"><b class="glyphicon glyphicon-copy"></b> <strong>Approach</strong></button>
							</div>
						</div>

					</div>
				</div>
			</div>
		</div>


	</div>

	<div class="box">
		<div class="box-header with-border">
			<h3 class="box-title"><strong><span style="color: #e08e0b;">Bro</span></strong></h3>

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
								<button class="btn btn-warning btn-block"><b class="glyphicon glyphicon-copy"></b> <strong>Approach</strong></button>
							</div>
						</div>

					</div>
				</div>
			</div>
		</div>


	</div>

	<div class="box">
		<div class="box-header with-border">
			<h3 class="box-title"><strong><span style="color: #e08e0b;">Glasses</span></strong></h3>

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
								<button class="btn btn-warning btn-block"><b class="glyphicon glyphicon-copy"></b> <strong>Approach</strong>		</button>
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

	$('.select2').select2({
		placeholder: "Select Industry…"
	})
</script>

@endsection