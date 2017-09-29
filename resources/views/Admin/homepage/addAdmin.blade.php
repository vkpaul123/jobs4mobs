@extends('Admin.homepage.layouts.app')
@section('title', 'Admins')


@section('body')

<section class="content-header">
  <h1><span style="color: #d73925;"><strong>Admin</strong></span> Add New Admin<small> &nbsp create new Sub-Admin</small></h1>
  <ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
		<li class="active">Add New Admin</li>
	</ol>
</section>

<section class="content">

	<!-- Default box -->
	<div class="box">
		<div class="box-header with-border">
			<h3 class="box-title"><b>New Sub-Admin</b></h3>
		</div>

		<div class="box-body">
			<form action="" method="post" class="form-horizontal">
				{{csrf_field()}}
				
				<h4><span style="color: #d73925;">Credentials</span></h4>

				<div class="form-group">
					<label for="name" class="col-md-3 control-label">User Name</label>
					<div class="col-md-6">
						<input type="text" class="form-control pull-right" id="name" name="name" placeholder="User Name" value="{{ old('name') }}">
					</div>
				</div>

				<div class="form-group">
					<label for="password" class="col-md-3 control-label">Password</label>
					<div class="col-md-6">
						<input type="password" class="form-control pull-right" id="password" name="password" placeholder="Password">
					</div>
				</div>

				<div class="form-group">
					<label for="confirmPassword" class="col-md-3 control-label">Confirm Password</label>
					<div class="col-md-6">
						<input type="password" class="form-control pull-right" id="confirmPassword" name="confirmPassword" placeholder="Confirm Password">
					</div>
				</div>

				<hr>
				<h4><span style="color: #d73925;">Contact</span></h4>

				<div class="form-group">
					<label for="email" class="col-md-3 control-label">E-Mail</label>
					<div class="col-md-6">
						<input type="email" class="form-control pull-right" id="email" name="email" placeholder="E-Mail" value="{{ old('email') }}">
					</div>
				</div>
				
				<div class="form-group">
					<label for="phoneNo" class="col-md-3 control-label">Phone Number</label>
					<div class="col-md-6">
						<input type="number" class="form-control pull-right" id="phoneNo" name="phoneNo" placeholder="(Phone Number)" min="0" maxlength="16" value="{{ old('phoneNo') }}">
					</div>
				</div>

				<hr>
				<h4><span style="color: #d73925;">Access</span></h4>
				<div class="form-group">
					<div class="col-md-6 col-md-offset-3">
						<div class="row">
							<div class="col-md-4">
								<input type="radio" name="access" value="All"> &nbsp <strong class="text-red">All</strong>
							</div>
							<div class="col-md-4">
								<input type="radio" name="access" value="Employer"> &nbsp <strong class="text-yellow">Employer</strong>
							</div>
							<div class="col-md-4">
								<input type="radio" name="access" value="JobSeeker"> &nbsp <strong class="text-blue">JobSeeker</strong>
							</div>
						</div>
					</div>
				</div>

				<hr>

				<div class="form-group">
					<div class="col-xs-10 col-md-offset-3">
					<div class="checkbox icheck col-md-6">
						<label>
							<input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> &nbsp The Information that is entered is correct!
						</label>
					</div>
				</div>
			</div>

			<div class="form-group">
				<div class="col-md-offset-5 col-md-2">
					<button type="submit" class="btn btn-danger btn-block pull-right">Submit</button>
				</div>
			</div>
			{{-- end form --}}
		</form>
	</div>

	<!-- /.box-body -->
</div>
<!-- /.box -->

</section>

@endsection