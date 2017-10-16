@extends('JobSeeker.homepage.layouts.app')
@section('title', 'JobSeekers')

@section('extraPageSpecificHeadContent')
<link rel="stylesheet" href="{{ asset('assets/userPage/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
@endsection

@section('body')

<section class="content-header">
  <h1>
    <span style="color:#367fa9;"><b>JobSeeker</b> </span> My Job Applications
    <small>View my all Job Applications</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">My Job Applications</li>
  </ol>
</section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Details of Job Applications</h3>

              <button class="btn btn-success pull-right" onclick="printReport()"><strong>Print Report</strong></button>
            </div>
            <!-- /.box-header -->
            <div class="box-body" id="report">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>ID</th>
                  <th>Vacancy</th>
                  <th>Jobseeker Profile</th>
                  <th>Application Status</th>
                </tr>
                </thead>
                <tbody>
				
				@forelse($jobApplications as $jobApplication)
        @foreach ($jobseekerProfiles as $jobseekerProfile)
          @if ($jobseekerProfile->id == $jobApplication->jobseeker_profile_id)
	                <tr>
                    <td>{{ $jobApplication->id }}</td>
                    <td>{{ $jobApplication->marks }}</td>
                    <td>{{ $jobApplication->testResult }}</td>
	                  <td><span class="@if($jobApplication->applicationStatus == 'Applied' || $jobApplication->applicationStatus == 'Finished Test') text-yellow @elseif($jobApplication->applicationStatus == 'Rejected' || $jobApplication->applicationStatus=='Disqualified') text-red @elseif($jobApplication->applicationStatus == 'Approved') text-green @else text-muted @endif">
                    <strong>{{ $jobApplication->applicationStatus }}</strong>
                  </span></td>
	                </tr>
          @endif
        @endforeach
				@empty
          <tr>
            <td><i>No Data!</i></td>
          </tr>
        @endforelse

                </tbody>
                <tfoot>
                <tr>
                  <th>ID</th>
                  <th>Vacancy</th>
                  <th>Jobseeker Profile</th>
                  <th>Application Status</th>
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
    $('#example2').DataTable({
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