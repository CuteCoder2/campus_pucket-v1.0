
<?php  

if(isset($_GET['tel'])){

	require_once dirname(__DIR__)."../classes/parent.php";
	require_once dirname(__DIR__)."../classes/student.php";

	// parent object 
	$parent = new parents();

    //student related to Parent 
    $student_parent = $parent->getParentById($_GET['tel']);

    // retriving all prent data
	$parent_info = $parent->getParentById($_GET['tel']);

	foreach($parent_info as $row){
	
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
												echo '<small class="text-decoration-underline">'.ucfirst($row['fname'])." ".ucfirst($row['lname']).'</small><br>';
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
											<div href="" class="nav-link btn-xs btn-info">Subjects</div>
											
										</div>
										
											<!-- Tab panes -->
											<div class="tab-content">
												<div class="tab-pane active fontawesome-demo" id="tab1">
													<div id="biography">
                                                        <table class="table table-hover table-borderless">
                                                            <?php

                                                                    foreach($student_parent as $row){
                                                                        echo '<tr><td>'.$row['par_fname'].' '.$row['par_lname'].'</td><td>'.$row['tel'].'</td></tr>';
                                                                    }

                                                            ?>
                                                        </table>													
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