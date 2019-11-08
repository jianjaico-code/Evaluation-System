<?php include("../include/header-guidance.php") ?>
<?php include("../include/sidebar-guidance.php") ?>
<?php include("../function/function_Faculty.php") ?>
<?php
	$data = new Data_faculty();
	if (isset($_POST['add_faculty'])) {
		$username = $_POST['faculty_id'];
		$faculty = "SELECT Faculty_ID FROM faculty WHERE Faculty_ID = '$username' ";
		$result = $conn -> query($faculty);
		
		if ($result -> num_rows > 0) {
			$error = 1;
		}else{
		$data->add_faculty($_POST, $conn);
echo"<script>location.replace('Faculty.php');</script>";
}
}
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
				<h3 class="tile-title">Add New Faculty Member</h3>
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
									<input class="form-control  form-control-lg" type="text" name="faculty_id" placeholder="Enter Faculty ID" required>
								</div>
							</div>

							<div class="form-group row">
								<label class="control-label col-md-2">First Name</label>
								<div class="col-md-8">
									<input class="form-control  form-control-lg" type="text" placeholder="Enter Faculty First Name" name="firstName" required>
								</div>
							</div>
							<div class="form-group row">
								<label class="control-label col-md-2">Last Name</label>
								<div class="col-md-8">
									<input class="form-control  form-control-lg" type="text" placeholder="Enter Faculty Last Name" name="lastName" required>
								</div>
							</div>
							<div class="form-group row">
								<label class="control-label col-md-2">Middle Name</label>
								<div class="col-md-8">
									<input class="form-control  form-control-lg" type="text" placeholder="Enter Faculty Middle Name" name="middleName" required>
								</div>
							</div>
							
							<div class="form-group row">
								<label class="control-label col-md-2">Select Position</label>
								<div class="col-md-8">
									<select class="form-control form-control-lg" id="exampleSelect1" name="position"  name="position" required>
										<option>TEACHER</option>
										<option>GUIDANCE</option>
										<option>DEAN</option>
									</select>
								</div>
							</div>
							
							<div class="form-group row">
								<label class="control-label col-md-2">Select Status</label>
								<div class="col-md-8">
									<select class="form-control form-control-lg" id="exampleSelect1"  name="status" required>
										<option>Active</option>
										<option>Inactive</option>
									</select>
								</div>
							</div>
							<div class="form-group row">
								<label class="control-label col-md-2">Password</label>
								<div class="col-md-8">
									<input class="form-control  form-control-lg" type="password" placeholder="Enter Faculty Password" name="password" required>
								</div>
							</div>
							<div class="tile-footer">
								<div class="row">
									<div class="col-md-8 col-md-offset-3">
										<button class="btn btn-primary btn-lg" type="submit" name="add_faculty"><i class="fa fa-fw fa-lg fa-check-circle"></i>Register</button>&nbsp;&nbsp;&nbsp;<a class="btn btn-secondary btn-lg" href="Faculty.php"><i class="fa fa-fw fa-lg fa-times-circle"></i>Back</a>
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