@extends('Employer.homepage.layouts.app')
@section('title', 'Employers')

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
		<span style="color:#e08e0b;"><b>Employer</b> </span> Profile Registration
		<small>Set up your Profile</small>
	</h1>
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
		<li class="active">Register Profile</li>
	</ol>
</section>

<!-- Main content -->
<section class="content">

	<!-- Default box -->
	<div class="box">
		<div class="box-header with-border">
			<h3 class="box-title"><b>Basic Registration</b></h3>
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
			<form action="{{ route('employerProfile.update', Auth::user()->id) }}" method="post" class="form-horizontal">
				{{csrf_field()}}
				{{method_field('put')}}
				
				<h4><span style="color: #e08e0b;">Company Details</span></h4>

				<div class="form-group{{ $errors->has('companyname') ? ' has-error' : '' }}">
					<label for="companyname" class="col-md-3 control-label">Company Name<span class="text-red">*</span></label>
					<div class="col-md-6">
						<input type="text" class="form-control pull-right" id="companyname" placeholder="Company Name" name="companyname"  value="{{ $errors->has('companyname') ? old('companyname') : $employer->companyname}}">
					</div>
				</div>

				<div class="form-group{{ $errors->has('tagline') ? ' has-error' : '' }}">
					<label for="tagline" class="col-md-3 control-label">Company Tagline</label>
					<div class="col-md-6">
						<input type="text" class="form-control pull-right" id="tagline" placeholder="Company Tagline" name="tagline"  value="{{ $errors->has('tagline') ? old('tagline') : $employer->tagline}}">
					</div>
				</div>

			
<!-- /.input group -->
				<div class="form-group{{ $errors->has('companyType') ? ' has-error' : '' }}">
					<label for="companyType" class="col-md-3 control-label">Company Type<span class="text-red">*</span></label>
					<div class="col-md-6">
						<select style="width: 100%;" class="select2 form-control" id="companyType" name="companyType">
							<option value="">Choose Type…</option>
							<option value="Corporate">Corporate</option>
							<option value="PlacementConsultants">Placement Consultants</option>
						</select>	
					</div>
				</div>


				<div class="form-group{{ $errors->has('companyCategory') ? ' has-error' : '' }}">
					<label for="companyCategory" class="col-md-3 control-label">Company Category<span class="text-red">*</span></label>
					<div class="col-md-6">
						<select style="width: 100%;" class="select2 form-control" id="companyCategory" name="companyCategory">
							<option value="">Choose Category…</option>
							<option value="Governement/Ministry">Governement/Ministry</option>
							<option value="MNC">MNC</option>
							<option value="NGO">NGO</option>
							<option value="Private Ltd">Private Ltd</option>
							<option value="Public Ltd">Public Ltd</option>
							<option value="Sole Proprietor">Sole Proprietor</option>
							<option value="Others">Others…</option>
						</select>	
					</div>
				</div>

				<div class="form-group{{ $errors->has('jobCategoryId') ? ' has-error' : '' }}">
					<label for="jobCategoryId" class="col-md-3 control-label">Industry Type<span class="text-red">*</span></label>
					<div class="col-md-6">
						<select style="width: 100%;" class="select2 form-control" id="jobCategoryId" name="jobCategoryId">
							<option value="">Choose an industry…</option>

							@foreach($jobcategories as $jobcategory)
							
							<option value="{{ $jobcategory->id }}">{{ $jobcategory->name }}</option>

							@endforeach

						</select>	
					</div>
				</div>

				
				
				<hr>
				<h4><span style="color: #e08e0b;">Contact Details</span></h4>
				<div class="form-group{{ $errors->has('firstname') ? ' has-error' : '' }}">
					<label for="firstname" class="col-md-3 control-label">First Name<span class="text-red">*</span></label>
					<div class="col-md-6">
						<input type="text" class="form-control pull-right" id="firstname" name="firstname" value="{{Auth::user()->firstname}}" placeholder="First Name">
					</div>
				</div>
				<div class="form-group{{ $errors->has('lastname') ? ' has-error' : '' }}">
					<label for="lastname" class="col-md-3 control-label">Last Name<span class="text-red">*</span></label>
					<div class="col-md-6">
						<input type="text" class="form-control pull-right" id="lastname" name="lastname" placeholder="Last Name" value="{{Auth::user()->lastname}}">
					</div>
				</div>

				<div class="form-group{{ $errors->has('designation') ? ' has-error' : '' }}">
					<label for="designation" class="col-md-3 control-label">Designation<span class="text-red">*</span></label>
					<div class="col-md-6">
						<input type="text" class="form-control pull-right" id="designation" name="designation" placeholder="Designation" value="{{ $errors->has('designation') ? old('designation') : $employer->designation}}">
					</div>
				</div>

				<div class="form-group{{ $errors->has('emailId') ? ' has-error' : '' }}">
					<label for="emailId" class="col-md-3 control-label">Email Id<span class="text-red">*</span></label>
					<div class="col-md-6">
						<input type="text" class="form-control pull-right" id="emailId" name="emailId" placeholder="email ID" value="{{ Auth::user()->email }}">
					</div>
				</div>
				
				<hr>
				<h4><span style="color: #e08e0b;">Company Description</span></h4>
				<div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
					<label for="description" class="col-md-3 control-label">Description</label>
					<div class="col-md-6">
						<textarea rows="15" class="form-control pull-right" id="description" name="description" placeholder="Company Description" style="resize: none;">{{$employer->description}}</textarea>
					</div>
				</div>
 			
			<hr>
			<input type="hidden" id="employers_id" name="employers_id" value="{{ Auth::user()->id }}">

			<div class="form-group{{ $errors->has('remember') ? ' has-error' : '' }}">
				<div class="col-xs-10 col-md-offset-3">
				<div class="checkbox icheck col-md-6">
					<label>
						<input type="checkbox" name="remember"> &nbsp The Information that is entered is correct!<span class="text-red"><strong>*</strong></span></label>
					</label>
				</div>
			</div>
			</div>
			<div class="form-group">
				<div class="col-md-offset-5 col-md-2">
					<button type="submit" class="btn btn-warning btn-block pull-right">Submit</button>
				</div>
			</div>

		</form>

		<div class="box-footer">
			<span class="text-red"><strong>*</strong></span>Required Fields
		</div>

</div>
<!-- /.box -->

</section>
<!-- /.content -->

@endsection



@section('extraPageSpecificLoadScriptsContent')

<script src="{{ asset('assets/userPage/bower_components/select2/dist/js/select2.full.min.js')}}"></script>

<script>
	$("#companyType").val("{{$employer->companyType}}").trigger('change');
	$("#companyCategory").val("{{$employer->companyCategory}}").trigger('change');
	$("#jobCategoryId").val("{{$employer->jobCategoryId}}").trigger('change');

	$('.select2').select2({
		placeholder: "Select…"
	})
</script>

@endsection