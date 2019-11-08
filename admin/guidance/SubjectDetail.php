<?php include("../include/header-guidance.php") ?>
<?php include("../include/sidebar-guidance.php") ?>
<?php include("../function/function_Department.php") ?>
<?php include("../function/function_Subject.php") ?>
<?php
	$data = new Data_subject();

	$result = $data -> get_departmentBySubjectCode($conn);	
	
	
?>
<main class="app-content">
	<div class="row">
		<div class="col-md-12">
			<div class="tile">
				<div >
					<h4>List of Subject Details</h4>
				</div>
				<div class="module-option clearfix">
					
					<div class="pull-right">
						<a href="Add_GroupSubjectDetail.php" title="Tag a Subject" class="btn btn-primary">Tag a Group of Subjects</a>
						<a href="SubjectDetail_add.php" title="Tag a Subject" class="btn btn-primary">Tag a Subject</a>
					</div>
					<br><br>
				</div>
				<hr>
				
				<div class="tile-body">
					<form method="POST">
						<?php include("../modals/modal_confirm/modal_confirm.php") ?>
						<div class="table-responsive">
							<table class="table table-hover table-bordered" id="questionTable">
								<thead>
									<tr>
										<th>Subject</th>
										<th>Course</th>
										<th>Department</th>

									</tr>
								</thead>
								<tbody>
									<?php  while ($row = $result -> fetch_object()): ?>
									<tr>
										<td><?php echo $row-> Subject_Code .', '. $row-> Subject_Description;?></td>
										<td><?php echo $row-> Course_Name ?></td>
										<td><?php echo $row-> Department_Name ?></td>
										
									</tr>
									<?php endwhile; ?>
								</tbody>
							</table>
						</div>
					</form>
					<div class="tile-footer">
					</div>
				</div>
			</div>

		</div>
	</div>
</main>
<?php include("../include/footer-guidance.php") ?>
<script>
	$('#questionTable').DataTable({
	order: [],
	columnDefs: [ { orderable: false, targets: [0] } ]
	});

	
</script>