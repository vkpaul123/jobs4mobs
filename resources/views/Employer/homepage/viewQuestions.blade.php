@extends('Employer.homepage.layouts.app')
@section('title', 'Employers')

@section('extraPageSpecificHeadContent')
<link rel="stylesheet" href="{{ asset('assets/userPage/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
@endsection

@section('body')
<!-- Content Header (Page header) -->
<section class="content-header">
	<h1>
		<span style="color:#e08e0b;"><b>Employer</b> </span> View Questionnare
		<small>all questions in questionnare</small>
	</h1>
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
		<li class="active">View Questionnaire</li>
	</ol>
</section>

<!-- Main content -->
<section class="content">

	<!-- Default box -->
	<div class="box">
		<div class="box-header with-border">
			<h3>Questionnare ID: <strong class="text-warning">{{ $id }}</strong>
        <a href="{{ route('question.create') }}"><button class="btn btn-success btn-lg pull-right"><i class="glyphicon glyphicon-plus-sign">&nbsp</i><strong>Add Question</strong></button></a>
      </h3>
		</div>
		<div class="box-body">
			<table id="questionnare" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th><span class="text-warning">Question</span></th>
                  <th><span class="text-warning">Correct Ans.</span></th>
                  <th><span class="text-warning">Wrong Ans. 1</span></th>
                  <th><span class="text-warning">Wrong Ans. 2</span></th>
                  <th><span class="text-warning">Wrong Ans. 3</span></th>
                  <th><span class="text-warning">Options</span></th>
                </tr>
                </thead>
                <tbody>
                @foreach($questions as $question)
                <tr>
                  <td>
                  	<p>
                  		{{ $question->quesText }}
                  	</p>
                  </td>
                  <td><b>{{ $question->correctAns }}</b></td>
                  <td>{{ $question->WrongAns1 }}</td>
                  <td>{{ $question->WrongAns2 }}</td>
                  <td>{{ $question->WrongAns3 }}</td>
                  <td>
                  	<a href="{{ route('question.edit', $question->id) }}"><span class="glyphicon glyphicon-edit"></span></a> | <a href="#" onclick="
                  if(confirm('Are You Sure, you want to delete this record?')) {
                    event.preventDefault();
                    document.getElementById('delete-question-{{ $question->id }}').submit();
                  }
                  else {
                    event.preventDefault();
                  }
                  "><span class="glyphicon glyphicon-trash"></span></a>

                  <form method="post" id="delete-question-{{ $question->id }}" action="{{ route('question.destroy', $question->id) }}" style="display: none;">
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}
                  </form>
                  </td>
                </tr>
                @endforeach
                
                </tbody>
                <tfoot>
                <tr>
                  <th><span class="text-warning">Question</span></th>
                  <th><span class="text-warning">Correct Ans.</span></th>
                  <th><span class="text-warning">Wrong Ans. 1</span></th>
                  <th><span class="text-warning">Wrong Ans. 2</span></th>
                  <th><span class="text-warning">Wrong Ans. 3</span></th>
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
      'autoWidth'   : true
    })
  })
</script>

@endsection