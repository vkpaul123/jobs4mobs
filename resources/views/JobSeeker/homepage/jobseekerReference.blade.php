@extends('JobSeeker.homepage.layouts.app')
@section('title', 'JobSeekers')


@section('body')
<!-- Content Header (Page header) -->
<section class="content-header">
	<h1>
		<span style="color:#367fa9;"><b>JobSeeker</b> </span> - REFERENCES
		<small>Set up your Resume</small>
	</h1>
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
		<li class="active">Register Your experiences</li>
	</ol>
</section>

<!-- Main content -->
<section class="content">

	<!-- Default box -->
	<div class="box">
		<div class="box-header with-border">
			<h3 class="box-title"><b>Reference  Details</b></h3>
		</div>

		<div class="box-body">
			<form action="" method="post" class="form-horizontal">
				{{csrf_field()}}

				<div class="form-group">
					<label for="companyName" class="col-md-3 control-label">Refernece Name</label>
					<div class="col-md-6">
						<input type="text" class="form-control pull-right" id="referencName" name="referencName" placeholder="Reference Name">
					</div>
				</div>

				<div class="form-group">
					<label for="jobTitle" class="col-md-3 control-label">Position</label>
					<div class="col-md-6">
						<input type="text" class="form-control pull-right" id="position" name="position" placeholder="Position">
					</div>
				</div>

				
				<div class="form-group">
					<label for="jobTitle" class="col-md-3 control-label">Phone</label>
					<div class="col-md-6">
						<input type="text" class="form-control pull-right" id="phone" name="phone" placeholder="Phone">
					</div>
				</div>

				<div class="form-group">
					<label for="jobTitle" class="col-md-3 control-label">E-mail</label>
					<div class="col-md-6">
						<input type="text" class="form-control pull-right" id="emailId" name="emailId" placeholder="E-mail">
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

	{{-- Entered Detials --}}
	<h4>Details Entered</h4>
	{{-- @foreach() --}}
	<div class="container">
		<div class="row">
			<div class="col-md-11">
				<div class="box box-default collapsed-box">
					<div class="box-header with-border">
						<h3 class="box-title" id="referencName"><strong>Reference Name</strong> </h3>

						<div class="box-tools pull-right">
							<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
							</button>
						</div>
						<!-- /.box-tools -->
					</div>
					<!-- /.box-header -->
					<div class="box-body">
						<div class="container">
							<div class="row">
								<div class="col-md-4" id="referencName">
									<strong>Bailey</strong>
								</div>
								
								<div class="col-md-2 pull-right">
									<a href="#"><span class="glyphicon glyphicon-edit"></span></a> | <a href="#"><span class="glyphicon glyphicon-trash"></span></a>
								</div>
							</div>
							
						</div>
					</div>
					<!-- /.box-body -->
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-md-11">
				<div class="box box-default collapsed-box">
					<div class="box-header with-border">
						<h3 class="box-title" id="phone"><strong>Phone</strong> </h3>

						<div class="box-tools pull-right">
							<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
							</button>
						</div>
						<!-- /.box-tools -->
					</div>
					<!-- /.box-header -->
					<div class="box-body">
						<div class="container">
							<div class="row">
								<div class="col-md-4" id="phone">
									<strong>923145678</strong>
								</div>
								
								<div class="col-md-2 pull-right">
									<a href="#"><span class="glyphicon glyphicon-edit"></span></a> | <a href="#"><span class="glyphicon glyphicon-trash"></span></a>
								</div>
							</div>
							
						</div>
					</div>
					<!-- /.box-body -->
				</div>
			</div>
		</div>

		{{-- Dummy --}}
		<div class="row">
			<div class="col-md-11">
				<div class="box box-default collapsed-box">
					<div class="box-header with-border">
						<h3 class="box-title" id="emailId"><strong>E-mail</strong> </h3>

						<div class="box-tools pull-right">
							<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
							</button>
						</div>
						<!-- /.box-tools -->
					</div>
					<!-- /.box-header -->
					<div class="box-body">
						<div class="container">
							<div class="row">
								<div class="col-md-4" id="emailId">
									<strong>bailey@gmail.com</strong>
								</div>
								
								<div class="col-md-2 pull-right">
									<a href="#"><span class="glyphicon glyphicon-edit"></span></a> | <a href="#"><span class="glyphicon glyphicon-trash"></span></a>
								</div>
							</div>
							
						</div>
					</div>
					<!-- /.box-body -->
				</div>
			</div>
		</div>
		{{-- @endforeach --}}
		
		<div class="row">
			<div class="col-md-offset-7 col-md-4">
				<a href="/home/resumeBuilder/viewResume"><button type="button" class="btn btn-success btn-block pull-right btn-lg"><strong>Done</strong></button></a>
			</div>
		</div>
	</div>

</section>
<!-- /.content -->

@endsection



@section('extraPageSpecificLoadScriptsContent')



@endsection