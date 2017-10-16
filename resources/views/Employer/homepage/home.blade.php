@extends('Employer.homepage.layouts.app')
@section('title', 'Employers')

@section('extraPageSpecificHeadContent')
<link rel="stylesheet" href="{{asset('assets/userPage/bower_components/select2/dist/css/select2.min.css')}}">

<style type="text/css">
[class^='select2'] {
  border-radius: 0px !important;
}

.select2-container {
  padding: 0px;
  border-width: 0px;
}
.select2-container .select2-choice {
  height: 38px;
  line-height: 38px;
}

.select2-container.form-control {
  height: auto !important;
}

.form-control{
  -webkit-appearance:none;
  -moz-appearance: none;
  -ms-appearance: none;
  -o-appearance: none;
  appearance: none;
}
</style>
@endsection

@section('body')
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    <span style="color:#e08e0b;"><b>Employer</b> </span> Home
    <small>Timeline</small>
  </h1>
  <ol class="breadcrumb">
    <li class="active"><i class="fa fa-dashboard"></i> Home</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">

  <div class="container-fluid">
    <div class="box box-warning">
      <div class="box-header with-border">
        <a href="jobseekerSearchResults">
          <button class="btn btn-default btn-lg btn-block"><strong><i class="fa fa-search"></i>&nbsp &nbsp<span class="text-warning">Search Jobseekers</span></strong></button>
        </a>
      </div>
    </div>

    {{-- TIMELINE STARTS HERE ******************************************** --}}


    <div class="row">
      <div class="col-md-8">
        <!-- The time line -->
        <ul class="timeline">
          <!-- timeline time label -->
          <li class="time-label">
            <span class="bg-red">
              <strong>Employers</strong> that might Interest you
            </span>
          </li>
          <!-- /.timeline-label -->
          <!-- timeline item -->
          @foreach ($popEmployers as $popEmployer)
          @if ($popEmployer->description)
          <li>
            <i class="fa fa-industry bg-yellow"></i>

            <div class="timeline-item">
              <span class="time"><i class="fa fa-clock-o">&nbsp</i>{{ $popEmployer->created_at->diffForHumans() }}</span>

              <h3 class="timeline-header"><strong class="text-blue">{{ $popEmployer->companyname }} &nbsp </strong><small>{{ $popEmployer->tagline }}</small></h3>

              <div class="timeline-body">
                {{ $popEmployer->description }}
              </div>
            </div>
          </li>
          @endif
          @if ($loop->index > 5)
          @break
          @endif
          @endforeach
          <!-- END timeline item -->
          <!-- timeline time label -->
          <li class="time-label">
            <span class="bg-green">
              <strong>Vacancies</strong> at a glimpse
            </span>
          </li>
          @forelse ($recVacancies as $recVacancy)
          <li>
            <i class="fa fa-briefcase bg-aqua"></i>

            <div class="timeline-item">
              <span class="time"><i class="fa fa-clock-o"></i> &nbsp{{$recVacancy->updated_at->diffForHumans() }}</span>

              <h3 class="timeline-header no-border">You opened a new Vacancy for the post of <strong class="text-success">{{ $recVacancy->jobdesignation }}</strong></h3>
              
              <div class="timeline-footer">
                <a class="btn btn-primary btn-xs" href="/home/viewVacancy/{{ $recVacancy->id }}">Read more</a>
              </div>
            </div>
          </li>
          @if ($loop->index > 5)
          @break
          @endif
          @empty
          <li>
            <i class="fa-times fa bg-gray"></i>

            <div class="timeline-item">
              <div class="timeline-header no-border">
                <div class="text-muted">
                  <i>No Vacancies Created!</i>
                </div>

              </div>
            </div>
          </li>
          @endforelse
          <!-- /.timeline-label -->
          
          <!-- END timeline item -->
          <!-- timeline item -->
          
          <!-- END timeline item -->
          <li>
            <i class="fa fa-clock-o bg-gray"></i>
          </li>
        </ul>
      </div>
      <br>
      <!-- /.col -->
      <!-- /.row -->

      <div class="col-md-4">
        <div class="box box-success">
          <div class="box-header with-border">
            <h3>Recent Job Vacancies</h3>
          </div>
          <div class="box-body">

            @foreach ($recVacancies as $recVacancy)
            <a href="{{ route('vacancy.show', $recVacancy->id) }}">
              <button class="btn-lg btn-default">{{ $recVacancy->employers_id }}</button>
            </a> &nbsp &nbsp
            @endforeach
          </div>
        </div>
      </div>

      <div class="col-md-4">
        <div class="box box-warning">
          <div class="box-header with-border">
            <h3>Popular Employers</h3>
          </div>
          <div class="box-body">

            @foreach ($popEmployers as $popEmployer)
            <button class="btn btn-lg btn-default">{{ $popEmployer->companyname }}</button> &nbsp &nbsp
            @endforeach

          </div>
        </div>
      </div>

    </div>
  </div>

</section>
<!-- /.content -->
@endsection


@section('extraPageSpecificLoadScriptsContent')

<script src="{{ asset('assets/userPage/bower_components/select2/dist/js/select2.full.min.js')}}"></script>

<script>
  $('.select2').select2({
    placeholder: "Location…"
  })
</script>

@endsection