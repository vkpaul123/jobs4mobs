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
		<span style="color:#e08e0b;"><b>Employer</b> </span> Vacancy Skills Edit
		<small>edit preferred Skill</small>
	</h1>
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
		<li class="active">Vacancy Skills Edit</li>
	</ol>
</section>

<!-- Main content -->
<section class="content">

	<!-- Default box -->
	<div class="box">
		<div class="box-header with-border">
			<h3 class="box-title"><b>Skills Details</b></h3>
		</div>

		<div class="box-body">

		@if(count($errors) > 0)
			<center>
				<p class="alert alert-danger">
					<strong>
						You Have Errors while submitting. Please Fill up the information in the Fields that are Highlighted in Red.
					</strong>
				</p>
			</center>
		@endif

			<form action="{{ route('vacancySkills.update', $skillsEdit->id) }}" method="post" class="form-horizontal">
				{{csrf_field()}}
				{{method_field('PUT')}}

				<div class="form-group{{ $errors->has('skillName') ? ' has-error' : '' }}">
					<label for="skillName" class="col-md-3 control-label">Skill Name</label>
					<div class="col-md-6">
						<input type="text" class="form-control pull-right" id="skillName" name="skillName" placeholder="Skill Name" value="{{ $skillsEdit->skillName }}">
					</div>
				</div>

				<div class="form-group{{ $errors->has('jobCategoryId') ? ' has-error' : '' }}">
					<label for="jobCategoryId" class="col-md-3 control-label">Skill Category</label>
					<div class="col-md-6">
						<select style="width: 100%;" class="select2 form-control" id="jobCategoryId" name="jobCategoryId">
							<option value="">Choose an industry…</option>

							@foreach($jobcategories as $jobcategory)
							
							<option value="{{ $jobcategory->id }}">{{ $jobcategory->name }}</option>

							@endforeach

						</select>	
					</div>
				</div>

				<hr>
				<div class="form-group">
					<div class="col-md-offset-5 col-md-2">
						<button type="submit" class="btn btn-primary btn-block pull-right"><strong>Submit</strong></button>
					</div>
				</div>

				
				{{-- end form --}}
			</form>
		</div>
	</div>
	<!-- /.box -->

	{{-- Entered Detials --}}
	<h4>Details Entered</h4>

	<div class="container">
		<div class="row">
			<div class="col-md-11">
				<div class="box box-default">
					<div class="box-header with-border">
						<h3 class="box-title" id="qualificationTextShow">{{ $skillsEdit->skillName }}</h3>

						<div class="box-tools pull-right">
							<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
							</button>
						</div>
						<!-- /.box-tools -->
					</div>
					<!-- /.box-header -->
					<div class="box-body">
						<div class="container">
							<div class="row">
								<div class="col-md-5" id="boardNameShow">
									@foreach($jobcategories as $jobcategory)
										@if($jobcategory->id == $skillsEdit->jobCategoryId)
											{{ $jobcategory->name }}
										@endif
									@endforeach
								</div>
							</div>
						</div>
					</div>
					<!-- /.box-body -->
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-md-offset-7 col-md-4">
				<a href="{{ route('vacancy.show', $skillsEdit->id) }}"><button type="button" class="btn btn-success btn-block pull-right btn-lg"><strong>Done</strong></button></a>
			</div>
		</div>
	</div>
	
	
	{{-- Dummy --}}


	{{-- @endforeach --}}


	

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

	$("#jobCategoryId").val("{{ $skillsEdit->jobCategoryId }}").trigger('change');
</script>

@endsection