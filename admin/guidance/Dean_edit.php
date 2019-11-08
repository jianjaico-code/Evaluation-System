<?php include("../include/header-guidance.php") ?>
<?php include("../include/sidebar-guidance.php") ?>
<?php include("../function/function_Dean.php") ?>
<?php
	$data = new Data_dean();
	$id = $_GET['Dean_ID'];

	if (isset($_POST['update_dean'])) {
			$data -> update_dean($id, $conn);
			 echo"<script>location.replace('Dean.php');</script>";
	}

	$dean = $data->get_DeanByID($id,$conn);
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
				<h3 class="tile-title">Edit Dean</h3>
				<div class="alert alert-danger collapse hide text-center  <?php if(isset($error)) echo 'show';?>">
					<strong>Dean ID exit </strong>Please fill another.
				</div>
				<hr>
				<div class="tile-body">
					<div class="container">
						<form class="form-horizontal" method="POST">
							<div class="form-group row">
								<label class="control-label col-md-2 pull-right">Dean ID</label>
								<div class="col-md-8">
									<input class="form-control  form-control-lg" readonly type="text" name="dean_id" placeholder="Enter Student ID" required value="<?php echo $dean->Dean_ID;?>  ">
								</div>
							</div>

							<div class="form-group row">
								<label class="control-label col-md-2">First Name</label>
								<div class="col-md-8">
									<input class="form-control  form-control-lg" type="text" placeholder="Enter Student First Name" name="firstName" required value="<?php echo $dean->Firstname;?>">
								</div>
							</div>
							<div class="form-group row">
								<label class="control-label col-md-2">Last Name</label>
								<div class="col-md-8">
									<input class="form-control  form-control-lg" type="text" placeholder="Enter Student Last Name" name="lastName" required value="<?php echo $dean->Lastname;?>">
								</div>
							</div>
							<div class="form-group row">
								<label class="control-label col-md-2">Middle Name</label>
								<div class="col-md-8">
									<input class="form-control  form-control-lg" type="text" placeholder="Enter Student Middle Name" name="middleName" required value="<?php echo $dean->Middlename;?>">
								</div>
							</div>
							
							
							<div class="form-group row">
								<label class="control-label col-md-2">Select Status</label>
								<div class="col-md-8">
									<select class="form-control form-control-lg" id="exampleSelect1" name="status">
										<option value="Active"  <?php if($dean->Status == 'Active') echo 'selected' ?>>Active</option>
										<option value="Inactive" <?php if($dean->Status == 'Inactive') echo 'selected'?>>Inactive</option>
									</select>
								</div>
							</div>
							<div class="form-group row">
								<label class="control-label col-md-2">Set New Password</label>
								<div class="col-md-8">
									<input class="form-control  form-control-lg" type="password" placeholder="Enter Student Password" name="password" required  value="<?php echo $dean->Password;?>">
								</div>
							</div>
							<div class="tile-footer">
								<div class="row">
									<div class="col-md-8 col-md-offset-3">
										<button class="btn btn-primary btn-lg" type="submit" name="update_dean"><i class="fa fa-fw fa-lg fa-check-circle"></i>Register</button>&nbsp;&nbsp;&nbsp;<a class="btn btn-secondary btn-lg" href="Dean.php"><i class="fa fa-fw fa-lg fa-times-circle"></i>Back</a>
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