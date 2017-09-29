@extends('Admin.homepage.layouts.app')
@section('title', 'Admins')

@section('extraPageSpecificHeadContent')
<link rel="stylesheet" href="{{ asset('assets/userPage/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
@endsection

@section('body')

<section class="content-header">
      <h1 id="reportTitle">VACANCY REPORT</h1>
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
              <h3 class="box-title">Details of VACANCY</h3>

              <button class="btn btn-success pull-right" onclick="printReport()"><strong>Print Report</strong></button>
            </div>
            <!-- /.box-header -->
            <div class="box-body" id="report">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>ID</th>
                  <th>JobCat</th>
                  <th>WorkType</th>
                  <th>Dates</th>
                  <th>EdnLevel</th>
                  <th>Exp</th>
                  <th>noOfVacancies</th>
                  <th>jobdesign</th>
                  <th>jobSpec</th> {{-- salary --}}
                  <th>test</th>
                  <th>status</th>
                  <th>address</th>
                  <th>employer</th>
                </tr>
                </thead>
                <tbody>
				
				@forelse($vacancies as $vacancy)
	                <tr>
	                  <td>{{ $vacancy->id }}</td>
	                  <td>@isset($vacancy->jobcategoryId) {{ $vacancy->jobcategoryId->name }} @endisset</td>
	                  <td>{{ $vacancy->preferedworktype }}</td>
	                  <td>{{ $vacancy->openingDate }} <i><b>to</b></i><br> {{ $vacancy->closingDate }}</td>
	                  <td>{{ $vacancy->preferedednlevel }}</td>
	                  <td>{{ $vacancy->preferedworkexp }}</td>
	                  <td>{{ $vacancy->noOfVacancies }}</td>
	                  <td>{{ $vacancy->jobdesignation }}</td>
	                  <td>{{ $vacancy->jobSpecification }} - Rs.{{ $vacancy->salary }}</td>
	                  <td> @isset($vacancy->testrequired) Yes @else No @endisset </td>
	                  <td> @isset($vacancy->vacancyStatus) Active @else Inactive @endisset </td>
	                  <td>
                     @isset($vacancy->address_id)
                      {{ $vacancy->address_id->primaryPhoneNo }}, {{ $vacancy->address_id->secondaryPhnoeNo }}, {{ $vacancy->address_id->faxNo }} <br>
                      {{ $vacancy->address_id->address }}, {{ $vacancy->address_id->cityName }}, {{ $vacancy->address_id->stateName }}-{{ $vacancy->address_id->postalCode }}, {{ $vacancy->address_id->countryName }}
                      @endisset 
                    </td>
	                  <td>@isset($vacancy->employers_id) {{ $vacancy->employers_id->companyname }} @endisset</td>
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
                  <th>JobCat</th>
                  <th>WorkType</th>
                  <th>Dates</th>
                  <th>EdnLevel</th>
                  <th>Exp</th>
                  <th>noOfVacancies</th>
                  <th>jobdesign</th>
                  <th>jobSpec</th> {{-- salary --}}
                  <th>test</th>
                  <th>status</th>
                  <th>address</th>
                  <th>employer</th>
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