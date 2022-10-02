
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
												class="active text-bold"><i class="fa fa-user-circle-o"></i> Parent Info</a>
												
										</li>
										<li class="nav-item"><a href="#school" data-bs-toggle="tab"><i class="fa fa-vcard-o"></i>Student</a>
										</li>
									</ul>
								</header>
	<div class="panel-body">
		<form action="../functions/register_parent.php" method="POST" enctype="multipart/form-data">
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
												<input type="text" name="oname"  class="form-control"  >
											</div>
										</div>

										<div class="col-lg-6 ">
											<div class="form-group">
												<label for="exampleInput"><strong>last Name</strong></label>
												<input type="text" name="lname"  class="form-control"  required>
											</div>
										</div>
										<div class="col-lg-6 ">
											<div class="form-group">
												<label for="exampleInput"><strong>Relation</strong></label>
														<select id="inputState" name="relation" class="form-control"  required>
															<option selected>Choose...</option>
															<option	value="father">father</option>
															<option	value="mother">mother</option>
															<option	value="gadient">gadient</option>
														</select>
											</div>
										</div>

										<div class="col-lg-6 ">
											<div class="form-group">
												<label for="exampleInput"><strong>Contact</strong></label>
												<input type="tel" name="contact" id="" class="form-control"  required>
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
												<label for="exampleInput"><strong>Resident</strong></label>
												<input type="text" name="resident" id="" class="form-control"  required>
											</div>
										</div>
										<div class="col-lg-6 ">
											<div class="form-group">
												<label for="exampleInput"><strong>Gender</strong></label>
												<select id="inputState" name="sex" class="form-control"  required>
															<option selected value = " " >Choose...</option>
															<option  value = "M" >Male</option>
															<option  value = "F" >Female</option>
														</select>
											</div>
										</div>

									</div>	
						</div>
					</div>
				</div>
				<div class="tab-pane" id="school"><div class="row">
						<div class="col-md-12 col-sm-12">
									<div class="row" >
										<div class="col-lg-7">
											<div class="form-group">
												<label for="exampleInput"><strong>Subject Matriculation</strong></label>
												<input type="text" name="student_matriculation" class="form-control"  required>
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
