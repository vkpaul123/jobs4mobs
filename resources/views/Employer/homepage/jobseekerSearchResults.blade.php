@extends('Employer.homepage.layouts.app')
@section('title', 'Employers')

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
		<span style="color:#e08e0b;"><b>Employer</b> </span> Jobseeker Search
		<small>Search Jobseekers</small>
	</h1>
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
		<li class="active">Jobseeker Search</li>
	</ol>
</section>

<!-- Main content -->
<section class="content">

	<div class="box box-warning">
		<div class="box-body">
			<div class="container-fluid">
				<div class="row">
					<div id="search-box"></div>
				</div>
			</div>
		</div>
	</div>

	<h3>Results</h3>
	<div id="hits-container" class="container-fluid"></div>
	<div class="panel" id="pagination-container" style="text-align: center; font-size: 1.5em;"></div>	

</section>
<!-- /.content -->

@endsection

@section('extraPageSpecificLoadScriptsContent')

<script src="{{ asset('assets/userPage/bower_components/select2/dist/js/select2.full.min.js')}}"></script>
<script type="text/javascript" id="hits-temp">
	<div class="box">
		<div class="box-header with-border">
			<h3 class="box-title"><strong><span style="color: #e08e0b;"><span class="text-muted">@{{id}}</span>   @{{firstname}} @{{middlename}} @{{lastname}}</span></strong></h3>

			<div class="box-title pull-right">
				<i class="glyphicon glyphicon-map-marker"></i>&nbsp @{{address_id.cityName}}
			</div>
		</div>

		<div class="box-body">
			<div class="container-fluid">
				<div class="row">
					<div class="col-md-12">
						<h5><strong>@{{1.0.jobTitle}} &nbsp &nbsp</strong><i>@{{1.0.companyName}}</i></h5>
						<div class="row">
							<div class="col-md-10">
								<table>
									<tr>
										<th>
											<i class="fa fa-graduation-cap"></i> &nbsp
										</th>
										<td>
											@{{#2}}
												&nbsp @{{qualificationText}} &nbsp
											@{{/2}}
										</td>
									</tr>

									<tr>
										<th>
											<i class="fa fa-black-tie"></i> &nbsp
										</th>
										<td>
											@{{#0}}
												&nbsp @{{skillName}} &nbsp
											@{{/0}}
										</td>
									</tr>
								</table>
							</div>

							<div class="col-md-2">
								<a href="/employer/viewJobseekerProfile/@{{id}}">
								<button class="btn btn-warning btn-block"><b class="glyphicon glyphicon-copy"></b> <strong>Approach</strong>
								</button>
								</a>
							</div>
						</div>

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

	$('.select2').select2({
		placeholder: "Select Industry…"
	})

	var search = instantsearch({
		    // You should put your keys here:
		    appId: 'OFWBZKCKLQ',
		    apiKey: 'ff7d55ca73f5368396e7a6ea6f9092e7',
		    indexName: 'jobseeker_profiles',
		    // searchParameters: {
		    // 	facets: ['status'],
		    // 	facetFilters: [
		    // 		["status:1"],
		    // 	],
		    //}
		});

	search.addWidget(
		instantsearch.widgets.searchBox({
			container: '#search-box',
			placeholder: 'Search by Skills, Education, Industry or Location, Languages Spoken, Projects, Gender',
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
				empty: 'No Jobseeker Profiles Found!',
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