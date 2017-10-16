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
    <div class="row">
      <div class="col-md-12">
        <div class="box box-warning">
          <div class="box-header">
            <div class="row">
            <form action="" class="form-horizontal" method="post">
              {{ csrf_field() }}
              <div class="col-md-7">
                <input type="text" class="form-control" id="searchJobseekers" name="searchJobseekers" placeholder="Search Job Seeker">
              </div>
              <div class="col-md-3">
                  <select style="width: 100%;" class="select2 form-control" id="location" name="location">
                    <option value="">Location…</option>

                {{-- @foreach($jobcategories as $jobcategory)
                
                <option value="{{ $jobcategory->id }}">{{ $jobcategory->name }}</option>

                @endforeach --}}

                  </select> 
              </div>
              <div class="col-md-2 pull-right">
                  <button type="submit" class="btn btn-warning btn-block"><i class="fa fa-search"></i><strong> &nbsp Search</strong></button>
              </div>
            </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    <br>




    {{-- TIMELINE STARTS HERE ******************************************** --}}


    <div class="row">
      <div class="col-md-8">
        <!-- The time line -->
        <ul class="timeline">
          <!-- timeline time label -->
          <li class="time-label">
            <span class="bg-red">
              10 Feb. 2014
            </span>
          </li>
          <!-- /.timeline-label -->
          <!-- timeline item -->
          <li>
            <i class="fa fa-envelope bg-blue"></i>

            <div class="timeline-item">
              <span class="time"><i class="fa fa-clock-o"></i> 12:05</span>

              <h3 class="timeline-header"><a href="#">Support Team</a> sent you an email</h3>

              <div class="timeline-body">
                Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles,
                weebly ning heekya handango imeem plugg dopplr jibjab, movity
                jajah plickers sifteo edmodo ifttt zimbra. Babblely odeo kaboodle
                quora plaxo ideeli hulu weebly balihoo...
              </div>
              <div class="timeline-footer">
                <a class="btn btn-primary btn-xs">Read more</a>
                <a class="btn btn-danger btn-xs">Delete</a>
              </div>
            </div>
          </li>
          <!-- END timeline item -->
          <!-- timeline item -->
          <li>
            <i class="fa fa-user bg-aqua"></i>

            <div class="timeline-item">
              <span class="time"><i class="fa fa-clock-o"></i> 5 mins ago</span>

              <h3 class="timeline-header no-border"><a href="#">Sarah Young</a> accepted your friend request</h3>
            </div>
          </li>
          <!-- END timeline item -->
          <!-- timeline item -->
          <li>
            <i class="fa fa-comments bg-yellow"></i>

            <div class="timeline-item">
              <span class="time"><i class="fa fa-clock-o"></i> 27 mins ago</span>

              <h3 class="timeline-header"><a href="#">Jay White</a> commented on your post</h3>

              <div class="timeline-body">
                Take me to your leader!
                Switzerland is small and neutral!
                We are more like Germany, ambitious and misunderstood!
              </div>
              <div class="timeline-footer">
                <a class="btn btn-warning btn-flat btn-xs">View comment</a>
              </div>
            </div>
          </li>
          <!-- END timeline item -->
          <!-- timeline time label -->
          <li class="time-label">
            <span class="bg-green">
              3 Jan. 2014
            </span>
          </li>
          <!-- /.timeline-label -->
          <!-- timeline item -->
          <li>
            <i class="fa fa-camera bg-purple"></i>

            <div class="timeline-item">
              <span class="time"><i class="fa fa-clock-o"></i> 2 days ago</span>

              <h3 class="timeline-header"><a href="#">Mina Lee</a> uploaded new photos</h3>

              <div class="timeline-body">
                <img src="http://placehold.it/150x100" alt="..." class="margin">
                <img src="http://placehold.it/150x100" alt="..." class="margin">
                <img src="http://placehold.it/150x100" alt="..." class="margin">
                <img src="http://placehold.it/150x100" alt="..." class="margin">
              </div>
            </div>
          </li>
          <!-- END timeline item -->
          <!-- timeline item -->
          <li>
            <i class="fa fa-video-camera bg-maroon"></i>

            <div class="timeline-item">
              <span class="time"><i class="fa fa-clock-o"></i> 5 days ago</span>

              <h3 class="timeline-header"><a href="#">Mr. Doe</a> shared a video</h3>

              <div class="timeline-body">
                <div class="embed-responsive embed-responsive-16by9">
                  <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/tMWkeBIohBs"
                  frameborder="0" allowfullscreen></iframe>
                </div>
              </div>
              <div class="timeline-footer">
                <a href="#" class="btn btn-xs bg-maroon">See comments</a>
              </div>
            </div>
          </li>
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