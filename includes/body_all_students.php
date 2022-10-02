
<?php

require_once dirname(__DIR__ )."../classes/student.php";
require_once dirname(__DIR__ )."../classes/class.php";
require_once dirname(__DIR__ )."../classes/series.php";
require_once dirname(__DIR__ )."../classes/sub_serie.php";

// student object
$student = new student();
// class object
$class = new Classes();
// series object 
$serie = new series();
// sub series object
$sub_serie = new subSeries();

// getting all syudent
$all_student = $student->getAllActiveStudent();
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
						<div class="row">
						<div class="col-sm-12">
						</div>
					</div>
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
														<header>All Students List</header>
													</div>
													<div class="card-body ">
														<div class="row">
															<div class="col-md-6 col-sm-6 col-6">
																<div class="btn-group">
																	<a href="add_professor.html" id="addRow"
																		class="btn btn-info">
																		Add New <i class="fa fa-plus"></i>
																	</a>
																</div>
															</div>
														</div>
														<div class="table-scrollable" id="body_table">
															<table
																class="table display  table-hover "
																id="table">
																<thead>
																	<tr>
																		<th class = "text-center" ></th>
																		<th class = "text-center" > Matriculation</th>
																		<th class = "text-center" > First Name</th>
																		<th class = "text-center" > Last Name </th>
																		<th class = "text-center" > SEX </th>
																		<th class = "text-center" > Level </th>
																		<th class = "text-center" > Mobile </th>
																		<th class = "text-center"> Email </th>
																		<th class = "text-center" >Admission Date</th>
																		<th class = "text-center" > Action </th>
																	</tr>
																</thead>
																<tbody >
																	<?php
															$i=1;
														foreach($all_student as $row){
															echo '<tr class="odd gradeX text-center">
															<td class="patient-img">
																<img src="'.$row['picture'].'"
																	alt="">
															</td>
															<td class="">'.$row['matriculation'].'</td>
															<td >'.$row['stud_fname'].'</td>
															<td>'.$row['stud_lname'].'</td>
															<td>'.$row['sex'].'</td>
															<td>'.$row['class_name'].'</td>
															<td class="left">'.$row['tel'].'</td>
															<td><a href="'.$row['email'].'">'.$row['email'].'</a></td>
															<td>'.substr($row['register_date'],0,10).'</td>
															<td>
	
															<a title="about" href="student_profile.php?student_matricultion='.$row['matriculation'].'" class="btn btn-xs btn-info"><i class="fa fa-plus-square"></i></a>

																<button title="modify" class="btn btn-success btn-xs">
																<i class="fa fa-edit"></i>
																</button>

																<button title="delete" class="btn btn-danger btn-xs">
																	<i class="fa fa-trash-o "></i>
																</button>
															</td>
														</tr>';
														
														$i++; }
														
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
<script src="../assets/staff/js/student_table.js"></script>