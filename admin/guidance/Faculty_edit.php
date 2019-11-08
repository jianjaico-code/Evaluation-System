<?php include("../include/header-guidance.php") ?>
<?php include("../include/sidebar-guidance.php") ?>
<?php include("../function/function_Faculty.php") ?>
<?php
	$data = new Data_faculty();
	$id = $_GET['Faculty_ID'];

	if (isset($_POST['update_faculty'])) {
			$data ->update_faculty($id, $conn);
			 echo"<script>location.replace('Faculty.php');</script>";
	}

	$faculty = $data->get_FacultyID($id,$conn);
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
				<h3 class="tile-title">Edit Faculty Member</h3>
				<div class="alert alert-danger collapse hide text-center  <?php if(isset($error)) echo 'show';?>">
					<strong>Faculty ID exit </strong>Please fill another.
				</div>
				<hr>
				<div class="tile-body">
					<div class="container">
						<form class="form-horizontal" method="POST">
							<div class="form-group row">
								<label class="control-label col-md-2 pull-right">Faculty ID</label>
								<div class="col-md-8">
									<input class="form-control  form-control-lg" readonly type="text" name="faculty_id" placeholder="Enter Student ID" required value="<?php echo $faculty->Faculty_ID;?>  ">
								</div>
							</div>

							<div class="form-group row">
								<label class="control-label col-md-2">First Name</label>
								<div class="col-md-8">
									<input class="form-control  form-control-lg" type="text" placeholder="Enter Student First Name" name="firstName" required value="<?php echo $faculty->Faculty_Firstname;?>">
								</div>
							</div>
							<div class="form-group row">
								<label class="control-label col-md-2">Last Name</label>
								<div class="col-md-8">
									<input class="form-control  form-control-lg" type="text" placeholder="Enter Student Last Name" name="lastName" required value="<?php echo $faculty->Faculty_Lastname;?>">
								</div>
							</div>
							<div class="form-group row">
								<label class="control-label col-md-2">Middle Name</label>
								<div class="col-md-8">
									<input class="form-control  form-control-lg" type="text" placeholder="Enter Student Middle Name" name="middleName" required value="<?php echo $faculty->Faculty_Middlename;?>">
								</div>
							</div>
							
							<div class="form-group row">
								<label class="control-label col-md-2">Select Position</label>
								<div class="col-md-8">
									<select class="form-control form-control-lg" id="exampleSelect1" name="position">
										<option value="TEACHER" <?php if($faculty->Position == 'TEACHER') echo 'selected' ?> >TEACHER</option>
										<option value="GUIDANCE" <?php if($faculty->Position == 'GUIDANCE') echo 'selected'?> >GUIDANCE </option>
										<option value="DEAN" <?php if($faculty->Position == 'DEAN') echo 'selected'?> >DEAN </option>
									</select>
								</div>
							</div>
							
							<div class="form-group row">
								<label class="control-label col-md-2">Select Status</label>
								<div class="col-md-8">
									<select class="form-control form-control-lg" id="exampleSelect1" name="status">
										<option value="Active"  <?php if($faculty->Status == 'Active') echo 'selected' ?>>Active</option>
										<option value="Inactive" <?php if($faculty->Status == 'Inactive') echo 'selected'?>>Inactive</option>
									</select>
								</div>
							</div>
							<div class="form-group row">
								<label class="control-label col-md-2">Set New Password</label>
								<div class="col-md-8">
									<input class="form-control  form-control-lg" type="password" placeholder="Enter Student Password" name="password" required  value="<?php echo $faculty->Password;?>">
								</div>
							</div>
							<div class="tile-footer">
								<div class="row">
									<div class="col-md-8 col-md-offset-3">
										<button class="btn btn-primary btn-lg" type="submit" name="update_faculty"><i class="fa fa-fw fa-lg fa-check-circle"></i>Register</button>&nbsp;&nbsp;&nbsp;<a class="btn btn-secondary btn-lg" href="Faculty.php"><i class="fa fa-fw fa-lg fa-times-circle"></i>Back</a>
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