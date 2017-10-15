@extends('Admin.homepage.layouts.app')
@section('title', 'Admins - Resume')

@section('extraPageSpecificHeadContent')
<link rel="stylesheet" href="{{asset('assets/others/resume.css')}}">
@endsection

@section('body')
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        <span style="color:#d73925;"><b>Admin</b> </span> View Jobseeker's Resume
        <small>view Jobseeker's Resume</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">View Jobseeker's Resume</li>
    </ol>
</section>

<section class="content">
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Resume</h3>
        </div>

        <div class="box-body">
            <div class="box-body">
                <div class="container-fluid">
                    <br>
                    <div class="jumbotron">
                        <center>
                            <h4><span class="fa fa-exclamation-triangle"></span> &nbsp <span class="text-danger">Resume Not Found<br><small>This Job Seeker Doesn't have any Resume created.</small></span></h4>
                        </center>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @endsection
