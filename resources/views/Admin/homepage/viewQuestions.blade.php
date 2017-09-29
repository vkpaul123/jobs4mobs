@extends('Admin.homepage.layouts.app')
@section('title', 'Admins')

@section('extraPageSpecificHeadContent')
<link rel="stylesheet" href="{{ asset('assets/userPage/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
@endsection

@section('body')
<!-- Content Header (Page header) -->
<section class="content-header">
	<h1>
		<span style="color:#d73925;"><b>Admin</b> </span> View Questionnare
		<small>all questions in questionnare</small>
	</h1>
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
		<li class="active">View Questionnaire</li>
	</ol>
</section>

<!-- Main content -->
<section class="content">

	<!-- Default box -->
	<div class="box">
		<div class="box-header with-border">
			<h3>Questionnare ID: <strong class="text-danger">101</strong>
        <a href="/admin/tests/addQuestion"><button class="btn btn-success btn-lg pull-right"><i class="glyphicon glyphicon-plus-sign">&nbsp</i><strong>Add Question</strong></button></a>
      </h3>
		</div>
		<div class="box-body">
			<table id="questionnare" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th><span class="text-danger">Question</span></th>
                  <th><span class="text-danger">Correct Ans.</span></th>
                  <th><span class="text-danger">Wrong Ans. 1</span></th>
                  <th><span class="text-danger">Wrong Ans. 2</span></th>
                  <th><span class="text-danger">Wrong Ans. 3</span></th>
                  <th><span class="text-danger">Category</span></th>
                  <th><span class="text-danger">Options</span></th>
                </tr>
                </thead>
                <tbody>
                <tr>
                  <td>
                  	<p>
                  		Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.
                  	</p>
                  </td>
                  <td>Internet
                    Explorer 4.0
                  </td>
                  <td>Win 95+</td>
                  <td> 4</td>
                  <td>X</td>
                  <td>Accounts</td>
                  <td>
                  	<a href="#"><span class="glyphicon glyphicon-edit"></span></a> | <a href="#"><span class="glyphicon glyphicon-trash"></span></a>
                  </td>
                </tr>
                <tr>
                  <td>
                  	<p>
                  		Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.
                  	</p>
                  </td>
                  <td>Internet
                    Explorer 5.0
                  </td>
                  <td>Win 95+</td>
                  <td>5</td>
                  <td>C</td>
                  <td>Accounts</td>
                  <td>
                  	<a href="#"><span class="glyphicon glyphicon-edit"></span></a> | <a href="#"><span class="glyphicon glyphicon-trash"></span></a>
                  </td>
                </tr>
               
                <tr>
                  <td>
                  	<p>
                  		Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.
                  	</p>
                  </td>
                  <td>Internet Explorer 7</td>
                  <td>Win XP SP2+</td>
                  <td>7</td>
                  <td>A</td>
                  <td>Accounts</td>
                  <td>
                  	<a href="#"><span class="glyphicon glyphicon-edit"></span></a> | <a href="#"><span class="glyphicon glyphicon-trash"></span></a>
                  </td>
                </tr>
                <tr>
                  <td>
                  	<p>
                  		Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.
                  	</p>
                  </td>
                  <td>AOL browser (AOL desktop)</td>
                  <td>Win XP</td>
                  <td>6</td>
                  <td>A</td>
                  <td>Accounts</td>
                  <td>
                  	<a href="#"><span class="glyphicon glyphicon-edit"></span></a> | <a href="#"><span class="glyphicon glyphicon-trash"></span></a>
                  </td>
                </tr>
                <tr>
                  <td>
                  	<p>
                  		Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.
                  	</p>
                  </td>
                  <td>Firefox 1.0</td>
                  <td>Win 98+ / OSX.2+</td>
                  <td>1.7</td>
                  <td>A</td>
                  <td>Accounts</td>
                  <td>
                  	<a href="#"><span class="glyphicon glyphicon-edit"></span></a> | <a href="#"><span class="glyphicon glyphicon-trash"></span></a>
                  </td>
                </tr>
                <tr>
                  <td>
                  	<p>
                  		Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.
                  	</p>
                  </td>
                  <td>Firefox 1.5</td>
                  <td>Win 98+ / OSX.2+</td>
                  <td>1.8</td>
                  <td>A</td>
                  <td>Accounts</td>
                  <td>
                  	<a href="#"><span class="glyphicon glyphicon-edit"></span></a> | <a href="#"><span class="glyphicon glyphicon-trash"></span></a>
                  </td>
                </tr>
                <tr>
                  <td>
                  	<p>
                  		Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.
                  	</p>
                  </td>
                  <td>Firefox 2.0</td>
                  <td>Win 98+ / OSX.2+</td>
                  <td>1.8</td>
                  <td>A</td>
                  <td>Accounts</td>
                  <td>
                  	<a href="#"><span class="glyphicon glyphicon-edit"></span></a> | <a href="#"><span class="glyphicon glyphicon-trash"></span></a>
                  </td>
                </tr>
                <tr>
                  <td>
                  	<p>
                  		Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.
                  	</p>
                  </td>
                  <td>Firefox 3.0</td>
                  <td>Win 2k+ / OSX.3+</td>
                  <td>1.9</td>
                  <td>A</td>
                  <td>Accounts</td>
                  <td>
                  	<a href="#"><span class="glyphicon glyphicon-edit"></span></a> | <a href="#"><span class="glyphicon glyphicon-trash"></span></a>
                  </td>
                </tr>
                <tr>
                  <td>
                  	<p>
                  		Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.
                  	</p>
                  </td>
                  <td>Camino 1.0</td>
                  <td>OSX.2+</td>
                  <td>1.8</td>
                  <td>A</td>
                  <td>Accounts</td>
                  <td>
                  	<a href="#"><span class="glyphicon glyphicon-edit"></span></a> | <a href="#"><span class="glyphicon glyphicon-trash"></span></a>
                  </td>
                </tr>
                <tr>
                  <td>
                  	<p>
                  		Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.
                  	</p>
                  </td>
                  <td>Camino 1.5</td>
                  <td>OSX.3+</td>
                  <td>1.8</td>
                  <td>A</td>
                  <td>Accounts</td>
                  <td>
                  	<a href="#"><span class="glyphicon glyphicon-edit"></span></a> | <a href="#"><span class="glyphicon glyphicon-trash"></span></a>
                  </td>
                </tr>
                <tr>
                  <td>
                  	<p>
                  		Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.
                  	</p>
                  </td>
                  <td>Netscape 7.2</td>
                  <td>Win 95+ / Mac OS 8.6-9.2</td>
                  <td>1.7</td>
                  <td>A</td>
                  <td>Accounts</td>
                  <td>
                  	<a href="#"><span class="glyphicon glyphicon-edit"></span></a> | <a href="#"><span class="glyphicon glyphicon-trash"></span></a>
                  </td>
                </tr>
                <tr>
                  <td>
                  	<p>
                  		Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.
                  	</p>
                  </td>
                  <td>Netscape Browser 8</td>
                  <td>Win 98SE+</td>
                  <td>1.7</td>
                  <td>A</td>
                  <td>Accounts</td>
                  <td>
                  	<a href="#"><span class="glyphicon glyphicon-edit"></span></a> | <a href="#"><span class="glyphicon glyphicon-trash"></span></a>
                  </td>
                </tr>
                <tr>
                  <td>
                  	<p>
                  		Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.
                  	</p>
                  </td>
                  <td>Netscape Navigator 9</td>
                  <td>Win 98+ / OSX.2+</td>
                  <td>1.8</td>
                  <td>A</td>
                  <td>Accounts</td>
                  <td>
                  	<a href="#"><span class="glyphicon glyphicon-edit"></span></a> | <a href="#"><span class="glyphicon glyphicon-trash"></span></a>
                  </td>
                </tr>
                <tr>
                  <td>
                  	<p>
                  		Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.
                  	</p>
                  </td>
                  <td>Mozilla 1.0</td>
                  <td>Win 95+ / OSX.1+</td>
                  <td>1</td>
                  <td>A</td>
                  <td>Accounts</td>
                  <td>
                  	<a href="#"><span class="glyphicon glyphicon-edit"></span></a> | <a href="#"><span class="glyphicon glyphicon-trash"></span></a>
                  </td>
                </tr>
                <tr>
                  <td>
                  	<p>
                  		Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.
                  	</p>
                  </td>
                  <td>Mozilla 1.1</td>
                  <td>Win 95+ / OSX.1+</td>
                  <td>1.1</td>
                  <td>A</td>
                  <td>Accounts</td>
                  <td>
                  	<a href="#"><span class="glyphicon glyphicon-edit"></span></a> | <a href="#"><span class="glyphicon glyphicon-trash"></span></a>
                  </td>
                </tr>
                <tr>         
                  <td>Other browsers</td>
                  <td>All others</td>
                  <td>-</td>
                  <td>-</td>
                  <td>U</td>
                  <td>Accounts</td>
                  <td>
                  	<a href="#"><span class="glyphicon glyphicon-edit"></span></a> | <a href="#"><span class="glyphicon glyphicon-trash"></span></a>
                  </td>
                </tr>
                </tbody>
                <tfoot>
                <tr>
                  <th><span class="text-danger">Question</span></th>
                  <th><span class="text-danger">Correct Ans.</span></th>
                  <th><span class="text-danger">Wrong Ans. 1</span></th>
                  <th><span class="text-danger">Wrong Ans. 2</span></th>
                  <th><span class="text-danger">Wrong Ans. 3</span></th>
                  <th><span class="text-danger">Category</span></th>
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