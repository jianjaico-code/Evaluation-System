<?php include("../include/header-guidance.php") ?>
<?php include("../include/sidebar-guidance.php") ?>
<?php include("../function/function_StudentTakenHandle.php") ?>
<?php
	$data = new Data_subjectTakenHandle();
	
	 if(!empty($_POST['delete'])) { 
		 	$id = $_POST['delete']; 
		 	$data->delete_StudentTakenHandle($id, $conn); 

		 }
	$result = $data -> get_subjectTakenHandle($conn);	
?>
<main class="app-content">
	<div class="row">
		<div class="col-md-12">
			<div class="tile">
				<div >
					<h4>List of Student Enrolled</h4>
				</div>
				<hr>
				<div class="module-option clearfix">
					<div class="pull-right">
						<a href="SubjectTaken_group.php" title="Tag a Subject" class="btn btn-primary">Enroll a Group of Students</a>
						<a href="SubjectTaken_add.php" title="Tag a Subject" class="btn btn-primary">Enroll a Student</a>
					</div>
					<br>	<br>
				</div>
				<div class="tile-body">
					<form method="POST">
						<?php include("../modals/modal_confirm/modal_confirm.php") ?>
						<div class="table-responsive">
							<table class="table table-hover table-bordered" id="try">
								<thead>
									<tr>
										<th>No.</th>
										<th class="text-center">Student</th>
										<th>Subject Code</th>
										<th>Subject Name</th>
										<th>Semester</th>
									</tr>
								</thead>
								<tbody>
									<?php  while ($row = $result -> fetch_object()): ?>
									<tr>
										<td class="text-center"> <?php echo  $row->Subject_Student_Taken;?></td>
										<td><?php echo $row-> Student_ID .' &nbsp&nbsp&nbsp'. $row->Lastname .',&nbsp'. $row->Firstname .' &nbsp'. $row->Middlename;?></td>
										<td><?php echo $row-> Subject_Code;?></td>
										<td><?php echo $row-> Subject_Description;?></td>
										<td><?php echo $row-> Term_Name;?></td>
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
	$('#try').DataTable({
	order: [],
	columnDefs: [ { orderable: false, targets: [3] } ]
	});

		$('.delete-faculty-btn').on('click',function(){
		 $("#row-id-to-delete").val($(this).data('fid'));

	});
</script>