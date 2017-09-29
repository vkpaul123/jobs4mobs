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
		<li class="active">Register Profile</li>
	</ol>
</section>

<!-- Main content -->
<section class="content">

	<!-- Default box -->
	<div class="box">
		<div class="box-header with-border">
			<h3 class="box-title"><b>Profile Registration</b></h3>
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

			<form action="{{ route('profile.store') }}" method="post" class="form-horizontal" role="form">
				{{csrf_field()}}
				
				<h4><span style="color: #367fa9;">Personal Details</span></h4>

				<div class="form-group{{ $errors->has('firstname') ? ' has-error' : '' }}">
					<label for="firstname" class="col-md-3 control-label">First Name<span class="text-red">*</span></label>
					<div class="col-md-6">
						<input type="text" class="form-control pull-right" id="firstname" name="firstname" placeholder="First Name" value="{{ Auth::user()->firstname }}">
					</div>
				</div>

				<div class="form-group">
					<label for="middlename" class="col-md-3 control-label">Middle Name</label>
					<div class="col-md-6">
						<input type="text" class="form-control pull-right" id="middlename" name="middlename" placeholder="Middle Name" value="{{ Auth::user()->middlename }}">
					</div>
				</div>

				<div class="form-group{{ $errors->has('lastname') ? ' has-error' : '' }}">
					<label for="lastname" class="col-md-3 control-label">Last Name<span class="text-red">*</span></label>
					<div class="col-md-6">
						<input type="text" class="form-control pull-right" id="lastname" name="lastname" placeholder="Last Name" value="{{ Auth::user()->lastname }}">
					</div>
				</div>

				<div class="form-group{{ $errors->has('dateOfBirth') ? ' has-error' : '' }}">
					<label for="dateOfBirth" class="col-md-3 control-label">Date of Birth<span class="text-red">*</span></label>
					<div class="col-md-6">
						<div class="input-group date">
							<input type="text" class="form-control pull-right" id="dateOfBirth" name="dateOfBirth" placeholder="yyyy-mm-dd" value="{{ old('dateOfBirth') }}">
							<div class="input-group-addon">
								<i class="fa fa-calendar"></i>
							</div>
						</div>
						<!-- /.input group -->
					</div>
				</div>

				<div class="form-group{{ $errors->has('gender') ? ' has-error' : '' }}">
					<label for="gender" class="col-md-3 control-label">Gender<span class="text-red">*</span></label>
					<div class="col-md-6">
						<select style="width: 100%;" class="select2 form-control" id="gender" name="gender">
							<option value="">Choose Gender…</option>
							<option value="Male">Male</option>
							<option value="Female">Female</option>
						</select>
					</div>
				</div>


				<div class="form-group{{ $errors->has('educationlevel') ? ' has-error' : '' }}">
					<label for="educationlevel" class="col-md-3 control-label">Highest Educational Qualification<span class="text-red">*</span></label>
					<div class="col-md-6">
						<select style="width: 100%;" class="select2 form-control" id="educationlevel" name="educationlevel">
							<option value="">Choose an Education Level…</option>
							<option value="Class 10">Class 10</option>
							<option value="Class 10+2">Class 10+2</option>
							<option value="Diploma">Diploma</option>
							<option value="Graduate">Graduate</option>
							<option value="Post-Graduate">Post-Graduate</option>
							<option value="PhD">PhD</option>
							<option value="Others">Others…</option>
						</select>	
					</div>
				</div>
				
				<hr>
				<h4><span style="color: #367fa9;">Recent Job Details</span></h4>

				<div class="form-group{{ $errors->has('experience') ? ' has-error' : '' }}">
					<label for="experience" class="col-md-3 control-label">Previous Work Experience<span class="text-red">*</span></label>
					<div class="col-md-6">
						<input type="number" class="form-control pull-right" id="experience" name="experience" placeholder="(Years)" min="0" value="{{ old('experience') }}">
					</div>
				</div>

				<div class="form-group{{ $errors->has('recentJobCategoryId') ? ' has-error' : '' }}">
					<label for="recentJobCategoryId" class="col-md-3 control-label">Recent Job Category</label>
					<div class="col-md-6">
						<select style="width: 100%;" class="select2 form-control" id="recentJobCategoryId" name="recentJobCategoryId">
							<option value="">Choose an industry…</option>

							@foreach($jobcategories as $jobcategory)
							
							<option value="{{ $jobcategory->id }}">{{ $jobcategory->name }}</option>

							@endforeach

						</select>	
					</div>
				</div>

				<hr>
				<h4><span style="color: #367fa9;">Job Preferance Details</span></h4>
				
				<div class="form-group{{ $errors->has('preferedJobCategoryId1') ? ' has-error' : '' }}">
					<label for="preferedJobCategoryId1" class="col-md-3 control-label">First Prefered Job Category<span class="text-red">*</span></label>
					<div class="col-md-6">
						<select style="width: 100%;" class="select2 form-control" id="preferedJobCategoryId1" name="preferedJobCategoryId1">
							<option value="">Choose an industry…</option>

							@foreach($jobcategories as $jobcategory)
							
							<option value="{{ $jobcategory->id }}">{{ $jobcategory->name }}</option>

							@endforeach

						</select>	
					</div>
				</div>

				<div class="form-group{{ $errors->has('preferedJobCategoryId2') ? ' has-error' : '' }}">
					<label for="preferedJobCategoryId2" class="col-md-3 control-label">Second Prefered Job Category<span class="text-red">*</span></label>
					<div class="col-md-6">
						<select style="width: 100%;" class="select2 form-control" id="preferedJobCategoryId2" name="preferedJobCategoryId2">
							<option value="">Choose an industry…</option>

							@foreach($jobcategories as $jobcategory)
							
							<option value="{{ $jobcategory->id }}">{{ $jobcategory->name }}</option>

							@endforeach

						</select>	
					</div>
				</div>
				
				<div class="form-group{{ $errors->has('preferedworktype') ? ' has-error' : '' }}">
					<label for="preferedworktype" class="col-md-3 control-label">Prefered Commitment<span class="text-red">*</span></label>
					<div class="col-md-6">
						<select style="width: 100%;" class="select2 form-control" id="preferedworktype" name="preferedworktype">
							<option value="">Choose Commitment…</option>
							<option value="Full Time">Full Time</option>
							<option value="Part Time">Part Time</option>
							<option value="Any">Any</option>
						</select>	
					</div>
				</div>

				<div class="form-group{{ $errors->has('preferedsalary') ? ' has-error' : '' }}">
					<label for="preferedsalary" class="col-md-3 control-label">Prefered Salary<span class="text-red">*</span></label>
					<div class="col-md-6">
						<input type="number" class="form-control pull-right" id="preferedsalary" name="preferedsalary" placeholder="(Salary)" min="0" value="{{ old('preferedsalary') }}">
					</div>
				</div>

				<div class="form-group{{ $errors->has('preferedcityofwork') ? ' has-error' : '' }}">
					<label for="preferedcityofwork" class="col-md-3 control-label">Prefered City Of Work<span class="text-red">*</span></label>
					<div class="col-md-6">
						<input type="text" class="form-control pull-right" id="preferedcityofwork" name="preferedcityofwork" placeholder="Prefered City Of Work" value="{{old('preferedcityofwork')}}">
					</div>
				</div>

				<div class="form-group{{ $errors->has('preferedcountryofwork') ? ' has-error' : '' }}">
					<label for="preferedcountryofwork" class="col-md-3 control-label">Prefered Country Of Work<span class="text-red">*</span></label>
					<div class="col-md-6">
						<input type="text" class="form-control pull-right" id="preferedcountryofwork" name="preferedcountryofwork" placeholder="Prefered Country Of Work" value="{{old('preferedcountryofwork')}}">
					</div>
				</div>

				<div class="form-group{{ $errors->has('tagline') ? ' has-error' : '' }}">
					<label for="tagline" class="col-md-3 control-label">Tag Line<span class="text-red">*</span></label>
					<div class="col-md-6">
						<textarea class="form-control pull-right" id="tagline" name="tagline" placeholder="Tag Line" rows="3" style="resize: none;">{{ old('tagline') }}</textarea>
					</div>
				</div>

				<hr>

				<div class="form-group{{ $errors->has('remember') ? ' has-error' : '' }}">
					<div class="col-xs-10 col-md-offset-3">
					<div class="checkbox icheck col-md-6">
						<label>
							<input type="checkbox" name="remember"> &nbsp The Information that is entered is correct!<span class="text-red"><strong>*</strong></span></label>
						</label>
					</div>
				</div>
			</div>

			<input type="hidden" id="user_id" name="user_id" value="{{ Auth::user()->id }}">

			<div class="form-group">
				<div class="col-md-offset-5 col-md-2">
					<button type="submit" class="btn btn-primary btn-block pull-right">Submit</button>
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
<!-- /.box -->

</section>
<!-- /.content -->

@endsection



@section('extraPageSpecificLoadScriptsContent')

<script src="{{ asset('assets/userPage/bower_components/select2/dist/js/select2.full.min.js')}}"></script>

<script>

	$("#gender").val("{{ old('gender') }}").trigger('change');
	$("#educationlevel").val("{{ old('educationlevel') }}").trigger('change');
	$("#recentJobCategoryId").val("{{ old('recentJobCategoryId') }}").trigger('change');
	$("#preferedJobCategoryId1").val("{{ old('preferedJobCategoryId1') }}").trigger('change');
	$("#preferedJobCategoryId2").val("{{ old('preferedJobCategoryId2') }}").trigger('change');
	$("#preferedworktype").val("{{ old('preferedworktype') }}").trigger('change');

	$('#dateOfBirth').datepicker({
		autoclose: true,
		format: 'yyyy-mm-dd'
	})

	$('.select2').select2({
		
	})

</script>

@endsection