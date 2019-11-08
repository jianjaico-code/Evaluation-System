<?php include("../include/header-guidance.php") ?>
<?php include("../include/sidebar-guidance.php") ?>
<?php include("../function/function_Student.php") ?>
<?php
	$data = new Data_students();
	
	if(isset($_POST['active'])) {
			$id = $_POST['activate_stats'];
			$data->active_student($id, $conn);
		}else if(isset($_POST['deactive'])){
			$id = $_POST['activate_stats'];
			$data->deactive_student($id, $conn);
		}
			$result = $data->get_students($conn);
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
					<h4>Students</h4>
				</div>
				<div class="module-option clearfix">
					<div class="pull-right">
						<a href="Add_Group.php" title="Add Group of Students"  class="btn btn-primary text-white">Add Group of Students</a>
						<a href="Student_add.php" title="Add New Student"  class="btn btn-primary text-white">Add New Student</a>
					</div>
				</div>
				<hr>
				<div class="tile-body">
					<form method="POST">
						<?php include("../modals/modal_confirm/modal_confirm.php") ?>
						<input type="hidden"  id="activate" name="activate_stats">
						<div class="table-responsive">
							<table class="table table-hover table-bordered" id="table1">
								<thead>
									<tr>
										<th>Student ID</th>
										<th>Last Name</th>
										<th>First Name</th>
										<th>Middle Name</th>
										<th>Course</th>
										<th></th>
										<th class="text-center">Status</th>
									</tr>
								</thead>
								<tbody>
									<?php  while ($row = $result -> fetch_object()): ?>
									<tr>
										<td><?php echo $row->Student_ID;?></td>
										<td><?php echo $row->Lastname ?></td>
										<td><?php echo $row->Firstname ?></td>
										<td class="text-center"><?php echo $row->Middlename?></td>
										<td><?php echo $row->Course_ID ?></td>
										<td class="text-center">
											<a  class="btn btn-sm btn-outline-primary text-muted" href="Student_edit.php?Student_ID=<?php echo $row->Student_ID;?>">Edit</a>
											<td class="text-center">
												<?php if($row->Status=='Active') echo '<a href="#deactive_account" data-toggle="modal" data-id='.$row->Student_ID.' class="activate" style="color:green;">Active</a>'; ?>
												<?php if($row->Status=='Inactive') echo '<a href="#active_modal" data-toggle="modal" data-id='.$row->Student_ID.' class="activate" style="color:red;">Inactive</a>'; ?>
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
		$('#table1').DataTable({
	order: [],
	columnDefs: [ { orderable: false, targets: [5] } ]
	});
		$('.activate').on('click',function(){
		$("#activate").val($(this).data('id'));
	});
	$(document).on("click", ".delete-faculty-btn", function () {
	$("#row-id-to-delete").val($(this).data('fid'));
		});
</script>