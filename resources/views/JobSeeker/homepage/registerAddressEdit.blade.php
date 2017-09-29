@extends('JobSeeker.homepage.layouts.app')
@section('title', 'JobSeekers')

@section('extraPageSpecificHeadContent')
<link rel="stylesheet" href="{{asset('assets/userPage/bower_components/select2/dist/css/select2.min.css')}}">

<style type="text/css">
	[class^='select2'] {
		border-radius: 0px !important;
	}

	.select2-container {
		padding: 0px;
		border-width: 0px;
	}
	.select2-container .select2-choice {
		height: 38px;
		line-height: 38px;
	}

	.select2-container.form-control {
		height: auto !important;
	}

	.form-control{
		-webkit-appearance:none;
		-moz-appearance: none;
		-ms-appearance: none;
		-o-appearance: none;
		appearance: none;
	}
</style>
@endsection

@section('body')
<!-- Content Header (Page header) -->
<section class="content-header">
	<h1>
		<span style="color:#367fa9;"><b>JobSeeker</b> </span> Profile Registration
		<small>Set up your Profile</small>
	</h1>
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
		<li><a href="#"><i class="fa fa-dashboard"></i> Register Profile</a></li>
		<li class="active">Register Address Edit</li>
	</ol>
</section>

<!-- Main content -->
<section class="content">

	<!-- Default box -->
	<div class="box">
		<div class="box-header with-border">
			<h3 class="box-title"><b>Edit Address Registration</b></h3>
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
			
			<form action="{{ route('address.update', $address->id) }}" method="post" class="form-horizontal">
				{{csrf_field()}}
				{{ method_field('PUT') }}
				
				<h4><span style="color: #367fa9;">Phone Numbers</span></h4>

				<div class="form-group{{ $errors->has('primaryPhoneNo') ? ' has-error' : '' }}">
					<label for="primaryPhoneNo" class="col-md-3 control-label">Primary Phone Number<span class="text-red">*</span></label>
					<div class="col-md-6">
						<input type="number" class="form-control pull-right" id="primaryPhoneNo" name="primaryPhoneNo" placeholder="(Phone Number)" min="0" maxlength="16" value="{{$address->primaryPhoneNo}}">
					</div>
				</div>

				<div class="form-group{{ $errors->has('secondaryPhnoeNo') ? ' has-error' : '' }}">
					<label for="secondaryPhnoeNo" class="col-md-3 control-label">Secondary Phone Number</label>
					<div class="col-md-6">
						<input type="number" class="form-control pull-right" id="secondaryPhnoeNo" name="secondaryPhnoeNo" placeholder="(Phone Number)" min="0" maxlength="16" value="{{$address->secondaryPhnoeNo}}">
					</div>
				</div>

				<div class="form-group{{ $errors->has('faxNo') ? ' has-error' : '' }}">
					<label for="faxNo" class="col-md-3 control-label">FAX Number</label>
					<div class="col-md-6">
						<input type="number" class="form-control pull-right" id="faxNo" name="faxNo" placeholder="(Phone Number)" min="0" maxlength="16" value="{{$address->faxNo}}">
					</div>
				</div>

				<hr>
				<h4><span style="color: #367fa9;">Contact Address</span></h4>

				<div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
					<label for="address" class="col-md-3 control-label">Address<span class="text-red">*</span></label>
					<div class="col-md-6">
						<textarea class="form-control pull-right" id="address" name="address" placeholder="Address" rows="7">{{$address->address}}</textarea>
					</div>
				</div>

				<div class="form-group{{ $errors->has('postalCode') ? ' has-error' : '' }}">
					<label for="postalCode" class="col-md-3 control-label">Postal Code<span class="text-red">*</span></label>
					<div class="col-md-6">
						<input type="number" class="form-control pull-right" id="postalCode" name="postalCode" placeholder="(Phone Number)" min="0" maxlength="6" value="{{$address->postalCode}}">
					</div>
				</div>

				<div class="form-group{{ $errors->has('cityName') ? ' has-error' : '' }}">
					<label for="cityName" class="col-md-3 control-label">City<span class="text-red">*</span></label>
					<div class="col-md-6">
						<input type="text" class="form-control pull-right" id="cityName" name="cityName" placeholder="City" value="{{$address->cityName}}">
					</div>
				</div>

				<div class="form-group{{ $errors->has('stateName') ? ' has-error' : '' }}">
					<label for="stateName" class="col-md-3 control-label">State<span class="text-red">*</span></label>
					<div class="col-md-6">
						<input type="text" class="form-control pull-right" id="stateName" name="stateName" placeholder="State" value="{{$address->stateName}}">
					</div>
				</div>

				<div class="form-group{{ $errors->has('countryName') ? ' has-error' : '' }}">
					<label for="countryName" class="col-md-3 control-label">Country<span class="text-red">*</span></label>
					<div class="col-md-6">
						<input type="text" class="form-control pull-right" id="countryName" name="countryName" placeholder="Country" value="{{$address->countryName}}">
					</div>
				</div>

				<hr>
				<h4><span style="color: #367fa9;">Website</span></h4>

				<div class="form-group{{ $errors->has('website') ? ' has-error' : '' }}">
					<label for="website" class="col-md-3 control-label">Website</label>
					<div class="col-md-6">
						<input type="text" class="form-control pull-right" id="website" name="website" placeholder="Website" value="{{$address->website}}">
					</div>
				</div>

				<hr>
				
				<div class="form-group{{ $errors->has('remember') ? ' has-error' : '' }}">
					<div class="col-xs-5 col-md-offset-3">
					<div class="checkbox icheck">
						<label>
							<input type="checkbox" id="remember" name="remember"> &nbsp The Information that is entered is correct!<span class="text-red">*</span>
						</label>
					</div>
				</div>
			</div>

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

	<!-- /.box-body -->
</div>

<div class="container-fluid">
	<div class="row">
		<div class="col-md-offset-8 col-md-4">
			<a href="/home/resumeBuilder/viewResume"><button type="button" class="btn btn-success btn-block pull-right btn-lg"><strong>Done</strong></button></a>
		</div>
	</div>
</div>
<!-- /.box -->

</section>
<!-- /.content -->

@endsection



@section('extraPageSpecificLoadScriptsContent')

<script src="{{ asset('assets/userPage/bower_components/select2/dist/js/select2.full.min.js')}}"></script>

<script>
	$('#dateOfBirth').datepicker({
		autoclose: true
	})

	$('.select2').select2({
		placeholder: "Select…"
	})
</script>

@endsection