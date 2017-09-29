@extends('JobSeeker.homepage.layouts.app')
@section('title', 'JobSeekers')


@section('body')
<!-- Content Header (Page header) -->
<section class="content-header">
	<h1>
		<span style="color:#367fa9;"><b>JobSeeker</b> </span> Achievements Registration
		<small>Set up your Resume</small>
	</h1>
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
		<li class="active">Register Your Achievements</li>
	</ol>
</section>

<!-- Main content -->
<section class="content">

	<!-- Default box -->
	<div class="box">
		<div class="box-header with-border">
			<h3 class="box-title"><b>Achievements Details</b></h3>
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

			<form action="{{ route('achievements.store') }}" method="post" class="form-horizontal">
				{{csrf_field()}}

				<div class="form-group{{ $errors->has('achievementTitle') ? ' has-error' : '' }}">
					<label for="achievementTitle" class="col-md-3 control-label">Title</label>
					<div class="col-md-6">
						<input type="text" class="form-control pull-right" id="achievementTitle" name="achievementTitle" placeholder="Achievement Title" value="{{ old('achievementTitle') }}">
					</div>
				</div>

				<div class="form-group{{ $errors->has('achievementDescription') ? ' has-error' : '' }}">
					<label for="achievementDescription" class="col-md-3 control-label">Description</label>
					<div class="col-md-6">
						<textarea class="form-control pull-right" id="achievementDescription" name="achievementDescription" placeholder="Description" rows="5">{{ old('achievementDescription') }}</textarea>
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
		@forelse($achievements as $achievement)
		<div class="row">
			<div class="col-md-11">
				<div class="box box-default collapsed-box">
					<div class="box-header with-border">
						<h3 class="box-title" id="qualificationTextShow"><strong>{{ $achievement->achievementTitle }}</strong></h3>

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
									{{ $achievement->achievementDescription }}
								</div>
								<div class="col-md-2 pull-right">
									<a href="{{ route('achievements.edit', $achievement->id) }}"><span class="glyphicon glyphicon-edit"></span></a> | <a href="#" onclick="
									if(confirm('Are You Sure, you want to delete this record?')) {
										event.preventDefault();
										document.getElementById('delete-experience-{{ $achievement->id }}').submit();
									}
									else {
										event.preventDefault();
									}
									"><span class="glyphicon glyphicon-trash"></span></a>

									<form method="post" id="delete-experience-{{ $achievement->id }}" action="{{ route('achievements.destroy', $achievement->id) }}" style="display: none;">
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
						    <h4><span class="fa fa-exclamation-triangle"></span> &nbsp <span class="text-danger">You Don't have any Achievements Details.<br><small>Please add your achievements details.</small></span></h4>
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
