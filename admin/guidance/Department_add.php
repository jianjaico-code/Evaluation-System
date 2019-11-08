<?php include("../include/header-guidance.php") ?>
<?php include("../include/sidebar-guidance.php") ?>
<?php include("../function/function_Department.php") ?>
<?php include("../function/function_Faculty.php") ?>
<?php
	$data =  new Data_department();
	$data1 =  new Data_faculty();

	if (isset($_POST['add_department'])) {

			$departmentID = $conn->real_escape_string($_POST['departmentID']);
	        $departmentName = $conn->real_escape_string($_POST['departmentName']);
	        $status = $conn->real_escape_string($_POST['status']);
	        $dean = $conn->real_escape_string($_POST['dean']);

   	 	$department = "SELECT Department_ID FROM department WHERE Department_ID = '$departmentID' ";
		$result = $conn -> query($department);

		if ($result -> num_rows > 0) {
			$error = 1;
		}else{
	        $query = "INSERT INTO department VALUES ('$departmentID','$departmentName','$dean','$status')";
	        $conn->query($query);
		// echo"<script>location.replace('Department.php');</script>";
		}
	}
	$dean = $data1 -> get_dean($conn);
?>
<style type="text/css">
	input,
	input::-webkit-input-placeholder {
    font-size: 15px;
    line-height: 3;
	}

	input{
		padding:2000px;
	}
	.active{
		background-color: #00635a !important;
		color:#ffffff !important;
		cursor: pointer !important;
	}

	#faculty{
		cursor: pointer !important;
	}
	.button{
		margin-left: 16px;
	}

</style>
<main class="app-content">
	<div class="clearix"></div>
	<div class="col-md-12">
			<div class="tile">
				<h3 class="tile-title">Add New Department</h3>
				<div class="alert alert-danger collapse hide text-center  <?php if(isset($error)) echo 'show';?>">
					<strong>Department ID exit </strong>Please fill another.
				</div>
				<hr>
				<div class="tile-body">
					<div class="container">
						<form class="form-horizontal" method="POST">
							<div class="form-group row">
								<label class="control-label col-md-2 pull-right">Department ID:</label>
								<div class="col-md-8">
									<input class="form-control  form-control-lg" type="text" placeholder="Enter Department ID" name="departmentID" required>
								</div>
							</div>
							<hr>

							<div class="form-group row">
								<label class="control-label col-md-2">Description Name:</label>
								<div class="col-md-8">
									<input class="form-control  form-control-lg" type="text" placeholder="Enter Department Description" name="departmentName" required>
								</div>
							</div>
							<hr>

							<div class="form-group row">
								<label for="inputEmail3" class="col-sm-2 col-form-label">Dean:</label>
								<input type="hidden" name="dean" id="faculties" value="">
								<button type="button" class="btn btn-primary button" data-toggle="modal" data-target="#facultyModal">
								Select a Dean
								</button>
								<div class="col-sm-7">
									<div id="data2">Please choose a Dean</div>
								</div>
							</div>
							<hr>


							<div class="form-group row">
								<label class="control-label col-md-2">Select Status</label>
								<div class="col-md-8">
									<select class="form-control form-control-lg" id="exampleSelect1"  name="status" required>
										<option>Active</option>
										<option>Inactive</option>
									</select>
								</div>
							</div>
							<div class="tile-footer">
								<div class="row">
									<div class="col-md-8 col-md-offset-3">
										<button class="btn btn-primary btn-lg" type="submit" name="add_department"><i class="fa fa-fw fa-lg fa-check-circle"></i>Save</button>&nbsp;&nbsp;&nbsp;<a class="btn btn-secondary btn-lg" href="Department.php"><i class="fa fa-fw fa-lg fa-times-circle"></i>Back</a>
									</div>
								</div>
							</div>
						</form>
					</div>
					
				</div>
			</div>
		</div>
	</div>
</div>
</main>


<div class="modal fade" id="facultyModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Faculty</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="tile-body">
					<div class="container">
						<div class="form-group row">
							<label for="inputEmail3" class="col-sm-1 col-form-label"></label>
							<div class="col-sm-10">
								<div class="table-responsive">
									<table  class="table table-hover table-bordered test" id="faculty">
										<thead>
											<tr>
												<th>Faculty ID</th>
												<th>Lastname</th>
												<th>Firstname</th>
												<th>Middlename</th>
											</tr>
										</thead>
										<tbody>
											<?php  while ($row1 = $dean -> fetch_object()): ?>
											<tr>
												<td><?php echo $row1->Faculty_ID ?></td>
												<td><?php echo $row1->Faculty_Lastname ?></td>
												<td><?php echo $row1->Faculty_Firstname ?></td>
												<td><?php echo $row1->Faculty_Middlename ?></td>
											</tr>
											<?php endwhile; ?>
										</tbody>
									</table>
								</div>
							</div>
							
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<button id="save2" type="button" class="btn btn-primary">Save changes</button>
				</div>
			</div>
		</div>
	</div>
</div>
<?php include("../include/footer-guidance.php") ?>
<script src="../../js/dean.js"></script>
