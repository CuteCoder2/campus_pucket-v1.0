		
	<?php

	if(!isset($_SESSION['lname'])){
		header('location:../');
	}
	?>
		<!-- start sidebar menu -->
			<div class="sidebar-container">
				<div class="sidemenu-container navbar-collapse collapse fixed-menu">
					<div id="remove-scroll" class="left-sidemenu">
						<ul class="sidemenu  page-header-fixed slimscroll-style" data-keep-expanded="false"
							data-auto-scroll="true" data-slide-speed="200" style="padding-top: 20px">
							<li class="sidebar-toggler-wrapper hide">
								<div class="sidebar-toggler">
									<span></span>
								</div>
							</li>
							<li class="sidebar-user-panel">
								<div class="user-panel">
										<img src="../assets/staff/img/logo/campus pucket logo.png" t="User Image" />
									
								</div>
							</li>
							<li class="nav-item start ">
							<?php

							if($_SESSION['service'] == 'Deciplinary Service'){

								echo '<a href="home_dis.php" class="nav-link ">
								<i class="material-icons">home</i>
								<span class="title">HOME</span>
							</a>';
							}elseif($_SESSION['service'] == 'Commercial Service'){
								echo '<a href="home_com.php" class="nav-link ">
								<i class="material-icons">home</i>
								<span class="title">HOME</span>
								</a>';
							}elseif($_SESSION['service'] == 'Accademic Service'){

								echo '<a href="home_acad.php" class="nav-link ">
								<i class="material-icons">home</i>
								<span class="title">HOME</span>
							</a></li>';
							}

							
							if(
							$_SESSION['service'] == 'Deciplinary Service' OR
							$_SESSION['service'] == 'Commercial Service' OR
							$_SESSION['service'] == 'Accademic Service' 
							){
								echo '<li class="nav-item">
								<a href="#" class="nav-link nav-toggle"><i class="material-icons">group</i>
								<span class="title">Students</span><span class="arrow"></span></a>
							<ul class="sub-menu">';

								if( 
								$_SESSION['id_post'] == 'PRINCI' OR
								$_SESSION['id_post'] == 'VP' OR
								$_SESSION['id_post'] == 'DM' OR 
								$_SESSION['id_post'] == 'HR' OR 
								$_SESSION['id_post'] == 'AC1' OR 
								$_SESSION['id_post'] == 'AC2' OR
								$_SESSION['id_post'] == 'DOS'
								){
									echo '<li class="nav-item">
									<a href="all_students.php" class="nav-link "> <span class="title">All
											Students</span>
									</a>
								</li>';

								}

								if(  
									$_SESSION['id_post'] == 'HR' OR 
									$_SESSION['id_post'] == 'AC1' OR 
									$_SESSION['id_post'] == 'AC2' OR
									$_SESSION['id_post'] == 'DOS'
									){
										echo '<li class="nav-item">
										<a href="add_student.php" class="nav-link "> <span class="title">Add Student</span>
										</a>
										</li>';
									}

									
								if( 
									$_SESSION['id_post'] == 'HR' OR 
									$_SESSION['id_post'] == 'AC1' OR 
									$_SESSION['id_post'] == 'AC2' OR
									$_SESSION['id_post'] == 'DOS'
									){
										echo '<li class="nav-item">
										<a href="edit_student.php" class="nav-link "> <span class="title">Edit Student</span>
										</a>
									</li>';
									}

										echo '</ul>
											</li>';

							}

							
							if(
							$_SESSION['service'] == 'Commercial Service'  
							){

								echo '<li class="nav-item">
								<a href="#" class="nav-link nav-toggle"> <i class="material-icons">monetization_on</i>
									<span class="title">Payment/Expence</span> <span class="arrow"></span>
								</a>';
								if( 
									$_SESSION['id_post'] == 'HR' OR 
									$_SESSION['id_post'] == 'AC1' OR 
									$_SESSION['id_post'] == 'AC2'
									){
										echo '<ul class="sub-menu">
										<li class="nav-item">
											<a href="fees_collection.php" class="nav-link "> <span class="title">Transactions</span>
											</a>
										</li>';
									}

									if( 
										$_SESSION['id_post'] == 'HR' OR 
										$_SESSION['id_post'] == 'AC1' OR 
										$_SESSION['id_post'] == 'AC2'
										){
											echo '<li class="nav-item">
											<a href="add_fees.php" class="nav-link ">
											<span class="title">Fee Payment</span>
											</a>
										</li>';
										}

										if( 
											$_SESSION['id_post'] == 'HR' OR 
											$_SESSION['id_post'] == 'AC1' OR 
											$_SESSION['id_post'] == 'AC2'
											){
												echo '<li class="nav-item">
												<a href="invoice.php" class="nav-link "> <span class="title">Invoice</span>
												</a>
											</li>';
											}
										echo '</ul>
										</li>';

							}


							if(
							$_SESSION['service'] == 'Deciplinary Service' OR
							$_SESSION['service'] == 'Commercial Service' OR
							$_SESSION['service'] == 'Accademic Service' 
							){

								echo '<li class="nav-item">
								<a href="#" class="nav-link nav-toggle"> <i class="material-icons">people</i>
									<span class="title">Attendance</span> <span class="arrow"></span>
								</a>';

								if( 
									$_SESSION['id_post'] == 'PRINCI' OR
									$_SESSION['id_post'] == 'VP' OR
									$_SESSION['id_post'] == 'DM' OR 
									$_SESSION['id_post'] == 'HR' OR 
									$_SESSION['id_post'] == 'AC1' OR 
									$_SESSION['id_post'] == 'AC2' OR
									$_SESSION['id_post'] == 'DOS'
									){
	
										echo '<ul class="sub-menu">
										<li class="nav-item">
											<a href="teacher_attendance.php" class="nav-link "> <span class="title">Teacher</span>
											</a>
										</li>';
									}

									if( 
										$_SESSION['id_post'] == 'PRINCI' OR
										$_SESSION['id_post'] == 'VP' OR
										$_SESSION['id_post'] == 'DM' OR
										$_SESSION['id_post'] == 'DOS'
										){
											
											echo '<li class="nav-item">
												<a href="student_attendance.php" class="nav-link "> <span class="title">Student</span></a>
												</li>
											</ul>
										</li>';
										}
							}
							if(
								$_SESSION['service'] == 'Deciplinary Service' OR
								$_SESSION['service'] == 'Commercial Service' OR
								$_SESSION['service'] == 'Accademic Service' 
								){
									echo '<li class="nav-item">
									<a href="#" class="nav-link nav-toggle"> <i class="material-icons">person</i>
										<span class="title">Teachers</span> <span class="arrow"></span>
									</a>
									<ul class="sub-menu">';
									if( 
										$_SESSION['id_post'] == 'PRINCI' OR
										$_SESSION['id_post'] == 'VP' OR
										$_SESSION['id_post'] == 'DM' OR 
										$_SESSION['id_post'] == 'HR' OR 
										$_SESSION['id_post'] == 'AC1' OR 
										$_SESSION['id_post'] == 'AC2' OR
										$_SESSION['id_post'] == 'DOS'
										){
		
											echo '<li class="nav-item">
												<a href="all_professors.php" class="nav-link ">
												 <span class="title">All Teachers </span>
												</a>
											</li>';
										}
	
										if( 
											$_SESSION['id_post'] == 'PRINCI' OR
											$_SESSION['id_post'] == 'HR' OR
											$_SESSION['id_post'] == 'DOS'
											){
												echo '<li class="nav-item">
												<a href="add_professors.php" class="nav-link "> <span class="title">New Teacher</span>
												</a>
											</li>';
											}
	
											if( 
												$_SESSION['id_post'] == 'PRINCI' OR 
												$_SESSION['id_post'] == 'HR' OR
												$_SESSION['id_post'] == 'DOS'
												){
													echo '<li class="nav-item">
													<a href="edit_professor.php" class="nav-link "> <span class="title">Edit Teacher</span>
													</a>
												</li>';
												}
	
													echo '</ul>
													</li>';
								}


							if(
							$_SESSION['service'] == 'Deciplinary Service' OR
							$_SESSION['service'] == 'Commercial Service' OR
							$_SESSION['service'] == 'Accademic Service'  
							){

								echo '<li class="nav-item">
								<a href="notice_board.php" class="nav-link nav-toggle"> <i class="material-icons">event</i>
									<span class="title">Notice Board</span>
								</a>
							</li>';

							}



							if(
							$_SESSION['service'] == 'Deciplinary Service' OR
							$_SESSION['service'] == 'Commercial Service' OR
							$_SESSION['service'] == 'Accademic Service' 
							){
								echo '<li class="nav-item">
								<a href="#" class="nav-link nav-toggle"> <i class="material-icons">face</i>
									<span class="title">Staff</span> <span class="arrow"></span>
								</a>							<ul class="sub-menu">';
								if( 
								$_SESSION['id_post'] == 'PRINCI' OR
								$_SESSION['id_post'] == 'VP' OR
								$_SESSION['id_post'] == 'DM' OR 
								$_SESSION['id_post'] == 'HR' OR 
								$_SESSION['id_post'] == 'AC1' OR 
								$_SESSION['id_post'] == 'AC2' OR
								$_SESSION['id_post'] == 'DOS'
								){

									echo '<li class="nav-item">
									<a href="all_staffs.php" class="nav-link "> <span class="title">All
											Staff</span>
									</a>
								</li>';

								}

								if( 
									$_SESSION['id_post'] == 'PRINCI' OR 
									$_SESSION['id_post'] == 'HR' OR
									$_SESSION['id_post'] == 'DOS'
									){

										echo '<li class="nav-item">
										<a href="add_staff.php" class="nav-link "> <span class="title">Add Staff</span>
										</a>
									</li>';
									}

									if( 
										$_SESSION['id_post'] == 'PRINCI' OR 
										$_SESSION['id_post'] == 'HR' OR
										$_SESSION['id_post'] == 'DOS'
										){

											echo '<li class="nav-item">
											<a href="edit_staff.php" class="nav-link "> <span class="title">Edit Staff</span>
											</a>
										</li>';
										}
											echo '</ul>
											</li>';
							}


							if(
							$_SESSION['service'] == 'Deciplinary Service' OR
							$_SESSION['service'] == 'Commercial Service' OR
							$_SESSION['service'] == 'Accademic Service' 
							){
								echo '<li class="nav-item">
								<a href="#" class="nav-link nav-toggle"> <i class="material-icons">school</i>
									<span class="title">Courses</span> <span class="arrow"></span>
								</a>								<ul class="sub-menu">';
								if( 
								$_SESSION['id_post'] == 'PRINCI' OR
								$_SESSION['id_post'] == 'VP' OR
								$_SESSION['id_post'] == 'DM' OR 
								$_SESSION['id_post'] == 'HR' OR 
								$_SESSION['id_post'] == 'AC1' OR 
								$_SESSION['id_post'] == 'AC2' OR
								$_SESSION['id_post'] == 'DOS'
								){

									echo '<li class="nav-item">
									<a href="all_courses.php" class="nav-link "> <span class="title">All
											Courses</span>
									</a>
								</li>';

								}
								if( 
									$_SESSION['id_post'] == 'PRINCI' OR
									$_SESSION['id_post'] == 'VP' OR
									$_SESSION['id_post'] == 'DOS'
									){
										echo '									<li class="nav-item">
										<a href="add_course.php" class="nav-link "> <span class="title">Add
										Courses</span>
										</a>
									</li>';
									}

									if( 
										$_SESSION['id_post'] == 'PRINCI' OR
										$_SESSION['id_post'] == 'VP' OR
										$_SESSION['id_post'] == 'DOS'
										){
											echo '<li class="nav-item">
											<a href="edit_course.php" class="nav-link "> <span class="title">Edit
											Course</span>
											</a>
										</li>';
										}

											echo '
											</ul>
										</li>';
							}
							
							if(
							$_SESSION['service'] == 'Deciplinary Service' OR
							$_SESSION['service'] == 'Commercial Service' OR
							$_SESSION['service'] == 'Accademic Service' 
							){
								echo '							<li class="nav-item">
								<a href="#" class="nav-link nav-toggle"> <i class="material-icons">book</i>
									<span class="title">Library</span> <span class="arrow"></span>
								</a>
								<ul class="sub-menu">';
								if( 
								$_SESSION['id_post'] == 'PRINCI' OR
								$_SESSION['id_post'] == 'VP' OR
								$_SESSION['id_post'] == 'DM' OR 
								$_SESSION['id_post'] == 'HR' OR 
								$_SESSION['id_post'] == 'AC1' OR 
								$_SESSION['id_post'] == 'AC2' OR
								$_SESSION['id_post'] == 'DOS'
								){
									echo '									<li class="nav-item">
									<a href="all_assets.php" class="nav-link "> <span class="title">All Library
											Assets</span>
									</a>
								</li>';

								}

								if( 

									$_SESSION['id_post'] == 'DOS'
									){
										echo '									<li class="nav-item">
										<a href="add_library.php" class="nav-link "> <span class="title">Add Library
												Asset</span>
										</a>
									</li>
									<li class="nav-item">
									<a href="edit_library.php" class="nav-link "> <span class="title">Edit
											Asset</span>
									</a>
								</li>';
									}

									echo '</ul>
									</li>';
							}


							if(
							$_SESSION['service'] == 'Deciplinary Service' OR
							$_SESSION['service'] == 'Commercial Service' OR
							$_SESSION['service'] == 'Accademic Service' 
							){
								echo '<li class="nav-item">
								<a href="#" class="nav-link nav-toggle"> <i class="material-icons">person</i>
									<span class="title">Parents</span> <span class="arrow"></span>
								</a>
								<ul class="sub-menu">';
								if( 
								$_SESSION['id_post'] == 'PRINCI' OR
								$_SESSION['id_post'] == 'VP' OR
								$_SESSION['id_post'] == 'DM' OR 
								$_SESSION['id_post'] == 'HR' OR 
								$_SESSION['id_post'] == 'AC1' OR 
								$_SESSION['id_post'] == 'AC2' OR
								$_SESSION['id_post'] == 'DOS'
								){
									echo '<li class="nav-item">
									<a href="all_parents.php" class="nav-link "> <span class="title">All Parents</span>
									</a>
								</li>
								<li class="nav-item">
								<a href="add_parent.php" class="nav-link "> <span class="title">Add Parents</span>
								</a>
							</li>
							<li class="nav-item">
								<a href="edit_library.php" class="nav-link "> <span class="title">Edit Parents</span>
								</a>
							</li>
						</ul>
					</li>';
								}


							}

							if(
							$_SESSION['service'] == 'Deciplinary Service' OR
							$_SESSION['service'] == 'Commercial Service' OR
							$_SESSION['service'] == 'Accademic Service' 
							){
								echo '	<li class="nav-item">
								<a href="#" class="nav-link nav-toggle"> <i class="material-icons">local_library</i>
									<span class="title">Exams</span> <span class="arrow"></span>
								</a>
								<ul class="sub-menu">';
								if( 
								$_SESSION['id_post'] == 'PRINCI' OR
								$_SESSION['id_post'] == 'VP' OR
								$_SESSION['id_post'] == 'DM' OR 
								$_SESSION['id_post'] == 'HR' OR 
								$_SESSION['id_post'] == 'AC1' OR 
								$_SESSION['id_post'] == 'AC2' OR
								$_SESSION['id_post'] == 'DOS'
								){
									echo '<li class="nav-item">
									<a href="all_assets.php" class="nav-link "> <span class="title">All Exams</span>
									</a>
								</li>';

								}
								if( 
									$_SESSION['id_post'] == 'PRINCI' OR
									$_SESSION['id_post'] == 'VP' OR
									$_SESSION['id_post'] == 'DOS'
									){
										echo '									<li class="nav-item">
										<a href="add_library.php" class="nav-link "> <span class="title">Add Exams</span>
										</a>
									</li>
									<li class="nav-item">
									<a href="edit_library.php" class="nav-link "> <span class="title">Edit Exams</span>
									</a>
								</li>
							</ul>';
									}

							}
							?>
							</li>
						</ul>
					</div>
				</div>
			</div>
			<!-- end sidebar menu -->

