@extends('JobSeeker.homepage.layouts.app')
@section('title', 'JobSeekers - Resume')

@section('body')
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        <span style="color:#367fa9;"><b>JobSeeker</b> </span> Screening Test
        <small>Test Instructions Message</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Screening Test</li>
    </ol>
</section>

<section class="content">
    <div class="box">
        <div class="box-body">
            <div class="box-body">
                <div class="container-fluid">
                    <br>
                    <div class="jumbotron">
                        <center>
                            <h2><span class="fa fa-info-circle"></span><br><span class="text-blue"><strong>Screening Test</strong><br><small>The vacancy that you applied for <b>requires</b> a "Screening Test" to be conducted.</small></span></h2>
                            <br>
                            This Test will have the following attributes:
                            <br>
                            <table>
                                <tr>
                                    <td><i class="fa fa-industry" style="padding: 5px;"></i></td>
                                    <td style="padding: 5px;"><b>Questionnaire Category: &nbsp</b></td>
                                    <td style="padding: 5px;">{{ $questionnaire->job_category_id }}</td>
                                </tr>
                                <tr>
                                    <td><i class="fa fa-question" style="padding: 5px;"></i></td>
                                    <td style="padding: 5px;"><b>Total Questions: &nbsp</b></td>
                                    <td style="padding: 5px;">{{$questionsCount}}</td>
                                </tr>
                                <tr>
                                    <td><i class="fa fa-check-square-o" style="padding: 5px;"></i></td>
                                    <td style="padding: 5px;"><b>Passing marks: &nbsp</b></td>
                                    <td style="padding: 5px;">{{$questionnaire->passingMarks}}</td>
                                </tr>
                                <tr>
                                    <td><i class="fa fa-clock-o" style="padding: 5px;"></i></td>
                                    <td style="padding: 5px;"><b>Time Limit: &nbsp</b></td>
                                    <td style="padding: 5px;">{{$questionnaire->timelimit}} min.</td>
                                </tr>
                            </table>

                            <br>
                            Each Question Carries <b>1 Mark</b>. <br>
                            Please adhere to the time Limit. The Page will be <i>automatically</i> submitted if your time is up.
                            <br>
                            You can also submit the questionnaire before time is up.
                            <br>
                            The questions that are not attempted will not be considered for scoring.
                            <br>There is No Negative Marking sceme in this test.

                            <p>
                                <h3><i class="fa fa-thumbs-o-up"></i><i class="text-green" style="font-weight: bold;">&nbsp All the Best!</i></h3>
                            </p>
                            <br> <br>
                            <form action="{{ route('jobseeker.test.startTest', $id) }}" method="post" class="form-horizontal">
                                {{csrf_field()}}
                                {{method_field('PUT')}}

                                <div class="form-group">
                                    <div class="col-md-offset-4 col-md-4">
                                        <button type="submit" class="btn btn-warning btn-lg btn-block"><strong>Start Test...</strong></button>
                                    </div>
                                </div>
                            </form>
                        </center> 
                    </div>
                </div>
            </div>
        </div>
    </section>

    @endsection
