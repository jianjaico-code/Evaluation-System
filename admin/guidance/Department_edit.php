<?php include("../include/header-guidance.php") ?>
<?php include("../include/sidebar-guidance.php") ?>
<?php include("../function/function_Department.php") ?>
<?php
	$data = new Data_department();
	$id = $_GET['Department_ID'];

	if (isset($_POST['update_department'])) {
		$data->update_department($id , $conn);
		echo"<script>location.replace('Department.php');</script>";
	}
	$result = $data->get_departmentByID($id, $conn);
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
									<input class="form-control  form-control-lg" type="text" placeholder="Enter Department ID" name="departmentID" value="<?php echo $result->Department_ID ?>" required>
								</div>
							</div>
							<div class="form-group row">
								<label class="control-label col-md-2">Description Name:</label>
								<div class="col-md-8">
									<input class="form-control  form-control-lg" type="text" placeholder="Enter Department Description" name="departmentName" required value="<?php echo $result->Department_Name ?>">
								</div>
							</div>
							<div class="form-group row">
								<label class="control-label col-md-2">Select Status</label>
								<div class="col-md-8">
									<select class="form-control form-control-lg" id="exampleSelect1" name="status">
										<option value="Active"  <?php if($result->Status == 'Active') echo 'selected' ?>>Active</option>
										<option value="Inactive" <?php if($result->Status == 'Inactive') echo 'selected'?>>Inactive</option>
									</select>
								</div>
							</div>
							<div class="tile-footer">
								<div class="row">
									<div class="col-md-8 col-md-offset-3">
										<button class="btn btn-primary btn-lg" type="submit" name="update_department"><i class="fa fa-fw fa-lg fa-check-circle"></i>Save</button>&nbsp;&nbsp;&nbsp;<a class="btn btn-secondary btn-lg" href="Department.php"><i class="fa fa-fw fa-lg fa-times-circle"></i>Back</a>
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
<?php include("../include/footer-guidance.php") ?>