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
			<table id="questionnare" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th><span class="text-danger">ID</span></th>
                  <th><span class="text-danger">User Name</span></th>
                  <th><span class="text-danger">Email</span></th>
                  <th><span class="text-danger">Phone No.</span></th>
                  <th><span class="text-danger">Options</span></th>
                </tr>
                </thead>
                <tbody>
                <tr>
                  
                  <td>Internet
                    Explorer 4.0
                  </td>
                  <td>Win 95+</td>
                  <td> 4</td>
                  <td>X</td>
                  <td>
                  	<a href="#"><span class="glyphicon glyphicon-edit"></span></a> | <a href="#"><span class="glyphicon glyphicon-trash"></span></a>
                  </td>
                </tr>
                <tr>
                  
                  <td>Internet
                    Explorer 5.0
                  </td>
                  <td>Win 95+</td>
                  <td>5</td>
                  <td>C</td>
                  <td>
                  	<a href="#"><span class="glyphicon glyphicon-edit"></span></a> | <a href="#"><span class="glyphicon glyphicon-trash"></span></a>
                  </td>
                </tr>
               
                <tr>
                  
                  <td>Internet Explorer 7</td>
                  <td>Win XP SP2+</td>
                  <td>7</td>
                  <td>A</td>
                  <td>
                  	<a href="#"><span class="glyphicon glyphicon-edit"></span></a> | <a href="#"><span class="glyphicon glyphicon-trash"></span></a>
                  </td>
                </tr>
                <tr>
                  
                  <td>AOL browser (AOL desktop)</td>
                  <td>Win XP</td>
                  <td>6</td>
                  <td>A</td>
                  <td>
                  	<a href="#"><span class="glyphicon glyphicon-edit"></span></a> | <a href="#"><span class="glyphicon glyphicon-trash"></span></a>
                  </td>
                </tr>
                <tr>
                  
                  <td>Firefox 1.0</td>
                  <td>Win 98+ / OSX.2+</td>
                  <td>1.7</td>
                  <td>A</td>
                  <td>
                  	<a href="#"><span class="glyphicon glyphicon-edit"></span></a> | <a href="#"><span class="glyphicon glyphicon-trash"></span></a>
                  </td>
                </tr>
                <tr>
                  
                  <td>Firefox 1.5</td>
                  <td>Win 98+ / OSX.2+</td>
                  <td>1.8</td>
                  <td>A</td>
                  <td>
                  	<a href="#"><span class="glyphicon glyphicon-edit"></span></a> | <a href="#"><span class="glyphicon glyphicon-trash"></span></a>
                  </td>
                </tr>
                <tr>
                  
                  <td>Firefox 2.0</td>
                  <td>Win 98+ / OSX.2+</td>
                  <td>1.8</td>
                  <td>A</td>
                  <td>
                  	<a href="#"><span class="glyphicon glyphicon-edit"></span></a> | <a href="#"><span class="glyphicon glyphicon-trash"></span></a>
                  </td>
                </tr>
                <tr>
                  
                  <td>Firefox 3.0</td>
                  <td>Win 2k+ / OSX.3+</td>
                  <td>1.9</td>
                  <td>A</td>
                  <td>
                  	<a href="#"><span class="glyphicon glyphicon-edit"></span></a> | <a href="#"><span class="glyphicon glyphicon-trash"></span></a>
                  </td>
                </tr>
                <tr>
                  
                  <td>Camino 1.0</td>
                  <td>OSX.2+</td>
                  <td>1.8</td>
                  <td>A</td>
                  <td>
                  	<a href="#"><span class="glyphicon glyphicon-edit"></span></a> | <a href="#"><span class="glyphicon glyphicon-trash"></span></a>
                  </td>
                </tr>
                <tr>
                  
                  <td>Camino 1.5</td>
                  <td>OSX.3+</td>
                  <td>1.8</td>
                  <td>A</td>
                  <td>
                  	<a href="#"><span class="glyphicon glyphicon-edit"></span></a> | <a href="#"><span class="glyphicon glyphicon-trash"></span></a>
                  </td>
                </tr>
                <tr>
                  
                  <td>Netscape 7.2</td>
                  <td>Win 95+ / Mac OS 8.6-9.2</td>
                  <td>1.7</td>
                  <td>A</td>
                  <td>
                  	<a href="#"><span class="glyphicon glyphicon-edit"></span></a> | <a href="#"><span class="glyphicon glyphicon-trash"></span></a>
                  </td>
                </tr>
                <tr>
                  
                  <td>Netscape Browser 8</td>
                  <td>Win 98SE+</td>
                  <td>1.7</td>
                  <td>A</td>
                  <td>
                  	<a href="#"><span class="glyphicon glyphicon-edit"></span></a> | <a href="#"><span class="glyphicon glyphicon-trash"></span></a>
                  </td>
                </tr>
                <tr>
                  
                  <td>Netscape Navigator 9</td>
                  <td>Win 98+ / OSX.2+</td>
                  <td>1.8</td>
                  <td>A</td>
                  <td>
                  	<a href="#"><span class="glyphicon glyphicon-edit"></span></a> | <a href="#"><span class="glyphicon glyphicon-trash"></span></a>
                  </td>
                </tr>
                <tr>
                  
                  <td>Mozilla 1.0</td>
                  <td>Win 95+ / OSX.1+</td>
                  <td>1</td>
                  <td>A</td>
                  <td>
                  	<a href="#"><span class="glyphicon glyphicon-edit"></span></a> | <a href="#"><span class="glyphicon glyphicon-trash"></span></a>
                  </td>
                </tr>
                <tr>
                  
                  <td>Mozilla 1.1</td>
                  <td>Win 95+ / OSX.1+</td>
                  <td>1.1</td>
                  <td>A</td>
                  <td>
                  	<a href="#"><span class="glyphicon glyphicon-edit"></span></a> | <a href="#"><span class="glyphicon glyphicon-trash"></span></a>
                  </td>
                </tr>
                </tbody>
                <tfoot>
                <tr>
                  <th><span class="text-danger">ID</span></th>
                  <th><span class="text-danger">User Name</span></th>
                  <th><span class="text-danger">Email</span></th>
                  <th><span class="text-danger">Phone No.</span></th>
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