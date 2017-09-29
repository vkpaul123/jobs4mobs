@extends('JobSeeker.homepage.layouts.app')
@section('title', 'JobSeekers')


@section('body')
<!-- Content Header (Page header) -->
<section class="content-header">
	<h1>
		<span style="color:#367fa9;"><b>JobSeeker</b> </span> Experience Registration
		<small>Set up your Resume</small>
	</h1>
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
		<li class="active">Register Your experiences</li>
	</ol>
</section>

<!-- Main content -->
<section class="content">

	<!-- Default box -->
	<div class="box">
		<div class="box-header with-border">
			<h3 class="box-title"><b>Experience Details</b></h3>
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

			<form action="{{ route('experience.store') }}" method="post" class="form-horizontal">
				{{csrf_field()}}

				<div class="form-group{{ $errors->has('companyName') ? ' has-error' : '' }}">
					<label for="companyName" class="col-md-3 control-label">Company Name<span class="text-red">*</span></label>
					<div class="col-md-6">
						<input type="text" class="form-control pull-right" id="companyName" name="companyName" placeholder="Company Name" value="{{ old('companyName') }}">
					</div>
				</div>

				<div class="form-group{{ $errors->has('companyLocation') ? ' has-error' : '' }}">
					<label for="companyLocation" class="col-md-3 control-label">Company Location<span class="text-red">*</span></label>
					<div class="col-md-6">
						<input type="text" class="form-control pull-right" id="companyLocation" name="companyLocation" placeholder="Company Location" value="{{ old('companyLocation') }}">
					</div>
				</div>

				<div class="form-group{{ $errors->has('jobTitle') ? ' has-error' : '' }}">
					<label for="jobTitle" class="col-md-3 control-label">Job Title<span class="text-red">*</span></label>
					<div class="col-md-6">
						<input type="text" class="form-control pull-right" id="jobTitle" name="jobTitle" placeholder="Job Title" value="{{ old('jobTitle') }}">
					</div>
				</div>

				<div class="form-group{{ $errors->has('fromMonth') ? ' has-error' : '' }}">
					<label for="fromMonth" class="col-md-3 control-label">From (Month)<span class="text-red">*</span></label>
					<div class="col-md-6">
						<div class="input-group date">
							<input type="text" class="form-control pull-right" id="fromMonth" name="fromMonth" placeholder="MM yyyy" value="{{ old('fromMonth') }}">
							<div class="input-group-addon">
								<i class="fa fa-calendar"></i>
							</div>
						</div>
						<!-- /.input group -->
					</div>
				</div>

				<div class="form-group{{ $errors->has('toMonth') ? ' has-error' : '' }}">
					<label for="toMonth" class="col-md-3 control-label">To (Month)<span class="text-red">*</span></label>
					<div class="col-md-6">
						<div class="input-group date">
							<input type="text" class="form-control pull-right" id="toMonth" name="toMonth" placeholder="MM yyyy" value="{{ old('toMonth') }}">
							<div class="input-group-addon" class="btn btn-xs btn-default btn-flat" onclick="document.getElementById('toMonth').value='Present';"><a><i class="fa fa-calendar-plus-o"></i>&nbsp Present</a>
							</div>
							<div class="input-group-addon">
								<i class="fa fa-calendar"></i>
							</div>
						</div>
						<!-- /.input group -->
					</div>
				</div>

				<div class="form-group{{ $errors->has('jobDescription') ? ' has-error' : '' }}">
					<label for="jobDescription" class="col-md-3 control-label">Job Description<span class="text-red">*</span></label>
					<div class="col-md-6">
						<textarea class="form-control pull-right" id="jobDescription" name="jobDescription" placeholder="Description" rows="5" style="resize: none;"">{{ old('jobDescription') }}</textarea>
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

		<div class="box-footer">
			<span class="text-red"><strong>*</strong></span>Required Fields
		</div>
	</div>
	<!-- /.box -->

	{{-- Entered Detials --}}
	<h4>Details Entered</h4>
	{{-- @foreach() --}}
	<div class="container">

		@forelse($experiences as $experience)
		<div class="row">
			<div class="col-md-11">
				<div class="box box-default collapsed-box">
					<div class="box-header with-border">
						<h3 class="box-title" id="qualificationTextShow"><strong>{{ $experience->companyName }}</strong> &nbsp&nbsp {{ $experience->companyLocation }}</h3>

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
								<div class="col-md-4" id="boardNameShow">
									<strong>{{ $experience->jobTitle }}</strong>
								</div>
								<div class="col-md-5" id="academyNameShow">
									{{ $experience->fromMonth }} &nbsp - &nbsp {{ $experience->toMonth }}
								</div>
								<div class="col-md-2 pull-right">
									<a href="{{ route('experience.edit', $experience->id) }}"><span class="glyphicon glyphicon-edit"></span></a> | <a href="" onclick="
									if(confirm('Are You Sure, you want to delete this record?')) {
										event.preventDefault();
										document.getElementById('delete-experience-{{ $experience->id }}').submit();
									}
									else {
										event.preventDefault();
									}
									"><span class="glyphicon glyphicon-trash"></span></a>

									<form method="post" id="delete-experience-{{ $experience->id }}" action="{{ route('experience.destroy', $experience->id) }}" style="display: none;">
										{{ csrf_field() }}
										{{ method_field('DELETE') }}
									</form>
								</div>
							</div>
							<div class="row box-body">
								<div class="col-md-12" id="jobDescription">
									{{ $experience->jobDescription }}
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
						    <h4><span class="fa fa-exclamation-triangle"></span> &nbsp <span class="text-danger">You Don't have any Experience Details.<br><small>Please add your experience details.</small></span></h4>
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