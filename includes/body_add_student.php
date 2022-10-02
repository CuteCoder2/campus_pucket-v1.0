<?php

require_once dirname(__DIR__)."../classes/class.php";
require_once dirname(__DIR__)."../classes/series.php";
require_once dirname(__DIR__)."../classes/sub_serie.php";
require_once dirname(__DIR__)."../classes/campus.php";
require_once dirname(__DIR__)."../classes/section.php";
require_once dirname(__DIR__)."../classes/year.php";
require_once dirname(__DIR__)."../classes/motif.php";
require_once dirname(__DIR__)."../classes/payment_method.php";
require_once dirname(__DIR__)."../classes/fee.php";

// class object 
$class = new Classes();
// all classes 
$all_classes = $class->getAllClasses();
// series object
$series = new series();
// all series
$all_series = $series->getSeries();
// sub serie object 
$sub_serie = new subSeries();
// all sub serie
$all_sub_series = $sub_serie->getSubSerie();
// campus object 
$campus = new campus();
// all campus
$all_campus = $campus->getCampus();
// section object
$section = new section();
// all section
$all_section = $section->getSection();
// year object 
$year = new year();
// all school years
$all_years = $year->getLastTwoYear();
// payment motif obejct 
$motif = new paymentMotif();
// all payment motif
$all_motif = $motif->getPaymentMotif();
// payment method 
$method = new paymentMethod();  
// all payment method 
$all_payment_method = $method->getPaymentMethod();
//Fee object
$fee = new fee();
// all fee 
$all_fees = $fee->getAllFee();
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
												class="active text-bold"><i class="fa fa-user-circle-o"></i> Student</a>
												
										</li>
										<li class="nav-item"><a href="#student_image" data-bs-toggle="tab"><i class="fa fa-user-o"></i> Image</a>
										</li>
										<li class="nav-item"><a href="#gadiant" data-bs-toggle="tab"><i class="fa fa-user-o"></i> Gadiant</a>
										</li>
										<li class="nav-item"><a href="#school" data-bs-toggle="tab"><i class="fa fa-vcard-o"></i> School</a>
										</li>
										<li class="nav-item"><a href="#payment" data-bs-toggle="tab"><i class="fa fa-money"></i> Registration</a>
										</li>
									</ul>
								</header>
	<div class="panel-body">
		<form  action="../functions/register_student.php" enctype="multipart/form-data" method="POST">
			<div class="tab-content">
				<div class="tab-pane active" id="student">
					<div class="row ">
						<div class=" col-md-12 col-sm-12">	
						
									<div class="row" >
										<div class="col-lg-6 ">
											<div class="form-group">
												<label for="exampleInput"><strong>First Name</strong></label>
												<input type="text" name="fname" id="" class="form-control" required>
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
												<input type="text" name="lname"  class="form-control" required>
											</div>
										</div>

										<div class="col-lg-6 ">
											<div class="form-group">
												<label for="exampleInput"><strong>Place of Birth</strong></label>
												<input type="text" name="POB" id="" class="form-control" required>
											</div>
										</div>
										<div class="col-lg-6 ">
											<div class="form-group">
												<label for="exampleInput"><strong>Date of Birth</strong></label>
												<input type="date" name="DOB" id="date" class="form-control" required>
											</div>
										</div>

										<div class="col-lg-6 ">
											<div class="form-group">
												<label for="exampleInput"><strong>Gender</strong></label>
														<select id="inputState" name="sex" class="form-control" required>
															<option selected>Choose...</option>
															<option	value="M">MALE</option>
															<option	value="F">FEMALE</option>
														</select>
											</div>
										</div>

										<div class="col-lg-6 ">
											<div class="form-group">
												<label for="exampleInput"><strong>Contact</strong></label>
												<input type="tel" name="contact" id="" class="form-control" >
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
												<input type="text" name="nationality" id="" class="form-control" required>
											</div>
										</div>

										<div class="col-lg-6 ">
											<div class="form-group">
												<label for="exampleInput"><strong>Resident</strong></label>
												<input type="text" name="resident" id="" class="form-control" required>
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
				<div class="tab-pane" id="gadiant">
					<div class="row">
						<div class="col-md-12 col-sm-12">
									<div class="row" >
										<div class="col-lg-6 ">
											<div class="form-group">
												<label for="exampleInput"><strong>First Name</strong></label>
												<input type="text" name="pfname" id="" class="form-control">
											</div>
										
										</div>
										<div class="col-lg-6 ">
											<div class="form-group">
												<label for="exampleInput"><strong>Orther Name</strong></label>
												<input type="text" name="poname" id="" class="form-control">
											</div>
										
										</div>
										<div class="col-lg-6 ">
											<div class="form-group">
												<label for="exampleInput"><strong>last Name</strong></label>
												<input type="text" name="plname" id="" class="form-control">
											</div>
										</div>

										<div class="col-lg-6 ">
											<div class="form-group">
												<label for="exampleInput"><strong>Gender</strong></label>
														<select id="inputState" name="psex" class="form-control">
															<option selected>Choose...</option>
															<option	value="M">MALE</option>
															<option	value="F">FEMALE</option>
														</select>
											</div>
										</div>
										
										<div class="col-lg-6 ">
											<div class="form-group">
												<label for="exampleInput"><strong>Contact</strong></label>
												<input type="text" name="pcontact" id="" class="form-control">
											</div>
										
										</div>
										<div class="col-lg-6 ">
											<div class="form-group">
												<label for="exampleInput"><strong>Email</strong></label>
												<input type="text" name="pemail" id="" class="form-control">
											</div>
										
										</div>
										<div class="col-lg-6 ">
											<div class="form-group">
												<label for="exampleInput"><strong>Relation</strong></label>
														<select id="inputState" name="relation" class="form-control">
															<option	value="Father">Father</option>
															<option	value="Mother">Mother</option>
															<option	value="Gadiant">Gadiant</option>
														</select>
											</div>
										</div>
										<div class="col-lg-6 ">
											<div class="form-group">
												<label for="exampleInput"><strong>Resident</strong></label>
												<input type="text" name="president" id="" class="form-control">
											</div>
										</div>
									</div>
						</div>
					</div>
				</div>
				<div class="tab-pane" id="school">
					<div class="row">
						<div class="col-md-12 col-sm-12">
									<div class="row" >
									<div class="col-lg-6 ">
											<div class="form-group">
												<label for="exampleInput"><strong>Level / Class</strong></label>
												<select id="class_name"  name="class_name" class=" form-control" required>
															<option selected>Choose...</option>
															<?php
															// dumping all class
															foreach($all_classes as $row){
																echo '<option  value="'.$row['class_name'].'">'.$row['class_name'].'</option>';
															}
															?>
												</select>
											</div>
										</div>
										<div class="col-lg-6 ">
											<div class="form-group">
												<label for="exampleInput"><strong>Series</strong></label>
												<select id="serie" name="series" class="form-control" required>
															<option selected>Choose...</option>
															<?php
															// dumping all series
															foreach($all_series as $row){
																echo '<option  value="'.$row['id_series'].'">'.$row['series_name'].'</option>';
															}
															?>
														</select>
											</div>
										</div>
										<div class="col-lg-6 ">
											<div class="form-group">
												<label for="exampleInput"><strong>Sub Series</strong></label>
														<select id="subserie" name="subseris" class="form-control" required>
															<option selected>Choose...</option>
															<?php
															// dumping all sub series
															foreach($all_sub_series as $row){
																echo '<option  value="'.$row['id_sub_serie'].'">'.$row['sub_serie_name'].'</option>';
															}
															?>
														</select>
											</div>
										</div>
										<div class="col-lg-6 ">
											<div class="form-group">
												<label for="exampleInput"><strong>Fee</strong></label>
												<select id="campus" name="student_fee" class="form-control" required>
															<option selected>Choose...</option>
															<?php
															// dumping all series
															foreach($all_fees as $row){
																echo '<option  value="'.$row['id_fee'].'">'.$row['fee'].'</option>';
															}
															?>
																													</select>
											</div>
										</div>
										<div class="col-lg-6 ">
											<div class="form-group">
												<label for="exampleInput "><strong>Campus</strong></label>
												        <select id="campus" name="campus" class="form-control" required>
															<option selected>Choose...</option>
															<?php
															// dumping all campus
															foreach($all_campus as $row){
																echo '<option  value="'.$row['id_campus'].'">'.$row['campus_name'].'</option>';
															}
															?>
														</select>
											</div>
										</div>
										
										<div class="col-lg-6 ">
											<div class="form-group">
												<label for="exampleInput "><strong>Section</strong></label>
												<select id="section" name="section" class="form-control" required>
															<option selected>Choose...</option>
															<?php
															// dumping all section
															foreach($all_section as $row){
																echo '<option  value="'.$row['id_section'].'">'.$row['section_name'].'</option>';
															}
															?>
														</select>
											</div>
										</div>
									</div>
						</div>
					</div>
				</div>
				<div class="tab-pane" id="payment">
					<div class="row">
						<div class="col-md-12 col-sm-12">
									<div class="row" >
									
										<div class="col-lg-6 ">
											<div class="form-group">
												<label for="exampleInput"><strong>School Year</strong></label>
												<select id="school_year" name="school_year" class="form-control" required>
															<option selected>Choose...</option>
															<?php
															// dumping all school_year
															foreach($all_years as $row){
																echo '<option  value="'.$row['school_year'].'">'.$row['school_year'].'</option>';
															}
															?>
												</select>
											</div>
										</div>

										<div class="col-lg-6 ">
										<div class="form-group">
												<label for="exampleInput"><strong>Registrtion Fee</strong></label>
												<input type="text" name="registratio_fee" id="" class="form-control">
											</div>
										</div>

										<div class="col-lg-6 ">
											<div class="form-group">
												<label for="exampleInput"><strong>Payment Way</strong></label>
												<select id="method" name="method" class="form-control" required>
														<option selected>Choose...</option>
														<?php
															// dumping all payment method
															foreach($all_payment_method as $row){
																echo '<option  value="'.$row['id_payment_method'].'">'.$row['method'].'</option>';
															}
															?>
												</select>
											</div>
										</div>

										<div class="col-lg-6 ">
										<div class="form-group">
												<label for="exampleInput"><strong>Motif</strong></label>
												<select id="motif" name="motif" class="form-control" required>
														<option selected>Choose...</option>
														<?php
															// dumping all payment motif
															foreach($all_motif as $row){
																echo '<option  value="'.$row['id_motif'].'">'.$row['motif'].'</option>';
															}
															?>
												</select>
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
