<?php include("../include/header-guidance.php") ?>
<?php include("../include/sidebar-guidance.php") ?>
<?php include("../function/function_Subject.php") ?>
<?php
	$data = new Data_subject();
	$id = $_GET['Subject_Code'];
	if (isset($_POST['update_subject'])) {
		$data->update_subject($id, $conn);
		echo"<script>location.replace('Subject.php');</script>";
	}
	$result = $data->get_subjectByID($id,$conn);

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
				<h3 class="tile-title">Edit Subject</h3>
				<hr>
				<div class="tile-body">
					<div class="container">
						<form class="form-horizontal" method="POST">

						<div class="form-group row">
								<label class="control-label col-md-2">Subject ID:</label>
								<div class="col-md-8">
									<input class="form-control  form-control-lg" type="text" readonly name="subjectCode" placeholder="Subject Code" required value="<?php echo $result -> Subject_Code ?>">
								</div>
							</div>

							<div class="form-group row">
								<label class="control-label col-md-2">Subject Description:</label>
								<div class="col-md-8">
									<input class="form-control  form-control-lg" type="text" name="subjectDescription" placeholder="Enter Subject Description" required value="<?php echo $result->Subject_Description ?>">
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
										<button class="btn btn-primary btn-lg" type="submit" name="update_subject"><i class="fa fa-fw fa-lg fa-check-circle"></i>Save</button>&nbsp;&nbsp;&nbsp;<a class="btn btn-secondary btn-lg" href="Subject.php"><i class="fa fa-fw fa-lg fa-times-circle"></i>Back</a>
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