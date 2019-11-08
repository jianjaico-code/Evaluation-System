<?php include("../include/header-guidance.php") ?>
<?php include("../include/sidebar-guidance.php") ?>
<?php include("../function/function_Questionnaire.php") ?>
<?php
	$data = new Data_questionnaire();
	$result = $data->get_evaluation_sets($conn);

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
					<h4>Sets of Questions</h4>
				</div>
				<div class="module-option clearfix">
					<div class="pull-right">
						<!-- <a href="SchoolYear_add.php" title="Add New Faculty" class="btn btn-primary">Add New School Year</a> -->
						<a href="Questionnaire_Add_Set_Function.php" title="Add New Faculty" class="btn btn-primary">Add New Sets of Questions</a>
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
										<th>Semester</th>
										<th class="text-center">School Year</th>
										<th class="text-center">Number of Questions</th>
										<th></th>
									</tr>
								</thead>
								<tbody>
									<?php  while ($row = $result -> fetch_object()): ?>
									<tr>
										<td><?php echo $row->Term_Name;?></td>
										<td class="text-center"><?php echo $row->SY_Name ;?></td>
										<td class="text-center"><?php
										
										    $test1 = $row->Term_ID;
										    $test2 = $row->SY_ID;
											$res2 = $data->get_evaluation_report($test1, $test2, $conn);
												echo mysqli_num_rows($res2);
										?></td>
										<td class="text-center"><a  class="btn btn-sm btn-outline-primary text-muted" href="Questionnaire_Edit_Set.php?Term_ID=<?php echo $row->Term_ID;?>&amp;SY_ID=<?php echo $row->SY_ID;?>">View Questions</a></td>
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
//	"oSearch": {"bSmart": false}, // disable smart search
	columnDefs: [ { orderable: false, targets: [2] } ]

	});



	$('.activate').on('click',function(){
		$("#activate").val($(this).data('id'));
	});

	$(document).on("click", ".delete-faculty-btn", function () {
	$("#row-id-to-delete").val($(this).data('fid'));

		});

</script>