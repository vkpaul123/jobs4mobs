@extends('JobSeeker.homepage.layouts.app')
@section('title', 'JobSeekers')

@section('extraPageSpecificHeadContent')
<link rel="stylesheet" href="{{asset('assets/userPage/bower_components/select2/dist/css/select2.min.css')}}">
<link rel="stylesheet" href="{{asset('assets/instantsearch/instantsearch.min.css')}}">
<script src="{{ asset('assets/instantsearch/instantsearch.min.js')}}"></script>

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
		<span style="color:#367fa9;"><b>JobSeeker</b> </span> Vacancy Search Results
		<small>View Vacancy Search Results</small>
	</h1>
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
		<li class="active">Vacancy Search Results</li>
	</ol>
</section>

<!-- Main content -->
<section class="content">

	<div class="box box-primary">
		<div class="box-body">
			<div class="container-fluid">
				<div class="row">
					<div id="search-box">
						
					</div>
					{{-- 
					<form action="" method="post" class="form-horizontal">
						{{csrf_field()}}
						<div class="form-group">
							<div class="col-md-12">
								<div class="row">
									<div class="col-md-4">
										<input type="text" id="jobType" name="jobType" class="form-control" placeholder="Job Type">
									</div>

									<div class="col-md-3">
										<select style="width: 100%;" class="select2 form-control" id="location" name="location">
											<option value="">Location…</option>

											@foreach($jobcategories as $jobcategory)

											<option value="{{ $jobcategory->id }}">{{ $jobcategory->name }}</option>

											@endforeach

										</select>	
									</div>

									<div class="col-md-3">
										<select style="width: 100%;" class="select2 form-control" id="experience" name="experience">
											<option value="">Experience…</option>

											@foreach($jobcategories as $jobcategory)
											
											<option value="{{ $jobcategory->id }}">{{ $jobcategory->name }}</option>

											@endforeach

										</select>	
									</div>

									<div class="col-lg-2 pull-right">
										<button type="submit" class="form-control btn btn-info"><i class="fa fa-search"></i> &nbsp <strong>Search</strong></button>
									</div>
								</div>
							</div>
						</div>
					</form>
					 --}}
				</div>
			</div>
		</div>
	</div>

	<hr>

	<div id="hits-container"></div>
	<div id="pagination-container"></div>

</section>
<!-- /.content -->

@endsection

@section('extraPageSpecificLoadScriptsContent')

<script src="{{ asset('assets/userPage/bower_components/select2/dist/js/select2.full.min.js')}}"></script>

<script type="text/javascript" id="hits-temp">
	
		<div class="box">
			<div class="box-header with-border">
				<h3 class="box-title"><strong><span style="color: #367fa9;">@{{employers_id}}</span></strong></h3>

				<div class="box-tools pull-right">
					<button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
					title="Collapse">
					<i class="fa fa-minus"></i></button>
				</div>
			</div>

			<div class="box-body">
				<div class="container-fluid">
					<div class="row">
						<div class="col-md-12">
							<h5><strong>@{{jobdesignation}}</strong></h5>
							<div class="row">
								<div class="col-md-10">
									<table>
										<tr>
											<th>
												<i class="fa fa-graduation-cap"></i> &nbsp
											</th>
											<td>
												@{{preferedednlevel}}
											</td>
										</tr>

										<tr>
											<th>
												<i class="fa fa-black-tie"></i> &nbsp
											</th>
											<td>
												@{{#0}}
													@{{skillName}} &nbsp
												@{{/0}}
											</td>
										</tr>
									</table>
								</div>

								<div class="col-md-2">
									<button class="btn btn-primary btn-block"><b class="glyphicon glyphicon-copy"></b> <strong>Apply</strong></button>
								</div>
							</div>

						</div>
					</div>
				</div>
			</div>

			<div class="box-footer">
				<div class="container">
					<div class="row">
						<div class="col-md-3">
							<b class="glyphicon glyphicon-map-marker"></b> <strong>&nbsp @{{addresses_id.cityName}}</strong>					
						</div>
						<div class="col-md-3">
							<b class="fa fa-calendar"></b> <strong>&nbsp Opening Date: &nbsp</strong><span class="text-success">@{{openingDate}}</span>
						</div>
						<div class="col-md-3">
							<b class="fa fa-calendar"></b> <strong>&nbsp Closing Date: &nbsp</strong><span class="text-danger">@{{closingDate}}</span>	
						</div>
						<div class="col-md-3">
							<b class="fa fa-briefcase"></b> &nbsp @{{preferedworkexp}} Years
						</div>
					</div>
				</div>
			</div>

		</div>
	
</script>

<script>

	$('#dateOfBirth').datepicker({
		autoclose: true
	})

	$('#location').select2({
		placeholder: "Location…"
	})

	$('#experience').select2({
		placeholder: "Experience…"
	})

	var search = instantsearch({
	    // You should put your keys here:
	    appId: 'OFWBZKCKLQ',
	    apiKey: 'ff7d55ca73f5368396e7a6ea6f9092e7',
	    indexName: 'vacancies',
	    searchParameters: {
	    	facets: ['vacancyStatus'],
	    	facetFilters: [
	    		["vacancyStatus:on"],
	    	],
	    }
	});

	search.addWidget(
    instantsearch.widgets.searchBox({
      container: '#search-box',
      placeholder: 'Search by Skills, Job Desingnation, Employer, Industry or Location',
      wrapInput: false,
      cssClasses: {
        input: 'form-control'
      }
    })
  );


	search.addWidget(
    instantsearch.widgets.hits({
      container: '#hits-container',
      templates: {
        item: $('#hits-temp').html(),
        empty: 'No Vacancies Found!',
      }
    })
 );

	search.addWidget(
    instantsearch.widgets.pagination({
      container: '#pagination-container'
    })
  );


	search.start();
</script>

@endsection