@extends('Admin.homepage.layouts.app')
@section('title', 'Admins')

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
		<span style="color:#d73925;"><b>Admin</b> </span> Create Question
		<small>Set up your Questionnare</small>
	</h1>
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
		<li class="active">Create Question</li>
	</ol>
</section>

<!-- Main content -->
<section class="content">

	<!-- Default box -->
	<div class="box">
		<div class="box-header with-border">
			<h3 class="box-title"><b>Create Question</b></h3>
		</div>

		<div class="box-body">
			<form action="" method="post" class="form-horizontal">
				{{csrf_field()}}
				
				<h4><span style="color: #d73925;">Question</span></h4>
				
				<div class="form-group">
					<label for="questionText" class="col-md-3 control-label">Question Text</label>
					<div class="col-md-6">
						<textarea class="form-control pull-right" id="questionText" name="questionText" placeholder="Question Text" rows="7"></textarea>
					</div>
				</div>

				<div class="form-group">
					<label for="correctAnswer" class="col-md-3 control-label">Correct Answer</label>
					<div class="col-md-6">
						<input type="text" class="form-control pull-right" id="correctAnswer" name="correctAnswer" placeholder="Correct Answer">
					</div>
				</div>

				<hr>
				<h4><span style="color: #d73925;">Wrong Answers</span></h4>
				
				<div class="form-group">
					<label for="wrongAnswer1" class="col-md-3 control-label">Wrong Answer 1</label>
					<div class="col-md-6">
						<input type="text" class="form-control pull-right" id="wrongAnswer1" name="wrongAnswer1" placeholder="Wrong Answer 1">
					</div>
				</div>

				<div class="form-group">
					<label for="wrongAnswer2" class="col-md-3 control-label">Wrong Answer 2</label>
					<div class="col-md-6">
						<input type="text" class="form-control pull-right" id="wrongAnswer2" name="wrongAnswer2" placeholder="Wrong Answer 2">
					</div>
				</div>

				<div class="form-group">
					<label for="wrongAnswer3" class="col-md-3 control-label">Wrong Answer 3</label>
					<div class="col-md-6">
						<input type="text" class="form-control pull-right" id="wrongAnswer3" name="wrongAnswer3" placeholder="Wrong Answer 3">
					</div>
				</div>

				<hr>
				<h4><span style="color: #d73925;">Question Category</span></h4>

				<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
					<label for="jobcategoryId" class="col-md-3 control-label">Question Category</label>
					<div class="col-md-6">
						<select style="width: 100%;" class="select2 form-control" id="jobcategoryId" name="jobcategoryId">
							<option value="">Choose an industry…</option>

							{{-- @foreach($jobcategories as $jobcategory)
							
							<option value="{{ $jobcategory->id }}">{{ $jobcategory->name }}</option>

							@endforeach --}}

						</select>	
					</div>
				</div>

				<hr>

			<div class="form-group">
				<div class="col-md-offset-5 col-md-2">
					<button type="submit" class="btn btn-danger btn-block pull-right">Submit</button>
				</div>
			</div>
			{{-- end form --}}
		</form>
	</div>

	
	<!-- /.box-footer-->
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