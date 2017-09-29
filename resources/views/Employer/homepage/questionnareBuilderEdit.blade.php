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
		<span style="color:#e08e0b;"><b>Employer</b> </span> Questionnare Builder
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
								<span class="text-warning"><strong>Questionnare Builder</strong></span>
							</h1>
						</center>
					</div>
				</div>
				@if(count($errors) > 0)
					<center>
						<p class="alert alert-danger">
							<strong>
								You Have Errors while submitting. Please Fill up the information in the Fields that are Highlighted in Red.
							</strong>
						</p>
					</center>
				@endif
				<form action="{{ route('questionnareBuilder.update', $questionnare->id) }}" id="questionnareBuilderForm" method="post">
					{{ csrf_field() }}
					{{ method_field('PUT') }}
					<input type="hidden" name="employers_id" value="{{ Auth::user()->id }}">
					<input type="hidden" name="buildOrUpload" id="buildOrUpload" value="">
				<div class="row">
					<h4 class="text-warning"><strong>Questionnaire ID: &nbsp </strong>{{ $questionnare->id }}</h4>
					<hr>
					<br>
					<div class="form-group{{ $errors->has('job_category_id') ? ' has-error' : '' }}">
						<label for="job_category_id" class="col-md-offset-2 col-md-2 control-label">Industry Type<span class="text-red">*</span></label>
						<div class="col-md-6">
							<select style="width: 100%;" class="select2 form-control" id="job_category_id" name="job_category_id">
								<option value="">Choose an industry…</option>

								@foreach($jobcategories as $jobcategory)
								
								<option value="{{ $jobcategory->id }}">{{ $jobcategory->name }}</option>

								@endforeach

							</select>	
						</div>
					</div>
					<br><br>
					<div class="form-group">
						<div class="col-md-offset-5 col-md-2">
							<button type="submit" class="btn btn-primary btn-block pull-right"><strong>Submit</strong></button>
						</div>
					</div>
				</div>
				
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

	$("#job_category_id").val("{{ $questionnare->job_category_id }}").trigger('change');
</script>

<script>
	function quesBuild() {
		event.preventDefault();
		document.getElementById('buildOrUpload').value = "build";
		document.getElementById('questionnareBuilderForm').submit();
	}

	function quesUpload() {
		event.preventDefault();
		document.getElementById('buildOrUpload').value = "upload";
		document.getElementById('questionnareBuilderForm').submit();
	}
</script>

@endsection