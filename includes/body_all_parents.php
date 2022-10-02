<?php
require_once dirname(__DIR__ )."../classes/parent.php";
// techer object
$parents = new parents();
$all_parents = $parents->getAllActiveParent();

?>
		
		<!-- start page content -->
			<div class="page-content-wrapper">
				<div class="page-content">
					<div class="page-bar">
						<div class="page-title-breadcrumb">
							
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<div class="tabbable-line">
								<div class="tab-content">
									<div class="tab-pane active fontawesome-demo" id="tab1">
										<div class="row">
											<div class="col-md-12">
												<div class="card card-box">
													<div class="card-head">
														<header>All Professors</header>
													</div>
													<div class="card-body ">
														<div class="row">
															<div class="col-md-6 col-sm-6 col-6">
																<div class="btn-group">
																	<a href="add_professors.php" id="addRow"
																		class="btn btn-info">
																		Add New <i class="fa fa-plus"></i>
																	</a>
																</div>
															</div>
														</div>
														<div class="table-scrollable">
															<table class="table table-hover">
																<thead>
																	<tr>
																		<th></th>
																		<th> Matriculation </th>
																		<th>First Name </th>
																		<th> Last Name </th>
																		<th> Gender </th>
																		<th> Mobile </th>
																		<th> Email </th>
																		<th>Joining Date</th>
																		<th> Action </th>
																	</tr>
																</thead>
																<tbody>
																	<?php 
																	foreach($all_parents as $row){
																		echo '<tr class="odd gradeX text-center">
																		<td class="patient-img">
																			<img src="'.$row['picture'].'" >
																		</td>
																		<td class="left">'.$row['matriculation'].'</td>
																		<td>'.$row['par_fname'].'</td>
																		<td class="left">'.$row['par_lname'].'</td>
																		<td class="left">'.$row['sex'].'</td>
																		<td>'.$row['tel'].'</td>
																		<td>'.$row['email'].'</td>
																		<td class="left">'.substr($row['register_date'],0,10).'</td>
																		<td>
																			<a href="parent_profile.php?tel='.$row['tel'].'"
																				class="btn btn-primary btn-xs">
																				<i class="fa fa-info"></i>
																			</a>
																			<button title="modify" class="btn btn-success btn-xs">
																			<i class="fa fa-edit"></i>
																			</button>
			
																			<button title="delete" class="btn btn-danger btn-xs">
																				<i class="fa fa-trash-o "></i>
																			</button>
																		</td>
																	</tr>';
																	}
																	?>
																	
																	
																</tbody>
															</table>
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
