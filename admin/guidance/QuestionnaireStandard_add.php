<?php include("../include/header-guidance.php") ?>
<?php include("../include/sidebar-guidance.php") ?>
<?php include("../function/function_QueStandard.php") ?>
<?php
	$data = new Data_queStandard();
	if (isset($_POST['add_QueStan'])) {
		$standardID = $_POST['standardID'];
   	 	$q = "SELECT Evaluation_Item_ID FROM evaluation_item WHERE Evaluation_Item_ID = '$standardID' ";
		$result = $conn -> query($q);

		if ($result -> num_rows > 0) {
			$error = 1;
		}else{

		$data->add_queStandard($post, $conn);
		echo"<script>location.replace('QuestionnaireStandard.php');</script>";
		}
}

	
	// $result = $data -> get_addQuestionnaire($conn);

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
				<h3 class="tile-title">Add New Standard</h3>
				<div class="alert alert-danger collapse hide text-center  <?php if(isset($error)) echo 'show';?>">
					<strong>Standard ID exist </strong>Please fill another.
				</div>
				<hr>
				<div class="tile-body">
					<div class="container">
						<form class="form-horizontal" method="POST">

						<div class="form-group row">
								<label class="control-label col-md-2"> Standard ID:</label>
								<div class="col-md-8">
									<input class="form-control  form-control-lg" type="text" name="standardID" placeholder="Enter Standard ID"required>
								</div>
							</div>

							<div class="form-group row">
								<label class="control-label col-md-2">Standard Description:</label>
								<div class="col-md-8">
									<input class="form-control  form-control-lg" type="text" name="standardDescription" placeholder="Enter Question Standard Description" required>
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
										<button class="btn btn-primary btn-lg" type="submit" name="add_QueStan"><i class="fa fa-fw fa-lg fa-check-circle"></i>Save</button>&nbsp;&nbsp;&nbsp;<a class="btn btn-secondary btn-lg" href="QuestionnaireStandard.php"><i class="fa fa-fw fa-lg fa-times-circle"></i>Back</a>
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