@extends('Admin.homepage.layouts.app')
@section('title', 'Admins')

@section('extraPageSpecificHeadContent')
<link rel="stylesheet" href="{{ asset('assets/userPage/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
@endsection

@section('body')
<!-- Content Header (Page header) -->
<section class="content-header">
	<h1>
		<span style="color:#d73925;"><b>Admin</b> </span> View All Job Categories
		<small>all Industry Categories</small>
	</h1>
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
		<li class="active">View All Job Categories</li>
	</ol>
</section>

<!-- Main content -->
<section class="content">

	<!-- Default box -->
	<div class="box">
		<div class="box-header with-border">
			<h3>All Job Categories</h3>
		</div>
		<div class="box-body">
      <div class="box box-danger">
        <div class="box-header with-border">
          <h4 class="text-danger"><strong>Add/Edit Category</strong></h4>
          <form action="{{ route('viewJobCategories.store') }}" method="post" class="form-horizontal">
            {{csrf_field()}}
            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
              <label for="name" class="col-md-3 control-label">Category Name</label>
              <div class="col-md-6">
                <input type="text" class="form-control pull-right" id="name" name="name" placeholder="Category Name" value="{{ old('name') }}">
              </div>
            </div>
            <input type="hidden" name="id" id="id" value="">
            <div class="form-group">
              <div class="col-md-offset-5 col-md-2">
                <button type="submit" class="btn btn-danger btn-block pull-right">Submit</button>
              </div>
            </div>
          </form>
        </div>
        <div class="box-header with-border">
          <h4 class="text-danger"><strong>Upload Category Excel File</strong></h4>
          <form action="{{ route('viewJobCategories.upload') }}" class="form-horizontal" enctype="multipart/form-data" method="post">
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
			<table id="questionnare" class="table table-bordered table-hover">
        <thead>
          <tr>
            <th><span class="text-danger">ID</span></th>
            <th><span class="text-danger">Category Name</span></th>
            <th><span class="text-danger">Options</span></th>
          </tr>
        </thead>
        <tbody>
          @foreach($jobcategories as $jobcategory)
          <tr>
            <td>{{ $jobcategory->id }}</td>
            <td>{{ $jobcategory->name }}</td>
            <td>
             <a href="#" onclick="document.getElementById('name').value = '{{$jobcategory->name}}'; document.getElementById('id').value = {{$jobcategory->id }};"><span class="glyphicon glyphicon-edit"></span></a> | <a href="#" onclick="
                  if(confirm('Are You Sure, you want to delete this record?')) {
                    event.preventDefault();
                    document.getElementById('delete-jobcategory-{{ $jobcategory->id }}').submit();
                  }
                  else {
                    event.preventDefault();
                  }
                  "><span class="glyphicon glyphicon-trash"></span></a>

                  <form method="post" id="delete-jobcategory-{{ $jobcategory->id }}" action="{{ route('viewJobCategories.destroy', $jobcategory->id) }}" style="display: none;">
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}
                  </form>
           </td>
         </tr>
         @endforeach
       </tbody>
       <tfoot>
        <tr>
          <th><span class="text-danger">ID</span></th>
          <th><span class="text-danger">Category Name</span></th>
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