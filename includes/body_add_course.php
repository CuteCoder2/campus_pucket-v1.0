	<?php
	require_once dirname(__DIR__)."../classes/series.php";
	require_once dirname(__DIR__)."../classes/certification.php";
	//series object 
	$series = new series();
	// all series 
	$all_series = $series->getSeries();
	// certification object 
	$certification = new certification();
	// all certification 
	$all_certification = $certification->getAllCertificate();
	?>
				<!-- start page content -->
				<div class="page-content-wrapper">
				<div class="page-content">
					<div class="page-bar">
						<div class="page-title-breadcrumb">
							

						</div>
					</div>

					<div class="row justify-content-center">
						<div class="col-sm-10">
							<div class="panel tab-border card-box">
								<header class="panel-heading panel-heading-gray custom-tab ">
									<ul class="nav nav-tabs">
										<li class="nav-item "><a href="#student" data-bs-toggle="tab" class="active text-bold"><i class="fa fa-book"></i> Course Details</a>	
										</li>
										<li class="nav-item"><a href="#student_image" data-bs-toggle="tab"><i class="fa fa-user-o"></i> Image</a>
										</li>
										<li class="nav-item"><a href="#about" data-bs-toggle="tab"><i class="fa fa-money"></i> About</a>
										</li>
									</ul>
								</header>
	<div class="panel-body">
		<form  action="../functions/add_course.php" enctype="multipart/form-data" method="POST">
			<div class="tab-content">
				<div class="tab-pane active" id="student">
					<div class="row ">
						<div class=" col-md-12 col-sm-12">	
						
									<div class="row" >
										<div class="col-lg-6 ">
											<div class="form-group">
												<label for="exampleInput"><strong>Course Abbrevation</strong></label>
												<input type="text" name="id_course" id="" class="form-control" required>
											</div>
										</div>
										<div class="col-lg-6 ">
											<div class="form-group">
												<label for="exampleInput"><strong>Course Name</strong></label>
												<input type="text" name="course_name"  class="form-control">
											</div>
										</div>

										<div class="col-lg-6 ">
											<div class="form-group">
												<label for="exampleInput"><strong>Departement</strong></label>
												<select id="campus" name="departement" class="form-control" required>
															<option selected>Choose...</option>
															<?php
															// dumping all departement
															foreach($all_series as $row){
																echo '<option  value="'.$row['id_series'].'">'.$row['series_name'].'</option>';
															}
															?>
														</select>
											</div>
										</div>

										<div class="col-lg-6 ">
											<div class="form-group">
												<label for="exampleInput"><strong>Certificate</strong></label>
												<select id="campus" name="id_certificate" class="form-control" required>
															<option selected>Choose...</option>
															<?php
															// dumping all certification
															foreach($all_certification as $row){
																echo '<option  value="'.$row['id_certificate'].'">'.$row['certificate_name'].'</option>';
															}
															?>
														</select>
											</div>
										</div>
									</div>	
						</div>
					</div>
				</div>
				<div class="tab-pane " id="student_image">
				<div class="row">
					<div class="txt text-capitalize text-bold text-dark" id="txt">click in the box to add or change image</div>
					<div class="col-12 text-center" id="img-viewer">
						<input type="file" accept=".png,.jpeg,.jpg" name="picture" id="img-uploader">
					</div>
					<button class="btn my-2 btn-danger" type= 'button' id="cancel_btn">Cancel</button>
					</div>
					</div>
				<div class="tab-pane" id="about">
					<div class="row">
						<div class="col-md-12 col-sm-12">
									<div class="row" >
									
										<div class="col-12">
										<div class="form-group">
												<label for="exampleInput"><strong>About Course </strong></label>
												<textarea name="about" class="form-control" id="" cols="50" rows="10"></textarea>
											</div>
										</div>
										</div>
									</div>
									<div class="float-end">
									<Button type="button" class="btn btn-danger mx-2">Cancel</Button>
									<Button type="submit" class="btn btn-info mx-5">Register</Button>
								</div>
						</div>
					</div>
				</div>
									</div>
								</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- end page content -->
			<script src="../assets/staff/js/basic_form.js"></script>

