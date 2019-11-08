<?php include("../include/header-guidance.php") ?>
<?php include("../include/sidebar-guidance.php") ?>
<?php include("../function/function_Department.php") ?>
<?php
	$data = new Data_department();

		if(isset($_POST['active'])) {
			$id = $_POST['activate_stats'];
			$data->active_department($id, $conn);
		}else if(isset($_POST['deactive'])){
			$id = $_POST['activate_stats'];
			$data->deactive_department($id, $conn);
		}
	$result = $data -> get_department($conn);
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
				<div>
					<h4>List of Departments</h4>
				</div>
				<div class="module-option clearfix">
					
					<div class="pull-right">
						<a href="Add_GroupDepartment.php" title="Add New Faculty" class="btn btn-primary">Add Group of Departments</a>
						<a href="Department_add.php" title="Add New Faculty" class="btn btn-primary">Add New Department</a>
					</div>
				</div>
				<hr>

				<div class="tile-body">
					<form method="POST">
						<?php include("../modals/modal_confirm/modal_confirm.php") ?>
						<input type="hidden"  id="activate" name="activate_stats">
						<div class="table-responsive">
							<table class="table table-hover table-bordered" id="questionTable">
								<thead>
									<tr>
										<th> Department ID</th>
										<th>Department Description</th>
										<th class="text-center">Dean</th>
										<th></th>
										<th>Status</th>
									</tr>
								</thead>
								<tbody>
									<?php  while ($row = $result -> fetch_object()): ?>
									<tr>
										
										<td>
											<?php echo  $row->Department_ID;?>
										</td>
										<td><?php echo $row-> Department_Name ?></td>
										<td><?php echo $row-> Faculty_ID .' ' . $row-> Faculty_Firstname .' ' . $row-> Faculty_Middlename .' ' . $row-> Faculty_Lastname ?></td>
										
										<td class="text-center">

											<a  class="btn btn-sm btn-outline-primary text-muted" href="Department_edit.php?Department_ID=<?php echo $row->Department_ID;?>">Edit</a>
											
											<td class="text-center">
												<?php if($row->Status=='Active') echo '<a href="#deactive_account" data-toggle="modal" data-id='.$row->Department_ID.' class="activate" style="color:green;">Active</a>'; ?>
												<?php if($row->Status=='Inactive') echo '<a href="#active_modal" data-toggle="modal" data-id='.$row->Department_ID.' class="activate" style="color:red;">Inactive</a>'; ?>
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
	$('#questionTable').DataTable({
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