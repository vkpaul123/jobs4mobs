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
		<span style="color:#367fa9;"><b>JobSeeker</b> </span> Employer Search
		<small>Look for employers</small>
	</h1>
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
		<li class="active">Employer Search</li>
	</ol>
</section>

<!-- Main content -->
<section class="content">

	<div class="box box-primary">
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
			<h3 class="box-title"><strong><span style="color: #367fa9;">@{{companyname}}</span></strong></h3>

			<div class="box-title pull-right">
				<i class="glyphicon glyphicon-map-marker"></i>&nbsp @{{address_id.cityName}}
			</div>
		</div>

		<div class="box-body">
			<div class="container-fluid">
				<div class="row">
					<div class="col-md-12">
						<div class="row">
							<div class="col-md-10">
								<table>
									<tr>
										<th>
											Company Type &nbsp
										</th>
										<td>
											@{{companyType}}
										</td>
									</tr>

									<tr>
										<th>
											Company Category &nbsp
										</th>
										<td>
											@{{companyCategory}}
										</td>
									</tr>

									<tr>
										<th>
											Industry Type &nbsp
										</th>
										<td>
											@{{{jobCategoryId}}}
										</td>
									</tr>

								</table>
							</div>

							<div class="col-md-2">
								<a href="/home/viewEmployerProfile/@{{id}}">
									<button class="btn btn-primary btn-block"><strong>View Profile</strong></button>
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
		    indexName: 'employers',
		    searchParameters: {
		    	facets: ['status'],
		    	facetFilters: [
		    		["status:true"],
		    	],
		    }
		});

	search.addWidget(
		instantsearch.widgets.searchBox({
			container: '#search-box',
			placeholder: 'Search by Company name, Category, Industry or Location',
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
				empty: 'No Employers Found!',
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