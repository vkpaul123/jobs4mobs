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
          <div class="col-md-3">
            <div class="info-box">
              <span class="info-box-icon bg-yellow"><i class="fa fa-black-tie"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Employers</span>
                <span class="info-box-number">200</span>
              </div>
            </div>
          </div>

          <div class="col-md-3">
            <div class="info-box">
              <span class="info-box-icon bg-blue"><i class="fa fa-group"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">JobSeekers</span>
                <span class="info-box-number">35000</span>
              </div>
            </div>
          </div>

          <div class="col-md-3">
            <div class="info-box">
              <span class="info-box-icon bg-green"><i class="fa fa-briefcase"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Vacancies</span>
                <span class="info-box-number">5000</span>
              </div>
            </div>
          </div>

          <div class="col-md-3">
            <div class="info-box">
              <span class="info-box-icon bg-red"><i class="fa fa-question"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Questions</span>
                <span class="info-box-number">55000</span>
              </div>
            </div>
          </div>
        </div>
      </div>


      <!-- Default box -->
      <div class="box box-danger">
        <div class="box-header with-border">
          <h3 class="box-title"><strong>User Details</strong></h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                    title="Collapse">
              <i class="fa fa-minus"></i></button>
          </div>
        </div>
        <div class="box-body">

        </div>
        <!-- /.box-body -->
        <div class="box-footer">
          Footer
        </div>
        <!-- /.box-footer-->
      </div>
      <!-- /.box -->

    </section>
    <!-- /.content -->

@endsection