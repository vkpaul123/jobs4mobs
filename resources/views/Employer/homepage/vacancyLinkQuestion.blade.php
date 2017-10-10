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
		<span style="color:#e08e0b;"><b>Employer</b> </span> Link Questionnare
		<small>link questionnare to vacancy</small>
	</h1>
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
		<li class="active">Link Questionnare</li>
	</ol>
</section>

<!-- Main content -->
<section class="content">

	<!-- Default box -->
	<div class="box">
		<div class="box-header with-border">
			<h3 class="box-title"><b>Select Questionnare</b></h3>
			<a href="{{ route('questionnareBuilder.index') }}">
				<button class="btn btn-info btn-lg pull-right"><strong><i class="fa fa-file-text-o"></i> &nbspQuestionnaire Builder</strong></button>
			</a>
		</div>

		<div class="box-body">
			<h3 class="text-warning"><strong>Vacancy ID: </strong>{{ $id }}</h3>
			@if (Session::has('messageFail'))
			  <div class="alert alert-danger">{!! Session::get('messageFail') !!}
			    <button type="button" class="close" data-dismiss="alert"><i class="fa fa-times"></i></button>
			  </div>
			@endif
			@if (Session::has('messageSuccess'))
			  <div class="alert alert-success">{!! Session::get('messageSuccess') !!}
			    <button type="button" class="close" data-dismiss="alert"><i class="fa fa-times"></i></button>
			  </div>
			@endif
			<form action="{{ route('vacancy.questionnare.storeLink') }}" method="post" class="form-horizontal">
				{{csrf_field()}}

				<div class="form-group{{ $errors->has('questionnaire_id') ? ' has-error' : '' }}">
					<label for="questionnaire_id" class="col-md-3 control-label">Questionnare</label>
					<div class="col-md-6">
						<select style="width: 100%;" class="select2 form-control" id="questionnaire_id" name="questionnaire_id">
							<option value="">Choose a Questionnare…</option>

							@foreach($questionnaires as $questionnaire)
							
							<option value="{{ $questionnaire->id }}">{{ $questionnaire->id }} - {{ $questionnaire->job_category_id }}</option>

							@endforeach

						</select>	
					</div>
				</div>

				<hr>
				<input type="hidden" id="vacancy_id" name="vacancy_id" value="{{$id}}">
				<div class="form-group">
					<div class="col-md-offset-5 col-md-2">
						<button type="submit" class="btn btn-primary btn-block pull-right"><strong>Submit</strong></button>
					</div>
				</div>
				{{-- end form --}}
			</form>
		</div>
	</div>
	<!-- /.box -->

	{{-- Entered Detials --}}
	<h4>Linked Questionnarie</h4>

	<div class="container">
		@isset($questionnaire_vacancy)
		{{-- {{ print_r($questionnaire_vacancies) }} --}}
		<div class="row">
			<div class="col-md-11">
				<div class="box box-default">
					<div class="box-header with-border">
						<h3 class="box-title" id="qualificationTextShow"><strong>Questionnaire ID: </strong>{{ $questionnaire_vacancy->id }}</h3>

						<div class="box-tools pull-right">
							<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
							</button>
						</div>
						<!-- /.box-tools -->
					</div>
					<!-- /.box-header -->
					<div class="box-body">
						<div class="container">
							<div class="row">
								<div class="col-md-5" id="boardNameShow">
									<strong>Questionnaire Category: </strong>{{ $questionnaire_vacancy->job_category_id }}
								</div>

								<div class="col-md-2 pull-right">
									<a href="#" onclick="
									         if(confirm('Are You Sure, you want to delete this record?')) {
									          event.preventDefault();
									          document.getElementById('delete-question').submit();
									        }
									        else {
									          event.preventDefault();
									        }
									        "><span class="glyphicon glyphicon-trash"></span></a>

									        <form method="post" id="delete-question" action="{{ route('vacancy.questionnare.storeUnLink', $id) }}" style="display: none;">
									          {{ csrf_field() }}
									          {{ method_field('PUT') }}
									        </form>
								</div>
							</div>
						</div>
					</div>
					<!-- /.box-body -->
				</div>
			</div>
		</div>
		@endisset

		<div class="row">
			<div class="col-md-offset-7 col-md-4">
				<a href="{{ route('vacancy.show', $id) }}"><button type="button" class="btn btn-success btn-block pull-right btn-lg"><strong>Done</strong></button></a>
			</div>
		</div>
	</div>
	
	
	{{-- Dummy --}}


	{{-- @endforeach --}}


	

</section>
<!-- /.content -->

@endsection



@section('extraPageSpecificLoadScriptsContent')

<script src="{{ asset('assets/userPage/bower_components/select2/dist/js/select2.full.min.js')}}"></script>

<script>
	$('#dateOfBirth').datepicker({
		autoclose: true
	})

	$('.select2').select2({
		placeholder: "Select…"
	})

	$("#questionnaire_id").val("@isset($questionnaire_vacancy->id) {{ $questionnaire_vacancy->id }} @endisset").trigger('change');
</script>

@endsection