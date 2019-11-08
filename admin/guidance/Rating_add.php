<?php include("../include/header-guidance.php") ?>
<?php include("../include/sidebar-guidance.php") ?>
<?php include("../function/function_Questionnaire.php") ?>
<?php
	$data =  new Data_questionnaire();

	if (isset($_POST['add_rating'])) {
		$data->add_rating($_POST, $conn);
		echo"<script>location.replace('Rating.php');</script>";
	}

	// $q = "SELECT (Count(Department_ID) +1) AS max_id FROM department  ;";
	// 		$result = $conn -> query($q) ;
	// 		$row = $result ->fetch_assoc();
	// 		$Department_ID = $row['max_id'];

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
				<h3 class="tile-title">Add New Rating</h3>
				<div class="alert alert-danger collapse hide text-center  <?php if(isset($error)) echo 'show';?>">
					<strong>Rating ID exit </strong>Please fill another.
				</div>
				<hr>
				<div class="tile-body">
					<div class="container">
						<form class="form-horizontal" method="POST">

						<div class="form-group row">
								<label class="control-label col-md-2">Rating ID:</label>
								<div class="col-md-8">
									<input class="form-control  form-control-lg" type="text" name="ratingID" placeholder="Rating ID" requiredplaceholder="Enter Rating ID">
								</div>
							</div>

							<div class="form-group row">
								<label class="control-label col-md-2">Rating Description:</label>
								<div class="col-md-8">
									<input class="form-control  form-control-lg" type="text"  name="subject_ID" placeholder="Enter Rating Description" required>
								</div>
							</div>


							<div class="form-group row">
								<label class="control-label col-md-2">Qualitative Description:</label>
								<div class="col-md-8">
									<input class="form-control  form-control-lg" type="text"  name="subject_ID"  placeholder="Enter Qualitative Description" required>
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
							<div class="tile-footer">
								<div class="row">
									<div class="col-md-8 col-md-offset-3">
										<button class="btn btn-primary btn-lg" type="submit" name="add_rating"><i class="fa fa-fw fa-lg fa-check-circle"></i>Save</button>&nbsp;&nbsp;&nbsp;<a class="btn btn-secondary btn-lg" href="Rating.php"><i class="fa fa-fw fa-lg fa-times-circle"></i>Back</a>
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