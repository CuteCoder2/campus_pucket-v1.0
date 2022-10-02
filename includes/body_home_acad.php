<?php


	require_once dirname(__DIR__)."../classes/student.php";
	require_once dirname(__DIR__)."../classes/sub_serie.php";

	// create student object
	$student = new student();

	// creating subject object
	$courses = new subSeries();

	// get all school active students 
	$all_student = $student->getAllActiveStudent();

	// counting school active students
	$active_student_num = count($all_student);

	//geting all subject active
	$all_courses = $courses->getSubSerie();

	// number of all_subjects
	$num_courses = count($all_courses);

	//all new students 
	$new_student = $student->getAllNewStudent();
	//number of new students 
	$num_new_stud = count($new_student);




?>




			<!-- start page content -->
			<div class="page-content-wrapper">
				<div class="page-content">
					<div class="page-bar">
						<div class="page-title-breadcrumb">
							<div class=" pull-left">
								<div class="page-title">
									<?php
									echo $_SESSION['fname']." ".$_SESSION['lname'];
									?></div>
							</div>
						</div>
					</div>
					<!-- start widget -->
					<div class="state-overview">
						<div class="row">
							<div class="col-xl-4 col-md-6 col-12">
								<div class="info-box bg-b-green">
									<span class="info-box-icon push-bottom"><i class="material-icons">group</i></span>
									<div class="info-box-content">
										<span class="info-box-text">Total Students</span>
										<span class="info-box-number"><?php
										echo $active_student_num;
										?></span>
										<div class="progress">
											<div class="progress-bar" style="width: 100%"></div>
										</div>

									</div>
									<!-- /.info-box-content -->
								</div>
								<!-- /.info-box -->
							</div>
							<!-- /.col -->
							<div class="col-xl-4 col-md-6 col-12">
								<div class="info-box bg-b-yellow">
									<span class="info-box-icon push-bottom"><i class="material-icons">person</i></span>
									<div class="info-box-content">
										<span class="info-box-text">New Students</span>
										<span class="info-box-number"><?php
										echo $num_new_stud;
										?></span>
										<div class="progress">
											<div class="progress-bar" style="width: 100%"></div>
										</div>
									</div>
									<!-- /.info-box-content -->
								</div>
								<!-- /.info-box -->
							</div>
							<!-- /.col -->
							<div class="col-xl-4 col-md-6 col-12">
								<div class="info-box bg-b-blue">
									<span class="info-box-icon push-bottom"><i class="material-icons">school</i></span>
									<div class="info-box-content">
										<span class="info-box-text">Total Course</span>
										<span class="info-box-number">
											<?php
											echo $num_courses;
											?>
										</span>
										<div class="progress">
											<div class="progress-bar" style="width: 100%"></div>
										</div>
									</div>
									<!-- /.info-box-content -->
								</div>
								<!-- /.info-box -->
							</div>
						</div>
					</div>
					<!-- end widget -->

                    <!-- start new student list -->
					<div class="row">
						<div class="col-md-12 col-sm-12">
							<div class="card  card-box">
								<div class="card-head">
									<header>New Student List</header>
								</div>
								<div class="card-body ">
									<div class="table-wrap">
										<div class="table-responsive">
											<table class="table display product-overview mb-30" id="support_table">
												<thead>
													<tr class="text-center">
														<th>No</th>
														<th>First Name</th>
														<th>Last Name</th>
														<th>Date Of Admit</th>
														<th>Fees status</th>
														<th>Class</th>
														<th>Profile</th>
													</tr>
												</thead>
												<tbody>
													<?php
													$first_eight_new_student = array_slice($new_student,0,8);
													
													$i= 1 ;

													foreach($first_eight_new_student as $row){

														echo ' <tr>
														<td>'.$i.'</td>
														<td>'.ucfirst($row['stud_fname']).'</td>
														<td>'.ucfirst($row['stud_lname']).'</td>
														<td>'.substr($row['register_date'],0,10).'</td>
														<td>';

														if($row['fee'] == 0){
															echo '<span class="label label-sm label-success ">paid</span>';
														}else{
															echo '<span class="label label-sm label-warning">unpaid </span>';
														}
														echo '</td>
														<td>'.$row['class_name'].'</td>
														<td class="text-center"><a href="student_profile.php?student_matricultion='.$row['matriculation'].'" class="btn btn-xs btn-primary"
																title="'.ucfirst($row['stud_fname']).'"><i
																	class="fa fa-info"></i>
																	</a>
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
					<!-- end new student list -->
				      <!-- start new student list -->
						<div class="row">
							<div class="col-md-12 col-sm-12">

							</div>
						</div>

                    

					<!-- start course list -->
					<div class="row">
								<div class="card-head">
									<header>On Going Classes</header>
	     			</div>
						<div class="col-lg-3 col-md-6 col-12 col-sm-6">
							<div class="blogThumb">
								<div class="thumb-center"><img class="img-responsive" alt="user"
										src="../../../assets/staff/img/course/course1.jpg"></div>
								<div class="course-box">
									<h4>PHP Development Course</h4>
									<div class="text-muted"><span class="m-r-10">April 23</span>
										<a class="course-likes m-l-10" href="#"><i class="fa fa-heart-o"></i> 654</a>
									</div>
									<p><span><i class="ti-alarm-clock"></i> Duration: 6 Months</span></p>
									<p><span><i class="ti-user"></i> Professor: Jane Doe</span></p>
									<p><span><i class="fa fa-graduation-cap"></i> Students: 200+</span></p>
									<button type="button"
										class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect m-b-10 btn-info">Read
										More</button>
								</div>
							</div>
						</div>
						<div class="col-lg-3 col-md-6 col-12 col-sm-6 ">
							<div class="blogThumb">
								<div class="thumb-center"><img class="img-responsive" alt="user"
										src="../../../assets/staff//img/course/course2.jpg"></div>
								<div class="course-box">
									<h4>PHP Development Course</h4>
									<div class="text-muted"><span class="m-r-10">April 23</span>
										<a class="course-likes m-l-10" href="#"><i class="fa fa-heart-o"></i> 654</a>
									</div>
									<p><span><i class="ti-alarm-clock"></i> Duration: 6 Months</span></p>
									<p><span><i class="ti-user"></i> Professor: Jane Doe</span></p>
									<p><span><i class="fa fa-graduation-cap"></i> Students: 200+</span></p>
									<button type="button"
										class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect m-b-10 btn-info">Read
										More</button>
								</div>
							</div>
						</div>
						<div class="col-lg-3 col-md-6 col-12 col-sm-6">
							<div class="blogThumb">
								<div class="thumb-center"><img class="img-responsive" alt="user"
										src="../../../assets/staff/img/course/course3.jpg"></div>
								<div class="course-box">
									<h4>PHP Development Course</h4>
									<div class="text-muted"><span class="m-r-10">April 23</span>
										<a class="course-likes m-l-10" href="#"><i class="fa fa-heart-o"></i> 654</a>
									</div>
									<p><span><i class="ti-alarm-clock"></i> Duration: 6 Months</span></p>
									<p><span><i class="ti-user"></i> Professor: Jane Doe</span></p>
									<p><span><i class="fa fa-graduation-cap"></i> Students: 200+</span></p>
									<button type="button"
										class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect m-b-10 btn-info">Read
										More</button>
								</div>
							</div>
						</div>
						<div class="col-lg-3 col-md-6 col-12 col-sm-6">
							<div class="blogThumb">
								<div class="thumb-center"><img class="img-responsive" alt="user"
										src="../../../assets/staff/img/course/course4.jpg"></div>
								<div class="course-box">
									<h4>PHP Development Course</h4>
									<div class="text-muted"><span class="m-r-10">April 23</span>
										<a class="course-likes m-l-10" href="#"><i class="fa fa-heart-o"></i> 654</a>
									</div>
									<p><span><i class="ti-alarm-clock"></i> Duration: 6 Months</span></p>
									<p><span><i class="ti-user"></i> Professor: Jane Doe</span></p>
									<p><span><i class="fa fa-graduation-cap"></i> Students: 200+</span></p>
									<button type="button"
										class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect m-b-10 btn-info">Read
										More</button>
								</div>
							</div>
						</div>
					</div>
                    

				</div>
			</div>
			<!-- end page content -->

            		