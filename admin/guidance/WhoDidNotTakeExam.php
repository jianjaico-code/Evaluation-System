<?php
	include("../include/header-guidance.php");
	include("../include/sidebar-guidance.php");
	include("../function/function_Guidance.php");
	
	$data = new funcGuidance();
	$result2 = $data->getAllData($conn);

	$dToday = date("Y-m-d");
	$dToday=date('Y-m-d', strtotime($dToday));
?>
<main class="app-content">
	<div class="clearix">
		<div class="row">
		<?php 
			if(isset($_POST['subTaken'])){
				$data->reactivateEvaluation($conn, $_POST);
				echo "<script>location.replace('WhoDidNotTakeExam.php')</script>";
			}
		?>
			<div class="col-md-12">
				<div class="tile">
					<div >
						<h4>List of Students</h4>
					</div>
					<hr>
					<div class="tile-body">
						<form method="POST">
							<input type="hidden"  id="activate" name="activate_stats">
							<div class="table-responsive">
								<table class="table table-hover table-bordered" id="tb1">
									<thead>
										<tr>
											<th>ID</th>
											<th>Last Name</th>
											<th>First Name</th>
											<th>Middle Name</th>
											<th>Subject Code</th>
											<th class="text-center">Evaluation Expiry</th>
										</tr>
									</thead>
									
									<tbody>
									<?php  while ($res = $result2 -> fetch_object()): ?>
										<tr>
											<td><?php echo $res->Student_ID; ?></td>
											<td><?php echo $res->Lastname; ?></td>
											<td><?php echo $res->Firstname; ?></td>
											<td><?php echo $res->Middlename; ?></td>
											<td><?php echo $res->Subject_Code; ?></td>
											<td class="text-center">
												<?php
													$dataTo = $res -> Evaluation_ScheduleTo;
													$dataFrom = $res -> Evaluation_ScheduleFrom;
						
													$dateBegin = date('Y-m-d', strtotime($dataFrom));
													$dateEnd = date('Y-m-d', strtotime($dataTo));

													$reEval = $res->reSubTaken;
													if(($dToday >= $dateBegin) && ($dToday < $dateEnd)):?>
														<h5>Evaluation is not yet Expired</h5>
													<?php elseif($reEval): ?>
														<h5>Evaluation is now Open</h5>
													<?php else: ?>
													<form method="POST">
														<input type="hidden" name='subTakenVal' value="<?php echo $res->subTaken; ?>">
														<button class="btn btn-primary" id="data<?php echo $res->subTaken; ?>" name="subTaken" type="submit">Reactivate Evaluation</button>
													</form>
													<?php endif;?>
													
											</td>
										</tr>
									<?php endwhile; ?>
									</tbody>
								</table>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</main>
	<?php include("../include/footer-guidance.php") ?>
	<script>
	$('#tb1').DataTable({
	order: [],
	columnDefs: [ { orderable: true, targets: [3] } ]
	});
	</script>
	<script src="../assets/js/ajax.js"></script>