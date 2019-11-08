<?php include("../include/header-guidance.php") ?>
<?php include("../include/sidebar-guidance.php") ?>
<?php include("../function/function_Subject.php") ?>
<?php
	$data = new Data_subject();

	 if(isset($_POST['active'])) {
			$id = $_POST['activate_stats'];
			$data->active_subject($id, $conn);
		}else if(isset($_POST['deactive'])){
			$id = $_POST['activate_stats'];
			$data->deactive_subject($id, $conn);
		}
		$result = $data->get_Subject($conn);
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
					<h4>List of Subjects</h4>
				</div>
				<div class="module-option clearfix">
					
					<div class="pull-right">
						<a href="Add_GroupSubject.php" title="Add a Group of Subject" class="btn btn-primary">Add a Group of Subjects</a>
						<a href="Subject_add.php" title="Add New Faculty" class="btn btn-primary">Add New Subject</a>
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
										<th>Subject Code</th>
										<th>Question Description</th>
										<th></th>
										<th class="text-center">Status</th>
									</tr>
								</thead>
								<tbody>
									<?php  while ($row = $result -> fetch_object()): ?>
									<tr>
										<td><?php echo $row->Subject_Code;?></td>
										<td><?php echo $row-> Subject_Description ?></td>
										<td class="text-center">
											<a  class="btn btn-sm btn-outline-primary text-muted" href="Subject_edit.php?Subject_Code=<?php echo $row->Subject_Code;?>">Edit</a>
											<td class="text-center">
												<?php if($row->Status=='Active') echo '<a href="#deactive_account" data-toggle="modal" data-id='.$row->Subject_Code.' class="activate" style="color:green;">Active</a>'; ?>
												<?php if($row->Status=='Inactive') echo '<a href="#active_modal" data-toggle="modal" data-id='.$row->Subject_Code.' class="activate" style="color:red;">Inactive</a>'; ?>
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
	columnDefs: [ { orderable: false, targets: [2] } ]
	});

	$('.activate').on('click',function(){
		$("#activate").val($(this).data('id'));
	});
	$(document).on("click", ".delete-faculty-btn", function () {
	$("#row-id-to-delete").val($(this).data('fid'));
	});


</script>