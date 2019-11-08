<?php include("../include/header-guidance.php") ?>
<?php include("../include/sidebar-guidance.php") ?>
<?php include("../function/function_EvaluationSchedule.php") ?>
<?php
	$data = new Data_EvaltuationSchedule();
	
	  if(isset($_POST['active'])) {
			$id = $_POST['activate_stats'];
			$data->active_sched($id, $conn);
		}else if(isset($_POST['deactive'])){
			$id = $_POST['activate_stats'];
			$data->deactive_sched($id, $conn);
		}
	$result = $data->get_evaluationSchedule($conn);
?>
<style>
		.btn-outline-primary:hover, .btn-outline-danger:hover{
		color: white !important;
	}
		.btn-sm{
			padding: 5px 30px;
		}
</style>
<main class="app-content">
	
	<div class="row">
		<div class="col-md-12">
			<div class="tile">
				<div >
					<h4>Evaluation Schedule</h4>
				</div>
				<div class="module-option clearfix">
					
					<div class="pull-right">
						<a href="EvaluationSchedule_set.php" title="Set New Schedule"  class="btn btn-primary text-white">Set New Schedule</a>
					</div>
				</div>
				<hr>
				<div class="tile-body">
					<form method="POST">
						<?php include("../modals/modal_confirm/modal_confirm.php") ?>
						<input type="hidden"  id="activate" name="activate_stats">
							<table class="table table-hover table-bordered" id="table1">
								<thead>
									<tr>
										<th>Evaluation ID</th>
										<th>From</th>
										<th>To</th>
										<th>Status</th>
									</tr>
								</thead>
								<tbody>
									<?php  while ($row = $result -> fetch_object()): ?>
									<tr>
										<td class="text-center"><?php echo  $row->Evaluation_ID;?></td>
										<td class="text-center"><?php echo  $row->Evaluation_ScheduleFrom;?></td>
										<td class="text-center"><?php echo $row-> Evaluation_ScheduleTo ?></td>

											
											<td class="text-center">
												<?php if($row->Status=='Active') echo '<a href="#deactive_account" data-toggle="modal" data-id='.$row->Evaluation_ID.' class="activate" style="color:green;">Active</a>'; ?>
												<?php if($row->Status=='Inactive') echo '<a href="#active_modal" data-toggle="modal" data-id='.$row->Evaluation_ID.' class="activate" style="color:red;">Inactive</a>'; ?>
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
		$('#table1').DataTable({
	order: [],
	columnDefs: [ { orderable: false, targets: [3] } ]
	});
	$('.activate').on('click',function(){
		$("#activate").val($(this).data('id'));
	});
	$(document).on("click", ".delete-faculty-btn", function () {
	$("#row-id-to-delete").val($(this).data('fid'));
		});
</script>