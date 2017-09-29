@extends('JobSeeker.homepage.layouts.app')
@section('title', 'JobSeekers')


@section('body')
<!-- Content Header (Page header) -->
<section class="content-header">
	<h1>
		<span style="color:#367fa9;"><b>JobSeeker</b> </span> Edit Achievements Registration
		<small>Set up your Resume</small>
	</h1>
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
		<li class="active">Edit Your Achievements</li>
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

			<form action="{{ route('achievements.update', $achievementsEdit->id) }}" method="post" class="form-horizontal">
				{{csrf_field()}}
				{{ method_field('PUT') }}

				<div class="form-group{{ $errors->has('achievementTitle') ? ' has-error' : '' }}">
					<label for="achievementTitle" class="col-md-3 control-label">Title</label>
					<div class="col-md-6">
						<input type="text" class="form-control pull-right" id="achievementTitle" name="achievementTitle" placeholder="Achievement Title" value="{{ $achievementsEdit->achievementTitle }}">
					</div>
				</div>

				<div class="form-group{{ $errors->has('achievementDescription') ? ' has-error' : '' }}">
					<label for="achievementDescription" class="col-md-3 control-label">Description</label>
					<div class="col-md-6">
						<textarea class="form-control pull-right" id="achievementDescription" name="achievementDescription" placeholder="Description" rows="5">{{ $achievementsEdit->achievementDescription }}</textarea>
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
						<h3 class="box-title" id="qualificationTextShow"><strong>{{ $achievementsEdit->achievementTitle }}</strong></h3>

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
									{{ $achievementsEdit->achievementDescription }}
								</div>
								<div class="col-md-2 pull-right">
									
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
				<a href="{{ route('resume.show', $achievementsEdit->jobseeker_profiles_id) }}"><button type="button" class="btn btn-success btn-block pull-right btn-lg"><strong>Done</strong></button></a>
			</div>
		</div>
	</div>

</section>
<!-- /.content -->

@endsection
