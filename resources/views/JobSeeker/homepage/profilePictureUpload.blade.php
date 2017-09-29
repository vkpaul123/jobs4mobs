@extends('JobSeeker.homepage.layouts.app')
@section('title', 'JobSeekers')

@section('body')
<!-- Content Header (Page header) -->
<section class="content-header">
	<h1>
		<span style="color:#367fa9;"><b>JobSeeker</b> </span> Profile Picture Upload
		<small>Upload Your Profile Picture</small>
	</h1>
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
		<li class="active">Profile Picture Upload</li>
	</ol>
</section>

<!-- Main content -->
<section class="content">

	<!-- Default box -->
	<div class="box">

	<div class="box-header with-border">
		<div class="col-md-4 col-md-offset-4">
			@isset(Auth::user()->photo)
				<img src="{{ Auth::user()->photo }}"  class="img-rounded img-responsive" alt="Profile Image"></img>
			@else
				<div class="container-fluid">
					<div class="jumbotron">
						<center>
							<h4><span class="fa fa-exclamation-triangle"></span><br><br><span class="text-danger">You Don't have any Profile Picture set up.<br><small>Please upload a profile picture.</small></span></h4>
						</center>
					</div>
				</div>
			@endisset
		</div>
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
		<br>
			<form action="{{ route('profilePic.upload', $user->id) }}" method="post" class="form-horizontal" enctype="multipart/form-data">
				{{csrf_field()}}
				{{ method_field('PUT') }}

				<div class="form-group{{ $errors->has('profilePic') ? ' has-error' : '' }}">
					<label for="profilePic" class="col-md-3 control-label">Profile Picture (.JPG)</label>
					<div class="col-md-6">
						<input type="file" id="profilePic" name="profilePic" class="form-control pull-right">
					</div>
				</div>
				<input type="hidden" id="id" name="id" value="{{ $user->id }}">
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

</section>
<!-- /.content -->

@endsection
