@extends('Admin.homepage.layouts.app')
@section('title', 'Admins')

@section('extraPageSpecificHeadContent')
<link rel="stylesheet" href="{{ asset('assets/userPage/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
@endsection

@section('body')
<!-- Content Header (Page header) -->
<section class="content-header">
	<h1>
		<span style="color:#d73925;"><b>Admin</b> </span> View All Admins
		<small>all Admin detilas</small>
	</h1>
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
		<li class="active">View All Admins</li>
	</ol>
</section>

<!-- Main content -->
<section class="content">

	<!-- Default box -->
	<div class="box">
		<div class="box-header with-border">
			<h3>All Admins</h3>
		</div>
		<div class="box-body">
      @if (Session::has('messageSuccess'))
        <div class="alert alert-success">{!! Session::get('messageSuccess') !!}
          <button type="button" class="close" data-dismiss="alert"><i class="fa fa-times"></i></button>
        </div>
      @endif
			<table id="questionnare" class="table table-bordered table-hover">
        <thead>
          <tr>
            <th><span class="text-danger">ID</span></th>
            <th><span class="text-danger">Admin Name</span></th>
            <th><span class="text-danger">Email</span></th>
            <th><span class="text-danger">Phone No.</span></th>
            <th><span class="text-danger">Admin Since</span></th>
          </tr>
        </thead>
        <tbody>
          @foreach ($admins as $admin)
          <tr>
            <td>{{$admin->id}}</td>
            <td>{{$admin->name}}</td>
            <td>{{$admin->email}}</td>
            <td>{{$admin->phoneNo}}</td>
            <td>{{$admin->created_at->diffForHumans() }}</td>
          </tr>
          @endforeach

        </tbody>
        <tfoot>
          <tr>
            <th><span class="text-danger">ID</span></th>
            <th><span class="text-danger">Admin Name</span></th>
            <th><span class="text-danger">Email</span></th>
            <th><span class="text-danger">Phone No.</span></th>
            <th><span class="text-danger">Admin Since</span></th>
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