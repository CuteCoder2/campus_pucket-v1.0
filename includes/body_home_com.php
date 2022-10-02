<?php


	require_once dirname(__DIR__)."../classes/student.php";
	require_once dirname(__DIR__)."../classes/subject.php";
	require_once dirname(__DIR__)."../classes/series.php";
	require_once dirname(__DIR__)."../classes/teacher.php";

	// create student object
	$student = new student();

	// creating subject object
	$subject = new subject();
	//series obect object
	$series = new series();

	// get all school active students 
	$all_student = $student->getAllActiveStudent();

	// counting school active students
	$active_student_num = count($all_student);

	//geting all subject active
	$all_subject = $subject->getAllSubject();

	// number of all_subjects
	$num_sub = count($all_subject);

	//all new students 
	$new_student = $student->getAllNewStudent();
	//number of new students 
	$num_new_stud = count($new_student);

	//getting all series active
	$all_series = $series->getSeries();
	//number of series
	$num_ser = count($all_series);
	// teacher object
	$teacher = new teacher();
	// geting teacher list
	$teacher_list = $teacher->getTeacherLimit(8);




?>

	
	
	<!-- start page content -->
			<div class="page-content-wrapper">
				<div class="page-content">
					<div class="page-bar">
						<div class="page-title-breadcrumb">
							
						</div>
					</div>
					<!-- start widget -->
					<div class="row">
						<div class="col-12">
							<div class="w-100">
								<div class="row">
									<div class="col-sm-4">
										<div class="card">
											<div class="card-body">
												<div class="row">
													<div class="col mt-0">
														<h4 class="info-box-title">Total Students</h4>
													</div>
													<div class="col-auto">
														<div class="l-bg-green info-icon">
															<i class="fa fa-users pull-left col-orange font-30"></i>
														</div>
													</div>
												</div>
												<h1 class="mt-1 mb-3 info-box-title"><?php echo $active_student_num ?></h1>
											</div>
										</div>
										</div>
										<div class="col-sm-4">
										<div class="card">
											<div class="card-body">
												<div class="row">
													<div class="col mt-0">
														<h4 class="info-box-title">Total Course</h4>
													</div>
													<div class="col-auto">
														<div class="col-indigo info-icon">
															<i class="fa fa-book pull-left card-icon font-30"></i>
														</div>
													</div>
												</div>
												<h1 class="mt-1 mb-3 info-box-title"><?php echo $num_ser ;?></h1>
											</div>
										</div>
									</div>
									<div class="col-sm-4">
										<div class="card">
											<div class="card-body">
												<div class="row">
													<div class="col mt-0">
														<h4 class="info-box-title">New Students</h4>
													</div>
													<div class="col-auto">
														<div class="col-teal info-icon">
															<i class="fa fa-user pull-left card-icon font-30"></i>
														</div>
													</div>
												</div>
												<h1 class="mt-1 mb-3 info-box-title"><?php echo $num_new_stud ;?></h1>
												
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>

					<!-- end widget -->
					<div class="row">
						<!-- New Student -->
						<div class="col-md-12 col-sm-12">
							<div class="card  card-box">
								<div class="card-head">
									<header>New Student List</header>
									<!-- <div class="tools">
										<a class="fa fa-repeat btn-color box-refresh" href="javascript:;"></a>
										<a class="t-collapse btn-color fa fa-chevron-down" href="javascript:;"></a>
										<a class="t-close btn-color fa fa-times" href="javascript:;"></a>
									</div> -->
								</div>
								<div class="card-body ">
									<div class="table-wrap">
										<div class="table-responsive">
											<table class="table display product-overview mb-30 table-hover" id="support_table">
												<thead>
													<tr>
														<th>No</th>
														<th>First Name</th>
														<th>Last Name</th>
														<th>Admit On</th>
														<th>Fees status</th>
														<th>Class</th>
													</tr>
												</thead>
												<tbody>
													<?php
													$first_eight_new_student = array_slice($new_student,0,8);
													
													$i= 1 ;

													foreach($first_eight_new_student as $row){

														echo ' <tr>
														<td>'.$i.'</td>
														<td>'.$row['stud_fname'].'</td>
														<td>'.$row['stud_lname'].'</td>
														<td>'.substr($row['register_date'],0,10).'</td>
														<td>';

														if($row['fee'] == 0){
															echo '<span class="label label-sm label-success ">paid</span>';
														}else{
															echo '<span class="label label-sm label-warning">unpaid </span>';
														}
														echo '</td>
														<td>'.$row['class_name'].'</td>
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
						<!--End New Student -->
						<div class="col-6">
							<div class="card card-box">
								<div class="card-head">
									<header>Professors List</header>
								</div>
								<div class="card-body ">
									<div class="row">
										<ul class="docListWindow small-slimscroll-style">

										<?php
										foreach($teacher_list as $row){
											echo '<li>
											<div class="prog-avatar">
												<img src="'.$row['picture'].'" alt="" width="40"
													height="40">
											</div>
											<div class="details">
												<div class="title">
													<a href="#">'.$row['tea_fname']." ".$row['tea_lname'].'</a>
												</div>
												<div>
													<span class="clsAvailable">Available</span>
												</div>
											</div>
										</li>
										<li>';
										}
										?>
											
										</ul>
										<div class="full-width text-center p-t-10">
											<a href="all_professors.php" class="btn purple btn-outline btn-circle margin-0">View All</a>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- end page content -->