<?php include("../include/header-guidance.php") ?>
<?php include("../include/sidebar-guidance.php") ?>
<?php include("../function/function_QueStandard.php") ?>
<?php
	$data = new Data_queStandard();
	
	  if(isset($_POST['active'])) {
			$id = $_POST['activate_stats'];
			$data->active_queStandard($id, $conn);
		}else if(isset($_POST['deactive'])){
			$id = $_POST['activate_stats'];
			$data->deactive_queStandard($id, $conn);
		}
	$result = $data -> getStandard($conn);
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
					<h4>List of Questionnare Standards</h4>
				</div>
				<div class="module-option clearfix">
					
					<div class="pull-right">
						<a href="QuestionnaireStandard_add.php" title="Add Question Standard" class="btn btn-primary">Add New Question Standard</a>
					</div>
				</div>
				<hr>
				<div class="tile-body">
					<form method="POST">
						<?php include("../modals/modal_confirm/modal_confirm.php") ?>
						<input type="hidden"  id="activate" name="activate_stats">
						<div class="table-responsive">
							<table class="table table-hover table-bordered" id="tableSubject">
								<thead>
									<tr>
										<th>No</th>
										<th style="text-align: center;">Questionnaire Standard</th>
										<th></th>
										<td>Status</td>
									</tr>
								</thead>
								<tbody>
									<?php  while ($row = $result -> fetch_object()): ?>
									<tr>
										
										<td class="text-center"><?php echo $row->eval_cat_ID;?></td>
										<td style="text-align: center;"><?php echo $row-> eval_cat_name ?></td>
										<td class="text-center">

											<a  class="btn btn-sm btn-outline-primary text-muted" href="QuestionnaireStandard_edit.php?eval_cat_ID=<?php echo $row->eval_cat_ID;?>">Edit</a>
											
											<td class="text-center">
												<?php if($row->Status=='Active') echo '<a href="#deactive_account" data-toggle="modal" data-id='.$row->eval_cat_ID.' class="activate" style="color:green;">Active</a>'; ?>
												<?php if($row->Status=='Inactive') echo '<a href="#active_modal" data-toggle="modal" data-id='.$row->eval_cat_ID.' class="activate" style="color:red;">Inactive</a>'; ?>
											</td>
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
	$('#tableSubject').DataTable({
	order: [],
	columnDefs: [ { orderable: false, targets: [0] } ],
	 "columnDefs": [
    { "width": "80%", "targets": 1 }
  ]
	});
		$('.activate').on('click',function(){
		$("#activate").val($(this).data('id'));
	});
	
	
	$(document).on("click", ".delete-faculty-btn", function () {
	$("#row-id-to-delete").val($(this).data('fid'));
	});
</script>