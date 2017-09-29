@extends('Employer.homepage.layouts.app')
@section('title', 'Employers')


@section('body')
<!-- Content Header (Page header) -->
<section class="content-header">
	<h1>
		<span style="color:#e08e0b;"><b>Employer</b> </span> Logo Upload
		<small>Upload Your Logo</small>
	</h1>
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
		<li class="active">Logo Upload</li>
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
							<h4><span class="fa fa-exclamation-triangle"></span><br><br><span class="text-danger">You Don't have any Logo set up.<br><small>Please upload a logo.</small></span></h4>
						</center>
					</div>
				</div>
			@endisset
		</div>
	</div>

		<div class="box-body">
		<br>
			<form action="{{ route('logo.upload', $employer->id) }}" method="post" class="form-horizontal" enctype="multipart/form-data">
				{{csrf_field()}}
				{{ method_field('PUT') }}

				<div class="form-group">
					<label for="logo" class="col-md-3 control-label">Profile Picture (.JPG)</label>
					<div class="col-md-6">
						<input type="file" id="logo" name="logo" class="form-control pull-right">
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

</section>
<!-- /.content -->

@endsection

