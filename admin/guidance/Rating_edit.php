<?php include("../include/header-guidance.php") ?>
<?php include("../include/sidebar-guidance.php") ?>
<?php include("../function/function_Questionnaire.php") ?>
<?php
	$data = new Data_questionnaire();
	$id = $_GET['Rating_ID'];

	if (isset($_POST['update_rating'])) {
		$data->update_rating($id , $conn);
		echo"<script>location.replace('Rating.php');</script>";
	}
	$result = $data->get_ratingByID($id, $conn);

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
				<h3 class="tile-title">Edit Rating</h3>
				<hr>
				<div class="tile-body">
					<div class="container">
						<form class="form-horizontal" method="POST">

						<div class="form-group row">
								<label class="control-label col-md-2">Rating ID:</label>
								<div class="col-md-8">
									<input class="form-control  form-control-lg" type="text" readonly name="ratingID" placeholder="Rating ID" requiredplaceholder="Enter Rating ID" value="<?php echo $result->Rating_ID ?>">
								</div>
							</div>

							<div class="form-group row">
								<label class="control-label col-md-2">Rating Description:</label>
								<div class="col-md-8">
									<input class="form-control  form-control-lg" type="text"  name="ratingDescription" placeholder="Enter Rating Description" required value="<?php echo $result->Rating_Description  ?>">
								</div>
							</div>


							<div class="form-group row">
								<label class="control-label col-md-2">Qualitative Description:</label>
								<div class="col-md-8">
									<input class="form-control  form-control-lg" type="text"  name="Qualitative_Description"  placeholder="Enter Qualitative Description" required  value="<?php echo $result->Qualitative_Description ?>">
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
										<button class="btn btn-primary btn-lg" type="submit" name="update_rating"><i class="fa fa-fw fa-lg fa-check-circle"></i>Save</button>&nbsp;&nbsp;&nbsp;<a class="btn btn-secondary btn-lg" href="Rating.php"><i class="fa fa-fw fa-lg fa-times-circle"></i>Back</a>
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