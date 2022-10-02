<?php

require_once dirname(__DIR__)."../classes/post.php";
require_once dirname(__DIR__)."../classes/service.php";
require_once dirname(__DIR__)."../classes/campus.php";
require_once dirname(__DIR__)."../classes/section.php";
// post object
$post = new post();
// setvice
$service = new service();
// campus object
$section = new section(); 
//section object
$campus = new campus();
// all post 
$all_post = $post->getPost(); 
// all services
$all_service = $service->getAllpost();
//all section 
$all_section = $section->getSection();
// all campus 
$all_campus = $campus->getCampus();
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
										<li class="nav-item "><a href="#student" data-bs-toggle="tab"
												class="active text-bold"><i class="fa fa-user-circle-o"></i> Staff</a>
												
										</li>
										<li class="nav-item"><a href="#student_image" data-bs-toggle="tab"><i class="fa fa-user-o"></i> Image</a>
										</li>
										<li class="nav-item"><a href="#school" data-bs-toggle="tab"><i class="fa fa-vcard-o"></i> School</a>
										</li>
									</ul>

								</header>
	<div class="panel-body">
		<form action="../functions/regisster_staff.php" method="POST" enctype="multipart/form-data">
			<div class="tab-content">
				<div class="tab-pane active" id="student">
					<div class="row ">
						<div class=" col-md-12 col-sm-12">	
						
									<div class="row" >
										<div class="col-lg-6 ">
											<div class="form-group">
												<label for="exampleInput"><strong>First Name</strong></label>
												<input type="text" name="fname" id="" class="form-control">
											</div>
										</div>
										<div class="col-lg-6 ">
											<div class="form-group">
												<label for="exampleInput"><strong>Orther Name</strong></label>
												<input type="text" name="oname"  class="form-control">
											</div>
										</div>

										<div class="col-lg-6 ">
											<div class="form-group">
												<label for="exampleInput"><strong>last Name</strong></label>
												<input type="text" name="lname"  class="form-control">
											</div>
										</div>

										<div class="col-lg-6 ">
											<div class="form-group">
												<label for="exampleInput"><strong>Place of Birth</strong></label>
												<input type="text" name="POB" id="" class="form-control">
											</div>
										</div>
										<div class="col-lg-6 ">
											<div class="form-group">
												<label for="exampleInput"><strong>Date of Birth</strong></label>
												<input type="date" name="DOB" id="date" class="form-control">
											</div>
										</div>

										<div class="col-lg-6 ">
											<div class="form-group">
												<label for="exampleInput"><strong>Gender</strong></label>
														<select id="inputState" name="sex" class="form-control">
															<option selected>Choose...</option>
															<option	value="M">MALE</option>
															<option	value="F">FEMALE</option>
														</select>
											</div>
										</div>

										<div class="col-lg-6 ">
											<div class="form-group">
												<label for="exampleInput"><strong>Contact</strong></label>
												<input type="tel" name="contact" id="" class="form-control">
											</div>
										</div>
											
										<div class="col-lg-6 ">
											<div class="form-group">
												<label for="exampleInput"><strong>Email</strong></label>
												<input type="email" name="email" id="" class="form-control">
											</div>
										</div>
										
										<div class="col-lg-6 ">
											<div class="form-group">
												<label for="exampleInput"><strong>Nationality</strong></label>
												<input type="text" name="nationality" id="" class="form-control">
											</div>
										</div>

										<div class="col-lg-6 ">
											<div class="form-group">
												<label for="exampleInput"><strong>Resident</strong></label>
												<input type="text" name="resident" id="" class="form-control">
											</div>
										</div>

										<div class="col-lg-6 ">
											<div class="form-group">
												<label for="exampleInput"><strong>Relegion</strong></label>
												<select id="inputState" name="religion" class="form-control">
															<option selected>Choose...</option>
															<option	value="Christians">Christians</option>
															<option	value="Muslims">Muslims</option>
															<option	value="Jewish">Jewish</option>
															<option	value="Buddhism">Buddhism</option>
															<option	value="Hindu">Hindu</option>
														</select>
											</div>
										</div>

										<div class="col-lg-6 ">
											<div class="form-group">
												<label for="exampleInput"><strong>Maretal Status</strong></label>
												<select id="inputState" name="marital_status" class="form-control">
															<option selected>Choose...</option>
															<option	value="single">single</option>
															<option	value="Engage">Engage</option>
															<option	value="married">married</option>
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
				<div class="tab-pane" id="school"><div class="row">
						<div class="col-md-12 col-sm-12">
									<div class="row" >
									<div class="col-lg-6 ">
											<div class="form-group">
												<label for="exampleInput"><strong>Service</strong></label>
												<select id="inputState" name="service" class="form-control">
															<?php
															foreach($all_service as $row){

															echo '
															<option	value="'.$row['id_service'].'">'.$row['service'].'</option>
															';

															}
															?>
												</select>
											</div>
										</div>
										<div class="col-lg-6 ">
											<div class="form-group">
												<label for="exampleInput"><strong>POST</strong></label>
												<select id="inputState" name="post" class="form-control">
															<option selected>Choose...</option>

															<?php
															foreach($all_post as $row){

															echo '
															<option	value="'.$row['id_post'].'">'.$row['name'].'</option>
															';

															}
															?>
														</select>
											</div>
										</div>
										<div class="col-lg-6 ">
											<div class="form-group">
												<label for="exampleInput"><strong>Section</strong></label>
												<select id="inputState" name="section" class="form-control">
															<option selected>Choose...</option>

															<?php
															foreach($all_section as $row){

															echo '
															<option	value="'.$row['id_section'].'">'.$row['section_name'].'</option>
															';

															}
															?>
														</select>
											</div>
										</div>
										<div class="col-lg-6 ">
											<div class="form-group">
												<label for="exampleInput"><strong>Campus</strong></label>
												<select id="inputState" name="campus" class="form-control">
															<option selected>Choose...</option>

															<?php
															foreach($all_campus as $row){

															echo '
															<option	value="'.$row['id_campus'].'">'.$row['campus_name'].'</option>
															';

															}
															?>
														</select>
											</div>
										</div>

									</div>

								<div class="float-end">
									<input type="reset" value='Cancel' class="btn btn-danger mx-2">
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
