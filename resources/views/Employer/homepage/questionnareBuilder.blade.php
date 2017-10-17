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
		<span style="color:#e08e0b;"><b>Employer</b> </span> Questionnare Builder
		<small>Build Your Questionnare</small>
	</h1>
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
		<li class="active">Questionnare Builder</li>
	</ol>
</section>

<!-- Main content -->
<section class="content">

	<!-- Default box -->
	<div class="box">

		<div class="box-body">
			<br>
			
			<div class="container-fluid">
				<div class="row">
					<div class="jumbotron">
						<center>
							<h1>
								<img class="img img-responsive" src="{{ asset('assets/staticImages/Logos/Logo_Main.png') }}" alt="logo" width="400">
								<span class="text-warning"><strong>Questionnare Builder</strong></span>
							</h1>
						</center>
					</div>
				</div>
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
				<form action="{{ route('questionnareBuilder.store') }}" id="questionnareBuilderForm" method="post">
					{{ csrf_field() }}
					<input type="hidden" name="employers_id" value="{{ Auth::user()->id }}">
					<input type="hidden" name="buildOrUpload" id="buildOrUpload" value="">
					<div class="row">
						<div class="form-group{{ $errors->has('job_category_id') ? ' has-error' : '' }}">
							<label for="job_category_id" class="col-md-offset-2 col-md-2 control-label">Industry Type<span class="text-red">*</span></label>
							<div class="col-md-6">
								<select style="width: 100%;" class="select2 form-control" id="job_category_id" name="job_category_id">
									<option value="">Choose an industry…</option>

									@foreach($jobcategories as $jobcategory)
									
									<option value="{{ $jobcategory->id }}">{{ $jobcategory->name }}</option>

									@endforeach

								</select>	
							</div>
						</div>	
					</div>
					<br>
					<div class="row">
						<div class="col-md-4 col-md-offset-2">
							<div class="box box-warning">
								<div class="box-header">
									<center>
										<input type="button" class="btn btn-block btn-warning btn-lg" onclick="quesUpload()" value="Upload Existing">
										
									</center>
								</div>
							</div>
						</div>
						<div class="col-md-4">
							<div class="box box-success">
								<div class="box-header">
									<center>
										<input type="button" class="btn btn-block btn-success btn-lg" onclick="quesBuild()" value="Build New Questionnare">
										
									</center>
								</div>
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>

	</div>
	<!-- /.box -->

	<div class="container-fluid">
		<div class="box box-warning">
			<div class="box-header">
				<h3 class="box-title text-warning"><strong>All Questionnaires</strong></h3>
			</div>
			<!-- /.box-header -->
			<div class="box-body" id="report">
				<table id="example2" class="table table-bordered table-hover">
					<thead>
						<tr>
							<th>ID</th>
							<th>Industry Category</th>
							<th>Options</th>
						</tr>
					</thead>
					<tbody>
						
						@forelse($questionnares as $questionnare)
						<tr>
							<td>{{ $questionnare->id }}</td>
							<td>{{ $questionnare->job_category_id }}</td>
							<td>
								<a href="{{ route('question.show', $questionnare->id) }}">View</a>
								&nbsp | &nbsp
								<a href="{{ route('questionnareBuilder.edit', $questionnare->id) }}">Edit</a>
							</td>
						</tr>
						@empty
						<tr>
							<td colspan="3">
								<center><i>No Questionnaires created!</i></center>
							</td>
						</tr>
						@endforelse

					</tbody>
					<tfoot>
						<tr>
							<th>ID</th>
							<th>Industry Category</th>
							<th>Options</th>
						</tr>
					</tfoot>
				</table>
			</div> 
			<!-- /.box-body -->
		</div>
	</div>

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

<script>
	function quesBuild() {
		event.preventDefault();
		document.getElementById('buildOrUpload').value = "build";
		document.getElementById('questionnareBuilderForm').submit();
	}

	function quesUpload() {
		event.preventDefault();
		document.getElementById('buildOrUpload').value = "upload";
		document.getElementById('questionnareBuilderForm').submit();
	}
</script>

@endsection