
<!-- start page content -->
			<div class="page-content-wrapper">
				<div class="page-content">
					<div class="page-bar">
						<div class="page-title-breadcrumb">
							<div class=" pull-left">
								<div >
									<form action="" method="get" id="s_stud">
									<div class="input-group input-group-sm">
									<input type="text" name="search_bar" class="form-control">
												<span class="input-group-btn">
														<button type="submit" class="btn btn-info btn-flat"><i class="fa fa-search"></i></button>
													</span>
												</div>
									</form>
								</div>
							</div>
							<ol class="breadcrumb page-breadcrumb pull-right">
							<div class="text-right">
											<div class="btn btn-danger" type="submit">Proceed to printing <i class="fa  fa-arrow-right h-5"></i></div>
											<button onclick="javascript:window.print();"
												class="btn btn-default btn-outline" type="button"> <span><i
														class="fa fa-print"></i> Print</span> </button>
										</div>
															</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<div class="white-box">
								<div class="row">
									<div class="col-md-12">
										<div class="pull-left text-left">
												<img src="../assets/staff/img/logo/campus pucket logo.png" alt="logo"
													class="logo-default" height= "100" width="auto" class="img-circle" />
												<p class="h4  my-3 m-l-5">
													<?php
														echo $_SESSION['school_name'].', <br> '.$_SESSION['tel'].', <br>
														'.$_SESSION['location'];
													?>
												</p>
										</div>
										<div class="pull-right text-right">
												<img src="" id="img" alt="" height= "150" >
												
												<p class="font-bold addr-font-h4" id="stud_name"></p>
												<p class="m-t-30">
													<strong> Matriculation : </strong> <span id="matriculation"> </span> <br>
													<strong> Established Date : </strong> <i class="fa fa-calendar"></i> 
													<?php
													echo date("d M Y");
													?>
													<br>
													<strong>Course :</strong> <span id="course"></span>
													<br>
													<strong>Level :</strong> <span id="level"></span>
												</p>
										</div>
									</div>
									<div class="col-md-12">
										<div class="table-responsive m-t-40">
											<table class="table table-hover" >
												<thead>
													<tr>
														<th class="text-center">#</th>
														<th class="text-center">Payement Motif</th>
														<th class="text-center">Payement Method</th>
														<th class="text-center">Date /Time</th>
														<th class="text-center">Invoice number</th>
														<th class="text-center">Amount ( <strong>XAF</strong> )</th>
													</tr>
												</thead>
												<tbody id="tbody">
													
												</tbody>
											</table>
										</div>
									</div>
									<div class="col-md-12">
									<div class="pull-left text-right">
											<?php
											
											echo '
											<p class="h4 m-l-30">
												'. ucfirst($_SESSION['fname']).' '. ucfirst($_SESSION['lname']).', <br>
												'.ucfirst($_SESSION['campus_name']).', 
												<br> '.$_SESSION['tel'].'
											<p>
												<b>Signature</b>
											</p> ';
											?>
						</div>
						<div class="pull-right m-t-30 text-right">
											<hr>
											<h3><b>Total : </b><span id="total" ></span> XAF</h3>
											<h3><b>Left : </b><span id="left" ></span> XAF</h3>
										</div>
							
										
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- end page content -->

			<script src="../assets/staff/js/invoice.js"></script>