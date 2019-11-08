<?php 
	include("../include/header-faculty.php");
	include("../include/sidebar-faculty.php");
	include("function/app.php");

	$data = new app();
	$id = $_SESSION['Faculty_ID'];
	$result = $data->getCurrentData($conn, $id);
	$eval_range = $data->getRange($conn);
?>

<main class="app-content">
	<div class="clearix">
		<?php 
			$arrOfRange = array();
			while($range = $eval_range -> fetch_object()){
				$obj = $range;
				array_push($arrOfRange, $obj);
			}
		?>
		<div class="row">
			<div class="col-md-12">
				<div class="tile">
				<div class="row">
					<div class="col-md-12">
						<div class="tile">
							<div >
								<h4>Reports</h4>
							</div>
							<hr>
							<div class="tile-body">
								<form method="POST">
									<input type="hidden"  id="activate" name="activate_stats">
									<div class="table-responsive">
										<table class="table table-hover table-bordered" id="table1">
											<thead>
												<tr>
													<th>Subject Code</th>
													<th>Subject Name</th>
													<th>Term</th>
													<th>S.Y</th>
													<th>No. Of Students</th>
													<th>Total Rating</th>
													<th></th>
												</tr>
											</thead>
											<tbody>
											<?php 
												date_default_timezone_set('Asia/Manila');
												$dToday = date("Y-m-d");
												$dToday=date('Y-m-d', strtotime($dToday));
											?>
											<?php while($res = mysqli_fetch_array($result)): ?>
											<?php
												$dataTo = $res['Evaluation_ScheduleTo'];
												$dataFrom = $res['Evaluation_ScheduleFrom'];

												$process = $res['Process'];
												$dateBegin = date('Y-m-d', strtotime($dataFrom));
												$dateEnd = date('Y-m-d', strtotime($dataTo));
											?>
												<?php if(($dToday >= $dateBegin) && ($dToday < $dateEnd) && ($process == 2)) : ?>
												<tr>
													<td><?php echo $res['Subject_Code']?></td>
													<td><?php echo $res['Subject_Description']?></td>
													<td><?php echo $res['Term_Name']?></td>
													<td><?php echo $res['SY_Name']?></td>
														<?php
															$result2 = $data->getAllStudentsEvaluation($conn,$res['Subject_Offer_ID']);
															$res2 = mysqli_fetch_array($result2);
															$count = mysqli_num_rows($result2);
															if($count > 0){
																echo "<td style='text-align: center'>".$count."</td>";
															}
															else{echo "<td>Nobody Evaluated Yet</td>";}	
														?>
													<td style="text-align: center;">
														<?php
															$result3 = $data->getAllStudentsEvaluation($conn,$res['Subject_Offer_ID']);
															$arr = array();
															while($res3 = mysqli_fetch_array($result3)){
																$ave = $res3['average_rate'];
																array_push($arr,$ave);
															}
															
															if(empty($arr)){
																echo "No Ratings Yet";
															}else{
																$average  = array_sum($arr) / count($arr);
																$averageRounded = number_format($average, 2, '.', '');
																echo $averageRounded;
															}
														?>
													</td>
													<td><a class="btn btn-primary" href="viewReport.php?Subject_Offer_ID=<?php echo $res['Subject_Offer_ID'];?>" type="button" name="view">View</a></td>
												</tr>
											<?php endif; ?>
											<?php endwhile ?>
											<?php
												// $totalRes = array();
												// $result4 = $data->getAllTeacherData($conn, $id);
												// while($res4 = mysqli_fetch_array($result4)){
												// 	$aves = $res4['average_rate'];
												// 	array_push($totalRes,$aves);
												// }
												// if($totalRes){
												// 	$totalArray = array_sum($totalRes) / count($totalRes);
												// 	$totalOverall = number_format($totalArray, 2, '.', '');
												// 	echo "<h4>".$totalOverall."</h4>";

												// 	foreach ($arrOfRange as $key) {
												// 		if($totalOverall <= $key->range_from && $totalOverall >= $key->range_to){
												// 			echo "<h5>".$key->description."</h5>";
												// 		}
												// 	}
												// }
												// else{ echo "<h5>No Evaluation Yet</h5>"; }
											?>
											</tbody>
										</table>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</main>
<?php include("../include/footer-faculty.php") ?>