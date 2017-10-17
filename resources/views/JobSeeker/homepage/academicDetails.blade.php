@extends('JobSeeker.homepage.layouts.app')
@section('title', 'JobSeekers')


@section('body')
<!-- Content Header (Page header) -->
<section class="content-header">
	<h1>
		<span style="color:#367fa9;"><b>JobSeeker</b> </span> Profile Registration
		<small>Set up your Profile</small>
	</h1>
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
		<li class="active">Register Academic Details</li>
	</ol>
</section>

<!-- Main content -->
<section class="content">

	<!-- Default box -->
	<div class="box">
		<div class="box-header with-border">
			<h3 class="box-title"><b>Academic Details</b></h3>
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

			<form action="{{ route('academics.store') }}" method="post" class="form-horizontal">
				{{csrf_field()}}

				<div class="form-group{{ $errors->has('qualificationText') ? ' has-error' : '' }}">
					<label for="qualificationText" class="col-md-3 control-label">Qualification Name</label>
					<div class="col-md-6">
						<input type="text" class="form-control pull-right" id="qualificationText" name="qualificationText" placeholder="Qualification Name" value="{{ old('qualificationText') }}">
					</div>
				</div>

				<div class="form-group{{ $errors->has('boardName') ? ' has-error' : '' }}">
					<label for="boardName" class="col-md-3 control-label">Educational Board Name</label>
					<div class="col-md-6">
						<input type="text" class="form-control pull-right" id="boardName" name="boardName" placeholder="Name of Board" value="{{ old('boardName') }}">
					</div>
				</div>

				<div class="form-group{{ $errors->has('academyName') ? ' has-error' : '' }}">
					<label for="academyName" class="col-md-3 control-label">Academy Name</label>
					<div class="col-md-6">
						<input type="text" class="form-control pull-right" id="academyName" name="academyName" placeholder="Academy Name" value="{{ old('academyName') }}">
					</div>
				</div>

				<div class="form-group{{ $errors->has('marks') ? ' has-error' : '' }}">
					<label for="marks" class="col-md-3 control-label">Marks</label>
					<div class="col-md-6">
						<input type="text" maxlength="6" class="form-control pull-right" id="marks" name="marks" placeholder="Marks Obtained" min="0" value="{{ old('marks') }}">
					</div>
				</div>

				<div class="form-group{{ $errors->has('yearOfPassing') ? ' has-error' : '' }}">
					<label for="yearOfPassing" class="col-md-3 control-label">Year of Passing</label>
					<div class="col-md-6">
						<input type="number" class="form-control pull-right" id="yearOfPassing" name="yearOfPassing" placeholder="Year of Passing" min="1940" maxlength="4" value="{{ old('yearOfPassing') }}">
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
	{{-- @foreach() --}}

	<div class="container">
		@forelse($academics as $academic)
		<div class="row">
			<div class="col-md-11">
				<div class="box box-default collapsed-box">
					<div class="box-header with-border">
						<h3 class="box-title" id="qualificationTextShow">{{ $academic->qualificationText }}</h3>

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
								<div class="col-md-3" id="boardNameShow">
									{{ $academic->boardName }}
								</div>
								<div class="col-md-3" id="academyNameShow">
									{{ $academic->academyName }}
								</div>
								<div class="col-md-2" id="marksShow">
									{{ $academic->marks }}
								</div>
								<div class="col-md-2" id="yearOfPassingShow">
									<b>{{ $academic->yearOfPassing }}</b>
								</div>
								<div class="col-md-2 pull">
									<a href="{{ route('academics.edit', $academic->id) }}"><span class="glyphicon glyphicon-edit"></span></a> | <a href="#" onclick="
									if(confirm('Are You Sure, you want to delete this record?')) {
										event.preventDefault();
										document.getElementById('delete-experience-{{ $academic->id }}').submit();
									}
									else {
										event.preventDefault();
									}
									"><span class="glyphicon glyphicon-trash"></span></a>

									<form method="post" id="delete-experience-{{ $academic->id }}" action="{{ route('academics.destroy', $academic->id) }}" style="display: none;">
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
						<h4><span class="fa fa-exclamation-triangle"></span> &nbsp <span class="text-danger">You Don't have any Academic Details.<br><small>Please add your academic details.</small></span></h4>
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
