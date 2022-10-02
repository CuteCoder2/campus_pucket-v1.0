
<?php  

if(isset($_GET['student_matricultion'])){

	require_once dirname(__DIR__)."../classes/student.php";
	require_once dirname(__DIR__)."../classes/achieve_student.php";

	// student archieve object 
	$archieve = new studentAchieve();
	$student_achieve = $archieve->getStudentAchieve($_GET['student_matricultion']);

	// student object 
	$student = new student();
	$student_info = $student->getStudentByMatriculation($_GET['student_matricultion']);
	foreach($student_info as $row){
		
	}
}


?>


<!-- start page content -->
			<div class="page-content-wrapper">
				<div class="page-content">
					<div class="page-bar">
						<div class="page-title-breadcrumb">
							<div class=" pull-left">

							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<!-- BEGIN PROFILE SIDEBAR -->
							<div class="profile-sidebar">
								<div class="card">
									<div class="card-body no-padding height-9">
										<div class="row">
										<?php

												echo '<img src="'.$row['picture'].'" height="250" class="card-img"  alt="">'
										?>
										</div>
										<div class="profile-usertitle">
											<div style="color:#1e90ff" class="profile-usertitle-name text-uppercase">
												<?php
												echo '<small class="text-decoration-underline">'.ucfirst($row['stud_fname'])." ".ucfirst($row['stud_lname']).'</small><br>';
												echo '<small class ="text-muted text-decoration-none">'.strtoupper($row['matriculation']).'</small>';
												?>
											</div>
										</div>
										<!-- END SIDEBAR USER TITLE -->
									</div>
								</div>
								<div class="card">
									<div class="card-head">
										<header style="color:#1e90ff">Details</header>
									</div>
									<div class="card-body no-padding height-9">
										<ul class="list-group list-group-unbordered">
											<li class="list-group-item">
												<strong>Gender </strong>
												<div class="profile-desc-item pull-right"><?php
												echo $row['sex'] 
												?></div>
											</li>
											<li class="list-group-item">
												<strong>Department</strong>
												<div class="profile-desc-item pull-right"><?php
												echo strtoupper($row['series_name']) 
												?></div>
											</li>
											<li class="list-group-item ">
												<strong>Fee</strong>
												<div class="profile-desc-item pull-right text-success"><?php
												echo strtoupper($row['fee']).'<span ><strong> XAF</strong></span>'; 
												?></div>
											</li>
											<li class="list-group-item">
												<strong>Series</strong>
												<div class="profile-desc-item pull-right"><?php
												echo strtoupper($row['id_sub_serie']) 
												?></div>
											</li>
											<li class="list-group-item">
												<strong>Email </strong>
												
												<div class="profile-desc-item pull-right">
												<?php
												echo '<a href="'.$row['email'].'" >'.$row['email'].'</a>'
												?>
												</div>
											</li>
											<li class="list-group-item">
												<strong>Phone</strong>
												<div class="profile-desc-item pull-right"><?php
												echo '<a href="'.$row['tel'].'" >'.$row['tel'].'</a>'
												?></div>
											</li>
											<li class="list-group-item">
												<strong>Resident</strong>
												<div class="profile-desc-item pull-right"><?php
												echo ucfirst($row['resident'])
												?></div>
											</li>
										</ul>
									</div>
								</div>
							</div>
							<!-- END BEGIN PROFILE SIDEBAR -->
							<!-- BEGIN PROFILE CONTENT -->
							<div class="profile-content ">
								<div class="row">
									<div class="card">
										<div class="card-topline-aqua">
											<header></header>
										</div>
										<div class="white-box">
											<!-- Nav tabs -->
											<div class="p-rl-20">
												<ul class="nav customtab nav-tabs" role="tablist">
											<div href="" class="nav-link btn-xs btn-info">About Me</div>
											
										</div>
										
											<!-- Tab panes -->
											<div class="tab-content">
												<div class="tab-pane active fontawesome-demo" id="tab1">
													<div id="biography">
														<hr>
														<h4 class="font-bold" style="color:#1e90ff">Class Achieve</h4>
														<table class="table table-hover table-responsive ">
															<thead>
																<tr class="h4 text-center "><td>Class/Level</td><td>School Year</td></tr>
															</thead>
															<tbody>
																<?php

																foreach($student_achieve as $row){
																	echo '<tr class="text-center text-secondary"><td>'.$row['class_name'].'</td><td>'.$row['school_year'].'</td></tr>';
																}

																?>
															</tbody>
														</table>
														<h4 class="font-bold" style="color:#1e90ff">Examin Result</h4>
														
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<!-- END PROFILE CONTENT -->
						</div>
					</div>
				</div>
				<!-- end page content -->
			</div>
			<!-- end page container -->