	<?php
	
	require_once dirname(__DIR__ )."../classes/class.php";
	require_once dirname(__DIR__ )."../classes/sub_serie.php";
	require_once dirname(__DIR__ )."../classes/student.php";
	require_once dirname(__DIR__ )."../classes/payment_method.php";
	require_once dirname(__DIR__ )."../classes/motif.php";
	
	// class object
	$class = new Classes();
	// sub series object
	$sub_serie = new subSeries();
	// student object
	$student = new student();
	// payment payment_method
	$method = new paymentmethod();
	// motif
	$motif = new paymentMotif();

	
	// getting all classes
	$all_classes = $class->getAllClasses();
	// getting all sub_serie
	$all_subseries = $sub_serie->getSubSerie();
	// get all student
	$all_student = $student->getAllActiveStudent();
	//get all pyment methods
	$all_method = $method->getPaymentMethod();
	// get all payment Motif
	$all_motif = $motif->getPaymentMotif();
	?>

	<link rel="stylesheet" href="../assets/staff/plusStyle.css">



<!-- The Modal -->
<div id="myModal" class=" card">

  <!-- Modal content -->
  <div class="modal-content card-body">
  <div class="col-12">
	<div class="row">
		<div class="col-4 user-img  pt-1">
			<img id="img" src="" class="img-responsive img-circle rounded-circle"  />
		</div>
		<div class="col-8">
			<h3 id="name" class="text-success mb-0"></h3>
			<div class="user-detail">
				<p class="h3" ><span id="matriculation"></span><br><span id="level"></span></p>
			</div>
		</div>
	</div>
</div>
<form action="../functions/payment.php" method="POST">
<div class="row " >
	<div class="col-lg-6 ">
		<div class="form-group">
			<label for="exampleInput"><strong>Remainning Fee</strong></label>
			<input type="text" name="oname" id="fee"  class="form-control" readonly>
		</div>
	</div>
	<div class="col-lg-6 ">
		<div class="form-group">
			<label for="exampleInput"><strong>Amount Deposit</strong></label>
			<input type="text" name="class_name" id="class_name" class="form-control" required hidden>
			<input type="text" name="stud_matri" id="stud_matri" class="form-control" required hidden>
			<input type="text" name="stud_fee" id="stud_fee" class="form-control" required hidden>
			<input type="number" name="amount" id="" class="form-control" required>
			</div>
	</div>
	<div class="col-lg-6 ">
		<div class="form-group">
			<label for="exampleInput"><strong>Motif</strong></label>
			<select id="motif" name="motif" class="form-control" >
				<option value = "" selected>ANY</option>
			<?php
							foreach ($all_motif as $row){
								echo '<option value="'.$row['id_motif'].'">'.$row['motif'].'</option>';
								}
			?>
						
				</select>						
		</div>
	</div>
	<div class="col-lg-6 ">
		<div class="form-group">
			<label for="exampleInput"><strong>Deposite Type</strong></label>
				<select id="motif" name="method" class="form-control" >
					<option value = "" selected>ANY</option>
						<?php
							foreach ($all_method as $row){
								echo '<option value="'.$row['id_payment_method'].'">'.$row['method'].'</option>';
								}
						?>
				</select>						
			</div>
	</div>
	<div class="col-8"></div>
	<div class="col-4">
			<input type="reset" value="Cancel" name="fname" id="cancel" class="btn btn-danger" >
			<input type="submit" value="Submit" class="btn btn-info" >	
	</div>
</div>
</form>
  </div>

</div>  

<!-- start page content -->
			<div class="page-content-wrapper">
				<div class="page-content">
					<div class="page-bar">
					</div>
					<div class="row">
					<div class="col-lg-6 col-md-12 col-sm-12 col-12">
							<div class="card card-box">
								<div class="card-head">
									<header>Student Info</header>
								</div>
								<div class="card-body ">
									<div class="row">
										<form id="fee_form">
										<div class="form-group">
											<label for=""><strong>Student Matriculation</strong></label>
											<input type="text" name="matriculation" class="form-control">
										</div>
										<div class="form-group">
											<label for=""><strong>First Name</strong></label>
											<input type="text" class="form-control" name="fname">
										</div>
										<div class="form-group">
											<label for=""><strong>Last Name</strong></label>
											<input type="text" class="form-control" name="lname">
										</div>
										<div class="form-group">
												<label for="exampleInput"><strong>SERIES</strong></label>
												<select id="motif" name="sub_serie" class="form-control" >
														<option value = "" selected>ANY</option>
														<?php
															foreach ($all_subseries as $row){
																echo '<option value="'.$row['id_sub_serie'].'">'.$row['sub_serie_name'].'</option>';
															}
														?>
												</select>
										</div>
										<div class="form-group">
												<label for="exampleInput"><strong>LEVEL</strong></label>
												<select id="motif" name="class_name" class="form-control" >
														<option value = "" selected>ANY</option>
														<?php
															foreach ($all_classes as $row){
																echo '<option value="'.$row['class_name'].'">'.$row['class_name'].'</option>';
															}
														?>
												</select>
										</div>
										</form>
									</div>
								</div>
							</div>
						</div>

						<div class="col-lg-6 col-md-12 col-sm-12 col-12 ">
							<div class="card  card-box ">
								<div class="card-head">
									<header>Resulte</header>
								</div>
								<div class="card-body no-padding ">
									<div class="row ">
										<div class="noti-information notification-menu ">
											<div class="notification-list mail-list not-list small-slimscroll-style" style="overflow: hidden; width: auto;" id="list">
											
											<ul  class="list-group" id="list">
											<?php
											
															foreach($all_student as $row){

																	echo '
																	<li class="list-group-item  border-0">
																	<div class="col-12">
																	<div class="row">
																	<div class="col-4 user-img  pt-1">
																	<img src="'.$row['picture'].'"
																	 class=" img-circle rounded-circle" height = 150  width = 150 />
																	</div>
																	<div class="col-8">
																	<h4 class=" mb-0">'.strtoupper($row['fname'])." ".strtoupper($row['lname']).'</h4>
																	<div class="user-detail">
																	<p class="">'.$row['matriculation'].'</p>
																	<p class="text-success"><i class="fa fa-money mr-1" ></i> '.$row['fee'].' XAF</p>
																	<button class = "btn purple mt-4 btn-outline" onclick= "setModal(\''.$row['matriculation'].'\')" >proceed to payment</button>
																	</div>
																	</div>
																	</div>
																	</div>
																	<hr style=" height:2px">
																	</li>
																	';
														}
														?>
														</ul>
											</div>
											<div class="slimScrollRail" style="width: 5px; height: 100%; position: absolute; top: 0px; display: none; border-radius: 7px; background: rgb(51, 51, 51) none repeat scroll 0% 0%; opacity: 0.2; z-index: 90; right: 1px;"></div>
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

			<script src="../assets/staff/js/fee.js"></script>