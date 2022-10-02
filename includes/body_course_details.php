<?php
	if(isset($_GET['id_sub_serie'])){

		require_once dirname(__DIR__)."../classes/sub_serie.php";
		// sub serie object 
		$sub_serie = new subSeries();

		$get_sub_serie = $sub_serie->getSubSerieById($_GET['id_sub_serie']);

		foreach($get_sub_serie as $row){

		}

	}
?>
		
		<!-- start page content -->
			<div class="page-content-wrapper">
				<div class="page-content">
					<div class="page-bar">
						<div class="page-title-breadcrumb">
					</div>
					<div class="row">
						<div class="col-md-12">
							<!-- BEGIN PROFILE SIDEBAR -->
							<div class="profile-sidebar">
								<div class="card">
									<div class="card-body no-padding height-9">
										<div class="row">
											<div class="course-picture">
												<?php echo '<img src="'.$row['sub_serie_img'].'" class="img-responsive"
													alt="">';
												?> </div>
										</div>
										<div class="profile-usertitle">
											<div class="profile-usertitle-name text-primary">
												<?php
												 echo strtoupper($row['sub_serie_name']);
												?>
											</div>
										</div>
										<!-- END SIDEBAR USER TITLE -->
									</div>
								</div>
								<div class="card">
									<div class="card-head text-primary">
										<header>Over View</header>
									</div>
									<div class="card-body no-padding height-9">
										<ul class="list-group list-group-unbordered">
											<li class="list-group-item">
												<strong>Duration </strong>
												<div class="profile-desc-item pull-right">
												<?php 
													echo $row['duration'];
												?>
												</div>
											</li>
											<li class="list-group-item">
												<strong>Certificate</strong>
												<div class="profile-desc-item pull-right">
													<?php
													 echo $row['certificate_name'] 
													?>
												</div>
											</li>
										</ul>
									</div>
								</div>
							</div>
							<!-- END BEGIN PROFILE SIDEBAR -->
							<!-- BEGIN PROFILE CONTENT -->
							<div class="profile-content">
								<div class="row">
									<div class="card">
										<div class="card-topline-aqua">
											<header></header>
										</div>
										<div class="white-box">
											<!-- Nav tabs -->
											<!-- Tab panes -->
											<div class="tab-content">
												<div class="tab-pane active fontawesome-demo">
													<div id="biography">
													<div class="card-head">
														<header class="text-primary">About Course</header>
													</div>
														<?php 
															echo $row['about_serie']
														?>
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