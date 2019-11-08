<?php include("../include/header-guidance.php") ?>
<?php include("../include/sidebar-guidance.php") ?>
<?php include("../function/function_Student.php") ?>
<?php
	$data = new Data_students();
	$result = $data->get_studentCourse($conn);
?>
<main class="app-content">
	
	<div class="row">
		<div class="col-md-12">
			<div class="tile">
				<div >
					<h4>Faculty and Staff</h4>
				</div>
				<div class="module-option clearfix">
					<div class="pull-right">
						<a href="StudentCourse_add.php" title="Add New Faculty" class="btn btn-primary">Set Student Course</a>
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
										<th>Course ID</th>
										<th>Course Description</th>
									</tr>
								</thead>
								<tbody>
									<?php  while ($row = $result -> fetch_object()): ?>
									<tr>
										<td><?php echo $row->Student_ID ?></td>
										<td><?php echo $row->Lastname ?></td>
										<td><?php echo $row->Firstname ?></td>
										<td><?php echo $row->Middlename?></td>
										<td><?php echo $row->Course_ID?></td>
										<td><?php echo $row->Course_Name?></td>
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
	columnDefs: [ { orderable: false, targets: [] } ]
	});

</script>