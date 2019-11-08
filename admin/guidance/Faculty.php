<?php include("../include/header-guidance.php") ?>
<?php include("../include/sidebar-guidance.php") ?>
<?php include("../function/function_Faculty.php") ?>
<?php
	$data = new Data_faculty();
	
	if(isset($_POST['active'])) {
		$id = $_POST['activate_stats'];
		$data->active_faculty($id, $conn);

	}else if(isset($_POST['deactive'])){
		$id = $_POST['activate_stats'];
		$data->deactive_faculty($id, $conn);
	}
	$result = $data->get_faculty($conn);
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
						<h4>Faculty and Staff</h4>
					</div>
					<div class="module-option clearfix">
						
						<div class="pull-right">
							<a href="Add_GroupFaculty.php" title="Add Group of Students"  class="btn btn-primary text-white">Add Group of Faculties</a>
							<a href="Faculty_add.php" title="Add New Faculty" title="Add New Faculty" class="btn btn-primary text-white">Add New Faculty</a>
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
										<th>Faculty Code</th>
										<th>Last Name</th>
										<th>First Name</th>
										<th>Middle Name</th>
										<th>Position</th>
										<th></th>
										<th class="text-center">Status</th>
									</tr>
								</thead>
								<tbody>
									<?php  while ($row = $result -> fetch_object()): ?>
									<tr>
										<td><?php echo $row->Faculty_ID;?></td>
										<td><?php echo $row->Faculty_Lastname ;?></td>
										<td><?php echo $row->Faculty_Firstname ;?></td>
										<td><?php echo $row->Faculty_Middlename;?></td>
										<td><?php echo $row->Position; ?></td>
										<td class="text-center">
											<a  class="btn btn-sm btn-outline-primary text-muted" href="Faculty_edit.php?Faculty_ID=<?php echo $row->Faculty_ID;?>">Edit</a>
											
										</td>

										<td class="text-center">
											<?php if($row->Status=='Active') echo '<a href="#deactive_account" data-toggle="modal" data-id='.$row->Faculty_ID.' class="activate" style="color:green;">Active</a>'; ?>
											<?php if($row->Status=='Inactive') echo '<a href="#active_modal" data-toggle="modal" data-id='.$row->Faculty_ID.' class="activate" style="color:red;">Inactive</a>'; ?>
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
//	"oSearch": {"bSmart": false}, // disable smart search
	columnDefs: [ { orderable: false, targets: [5] } ]

	});

	// $(function(){
	// 	var table1 = $('#table1').DataTable({
 //        order: [],
 //        "oSearch": {"bSmart": false}, // disable smart search
 //        columnDefs: [ { orderable: false, targets: [5] } ]
 //        });
	// 	 $('#table1_wrapper input[type=search]').on( 'keyup click', function () {
	// 	      table1
	// 	        .column('6	')
	// 	        .search( "^" + this.value, true, false, true )
	// 	        .draw();
	// 	    });
	// });


	$('.activate').on('click',function(){
		$("#activate").val($(this).data('id'));
	});

	$(document).on("click", ".delete-faculty-btn", function () {
	$("#row-id-to-delete").val($(this).data('fid'));

		});





</script>