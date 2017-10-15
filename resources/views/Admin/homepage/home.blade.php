@extends('Admin.homepage.layouts.app')
@section('title', 'Admins')

@section('body')
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1><span style="color: #d73925;"><strong>Admin</strong></span> Home<small> &nbsp dashboard</small></h1>
  <ol class="breadcrumb">
    <li class="active"><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
  </ol>
</section>

<!-- Main content -->
<section class="content">

  <div class="container-fluid">
    <div class="row">
      <div class="col-md-4">
        <div class="info-box">
          <span class="info-box-icon bg-yellow"><i class="fa fa-industry"></i></span>

          <div class="info-box-content">
            <span class="info-box-text">Employers</span>
            <span class="info-box-number">{{ $employerCount }}</span>
          </div>
        </div>
      </div>

      <div class="col-md-4">
        <div class="info-box">
          <span class="info-box-icon bg-blue"><i class="fa fa-group"></i></span>

          <div class="info-box-content">
            <span class="info-box-text">JobSeekers</span>
            <span class="info-box-number">{{ $userCount }}</span>
          </div>
        </div>
      </div>

      <div class="col-md-4">
        <div class="info-box">
          <span class="info-box-icon" style="background-color: #39cbdd;"><i class="fa fa-black-tie" style="color: white;"></i></span>

          <div class="info-box-content">
            <span class="info-box-text">JobSeeker PRofiles</span>
            <span class="info-box-number">{{ $jobseekerProfile }}</span>
          </div>
        </div>
      </div>

      <div class="col-md-4">
        <div class="info-box">
          <span class="info-box-icon bg-green"><i class="fa fa-briefcase"></i></span>

          <div class="info-box-content">
            <span class="info-box-text">Vacancies</span>
            <span class="info-box-number">{{ $vacancyCount }}</span>
          </div>
        </div>
      </div>

      <div class="col-md-4">
        <div class="info-box">
          <span class="info-box-icon bg-red"><i class="fa fa-question"></i></span>

          <div class="info-box-content">
            <span class="info-box-text">Questions</span>
            <span class="info-box-number">{{ $questionsCount }}</span>
          </div>
        </div>
      </div>

      <div class="col-md-4">
        <div class="info-box">
          <span class="info-box-icon" style="background-color: #dd3979;"><i class="fa fa-file-text-o" style="color: white;"></i></span>

          <div class="info-box-content">
            <span class="info-box-text">Tests</span>
            <span class="info-box-number">{{ $testCount }}</span>
          </div>
        </div>
      </div>
    </div>
  </div>

  <br>

  <!-- Default box -->
  <div class="box box-danger">
    <div class="box-header with-border">
      <h3 class="box-title"><strong>Latest Employers Registered</strong></h3>

      <div class="box-tools pull-right">
        <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
        title="Collapse">
        <i class="fa fa-minus"></i></button>
      </div>
    </div>

    <div class="row">
      <div class="col-xs-12">
       <div class="box-body table-responsive no-padding">
        <table class="table table-hover">
          <thead>
            <tr>
              <th>ID</th>
              <th>Name</th>
              <th>Company Name</th>
              <th>Email</th>
              <th>Created At</th>
            </tr>              
          </thead>
          <tbody>
            @forelse ($employers as $employer)
            <tr>
              <td>{{ $employer->id }}</td>
              <td>{{ $employer->firstname }} {{ $employer->lastname }}</td>
              <td>{{ $employer->companyname }}</td>
              <td>{{ $employer->email }}</td>
              <td>{{ $employer->created_at }}/td>
              </tr>
              @empty
              <tr>
                <td colspan="5">
                  <center><i>No Employers registered!</i></center>
                </td>
              </tr>
              @endforelse
            </tbody>

          </table>
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->
    </div>


  </div>

  <!-- /.box-body -->
  <br>

  <div class="container-fluid">
    <div class="col-md-6">
      <div class="info-box">
        <div class="callout callout-success">
          <h3 class="box-title"><strong>Vacancies</strong></h3></div>

          <div class="box-body table-responsive no-padding">
            <table class="table table-hover">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Company Name</th>
                  <th>Industry</th>
                  <th>Status</th>
                  <th>Created At</th>
                </tr>
              </thead>

              <tbody>
                @forelse ($vacancies as $vacancy)
                <tr>
                  <td>{{ $vacancy->id }}</td>
                  <td>{{ $vacancy->employers_id }}</td>
                  <td>{{ $vacancy->jobcategoryId }}</td>
                  <td>
                    @if ($vacancy->vacancyStatus)
                    active
                    @else
                    inactive
                  @endif</td>
                  <td>{{ $vacancy->created_at }}/td>
                  </tr>
                  @empty
                  <tr>
                    <td colspan="5">
                      <center><i>No Employers registered!</i></center>
                    </td>
                  </tr>
                  @endforelse
                  
                </tbody>

              </table>
            </div>
          </div>
        </div>

        <div class="col-md-6">
          <div class="info-box">
            <div class="callout callout-info">
              <h3 class="box-title"><strong>Jobseekers</strong></h3></div>
              <div class="box-body table-responsive no-padding">
                <table class="table table-hover">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Name</th>
                      <th>Email</th>
                      <th>Created At</th>
                    </tr>
                  </thead>

                  <tbody>
                    @forelse ($users as $user)
                    <tr>
                      <td>{{ $user->id }}</td>
                      <td>{{ $user->firstname }} {{$user->lastname}}</td>
                      <td>{{ $user->email }}</td>
                      <td>{{ $user->created_at }}/td>
                      </tr>
                      @empty
                      <tr>
                        <td colspan="5">
                          <center><i>No Employers registered!</i></center>
                        </td>
                      </tr>
                      @endforelse
                    </tbody>

                  </table>
                </div>
              </div>
            </div>
          </div>
          <br>

          <div class="box">
            <div class="box-header">
              <h3 class="box-title"><strong class="text-danger">Scribble Pad</strong>
                <small>Admin Notes</small>
              </h3>
              <!-- tools box -->
              <div class="pull-right box-tools">
                <button type="button" class="btn btn-default btn-sm" data-widget="collapse" data-toggle="tooltip"
                title="Collapse">
                <i class="fa fa-minus"></i></button>
              </div>
              <!-- /. tools -->
            </div>
            <!-- /.box-header -->
            <form id="scribblePadForm" method="post" action="{{ route('admin.saveNote') }}">
              {{csrf_field()}}
              {{method_field('PUT')}}
              <div class="box-body pad">
                @if (Session::has('messageSuccess'))
                <div class="alert alert-success">{!! Session::get('messageSuccess') !!}
                  <button type="button" class="close" data-dismiss="alert"><i class="fa fa-times"></i></button>
                </div>
                @endif
                <div class="form-group{{ $errors->has('scribblePad') ? ' has-error' : '' }}">
                  <textarea class="textarea" placeholder="Place some text here" id="scribblePad" name="scribblePad"
                  style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">
                  {{ Auth::user()->scribblePad }}
                </textarea>
              </div>
            </div>
            <div class="box-footer">
              <div class="pull-right">
                <input type="hidden" name="admin_id" value="{{Auth::user()->id}}">
                <input type="submit" value="Save" class="btn btn-danger">
              </div>
            </div>
          </form>
        </div>

      </section>
      <!-- /.content -->

      @endsection