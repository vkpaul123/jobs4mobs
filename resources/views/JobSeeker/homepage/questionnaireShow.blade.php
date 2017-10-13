@extends('JobSeeker.homepage.layouts.app')
@section('title', 'JobSeekers')

@section('startBodyScripts', 'onLoad=begintimer()')

@section('body')

<section class="content-header">
	<h1>
		<span style="color:#367fa9;"><b>JobSeeker</b> </span> Screening Test
		<small>Evaluation Time</small>
	</h1>
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
		<li class="active">Screening Test</li>
	</ol>
</section>

<!-- Main content -->
<section class="content">
	<div class="row">
		<div class="col-md-12">
			<div class="box box-primary">
				<div class="box-header with-border">
					<h3 class="box-title">Select the right option.</h3>
					<span class="pull-right text-muted">
						Time Remaining: &nbsp
						<span class="text-danger"><strong style="font-size: 1.5em;" id="time1">
							
						</strong></span>
					</span>
				</div>
				<!-- /.box-header -->

				<form role="form" action="{{ route('jobseeker.test.submitTest', $jobApplication->id) }}" method="post" id="testForm">
					{{csrf_field()}}
					{{method_field('PUT')}}
					<div class="box-body">
						<table id="example4" class="table table-bordered table-striped">
							<tbody>
								<!-- q 1 -->
								@foreach($questions as $question)
								<tr>
									<td>
										<h4><strong><span>Q{{ $loop->iteration }}.</span> &nbsp
											{{ $question->quesText }}
										</strong> &nbsp</h4>

										<div class="container-fluid">
											<div class="row">
												<div class="col-md-3 col-md-offset-1">
													<div class="radio">
														<label>
															<input type="radio" name="optionsRadios[{{$question->id}}]" id="optionsRadios1" value="{{$question->correctAns[0] }}">
															{{$question->correctAns[0] }}
														</label>
													</div>
													<div class="radio">
														<label>
															<input type="radio" name="optionsRadios[{{$question->id}}]" id="optionsRadios1" value="{{$question->correctAns[1] }}">
															{{$question->correctAns[1] }}
														</label>
													</div>
												</div>
												<div class="col-md-3">
													<div class="radio">
														<label>
															<input type="radio" name="optionsRadios[{{$question->id}}]" id="optionsRadios1" value="{{$question->correctAns[2] }}">
															{{$question->correctAns[2] }}
														</label>
													</div>
													<div class="radio">
														<label>
															<input type="radio" name="optionsRadios[{{$question->id}}]" id="optionsRadios1" value="{{$question->correctAns[3] }}">
															{{$question->correctAns[3] }}
														</label>
													</div>
												</div>
											</div>
										</div>
									</td>
								</tr>
								{{-- <input type="hidden" name="question_id[]" value="{{ $question->id }}"> --}}
								@endforeach
								
							</tbody>
						</table>
					</div>

					<div class="box-footer">
						<div class="col-md-offset-4 col-md-4">
							<button type="submit" class="btn btn-primary btn-lg btn-block pull-right"><strong>Submit</strong></button>
						</div>
						<span class="pull-right text-muted">
							Time Remaining: &nbsp
							<span class="text-danger"><strong style="font-size: 1.5em;" id="time2">
								
							</strong></span>
						</span>
					</div>

				</form>
			</div>
			<!-- /.box-body -->
		</div>
		<!-- /.box -->
	</div>
	<!--/.col (right) -->

	<!-- /.row -->
</section>

<script>
	var limit = "{{$questionnaire->timelimit}}:00";
	if(document.images) {
		var parselimit = limit.split(":");
		parselimit = parselimit[0]*60 + parselimit[1]*1;
	}

	function begintimer() {
		if (!document.images)
			return;
		
		if (parselimit == 1)
			document.getElementById('testForm').submit();
		else { 
			parselimit -= 1;
			curmin = Math.floor(parselimit / 60);
			cursec = parselimit%60;
			if (curmin != 0) {
				curtime = curmin + ":" + cursec + " ";
			}
			else {
				curtime = "0:" + cursec + " ";
			}

			document.getElementById("time1").innerHTML = curtime;
			document.getElementById("time2").innerHTML = curtime;
			setTimeout("begintimer()", 1000);
		}
	}

</script>

@endsection
