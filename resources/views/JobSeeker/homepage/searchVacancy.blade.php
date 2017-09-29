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
		<span style="color:#367fa9;"><b>JobSeeker</b> </span> Search Vacancy
		<small>look for an Vacancy</small>
	</h1>
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
		<li class="active">Search Vacancy</li>
	</ol>
</section>

<!-- Main content -->
<section class="content">

	<!-- Default box -->
	<div class="box container-fluid">

		<div class="box-body">
			<div class="row box-header">
				<center>
					<br>
					<img class="img img-responsive" src="{{ asset('assets/staticImages/Logos/Logo_Main.png') }}" alt="logo" width="400">
				</center>
				<br>
				<hr>
				<br>
			</div>
			<div class="row">
				<form action="" method="post" class="form-horizontal">
					{{csrf_field()}}
					<div class="form-group">
						<div class="col-md-12">
							<div class="row">
								<div class="col-md-6">
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
								</div>
							</div>
						</div>
						<hr>
						<div class="form-group">
							<div class="col-md-4 col-md-offset-4">
								<div class="">
									<button type="submit" class="form-control btn btn-primary pull-right"><i class="fa fa-search"></i> &nbsp <strong>Search</strong></button>
								</div>
							</div>
						</div>
						{{-- end form --}}
					</form>
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