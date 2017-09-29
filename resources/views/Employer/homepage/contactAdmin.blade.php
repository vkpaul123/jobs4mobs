@extends('Employer.homepage.layouts.app')
@section('title', 'Employers')

@section('body')
<!-- Content Header (Page header) -->
<section class="content-header">
	<h1>
		<span style="color:#e08e0b;"><b>Employer</b> </span> Contact Admin
		<small>ask for Help</small>
	</h1>
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
		<li class="active">Contact Admin</li>
	</ol>
</section>

<!-- Main content -->
<section class="content">

	<!-- Default box -->
	<div class="box">

		<div class="box-body">
			<form action="" method="post" class="form-horizontal">
				{{csrf_field()}}
				<h4><strong>Just Get In Touch!</strong></h4>
				<div class="hline"></div>
				<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.</p>

				<div class="form-group">
					<label for="name" class="col-md-3 control-label">Name</label>
					<div class="col-md-6">
						<input type="text" id="name" name="name" class="form-control pull-right" value="{{ Auth::user()->name }}">
					</div>
				</div>

				<div class="form-group">
					<label for="email" class="col-md-3 control-label">Email</label>
					<div class="col-md-6">
						<input type="email" id="email" name="email" class="form-control pull-right" value="{{ Auth::user()->email }}">
					</div>
				</div>

				<div class="form-group">
					<label for="subject" class="col-md-3 control-label">Subject</label>
					<div class="col-md-6">
						<input type="text" id="subject" name="subject" class="form-control pull-right" placeholder="Subject">
					</div>
				</div>

				<div class="form-group">
					<label for="messageText" class="col-md-3 control-label">Message</label>
					<div class="col-md-6">
						<textarea id="messageText" name="messageText" class="form-control pull-right" placeholder="Subject" rows="10"></textarea>
					</div>
				</div>

				

				<div class="form-group">
					<div class="col-md-offset-4 col-md-4">
						<button type="submit" class="btn btn-warning btn-block pull-right"><strong>Submit</strong></button>
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