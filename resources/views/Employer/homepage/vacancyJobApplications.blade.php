@extends('Employer.homepage.layouts.app')
@section('title', 'Employers')

@section('extraPageSpecificHeadContent')
<link rel="stylesheet" href="{{ asset('assets/userPage/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
@endsection

@section('body')
<!-- Content Header (Page header) -->
<section class="content-header">
	<h1>
		<span style="color:#e08e0b;"><b>Employer</b> </span> View Job Applications
		<small>all questions in questionnare</small>
	</h1>
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
		<li class="active">View Job Applications</li>
	</ol>
</section>

<!-- Main content -->
<section class="content">

	<!-- Default box -->
	<div class="box">
		<div class="box-header with-border">
      <div class="container-fluid">
        <div class="row">
         <h3>Vacancy ID: <strong class="text-warning">{{ $id }}</strong></h3>
       </div>
     </div>
   </div>
   <div class="box-body">
     <table id="questionnare" class="table table-bordered table-hover">
      <thead>
        <tr>
          <th><span class="text-warning">ID</span></th>
          <th><span class="text-warning">Name</span></th>
          @if($vacancy->testrequired)
          <th><span class="text-warning">Marks</span></th>
          <th><span class="text-warning">Test Result</span></th>
          @endif
          <th><span class="text-warning">Application Status</span></th>
          <th><span class="text-warning">Options</span></th>
        </tr>
      </thead>
      <tbody>
        @foreach($jobApplications as $jobApplication)
        <tr>
          <td>{{ $jobApplication->id }}</td>
          <td>
            <a href="{{ route('employer.viewJobseekerProfile', $jobApplication->jobseeker_profile_id->id) }}">
              {{ $jobApplication->jobseeker_profile_id->firstname }} {{ $jobApplication->jobseeker_profile_id->middlename }} {{ $jobApplication->jobseeker_profile_id->lastname }}
            </a>
          </td>
          @if($vacancy->testrequired)
          <td>{{ $jobApplication->marks }}</td>
          <td><span class="@if($jobApplication->testResult == 'Pass') text-success @else text-danger @endif">{{ $jobApplication->testResult }}</span></td>
          @endif
          <td><span class="@if($jobApplication->applicationStatus == 'Applied' || $jobApplication->applicationStatus == 'Finished Test') text-yellow @elseif($jobApplication->applicationStatus == 'Rejected' || $jobApplication->applicationStatus=='Disqualified') text-red @elseif($jobApplication->applicationStatus == 'Approved') text-green @else text-muted @endif">
                    <strong>{{ $jobApplication->applicationStatus }}</strong>
                  </span></td>
          <td>
            <a href="" onclick="approveApp(); document.getElementById('setApplicationStatus-{{ $jobApplication->id }}').submit();"><button class="btn-xs btn btn-success"><strong><i class="fa fa-check"></i>&nbsp Approve</strong></button></a> &nbsp 
            <a href="" onclick="rejectApp(); document.getElementById('setApplicationStatus-{{ $jobApplication->id }}').submit();"><button class="btn-xs btn btn-danger"><strong><i class="fa fa-close"></i>&nbsp Reject</strong></button></a>

            <form action="{{ route('vacancy.setApplicationStatus', $jobApplication->id) }}" style="display: none;" id="setApplicationStatus-{{ $jobApplication->id }}" method="post">
              {{csrf_field()}}
              {{method_field('PUT')}}
              <input type="hidden" name="applicationStatus[{{ $jobApplication->id }}]" id="applicationStatus[{{ $jobApplication->id }}]" value="">

              <input type="hidden" id="mailFrom" name="mailFrom" value="contact.jobs4mobs@gmail.com">
              <input type="hidden" id="fromName" name="fromName" value="Admin">
              <input type="hidden" id="mailTo" name="mailTo" value="{{ $jobApplication->jobseeker_profile_id->user_id->email }}">
              <input type="hidden" id="mailToName" name="mailToName" value="{{ $jobApplication->jobseeker_profile_id->firstname }}">
              <input type="hidden" name="toSubject" id="toSubject" value="Job Application Status Update">
              <input type="hidden" name="mailBody1[{{ $jobApplication->id }}]" id="mailBody[{{ $jobApplication->id }}]" value="">
            </form>
          </td>
        </tr>
        @endforeach

      </tbody>
      <tfoot>
        <tr>
          <th><span class="text-warning">ID</span></th>
          <th><span class="text-warning">Name</span></th>
          @if($vacancy->testrequired)
          <th><span class="text-warning">Marks</span></th>
          <th><span class="text-warning">Test Result</span></th>
          @endif
          <th><span class="text-warning">Application Status</span></th>
          <th><span class="text-warning">Options</span></th>
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
      @if($vacancy->testrequired)
      'order' : '2, desc',
      @endif
      'autoWidth'   : true
    })
  })
</script>

@foreach ($jobApplications as $jobApplication)
  <script>
    function approveApp() {
      event.preventDefault();
      document.getElementById('applicationStatus[{{ $jobApplication->id }}]').value = "Approved";
      document.getElementById('mailBody1[{{ $jobApplication->id }}]').value = "This Mail is regarding your Job Application for the vacancy in {{ Auth::user()->companyname }}. The Employer has Approved your Application. Please Contact the employer for further details.";
    }

    function rejectApp() {
      event.preventDefault();
      document.getElementById('applicationStatus[{{ $jobApplication->id }}]').value = "Rejected";
      document.getElementById('mailBody1[{{ $jobApplication->id }}]').value = "This Mail is regarding your Job Application for the vacancy in {{ Auth::user()->companyname }}. The Employer has Rejected your Application. Please Contact the employer for further details.";
    }
  </script>
@endforeach

@endsection