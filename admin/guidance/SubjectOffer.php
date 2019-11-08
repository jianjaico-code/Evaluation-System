<?php include("../include/header-guidance.php") ?>
<?php include("../include/sidebar-guidance.php") ?>
<?php include("../function/function_SubjectOffer.php") ?>
<?php
	$data = new Data_subjectFaculty();

	 if(isset($_POST['active'])) {
			$id = $_POST['activate_stats'];
			$data->active_subjectOffer($id, $conn);
		}else if(isset($_POST['deactive'])){
			$id = $_POST['activate_stats'];
			$data->deactive_subjectOffer($id, $conn);
		}
	$list =  $data->get_SubjectFacultyList($conn);
?>
<style type="text/css">
	btn-outline-primary:hover, .btn-outline-danger:hover{
		color: white !important;
	}
		.btn-sm{
			padding: 3px 8px;
		}
</style>
<main class="app-content">
	<div class="row">
		<div class="col-md-12">
			<div class="tile">
				<div >
					<h4>Subject Offer List</h4>
				</div>
				<div class="module-option clearfix">
					<div class="pull-right">
						<a href="Add_GroupSubjectOffer.php" title="Add New Faculty" class="btn btn-primary">Tag a Group of Subject Faculty</a>
						<a href="SubjectOffer_add.php" title="Add New Faculty" class="btn btn-primary">Set Faculty Subject</a>
					</div>
				</div>
				<hr>
				<div class="tile-body">
					<form method="POST">
						<?php include("../modals/modal_confirm/modal_confirm.php") ?>
						<input type="hidden"  id="activate" name="activate_stats">
						<div class="table-responsive">
							<table class="table table-hover table-bordered" id="table_subjectFacultyList">
								<thead>
									<tr>
										<th>ID</th>
										<th>Subject</th>
										<th>Term</th>
										<th>SY</th>
										<th class="text-center">Teacher</th>
										<th>Department</th>
										<th></th>
										<th>Status</th>
									</tr>
								</thead>
								<tbody>
									<?php  while ($row = $list -> fetch_object()): ?>
									<tr>
										<td><?php echo $row->Subject_Offer_ID; ?></td>
										<td><?php echo $row->Subject_Code .', &nbsp'. $row->Subject_Description; ?></td>
										<td><?php echo $row->Term_Name;?></td>
										<td><?php echo $row->SY_Name; ?></td>
										<td><?php echo  $row ->Faculty_Lastname . ', '. $row ->Faculty_Firstname. ' '. $row ->Faculty_Middlename; ?></td>
										<td class="text-center"><?php echo  $row -> Department_ID ?></td>
										<td class="text-center">

											<a  class="btn btn-sm btn-outline-primary text-muted" href="SubjectOffer_edit.php?Subject_Offer_ID=<?php echo $row->Subject_Offer_ID;?>">Edit</a>
											<td class="text-center">
												<?php if($row->Status=='Active') echo '<a href="#deactive_account" data-toggle="modal" data-id='.$row->Subject_Offer_ID.' class="activate" style="color:green;">Active</a>'; ?>
												<?php if($row->Status=='Inactive') echo '<a href="#active_modal" data-toggle="modal" data-id='.$row->Subject_Offer_ID.' class="activate" style="color:red;">Inactive</a>'; ?>
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
	$('#table_subjectFacultyList').DataTable({
	order: [],
	columnDefs: [ { orderable: false, targets: [7] } ]
	});
	$('.activate').on('click',function(){
		$("#activate").val($(this).data('id'));
	});

	$(document).on("click", ".delete-faculty-btn", function () {
	$("#row-id-to-delete").val($(this).data('fid'));
	});
	
</script>