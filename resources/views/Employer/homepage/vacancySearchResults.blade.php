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
		<span style="color:#e08e0b;"><b>Employer</b> </span> Vacancy
		<small>View All Vacancies</small>
	</h1>
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
		<li class="active">Vacancy</li>
	</ol>
</section>

<!-- Main content -->
<section class="content">

@forelse($vacancies as $vacancy)

<div class="box {{ $vacancy->vacancyStatus ? '' : ' collapsed-box' }}">
	<div class="box-header with-border">
		<h3 class="box-title">
			<strong class="text-aqua">{{ $vacancy->id }}</strong>&nbsp &nbsp &nbsp<strong><span style="color: #e08e0b;">{{ $vacancy->jobdesignation }} &nbsp</span><small>{{ $vacancy->jobSpecification }}</small></strong></h3>

		<div class="box-tools pull-right">
			@if($vacancy->vacancyStatus)
				<strong class="text-green"><i class="fa fa-check"></i>&nbsp Active</strong>
			@else
				<strong class="text-red"><i class="fa fa-close"></i>&nbsp Inactive</strong>
			@endif

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
						<div class="col-md-3">
							<table>
								<tr>
									<th>
										<i class="fa fa-graduation-cap"></i> &nbsp
									</th>
									<td>
										&nbsp {{ $vacancy->preferedednlevel }}
									</td>
								</tr>
	
								<tr>
									<th>
										<i class="fa fa-briefcase"></i> &nbsp
									</th>
									<td>
										&nbsp {{ $vacancy->preferedworkexp }}
									</td>
								</tr>

								<tr>
									<th>
										<i class="fa fa-users"></i> &nbsp
									</th>
									<td>
										&nbsp
										{{ $vacancy->noOfVacancies }}
									</td>
								</tr>
							</table>
						</div>
						<div class="col-md-7">
							<p>{{ $vacancy->jobDescription }}</p>
						</div>
						<div class="col-md-2">
							<a href="{{ route('vacancy.show', $vacancy->id) }}">
								<button class="btn btn-warning btn-block"><b class="glyphicon glyphicon-copy"></b> <strong>View</strong></button>
							</a>
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
					<b class="fa fa-clipboard"></b> <strong class="text-yellow">
					&nbsp 
					@if($vacancy->testrequired)
						Test Required
					@else
						N/A
					@endif
					</strong>					
				</div>
				<div class="col-md-3">
					<b class="fa fa-calendar-check-o"></b> <strong>&nbsp Opening Date: &nbsp</strong><span class="text-success">{{ $vacancy->openingDate }}</span>	
				</div>
				<div class="col-md-3">
					<b class="fa fa-calendar-times-o"></b> <strong>&nbsp Closing Date: &nbsp</strong><span class="text-danger">{{ $vacancy->closingDate }}</span>	
				</div>
				<div class="col-md-3">
					
					<b class="fa fa-clock-o"></b> &nbsp {{ $vacancy->updated_at->diffForHumans() }}
				</div>
			</div>
		</div>
	</div>

</div>

@empty
	<div class="box">
		<div class="box-body">
			<div class="container-fluid">
				<div class="jumbotron">
					<center>
						<h4><span class="fa fa-exclamation-triangle"></span> &nbsp <span class="text-danger">You Don't have any Vacancies created.<br><small>Please Create a Vacancy.</small></span></h4>
					</center>
				</div>
			</div>
		</div>
	</div>
@endforelse

<div class="container">
	<div class="row">
		<div class="col-md-offset-7 col-md-4">
			<a href="{{ route('vacancy.create') }}"><button type="button" class="btn btn-info btn-block pull-right btn-lg"><strong>Create New Vacancy</strong></button></a>
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