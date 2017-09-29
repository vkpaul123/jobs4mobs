@extends('JobSeeker.homepage.layouts.app')
@section('title', 'JobSeekers')

@section('body')

<section class="content-header">
	<h1>
		EVALUATION TIME!

	</h1>
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
		<li><a href="#">Forms</a></li>
		<li class="active">General Elements</li>
	</ol>
</section>

<!-- Main content -->
<section class="content">
	<div class="row">
		<div class="col-md-12">
			<div class="box box-primary">
				<div class="box-header with-border">
					<h3 class="box-title">Select the right option !</h3>
				</div>
				<!-- /.box-header -->

				<div class="box-body">
					<form role="form">
						<table id="example4" class="table table-bordered table-striped">
							<tbody>
								<!-- q 1 -->
								@foreach($questions as $question)
								<tr>
									<td>
										<h4><strong><span>Q{{ $loop->iteration }}.</span> &nbsp
											{{ $question->text }}
										</strong> &nbsp</h4>

										<div class="container-fluid">
											<div class="row">
												<div class="col-md-3 col-md-offset-1">
													<div class="radio">
														<label>
															<input type="radio" name="optionsRadios" id="optionsRadios1" value="option1">
															Coder
														</label>
													</div>
													<div class="radio">
														<label>
															<input type="radio" name="optionsRadios" id="optionsRadios1" value="option1">
															Deigner
														</label>
													</div>
												</div>
												<div class="col-md-3">
													<div class="radio">
														<label>
															<input type="radio" name="optionsRadios" id="optionsRadios1" value="option1">
															Administartor
														</label>
													</div>
													<div class="radio">
														<label>
															<input type="radio" name="optionsRadios" id="optionsRadios1" value="option1">
															None
														</label>
													</div>
												</div>
											</div>
										</div>
									</td>
								</tr>

								<tr>
									<td>
										<h4><strong><span>Q1.</span> &nbsp
											You Are a...?
										</strong> &nbsp</h4>

										<div class="container-fluid">
											<div class="row">
												<div class="col-md-3 col-md-offset-1">
													<div class="radio">
														<label>
															<input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked>
															Coder
														</label>
													</div>
													<div class="radio">
														<label>
															<input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked>
															Deigner
														</label>
													</div>
												</div>
												<div class="col-md-3">
													<div class="radio">
														<label>
															<input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked>
															Administartor
														</label>
													</div>
													<div class="radio">
														<label>
															<input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked>
															None
														</label>
													</div>
												</div>
											</div>
										</div>
									</td>
								</tr>

								<tr>
									<td>
										<h4><strong><span>Q1.</span> &nbsp
											You Are a...?
										</strong> &nbsp</h4>

										<div class="container-fluid">
											<div class="row">
												<div class="col-md-3 col-md-offset-1">
													<div class="radio">
														<label>
															<input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked>
															Coder
														</label>
													</div>
													<div class="radio">
														<label>
															<input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked>
															Deigner
														</label>
													</div>
												</div>
												<div class="col-md-3">
													<div class="radio">
														<label>
															<input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked>
															Administartor
														</label>
													</div>
													<div class="radio">
														<label>
															<input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked>
															None
														</label>
													</div>
												</div>
											</div>
										</div>
									</td>
								</tr>

								<tr>
									<td>
										<h4><strong><span>Q1.</span> &nbsp
											You Are a...?
										</strong> &nbsp</h4>

										<div class="container-fluid">
											<div class="row">
												<div class="col-md-3 col-md-offset-1">
													<div class="radio">
														<label>
															<input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked>
															Coder
														</label>
													</div>
													<div class="radio">
														<label>
															<input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked>
															Deigner
														</label>
													</div>
												</div>
												<div class="col-md-3">
													<div class="radio">
														<label>
															<input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked>
															Administartor
														</label>
													</div>
													<div class="radio">
														<label>
															<input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked>
															None
														</label>
													</div>
												</div>
											</div>
										</div>
									</td>
								</tr>

								<tr>
									<td>
										<h4><strong><span>Q1.</span> &nbsp
											You Are a...?
										</strong> &nbsp</h4>

										<div class="container-fluid">
											<div class="row">
												<div class="col-md-3 col-md-offset-1">
													<div class="radio">
														<label>
															<input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked>
															Coder
														</label>
													</div>
													<div class="radio">
														<label>
															<input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked>
															Deigner
														</label>
													</div>
												</div>
												<div class="col-md-3">
													<div class="radio">
														<label>
															<input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked>
															Administartor
														</label>
													</div>
													<div class="radio">
														<label>
															<input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked>
															None
														</label>
													</div>
												</div>
											</div>
										</div>
									</td>
								</tr>

								<tr>
									<td>
										<h4><strong><span>Q1.</span> &nbsp
											You Are a...?
										</strong> &nbsp</h4>

										<div class="container-fluid">
											<div class="row">
												<div class="col-md-3 col-md-offset-1">
													<div class="radio">
														<label>
															<input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked>
															Coder
														</label>
													</div>
													<div class="radio">
														<label>
															<input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked>
															Deigner
														</label>
													</div>
												</div>
												<div class="col-md-3">
													<div class="radio">
														<label>
															<input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked>
															Administartor
														</label>
													</div>
													<div class="radio">
														<label>
															<input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked>
															None
														</label>
													</div>
												</div>
											</div>
										</div>
									</td>
								</tr>

								<tr>
									<td>
										<h4><strong><span>Q1.</span> &nbsp
											You Are a...?
										</strong> &nbsp</h4>

										<div class="container-fluid">
											<div class="row">
												<div class="col-md-3 col-md-offset-1">
													<div class="radio">
														<label>
															<input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked>
															Coder
														</label>
													</div>
													<div class="radio">
														<label>
															<input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked>
															Deigner
														</label>
													</div>
												</div>
												<div class="col-md-3">
													<div class="radio">
														<label>
															<input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked>
															Administartor
														</label>
													</div>
													<div class="radio">
														<label>
															<input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked>
															None
														</label>
													</div>
												</div>
											</div>
										</div>
									</td>
								</tr>

								<tr>
									<td>
										<h4><strong><span>Q1.</span> &nbsp
											You Are a...?
										</strong> &nbsp</h4>

										<div class="container-fluid">
											<div class="row">
												<div class="col-md-3 col-md-offset-1">
													<div class="radio">
														<label>
															<input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked>
															Coder
														</label>
													</div>
													<div class="radio">
														<label>
															<input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked>
															Deigner
														</label>
													</div>
												</div>
												<div class="col-md-3">
													<div class="radio">
														<label>
															<input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked>
															Administartor
														</label>
													</div>
													<div class="radio">
														<label>
															<input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked>
															None
														</label>
													</div>
												</div>
											</div>
										</div>
									</td>
								</tr>

								<tr>
									<td>
										<h4><strong><span>Q1.</span> &nbsp
											You Are a...?
										</strong> &nbsp</h4>

										<div class="container-fluid">
											<div class="row">
												<div class="col-md-3 col-md-offset-1">
													<div class="radio">
														<label>
															<input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked>
															Coder
														</label>
													</div>
													<div class="radio">
														<label>
															<input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked>
															Deigner
														</label>
													</div>
												</div>
												<div class="col-md-3">
													<div class="radio">
														<label>
															<input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked>
															Administartor
														</label>
													</div>
													<div class="radio">
														<label>
															<input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked>
															None
														</label>
													</div>
												</div>
											</div>
										</div>
									</td>
								</tr>

								<tr>
									<td>
										<h4><strong><span>Q1.</span> &nbsp
											You Are a...?
										</strong> &nbsp</h4>

										<div class="container-fluid">
											<div class="row">
												<div class="col-md-3 col-md-offset-1">
													<div class="radio">
														<label>
															<input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked>
															Coder
														</label>
													</div>
													<div class="radio">
														<label>
															<input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked>
															Deigner
														</label>
													</div>
												</div>
												<div class="col-md-3">
													<div class="radio">
														<label>
															<input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked>
															Administartor
														</label>
													</div>
													<div class="radio">
														<label>
															<input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked>
															None
														</label>
													</div>
												</div>
											</div>
										</div>
									</td>
								</tr>

								<tr>
									<td>
										<h4><strong><span>Q1.</span> &nbsp
											You Are a...?
										</strong> &nbsp</h4>

										<div class="container-fluid">
											<div class="row">
												<div class="col-md-3 col-md-offset-1">
													<div class="radio">
														<label>
															<input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked>
															Coder
														</label>
													</div>
													<div class="radio">
														<label>
															<input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked>
															Deigner
														</label>
													</div>
												</div>
												<div class="col-md-3">
													<div class="radio">
														<label>
															<input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked>
															Administartor
														</label>
													</div>
													<div class="radio">
														<label>
															<input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked>
															None
														</label>
													</div>
												</div>
											</div>
										</div>
									</td>
								</tr>

								<tr>
									<td>
										<h4><strong><span>Q1.</span> &nbsp
											You Are a...?
										</strong> &nbsp</h4>

										<div class="container-fluid">
											<div class="row">
												<div class="col-md-3 col-md-offset-1">
													<div class="radio">
														<label>
															<input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked>
															Coder
														</label>
													</div>
													<div class="radio">
														<label>
															<input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked>
															Deigner
														</label>
													</div>
												</div>
												<div class="col-md-3">
													<div class="radio">
														<label>
															<input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked>
															Administartor
														</label>
													</div>
													<div class="radio">
														<label>
															<input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked>
															None
														</label>
													</div>
												</div>
											</div>
										</div>
									</td>
								</tr>

								<tr>
									<td>
										<h4><strong><span>Q1.</span> &nbsp
											You Are a...?
										</strong> &nbsp</h4>

										<div class="container-fluid">
											<div class="row">
												<div class="col-md-3 col-md-offset-1">
													<div class="radio">
														<label>
															<input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked>
															Coder
														</label>
													</div>
													<div class="radio">
														<label>
															<input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked>
															Deigner
														</label>
													</div>
												</div>
												<div class="col-md-3">
													<div class="radio">
														<label>
															<input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked>
															Administartor
														</label>
													</div>
													<div class="radio">
														<label>
															<input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked>
															None
														</label>
													</div>
												</div>
											</div>
										</div>
									</td>
								</tr>

								<tr>
									<td>
										<h4><strong><span>Q1.</span> &nbsp
											You Are a...?
										</strong> &nbsp</h4>

										<div class="container-fluid">
											<div class="row">
												<div class="col-md-3 col-md-offset-1">
													<div class="radio">
														<label>
															<input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked>
															Coder
														</label>
													</div>
													<div class="radio">
														<label>
															<input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked>
															Deigner
														</label>
													</div>
												</div>
												<div class="col-md-3">
													<div class="radio">
														<label>
															<input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked>
															Administartor
														</label>
													</div>
													<div class="radio">
														<label>
															<input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked>
															None
														</label>
													</div>
												</div>
											</div>
										</div>
									</td>
								</tr>

								<tr>
									<td>
										<h4><strong><span>Q1.</span> &nbsp
											You Are a...?
										</strong> &nbsp</h4>

										<div class="container-fluid">
											<div class="row">
												<div class="col-md-3 col-md-offset-1">
													<div class="radio">
														<label>
															<input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked>
															Coder
														</label>
													</div>
													<div class="radio">
														<label>
															<input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked>
															Deigner
														</label>
													</div>
												</div>
												<div class="col-md-3">
													<div class="radio">
														<label>
															<input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked>
															Administartor
														</label>
													</div>
													<div class="radio">
														<label>
															<input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked>
															None
														</label>
													</div>
												</div>
											</div>
										</div>
									</td>
								</tr>

								<tr>
									<td>
										<h4><strong><span>Q1.</span> &nbsp
											You Are a...?
										</strong> &nbsp</h4>

										<div class="container-fluid">
											<div class="row">
												<div class="col-md-3 col-md-offset-1">
													<div class="radio">
														<label>
															<input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked>
															Coder
														</label>
													</div>
													<div class="radio">
														<label>
															<input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked>
															Deigner
														</label>
													</div>
												</div>
												<div class="col-md-3">
													<div class="radio">
														<label>
															<input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked>
															Administartor
														</label>
													</div>
													<div class="radio">
														<label>
															<input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked>
															None
														</label>
													</div>
												</div>
											</div>
										</div>
									</td>
								</tr>

								<tr>
									<td>
										<h4><strong><span>Q1.</span> &nbsp
											You Are a...?
										</strong> &nbsp</h4>

										<div class="container-fluid">
											<div class="row">
												<div class="col-md-3 col-md-offset-1">
													<div class="radio">
														<label>
															<input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked>
															Coder
														</label>
													</div>
													<div class="radio">
														<label>
															<input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked>
															Deigner
														</label>
													</div>
												</div>
												<div class="col-md-3">
													<div class="radio">
														<label>
															<input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked>
															Administartor
														</label>
													</div>
													<div class="radio">
														<label>
															<input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked>
															None
														</label>
													</div>
												</div>
											</div>
										</div>
									</td>
								</tr>

								<tr>
									<td>
										<h4><strong><span>Q1.</span> &nbsp
											You Are a...?
										</strong> &nbsp</h4>

										<div class="container-fluid">
											<div class="row">
												<div class="col-md-3 col-md-offset-1">
													<div class="radio">
														<label>
															<input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked>
															Coder
														</label>
													</div>
													<div class="radio">
														<label>
															<input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked>
															Deigner
														</label>
													</div>
												</div>
												<div class="col-md-3">
													<div class="radio">
														<label>
															<input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked>
															Administartor
														</label>
													</div>
													<div class="radio">
														<label>
															<input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked>
															None
														</label>
													</div>
												</div>
											</div>
										</div>
									</td>
								</tr>

								<tr>
									<td>
										<h4><strong><span>Q1.</span> &nbsp
											You Are a...?
										</strong> &nbsp</h4>

										<div class="container-fluid">
											<div class="row">
												<div class="col-md-3 col-md-offset-1">
													<div class="radio">
														<label>
															<input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked>
															Coder
														</label>
													</div>
													<div class="radio">
														<label>
															<input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked>
															Deigner
														</label>
													</div>
												</div>
												<div class="col-md-3">
													<div class="radio">
														<label>
															<input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked>
															Administartor
														</label>
													</div>
													<div class="radio">
														<label>
															<input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked>
															None
														</label>
													</div>
												</div>
											</div>
										</div>
									</td>
								</tr>

								<tr>
									<td>
										<h4><strong><span>Q1.</span> &nbsp
											You Are a...?
										</strong> &nbsp</h4>

										<div class="container-fluid">
											<div class="row">
												<div class="col-md-3 col-md-offset-1">
													<div class="radio">
														<label>
															<input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked>
															Coder
														</label>
													</div>
													<div class="radio">
														<label>
															<input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked>
															Deigner
														</label>
													</div>
												</div>
												<div class="col-md-3">
													<div class="radio">
														<label>
															<input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked>
															Administartor
														</label>
													</div>
													<div class="radio">
														<label>
															<input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked>
															None
														</label>
													</div>
												</div>
											</div>
										</div>
									</td>
								</tr>

								<tr>
									<td>
										<h4><strong><span>Q1.</span> &nbsp
											You Are a...?
										</strong> &nbsp</h4>

										<div class="container-fluid">
											<div class="row">
												<div class="col-md-3 col-md-offset-1">
													<div class="radio">
														<label>
															<input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked>
															Coder
														</label>
													</div>
													<div class="radio">
														<label>
															<input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked>
															Deigner
														</label>
													</div>
												</div>
												<div class="col-md-3">
													<div class="radio">
														<label>
															<input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked>
															Administartor
														</label>
													</div>
													<div class="radio">
														<label>
															<input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked>
															None
														</label>
													</div>
												</div>
											</div>
										</div>
									</td>
								</tr>

							</tbody>
						</table>
					</form>
				</div>

				<div class="box-footer">
					<button type="submit" class="btn btn-primary pull-right">Submit</button>
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


</section>

@endsection
