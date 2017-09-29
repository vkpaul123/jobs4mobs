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

	<!-- Default box -->
	<div class="box">
		<div class="box-body">
			<h4><span style="color: #d73925;"><strong>Sender</strong></span>
      <a href="{{ route('admin.contact.inbox') }}"><button class="btn btn-danger pull-right">Back to <strong>Inbox</strong></button></a>
      </h4>
      <div class="row col-md-offset-2">
        <div class="col-md-2"><strong>Name:</strong></div>
        <div class="col-md-8">{{ $message->name }}</div>
      </div>
      <div class="row col-md-offset-2">
        <div class="col-md-2"><strong>Email:</strong></div>
        <div class="col-md-8">{{ $message->email }}</div>
      </div>
      <div class="row col-md-offset-2">
        <div class="col-md-2"><strong>User Type:</strong></div>
        <div class="col-md-8">{{ $message->userType }}</div>
      </div>
      <div class="row col-md-offset-2">
        <div class="col-md-2"><strong>Read by:</strong></div>
        <div class="col-md-8">Admin {{ $message->markMessageRead }}</div>
      </div>
      
      <hr>
      <h4><span style="color: #d73925;"><strong>Subject</strong></span></h4>
      <p>
        {{ $message->subject }}
      </p>

      <hr>
      <h4><span style="color: #d73925;"><strong>Message</strong></span></h4>
        <p>
          {{ $message->message }} 
        </p>
		</div>
	</div>

  <div class="box box-danger">
    <div class="box-header with-border">
      <h3><span style="color: #d73925;"><strong>Reply</strong></span></h3>
    </div>
    
    <div class="box-body">
      @if (Session::has('message'))
        <div class="alert alert-success">{{ Session::get('message') }}</div>
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
      
      <form action="{{ route('admin.contact.sendEmail') }}" method="post" class="form-horizontal">
        {{ csrf_field() }}
        <div class="form-group">
          <label for="mailFrom" class="col-md-2 control-label">From</label>
          <div class="col-md-8">
            <input type="text" class="form-control pull-right" id="mailFrom" name="mailFrom" placeholder="From" value="contact.jobs4mobs@gmail.com" disabled>
          </div>
        </div>

        <div class="form-group{{ $errors->has('fromName') ? ' has-error' : '' }}">
          <label for="fromName" class="col-md-2 control-label">From Name</label>
          <div class="col-md-8">
            <input type="text" class="form-control pull-right" id="fromName" name="fromName" placeholder="From Name" value="{{ Auth::user()->name }}">
          </div>
        </div>
        <hr>
        <div class="form-group{{ $errors->has('mailTo') ? ' has-error' : '' }}">
          <label for="mailTo" class="col-md-2 control-label text-danger">To</label>
          <div class="col-md-8">
            <input type="text" class="form-control pull-right" id="mailTo" name="mailTo" placeholder="To" value="{{ $message->email }}">
          </div>
        </div>
        <div class="form-group{{ $errors->has('mailToName') ? ' has-error' : '' }}">
          <label for="mailToName" class="col-md-2 control-label text-danger">To Name</label>
          <div class="col-md-8">
            <input type="text" class="form-control pull-right" id="mailToName" name="mailToName" placeholder="To" value="{{ $message->name }}">
          </div>
        </div>
        <hr>
        <div class="form-group{{ $errors->has('toSubject') ? ' has-error' : '' }}">
          <label for="toSubject" class="col-md-2 control-label">Subject</label>
          <div class="col-md-8">
            <textarea class="form-control pull-right" id="toSubject" name="toSubject" placeholder="Subject" rows="3">[No Reply] Regarding your message which subjected "{{$message->subject}}"</textarea>
          </div>
        </div>

        <div class="form-group{{ $errors->has('mailBody') ? ' has-error' : '' }}">
          <label for="mailBody" class="col-md-2 control-label">Body</label>
          <div class="col-md-8">
            <textarea class="form-control pull-right" id="mailBody" name="mailBody" placeholder="Body" rows="10">{{ old('mailBody') }}</textarea>
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