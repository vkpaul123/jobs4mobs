@extends('Admin.homepage.layouts.app')
@section('title', 'Admins')

@section('body')
<!-- Content Header (Page header) -->
<section class="content-header">
	<h1>
		<span style="color:#d73925;"><b>Admin</b> </span> Questionnaire Template Upload
		<small>Upload Questionnaire Template</small>
	</h1>
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
		<li class="active">Questionnaire Template Upload</li>
	</ol>
</section>

<!-- Main content -->
<section class="content">

	<!-- Default box -->
	<div class="box">
		<div class="box-header with-border">
			<h3>Template Upload</h3>
		</div>
		<div class="box-body">
      @if (Session::has('message'))
        <div class="alert alert-success">{!!Session::get('message')!!}</div>
      @endif
      @if(count($errors) > 0)
        <center>
          <p class="alert alert-danger">
            <strong>
              You Have Errors while submitting. Please Fill up the information in the Fields that are Highlighted in Red.
            </strong>
          </p>
        </center>
      @endif
      <form action="{{ route('questionnaireTemplateUpload.uploadTemplate') }}" class="form-horizontal" enctype="multipart/form-data" method="post">
        {{csrf_field()}}
        {{-- {{ print_r($errors) }} --}}
        <div class="form-group{{ $errors->has('import_file') ? ' has-error' : '' }}">
          <label for="import_file" class="col-md-3 control-label">File Upload (.XLSX)</label>
          <div class="col-md-6">
            <input type="file" id="import_file" name="import_file" class="form-control pull-right">
          </div>
        </div>
        <div class="form-group">
          <div class="col-md-offset-5 col-md-2">
            <button type="submit" class="btn btn-danger btn-block pull-right">Upload</button>
          </div>
        </div>          
      </form>

      
    </div>
  </div>
  <!-- /.box -->

</section>
<!-- /.content -->

@endsection