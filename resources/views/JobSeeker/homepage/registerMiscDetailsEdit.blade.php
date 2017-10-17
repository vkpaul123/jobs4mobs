@extends('JobSeeker.homepage.layouts.app')
@section('title', 'JobSeekers')


@section('body')
<!-- Content Header (Page header) -->
<section class="content-header">
	<h1>
		<span style="color:#367fa9;"><b>JobSeeker</b> </span> Miscellaneous Details Registration
		<small>Set up your Resume</small>
	</h1>
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
		<li class="active">Register Your Miscellaneous Details</li>
	</ol>
</section>

<!-- Main content -->
<section class="content">

	<!-- Default box -->
	<div class="box">

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

		<div class="box-header with-border">
			<h3 class="box-title"><b>Miscellaneous Details</b></h3>
		</div>

		<div class="box-body">
			<form action="{{ route('miscDetails.edit', $id) }}" method="post" class="form-horizontal">
				{{csrf_field()}}
				{{ method_field('PUT') }}

				<div class="form-group{{ $errors->has('projectsWorkedOn') ? ' has-error' : '' }}">
					<label for="projectsWorkedOn" class="col-md-3 control-label">Projects Worked on</label>
					<div class="col-md-6">
						<textarea class="form-control pull-right" id="projectsWorkedOn" name="projectsWorkedOn" placeholder="Projects" rows="5">{{ $jobseekerProfile->projectsWorkedOn }}</textarea>
					</div>
				</div>

				<div class="form-group{{ $errors->has('languagesSpoken') ? ' has-error' : '' }}">
					<label for="languagesSpoken" class="col-md-3 control-label">Languages Spoken<span class="text-red">*</span></label>
					<div class="col-md-6">
						<textarea class="form-control pull-right" id="languagesSpoken" name="languagesSpoken" placeholder="Languages" rows="5">{{ $jobseekerProfile->languagesSpoken }}</textarea>
					</div>
				</div>

				<hr>
				<input type="hidden" name="jobseeker_profiles_id" id="jobseeker_profiles_id" value="{{$id}}">
				
				<div class="form-group">
					<div class="col-md-offset-5 col-md-2">
						<button type="submit" class="btn btn-primary btn-block pull-right"><strong>Submit</strong></button>
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

	{{-- Entered Detials --}}
	<h4>Details Entered</h4>

	<div class="container">
		{{-- @foreach() --}}
		<div class="row">
			<div class="col-md-11">
				<div class="box box-default">
					<div class="box-header with-border">
						<h3 class="box-title" id="qualificationTextShow"><strong>Projects</strong></h3>

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
								<div class="col-md-10" id="boardNameShow">
									{{ $jobseekerProfile->projectsWorkedOn }}
								</div>
								<div class="col-md-2 pull-right">
									<a href="#"><span class="glyphicon glyphicon-edit"></span></a> | <a href="#"><span class="glyphicon glyphicon-trash"></span></a>
								</div>
							</div>
						</div>
					</div>
					<!-- /.box-body -->
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-md-11">
				<div class="box box-default">
					<div class="box-header with-border">
						<h3 class="box-title" id="qualificationTextShow"><strong>Languages</strong></h3>

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
								<div class="col-md-10" id="boardNameShow">
									{{ $jobseekerProfile->languagesSpoken }}
								</div>
								<div class="col-md-2 pull-right">
									<a href="#"><span class="glyphicon glyphicon-edit"></span></a> | <a href="#"><span class="glyphicon glyphicon-trash"></span></a>
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
				<a href="{{ route('resume.show', $jobseekerProfile->id) }}"><button type="button" class="btn btn-success btn-block pull-right btn-lg"><strong>Done</strong></button></a>
			</div>
		</div>
	</div>	

</section>
<!-- /.content -->

@endsection



@section('extraPageSpecificLoadScriptsContent')

<script>
	$('#fromMonth').datepicker({
		autoclose: true,
		format: 'MM yyyy',
		minViewMode: 'months'
	})

	$('#toMonth').datepicker({
		autoclose: true,
		format: 'MM yyyy',
		minViewMode: 'months'
	})
</script>

@endsection