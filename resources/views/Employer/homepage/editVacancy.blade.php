@extends('Employer.homepage.layouts.app')
@section('title', 'Employers')

@section('extraPageSpecificHeadContent')
<link rel="stylesheet" href="{{asset('assets/userPage/bower_components/select2/dist/css/select2.min.css')}}">
<link rel="stylesheet" href="{{asset('assets/userPage/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css')}}">

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
		<span style="color:#e08e0b;"><b>Employer</b> </span> Edit Vacancy
		<small>Edit a Job Vacancy</small>
	</h1>
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
		<li class="active">Edit Vacancy</li>
	</ol>
</section>

<!-- Main content -->
<section class="content">

	<!-- Default box -->
	<div class="box">
		<div class="box-header with-border">
			<h3 class="box-title"><b>Job Vacancy</b></h3>
		</div>

		<div class="box-body">
		@if (Session::has('messageFail'))
			  <div class="alert alert-danger">{!! Session::get('messageFail') !!}
			    <button type="button" class="close" data-dismiss="alert"><i class="fa fa-times"></i></button>
			  </div>
			@endif
			@if (Session::has('messageSuccess'))
			  <div class="alert alert-success">{!! Session::get('messageSuccess') !!}
			    <button type="button" class="close" data-dismiss="alert"><i class="fa fa-times"></i></button>
			  </div>
			@endif
			@if(count($errors) > 0)
				<center>
					<div class="alert alert-danger">
						<button type="button" class="close" data-dismiss="alert"><i class="fa fa-times"></i></button>
						<strong>
							You Have Errors while submitting. Please Fill up the information in the Fields that are Highlighted in Red.
						</strong>
						<hr>
						@foreach ($errors->all() as $error)
							{{ $error }} <br>
						@endforeach
					</div>
				</center>
			@endif
		
			<form action="{{ route('vacancy.update', $vacancy->id) }}" method="post" class="form-horizontal">
				{{csrf_field()}}
				{{ method_field('PUT') }}
				
				<h4><span style="color: #e08e0b;">General Details</span></h4>

				<div class="form-group{{ $errors->has('jobcategoryId') ? ' has-error' : '' }}">
					<label for="jobcategoryId" class="col-md-3 control-label">Vacancy Job Category<span class="text-red">*</span></label>
					<div class="col-md-6">
						<select style="width: 100%;" class="select2 form-control" id="jobcategoryId" name="jobcategoryId">
							<option value="">Choose an industry…</option>

							@foreach($jobcategories as $jobcategory)
							
								<option value="{{ $jobcategory->id }}">{{ $jobcategory->name }}</option>

							@endforeach

						</select>	
					</div>
				</div>

				<div class="form-group{{ $errors->has('preferedworktype') ? ' has-error' : '' }}">
					<label for="preferedworktype" class="col-md-3 control-label">Prefered Commitment<span class="text-red">*</span></label>
					<div class="col-md-6">
						<select style="width: 100%;" class="select2 form-control" id="preferedworktype" name="preferedworktype">
							<option value="">Choose Commitment…</option>
							<option value="Full Time">Full Time</option>
							<option value="Part Time">Part Time</option>
							<option value="Any">Any</option>
						</select>	
					</div>
				</div>

				<div class="form-group{{ $errors->has('openingDate') ? ' has-error' : '' }}">
					<label for="openingDate" class="col-md-3 control-label">Opening Date<span class="text-red">*</span></label>
					<div class="col-md-6">
						<div class="input-group date">
							<input type="text" class="form-control pull-right" id="openingDate" name="openingDate" placeholder="MM/DD/YYYY" value="{{ $vacancy->openingDate }}">
							<div class="input-group-addon">
								<i class="fa fa-calendar"></i>
							</div>
						</div>
						<!-- /.input group -->
					</div>
				</div>

				<div class="form-group{{ $errors->has('closingDate') ? ' has-error' : '' }}">
					<label for="closingDate" class="col-md-3 control-label">Closing Date<span class="text-red">*</span></label>
					<div class="col-md-6">
						<div class="input-group date">
							<input type="text" class="form-control pull-right" id="closingDate" name="closingDate" placeholder="MM/DD/YYYY" value="{{ $vacancy->closingDate }}">
							<div class="input-group-addon">
								<i class="fa fa-calendar"></i>
							</div>
						</div>
						<!-- /.input group -->
					</div>
				</div>

				<hr>
				<h4><span style="color: #e08e0b;">Vacancy Preferences</span></h4>

				<div class="form-group{{ $errors->has('preferedednlevel') ? ' has-error' : '' }}">
					<label for="preferedednlevel" class="col-md-3 control-label">Prefered Educational Qualification<span class="text-red">*</span></label>
					<div class="col-md-6">
						<select style="width: 100%;" class="select2 form-control" id="preferedednlevel" name="preferedednlevel">
							<option value="">Choose Qualification…</option>
							<option value="Class 10">Class 10</option>
							<option value="Class 10+2">Class 10+2</option>
							<option value="Diploma">Diploma</option>
							<option value="Graduate">Graduate</option>
							<option value="Post-Graduate">Post-Graduate</option>
							<option value="PhD">PhD</option>
							<option value="Others">Others…</option>
						</select>	
					</div>
				</div>

				<div class="form-group{{ $errors->has('preferedworkexp') ? ' has-error' : '' }}">
					<label for="preferedworkexp" class="col-md-3 control-label">Prefered Experience<span class="text-red">*</span></label>
					<div class="col-md-6">
						<input type="text" maxlength="2" class="form-control pull-right" id="preferedworkexp" name="preferedworkexp" placeholder="Prefered Experience" min="0" value="{{ $vacancy->preferedworkexp }}">
					</div>
				</div>

				<div class="form-group{{ $errors->has('noOfVacancies') ? ' has-error' : '' }}">
					<label for="noOfVacancies" class="col-md-3 control-label">No of Vacancies<span class="text-red">*</span></label>
					<div class="col-md-6">
						<input type="text" maxlength="5" class="form-control pull-right" id="noOfVacancies" name="noOfVacancies" placeholder="No of Vacancies" min="0" value="{{ $vacancy->noOfVacancies }}">
					</div>
				</div>

				<div class="form-group{{ $errors->has('salary') ? ' has-error' : '' }}">
					<label for="salary" class="col-md-3 control-label">Salary<span class="text-red">*</span></label>
					<div class="col-md-6">
						<input type="text" maxlength="7" class="form-control pull-right" id="salary" name="salary" placeholder="Salary" min="0" value="{{ $vacancy->salary }}">
					</div> 
				</div>

				<hr>
				<h4><span style="color: #e08e0b;">Job Details</span></h4>

				<div class="form-group{{ $errors->has('jobdesignation') ? ' has-error' : '' }}">
					<label for="jobdesignation" class="col-md-3 control-label">Job Designation<span class="text-red">*</span></label>
					<div class="col-md-6">
						<input type="text" class="form-control pull-right" id="jobdesignation" name="jobdesignation" placeholder="Job Designation" value="{{ $vacancy->jobdesignation }}">
					</div>
				</div>
				
				<div class="form-group{{ $errors->has('jobSpecification') ? ' has-error' : '' }}">
					<label for="jobSpecification" class="col-md-3 control-label">Job Specification<span class="text-red">*</span></label>
					<div class="col-md-6">
						<input type="text" class="form-control pull-right" id="jobSpecification" name="jobSpecification" placeholder="Job Specification" value="{{ $vacancy->jobSpecification }}">
					</div>
				</div>

				<div class="form-group{{ $errors->has('jobDescription') ? ' has-error' : '' }}">
					<label for="jobDescription" class="col-md-3 control-label">Job Description<span class="text-red">*</span></label>
					<div class="col-md-6">
						<textarea class="form-control pull-right" id="jobDescription" name="jobDescription" placeholder="Job Description" rows="5">{{ $vacancy->jobDescription }}</textarea>
					</div>
				</div>

				<hr>
				<h4><span style="color: #e08e0b;">Screening Test</span></h4>
				
				<div class="">
					<p>Select if this Vacancy need a <strong>Screening Test</strong> to be conducted.</p>
					
				</div>
				<div class="checkbox icheck col-md-offset-3 col-md-6">
					<label>
						<input type="checkbox" name="testrequired"
						@if($vacancy->testrequired)
							checked
						@endif 
						> &nbsp Test Required
					</label>
				</div>
				<br>


				<hr>
				<h4><span style="color: #e08e0b;">Vacancy Description</span></h4>

				<div class="form-group box-body pad">
					{{-- <form> --}}
						<textarea class="textarea form-control" placeholder="Place some text here"
						style="width: 100%; height: 200px; font-family: Arial; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" name="vacancydescription" id="vacancydescription">{{ $vacancy->vacancydescription }}</textarea>
					{{-- </form> --}}
				</div>

				<hr>

				<div class="form-group{{ $errors->has('remember') ? ' has-error' : '' }}">
					<div class="col-xs-10 col-md-offset-4">
						<div class="checkbox icheck col-md-6">
							<label>
								<input type="checkbox" name="remember"> &nbsp The Information that is entered is correct!<span class="text-red">*</span>
							</label>
						</div>
					</div>
				</div>

				<div class="form-group">
					<div class="col-md-offset-5 col-md-2">
						<button type="submit" class="btn btn-warning btn-block pull-right">Submit</button>
					</div>
				</div>
				{{-- end form --}}
			</form>
		</div>

	<div class="box-footer">
		<span class="text-red"><strong>*</strong></span>Required Fields
	</div>
	</div>
	<!-- /.box -->

</section>
<!-- /.content -->

@endsection



@section('extraPageSpecificLoadScriptsContent')

<script src="{{ asset('assets/userPage/bower_components/select2/dist/js/select2.full.min.js')}}"></script>
<script src="{{ asset('assets/userPage/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js')}}"></script>

<script>
	$('#dateOfBirth').datepicker({
		autoclose: true
	})

	$('#openingDate').datepicker({
		autoclose: true,
		format: 'yyyy-mm-dd'
	})

	$('#closingDate').datepicker({
		autoclose: true,
		format: 'yyyy-mm-dd'
	})

	$('.select2').select2({
		placeholder: "Select…"
	})

	$("#jobcategoryId").val("{{ $vacancy->jobcategoryId }}").trigger('change');
	$("#preferedworktype").val("{{ $vacancy->preferedworktype }}").trigger('change');
	$("#preferedednlevel").val("{{ $vacancy->preferedednlevel }}").trigger('change');
</script>

@endsection