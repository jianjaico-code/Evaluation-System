<?php include("../include/header-guidance.php") ?>
<?php include("../include/sidebar-guidance.php") ?>
<?php include("../function/function_Student.php") ?>
<?php
	$data = new Data_students();
	$id = $_GET['Student_ID'];

	if (isset($_POST['update_student'])) {
			$data ->update_student($id, $conn);
			echo"<script>location.replace('Student.php');</script>";
	}

	$student = $data->get_studentByID($id,$conn);
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
				<h3 class="tile-title">Edit Students</h3>
				<div class="alert alert-danger collapse hide text-center  <?php if(isset($error)) echo 'show';?>">
					<strong>Faculty ID exit </strong>Please fill another.
				</div>
				<hr>
				<div class="tile-body">
					<div class="container">
						<form class="form-horizontal" method="POST">
							<div class="form-group row">
								<label class="control-label col-md-2 pull-right">Student ID</label>
								<div class="col-md-8">
									<input class="form-control form-control-lg" type="text" readonly placeholder="Enter Faculty ID" name="studentID" value="<?php echo $student->Student_ID;?>  ">
								</div>
							</div>

							<div class="form-group row">
								<label class="control-label col-md-2">First Name</label>
								<div class="col-md-8">
									<input class="form-control form-control-lg" type="text" placeholder="Enter First name" name="firstName" value="<?php echo $student->Firstname;?>">
								</div>
							</div>
							<div class="form-group row">
								<label class="control-label col-md-2">Last Name</label>
								<div class="col-md-8">
									<input class="form-control form-control-lg" type="text" placeholder="Enter Last name" name="lastName" value="<?php echo $student->Lastname;?>">
								</div>
							</div>
							<div class="form-group row">
								<label class="control-label col-md-2">Middle Name</label>
								<div class="col-md-8">
									<input class="form-control form-control-lg" type="text" placeholder="Enter Middle name" name="middleName" value="<?php echo $student->Middlename;?>">
								</div>
							</div>
							
							<div class="form-group row">
								<label class="control-label col-md-2">Select Status</label>
								<div class="col-md-8">
									<select class="form-control form-control-lg" id="exampleSelect1" name="status">
										<option value="Active"  <?php if($student->Status == 'Active') echo 'selected' ?>>Active</option>
										<option value="Inactive" <?php if($student->Status == 'Inactive') echo 'selected'?>>Inactive</option>
									</select>
								</div>
							</div>
							<div class="form-group row">
								<label class="control-label col-md-2">Set New Password</label>
								<div class="col-md-8">
									<input class="form-control form-control-lg" type="password" placeholder="Enter Middle name" name="password" value="<?php echo $student->Password;?>">
								</div>
							</div>
							<div class="tile-footer">
								<div class="row">
									<div class="col-md-8 col-md-offset-3">
										<button class="btn btn-primary btn-lg" type="submit" name="update_student"><i class="fa fa-fw fa-lg fa-check-circle"></i>Register</button>&nbsp;&nbsp;&nbsp;<a class="btn btn-secondary btn-lg" href="Student.php"><i class="fa fa-fw fa-lg fa-times-circle"></i>Back</a>
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
