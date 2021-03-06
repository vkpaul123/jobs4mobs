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
		<span style="color:#367fa9;"><b>JobSeeker</b> </span> Profile Registration
		<small>Set up your Profile</small>
	</h1>
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
		<li class="active">Register Your Skills</li>
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

			<form action="{{ route('skills.store') }}" method="post" class="form-horizontal">
				{{csrf_field()}}

				<div class="form-group{{ $errors->has('skillName') ? ' has-error' : '' }}">
					<label for="skillName" class="col-md-3 control-label">Skill Name</label>
					<div class="col-md-6">
						<input type="text" class="form-control pull-right" id="skillName" name="skillName" placeholder="Skill Name" value="{{ old('skillName') }}">
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

				<div class="form-group{{ $errors->has('proficiencyLevel') ? ' has-error' : '' }}">
					<label for="proficiencyLevel" class="col-md-3 control-label">Proficiency Level</label>
					<div class="col-md-6">
						<input type="text" class="form-control pull-right" id="proficiencyLevel" name="proficiencyLevel" placeholder="Proficiency Level" value="{{ old('proficiencyLevel') }}">
					</div>
				</div>

				<hr>
				<input type="hidden" name="jobseeker_profiles_id" id="jobseeker_profiles_id" value="{{ $id }}">
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
		@forelse($skills as $skill)
		<div class="row">
			<div class="col-md-11">
				<div class="box box-default collapsed-box">
					<div class="box-header with-border">
						<h3 class="box-title" id="qualificationTextShow">{{ $skill->skillName }}</h3>

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
									@if($jobcategory->id == $skill->jobCategoryId)
									{{ $jobcategory->name }}
									@endif
									@endforeach
								</div>
								<div class="col-md-5" id="academyNameShow">
									{{ $skill->proficiencyLevel }}
								</div>
								<div class="col-md-2">
									<a href="{{ route('skills.edit', $skill->id) }}"><span class="glyphicon glyphicon-edit"></span></a> | <a href="#" onclick="
									if(confirm('Are You Sure, you want to delete this record?')) {
										event.preventDefault();
										document.getElementById('delete-experience-{{ $skill->id }}').submit();
									}
									else {
										event.preventDefault();
									}
									"><span class="glyphicon glyphicon-trash"></span></a>

									<form method="post" id="delete-experience-{{ $skill->id }}" action="{{ route('skills.destroy', $skill->id) }}" style="display: none;">
										{{ csrf_field() }}
										{{ method_field('DELETE') }}
									</form>
								</div>
							</div>
						</div>
					</div>
					<!-- /.box-body -->
				</div>
			</div>
		</div>
		@empty
		<div class="row">
			<div class="col-md-11">
				<div class="jumbotron">
					<center>
						<h4><span class="fa fa-exclamation-triangle"></span> &nbsp <span class="text-danger">You Don't have any Skills Details.<br><small>Please add your skills details.</small></span></h4>
					</center>
				</div>
			</div>
		</div>
		@endforelse

		<div class="row">
			<div class="col-md-offset-7 col-md-4">
				<a href="{{ route('resume.show', $id) }}"><button type="button" class="btn btn-success btn-block pull-right btn-lg"><strong>Done</strong></button></a>
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

	$("#jobCategoryId").val("{{ old('jobCategoryId') }}").trigger('change');

	$('.select2').select2({
		placeholder: "Select…"
	})
</script>

@endsection