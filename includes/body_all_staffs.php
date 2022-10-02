
<?php

require_once dirname(__DIR__ )."../classes/staff.php";
require_once dirname(__DIR__ )."../classes/class.php";
require_once dirname(__DIR__ )."../classes/series.php";
require_once dirname(__DIR__ )."../classes/sub_serie.php";

// staff object
$staff = New staff();
// class object
$class = new Classes();
// series object 
$serie = new series();
// sub series object
$sub_serie = new subSeries();

// getting all student
$all_staff = $staff->getAllStaf();
// getting all classes
$all_classes = $class->getAllClasses();
// getting all sub_serie
$all_subseries = $sub_serie->getSubSerie();
// getting all series
$all_series = $serie->getSeries();

?>

<!-- start page content -->
			<div class="page-content-wrapper">
				<div class="page-content">
					<div class="page-bar">
						
					</div>
					<div class="row">
						<div class="col-md-12">
							<div class="tabbable-line">
								<div class="tab-content">
									<div class="tab-pane active fontawesome-demo" id="tab1">
										<div class="row">
											<div class="col-md-12">
												<div class="card card-box">
													<div class="card-head">
														<header>Administrtors</header>
														
													</div>
													<div class="card-body ">
														<div class="row">
															<div class="col-md-6 col-sm-6 col-6">
																<div class="btn-group">
																	<a href="add_professors.php" id="addRow"
																		class="btn btn-info">
																		Add New <i class="fa fa-plus"></i>
																	</a>
																</div>
															</div>
														</div>
														<div class="table-scrollable">
															<table
																class="table table-striped  table-hover table-checkable "
																id="table">
																<thead>
																	<tr>
																		<th></th>
																		<th> First Name </th>
																		<th> Last Name </th>
																		<th> post </th>
																		<th> Mobile </th>
																		<th> Email </th>
																		<th> Departement</th>
																		<th> Action </th>
																	</tr>
																</thead>
																<tbody>
																	<?php
															$i=1;
														foreach($all_staff as $row){
															echo '<tr class="odd gradeX">
															<td class="patient-img">
																<img src="'.$row['picture'].'"
																	alt="">
															</td>
															<td class="left">'.$row['sta_fname'].'</td>
															<td>'.$row['sta_lname'].'</td>
															<td class="left">'.$row['name'].'</td>
															<td>'.$row['tel'].'</td>
															<td><a href="'.$row['email'].'">'.$row['email'].'</a></td>
															<td class="left">'.$row['service'].'</td>
															<td>
																<a href="staff_profile.php?staff_matriculation='.$row['matriculation'].'"													class="btn btn-primary btn-xs">
																	<i class="fa fa-info"></i>
																</a>
																<button title="modify" class="btn btn-success btn-xs">
																<i class="fa fa-edit"></i>
																</button>

																<button title="delete" class="btn btn-danger btn-xs">
																	<i class="fa fa-trash-o "></i>
																</button>
															</td>
														</tr>';
														$i++;
														}
														?>
																</tbody>
															</table>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- end page content -->
