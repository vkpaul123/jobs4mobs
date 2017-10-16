@extends('Employer.homepage.layouts.app')
@section('title', 'Employers')

@section('extraPageSpecificHeadContent')
<link rel="stylesheet" href="{{ asset('assets/userPage/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
@endsection

@section('body')

<section class="content-header">
  <h1 id="reportTitle">JOBSEEKERS REPORT</h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="#">Reports</a></li>
    <li class="active">JobSeekers Reoprt</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">Details of JOBSEEKERS</h3>

          <button class="btn btn-success pull-right" onclick="printReport()"><strong>Print Report</strong></button>
        </div>
        <!-- /.box-header -->
        <div class="box-body" id="report">
          <table id="example2" class="table table-bordered table-hover">
            <thead>
              <tr>
                <th>ID</th>
                <th>Name</th> {{-- firstname, lastname --}}
                <th>Gender</th>
                <th>Email</th>
                <th>Address</th>
                <th>Experience</th> {{-- type, category --}}
                <th>Skills</th>
                <th>Preffered job Category 1</th>
              </tr>
            </thead>
            <tbody>
              
              @forelse($jobseekerProfiles as $jobseekerProfile)
              <tr>
               <td>{{ $jobseekerProfile->id }}</td>
               <td>{{ $jobseekerProfile->firstname }} {{ $jobseekerProfile->lastname }}</td>
               <td>{{ $jobseekerProfile->gender }}</td>
               <td>{{ $jobseekerProfile->tagline }}</td>
               <td>
                @isset($jobseekerProfile->address_id)
                {{ $jobseekerProfile->address_id->primaryPhoneNo }}, {{ $jobseekerProfile->address_id->secondaryPhnoeNo }}, {{ $jobseekerProfile->address_id->faxNo }} <br>
                {{ $jobseekerProfile->address_id->address }}, {{ $jobseekerProfile->address_id->cityName }}, {{ $jobseekerProfile->address_id->stateName }}-{{ $jobseekerProfile->address_id->postalCode }}, {{ $jobseekerProfile->address_id->countryName }}
                @endisset
              </td>
              <td>{{ $jobseekerProfile->experience }}</td>
              <td>
                @foreach ($jobseekerProfile->languagesSpoken as $skill)
                {{ $skill->skillName }} &nbsp &nbsp
                @endforeach
              </td>
              <td>{{$jobseekerProfile->preferedJobCategoryId1}}</td>
              
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
              <th>Gender</th>
              <th>Email</th>
              <th>Address</th>
              <th>Experience</th> {{-- type, category --}}
              <th>Skills</th>
              <th>Preffered job Category 1</th>
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