@extends('Admin.homepage.layouts.app')
@section('title', 'Admins')

@section('extraPageSpecificHeadContent')
<link rel="stylesheet" href="{{ asset('assets/userPage/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
@endsection

@section('body')
<!-- Content Header (Page header) -->
<section class="content-header">
	<h1>
		<span style="color:#d73925;"><b>Admin</b> </span> Admin Inbox
		<small>messages to the Admin</small>
	</h1>
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
		<li class="active">Admin Inbox</li>
	</ol>
</section>

<!-- Main content -->
<section class="content">
  {{-- {{print_r($messages)}} --}}
	<!-- Default box -->
	<div class="box">
		<div class="box-body">
			<table id="messages" class="table table-bordered table-hover">
        <thead>
        <tr>
          <th><span class="text-danger">Name</span></th>
          <th><span class="text-danger">Email</span></th>
          <th><span class="text-danger">Subject</span></th>
          <th><span class="text-danger">User</span></th>
          <th><span class="text-danger">Read/Unread</span></th>
          <th><span class="text-danger">Time</span></th>
          <th><span class="text-danger">Options</span></th>
        </tr>
        </thead>
        <tbody>
          @foreach($messages as $message)
            <tr @unless($message->markMessageRead) class="bg-danger" @endunless>
              <td>{{ $message->name }}</td>
              <td>
                <p>
                  {{ $message->email }}
                </p>
              </td>
              <td>
                <p>
                  <b>
                  {{ $message->subject }}
                  </b>
                </p>
              </td>
              <td>{{ $message->userType }}</td>
              <td>{{ $message->markMessageRead }}</td>
              <td>{{ $message->created_at }}br</td>
              <td>
              	<a href="" 
                onclick="
                    event.preventDefault();
                    document.getElementById('viewMessageForm-{{ $message->id }}').submit();
                "><span class="glyphicon glyphicon-eye-open"></span></a>

                <form method="post" id="viewMessageForm-{{$message->id}}" action="{{ route('admin.contact.editMessage', $message->id) }}">
                  {{ csrf_field() }}
                  {{ method_field('PUT') }}
                  
                </form>
              </td>
            </tr>
          @endforeach

        </tbody>
        <tfoot>
        <tr>
          <th><span class="text-danger">Name</span></th>
          <th><span class="text-danger">Email</span></th>
          <th><span class="text-danger">Subject</span></th>
          <th><span class="text-danger">User</span></th>
          <th><span class="text-danger">Read/Unread</span></th>
          <th><span class="text-danger">Time</span></th>
          <th><span class="text-danger">Options</span></th>
        </tr>
        </tfoot>
      </table>
		</div>
	</div>
	<!-- /.box -->

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
    $('#messages').DataTable({
      'paging'      : true,
      'lengthChange': true,
      'searching'   : true,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : true,
      'order' : '5, desc',
    })
  })
</script>

@endsection