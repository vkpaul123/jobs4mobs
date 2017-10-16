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
			<form action="{{ route('logo.upload', $employer->id) }}" method="post" class="form-horizontal" enctype="multipart/form-data">
				{{csrf_field()}}
				{{ method_field('PUT') }}

				<div class="form-group">
					<label for="logo" class="col-md-3 control-label">Profile Picture (.JPG)</label>
					<div class="col-md-6">
						<input type="file" id="logo" name="logo" class="form-control pull-right">
					</div>
				</div>
				<center>
					<p>
						<b class="text-danger">
							Please Upload a Square (1:1 aspect ratio) Picture Only.
						</b>
					</p>
				</center>
				<hr>

			<div class="form-group">
				<div class="col-md-offset-5 col-md-2">
					<button type="submit" class="btn btn-warning btn-block pull-right"><strong>Submit</strong></button>
				</div>
			</div>
			{{-- end form --}}
		</form>
	</div>

</div>
<!-- /.box -->

<div class="box">
		<div class="box-header with-border">
			<h3 class="box-title"><b>Change existing Password</b></h3>
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
			<form action="{{ route('employer.editPassword') }}" method="post" class="form-horizontal">
				{{csrf_field()}}
				{{method_field('PUT')}}
				
				<div class="row">
					<div class="col-md-offset-2 col-xs-8">
						<div class="box box-warning">
							<div class="box-header with-border">
								<h4 class="text-warning"><strong>Your Current Password</strong></h4>
							</div>
							<div class="box-body">
								<div class="form-group{{ $errors->has('yourPassword') ? ' has-error' : '' }}">
									<div class="col-md-10 col-md-offset-1">
										<input type="password" class="form-control pull-right" id="yourPassword" name="yourPassword" placeholder="Your Current Password">
									</div>
								</div>
							</div>
						</div>						
					</div>					
				</div>

				<hr>
				<h4><span style="color: #e08e0b;">New Password</span></h4>

				<div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
					<label for="password" class="col-md-3 control-label">Password</label>
					<div class="col-md-6">
						<input type="password" class="form-control pull-right" id="password" name="password" placeholder="Password">
					</div>
				</div>

				<div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
					<label for="password_confirmation" class="col-md-3 control-label">Confirm Password</label>
					<div class="col-md-6">
						<input type="password" class="form-control pull-right" id="password_confirmation" name="password_confirmation" placeholder="Confirm Password">
					</div>
				</div>

				<hr>

				<div class="form-group{{ $errors->has('remember') ? ' has-error' : '' }}">
					<div class="col-xs-10 col-md-offset-3">
						<div class="checkbox icheck col-md-6">
							<label>
								<input type="checkbox" name="remember"> &nbsp The Information that is entered is correct!
							</label>
						</div>
					</div>
				</div>

				<div class="form-group">
					<div class="col-md-offset-5 col-md-2">
						<button type="submit" class="btn btn-warning btn-block pull-right"><strong>Submit</strong></button>
					</div>
				</div>
				{{-- end form --}}
			</form>
		</div>

		<!-- /.box-body -->
	</div>
	<!-- /.box -->

</section>
<!-- /.content -->

@endsection

