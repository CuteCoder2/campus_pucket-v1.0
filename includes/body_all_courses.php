<?php		

	require_once dirname(__DIR__)."../classes/sub_serie.php";
	
	// sub serie object 
	$sub_serie = new subSeries();
	$all_sub_serie = $sub_serie->getSubSerie();
?>
		<!-- start page content -->
			<div class="page-content-wrapper">
				<div class="page-content">
					<div class="page-bar">
						<div class="page-title-breadcrumb">
							<div class=" pull-left">
								<div class="page-title">All Courses List</div>
							</div>
							<ol class="breadcrumb page-breadcrumb pull-right">
								<li><i class="fa fa-home"></i>&nbsp;<a class="parent-item"
										href="index.html">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
								</li>
								<li><a class="parent-item" href="#">Courses</a>&nbsp;<i class="fa fa-angle-right"></i>
								</li>
								<li class="active">All Courses List</li>
							</ol>
						</div>
					</div>
					<div class="row">
						<div class="card-box">
							<div class="card-head">
								<header>All Courses</header>
							</div>
							<div class="card-body ">
								<!-- start course list -->
								<div class="row">

								<?php
										foreach ($all_sub_serie as $row){
								echo '
								<div class="col-lg-3 col-md-6 col-12 col-sm-6">
									<div class="blogThumb">
										<div class="thumb-center"><img height= "150" width="230" 
												src="'.$row['sub_serie_img'].'"></div>
										<div class="course-box">
											<h4>'.$row['sub_serie_name'].'</h4>
											<p><span><i class="ti-alarm-clock"></i> Duration: '.$row['duration'].'</span></p>
											<a href="course_details.php?id_sub_serie='.$row['id_sub_serie'].'"
												class="btn btn-info">Read
												More</a>
										</div>
									</div>
								</div>';
										}

										?>
								</div>
								<!-- End course list -->
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- end page content -->