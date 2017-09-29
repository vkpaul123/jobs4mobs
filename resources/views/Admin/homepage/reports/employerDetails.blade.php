@extends('Admin.homepage.layouts.app')
@section('title', 'Admins')

@section('extraPageSpecificHeadContent')
<link rel="stylesheet" href="{{ asset('assets/userPage/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
@endsection

@section('body')

<section class="content-header">
      <h1 id="reportTitle">EMPLOYER REPORT</h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Tables</a></li>
        <li class="active">Data tables</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Details of EMPLOYER</h3>

              <button class="btn btn-success pull-right" onclick="printReport()"><strong>Print Report</strong></button>
            </div>
            <!-- /.box-header -->
            <div class="box-body" id="report">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>ID</th>
                  <th>Name</th> {{-- firstname, lastname --}}
                  <th>Email</th>
                  <th>Company Name</th>
                  <th>Company Type</th> {{-- type, category --}}
                  <th>Category</th>
                  <th>Desgn</th>
                  <th>Address</th>
                  <th>Website</th>
                </tr>
                </thead>
                <tbody>
				
				@forelse($employers as $employer)
	                <tr>
	                  <td>{{ $employer->id }}</td>
	                  <td>{{ $employer->firstname }} {{ $employer->lastname }}</td>
	                  <td>{{ $employer->email }}</td>
                    <td>{{ $employer->companyname }}</td>
	                  <td>{{ $employer->companyType }} - {{ $employer->companyCategory }}</td>
	                  <td>@isset($employer->jobCategoryId) {{ $employer->jobCategoryId->name }} @endisset</td>
	                  <td>{{ $employer->designation }}</td>
	                  <td>
                      @isset($employer->address_id)
                      {{ $employer->address_id->primaryPhoneNo }}, {{ $employer->address_id->secondaryPhnoeNo }}, {{ $employer->address_id->faxNo }} <br>
                      {{ $employer->address_id->address }}, {{ $employer->address_id->cityName }}, {{ $employer->address_id->stateName }}-{{ $employer->address_id->postalCode }}, {{ $employer->address_id->countryName }}
                      @endisset
                    </td>
                    <td>
                      @isset($employer->address_id)
                        <a href="https://{{ $employer->address_id->website }}">{{ $employer->address_id->website }}</a>
                      @endisset
                    </td>
	                </tr>
				@empty
          <tr>
            <td><i>No Data!</i></td>
          </tr>
        @endforelse

                </tbody>
                <tfoot>
                <tr>
                  <th>ID</th>
                  <th>Name</th> {{-- firstname, lastname --}}
                  <th>Email</th>
                  <th>Company Name</th>
                  <th>Company Type</th> {{-- type, category --}}
                  <th>Category</th>
                  <th>Desgn</th>
                  <th>Address</th>
                  <th>Website</th>
                </tr>
                </tfoot>
              </table>
            </div> 
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

          {{-- </div>
          <!-- /.box --> --}}
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
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
      'autoWidth'   : false
    })
  })
</script>

<script type="text/javascript">
    function printReport()
    {
    	var css = 'table{border-collapse:collapse;width:100%}td,th{padding:8px;text-align:left;border-bottom:1px solid #ddd}';
        var mywindow = window.open('', 'PRINT', 'height=400,width=600');

        mywindow.document.write('<html><head><title>' + document.title + ' - ' + document.getElementById('reportTitle').innerHTML + '</title>');
        mywindow.document.write('<style>' + css + '</style>');
        mywindow.document.write('</head><body >');
        mywindow.document.write(document.getElementById('report').innerHTML);
        mywindow.document.write('</body></html>');

	    mywindow.document.close(); // necessary for IE >= 10
	    mywindow.focus(); // necessary for IE >= 10*/

	    mywindow.print();
	    mywindow.close();

	    return true;
	}
</script>

@endsection