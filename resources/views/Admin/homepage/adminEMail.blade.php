@extends('Admin.homepage.layouts.app')
@section('title', 'Admins')

@section('extraPageSpecificHeadContent')
<link rel="stylesheet" href="{{ asset('assets/userPage/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
@endsection

@section('body')
<!-- Content Header (Page header) -->
<section class="content-header">
	<h1>
		<span style="color:#d73925;"><b>Admin</b> </span> Admin Inbox Message
		<small>messages to the Admin</small>
	</h1>
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
		<li class="active">Admin Inbox Message</li>
	</ol>
</section>

<!-- Main content -->
<section class="content">

  <div class="box">
    <div class="box-header with-border">
      <h3><span style="color: #d73925;"><strong>Reply</strong></span></h3>
    </div>

    <div class="box-body">
      <form action="" method="post" class="form-horizontal">
        <div class="form-group">
          <label for="mailFrom" class="col-md-2 control-label">From</label>
          <div class="col-md-8">
            <input type="text" class="form-control pull-right" id="mailFrom" name="mailFrom" placeholder="From">
          </div>
        </div>

        <div class="form-group">
          <label for="fromName" class="col-md-2 control-label">From Name</label>
          <div class="col-md-8">
            <input type="text" class="form-control pull-right" id="fromName" name="fromName" placeholder="From Name">
          </div>
        </div>
        <hr>
        <div class="form-group">
          <label for="mailTo" class="col-md-2 control-label text-danger">To</label>
          <div class="col-md-8">
            <input type="text" class="form-control pull-right" id="mailTo" name="mailTo" placeholder="To">
          </div>
        </div>
        <hr>
        <div class="form-group">
          <label for="toSubject" class="col-md-2 control-label">Subject</label>
          <div class="col-md-8">
            <textarea class="form-control pull-right" id="toSubject" name="toSubject" placeholder="Subject" rows="3"></textarea>
          </div>
        </div>

        <div class="form-group">
          <label for="mailBody" class="col-md-2 control-label">Body</label>
          <div class="col-md-8">
            <textarea class="form-control pull-right" id="mailBody" name="mailBody" placeholder="Body" rows="10"></textarea>
          </div>
        </div>

        <div class="form-group">
          <div class="col-md-offset-5 col-md-2">
            <button type="submit" class="btn btn-danger btn-block pull-right">Send</button>
          </div>
        </div>
      </form>
    </div>
  </div>

</section>
<!-- /.content -->

@endsection

@section('extraPageSpecificLoadScriptsContent')

<script src="{{ asset('assets/userPage/bower_components/datatables.net/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/userPage/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>
<!-- FastClick -->
<script src="{{ asset('assets/userPage/bower_components/fastclick/lib/fastclick.js') }}"></script>

<script>
  $(function () {
    $('#questionnare').DataTable({
      'paging'      : true,
      'lengthChange': true,
      'searching'   : true,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : true
    })
  })
</script>

@endsection