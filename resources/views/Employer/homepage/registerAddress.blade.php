@extends('Employer.homepage.layouts.app')
@section('title', 'Employers')


@section('body')
<!-- Content Header (Page header) -->
<section class="content-header">
	<h1>
		<span style="color:#e08e0b;"><b>Employer</b> </span> Profile Registration
		<small>Set up your Profile</small>
	</h1>
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
		<li><a href="#"><i class="fa fa-dashboard"></i> Register Profile</a></li>
		<li class="active">Register Address</li>
	</ol>
</section>

<!-- Main content -->
<section class="content">

	<!-- Default box -->
	<div class="box">
		<div class="box-header with-border">
			<h3 class="box-title"><b>Address Registration</b></h3>
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

			<form action="{{ route('employerAddress.store') }}" method="post" class="form-horizontal">
				{{csrf_field()}}
				
				<h4><span style="color: #e08e0b;">Phone Numbers</span></h4>

				<div class="form-group{{ $errors->has('primaryPhoneNo') ? ' has-error' : '' }}">
					<label for="primaryPhoneNo" class="col-md-3 control-label">Primary Phone Number<span class="text-red">*</span></label>
					<div class="col-md-6">
						<input type="text" class="form-control pull-right" id="primaryPhoneNo" name="primaryPhoneNo" placeholder="(Phone Number)" min="0" maxlength="16" value="{{ old('primaryPhoneNo') }}">
					</div>
				</div>

				<div class="form-group{{ $errors->has('secondaryPhnoeNo') ? ' has-error' : '' }}">
					<label for="secondaryPhnoeNo" class="col-md-3 control-label">Secondary Phone Number</label>
					<div class="col-md-6">
						<input type="text" class="form-control pull-right" id="secondaryPhnoeNo" name="secondaryPhnoeNo" placeholder="(Phone Number)" min="0" maxlength="16" value="{{ old('secondaryPhnoeNo') }}">
					</div>
				</div>

				<div class="form-group{{ $errors->has('faxNo') ? ' has-error' : '' }}">
					<label for="faxNo" class="col-md-3 control-label">FAX Number</label>
					<div class="col-md-6">
						<input type="text" class="form-control pull-right" id="faxNo" name="faxNo" placeholder="(Phone Number)" min="0" maxlength="16" value="{{ old('faxNo') }}">
					</div>
				</div>

				<hr>
				<h4><span style="color: #e08e0b;">Contact Address</span></h4>

				<div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
					<label for="address" class="col-md-3 control-label">Address<span class="text-red">*</span></label>
					<div class="col-md-6">
						<textarea class="form-control pull-right" id="address" name="address" placeholder="Address" rows="7">{{ old('address') }}</textarea>
					</div>
				</div>

				<div class="form-group{{ $errors->has('postalCode') ? ' has-error' : '' }}">
					<label for="postalCode" class="col-md-3 control-label">Postal Code<span class="text-red">*</span></label>
					<div class="col-md-6">
						<input type="text" class="form-control pull-right" id="postalCode" name="postalCode" placeholder="(Phone Number)" min="0" maxlength="6" value="{{ old('postalCode') }}">
					</div>
				</div>

				<div class="form-group{{ $errors->has('cityName') ? ' has-error' : '' }}">
					<label for="cityName" class="col-md-3 control-label">City<span class="text-red">*</span></label>
					<div class="col-md-6">
						<input type="text" class="form-control pull-right" id="cityName" name="cityName" placeholder="City" value="{{ old('cityName') }}">
					</div>
				</div>

				<div class="form-group{{ $errors->has('stateName') ? ' has-error' : '' }}">
					<label for="stateName" class="col-md-3 control-label">State<span class="text-red">*</span></label>
					<div class="col-md-6">
						<input type="text" class="form-control pull-right" id="stateName" name="stateName" placeholder="State" value="{{ old('stateName') }}">
					</div>
				</div>

				<div class="form-group{{ $errors->has('countryName') ? ' has-error' : '' }}">
					<label for="countryName" class="col-md-3 control-label">Country<span class="text-red">*</span></label>
					<div class="col-md-6">
						<input type="text" class="form-control pull-right" id="countryName" name="countryName" placeholder="Country" value="{{ old('countryName') }}">
					</div>
				</div>

				<hr>
				<h4><span style="color: #e08e0b;">Website</span></h4>

				<div class="form-group{{ $errors->has('website') ? ' has-error' : '' }}">
					<label for="website" class="col-md-3 control-label">Website</label>
					<div class="col-md-6">
						<input type="text" class="form-control pull-right" id="website" name="website" placeholder="Website" value="{{ old('website') }}">
					</div>
				</div>

				<hr>
				<input type="hidden" name="id" value="{{ Auth::user()->id }}">
				<div class="form-group{{ $errors->has('remember') ? ' has-error' : '' }}">
					<div class="col-xs-10 col-md-offset-3">
						<div class="checkbox icheck col-md-6">
							<label>
								<input type="checkbox" name="remember"> &nbsp The Information that is entered is correct!<span class="text-red">*</span>
							</label>
						</div>
					</div>
				</div>

				<div class="form-group">
					<div class="col-md-offset-5 col-md-2">
						<button type="submit" class="btn btn-warning btn-block pull-right">Submit</button>
					</div>
				</div>
				{{-- end form --}}
			</form>
		</div>

		<!-- /.box-body -->

		<div class="box-footer">
			<span class="text-red"><strong>*</strong></span>Required Fields
		</div>
	</div>
	<!-- /.box -->

</section>
<!-- /.content -->

@endsection

