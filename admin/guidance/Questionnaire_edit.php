<?php include("../include/header-guidance.php") ?>
<?php include("../include/sidebar-guidance.php") ?>
<?php include("../function/function_Questionnaire.php") ?>
<?php include("../function/function_QueStandard.php") ?>
<?php
	$data = new Data_questionnaire();
	$data1 = new Data_queStandard();
	$id = $_GET['Question_ID'];

	
	if (isset($_POST['update_questionaire'])) {
		$data->update_questionnaire($id , $conn);
		echo"<script>location.replace('Questionnaire.php');</script>";
	}
	$result = $data->get_questionnaireByID($id, $conn);
	$standard = $data1 -> getStandard($conn);

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
				<h3 class="tile-title">Edit Questionnaire</h3>
				<hr>
				<div class="tile-body">
					<div class="container">
						<form class="form-horizontal" method="POST">

						<div class="form-group row">
								<label class="control-label col-md-2">Questionnaire ID:</label>
								<div class="col-md-8">
									<input class="form-control  form-control-lg" type="text"  readonly name="question" value="<?php echo $result->Evaluation_Item_ID ?>" required>
								</div>
							</div>

							<div class="form-group row">
								<label class="control-label col-md-2">Standard:</label>
								<div class="col-sm-8">
									<select class="form-control form-control-lg" id="inputSmall" name="standard" required>
									    <?php while($row1 = $standard->fetch_object() ):  ?>
									        <option value="<?php echo $row1->eval_cat_ID ?>" <?= $row1->eval_cat_ID == $result->eval_cat_ID ? 'selected' : '' ?>>
									            <?php echo $row1->eval_cat_name	; ?>
									        </option>
									    <?php endwhile; ?>
									</select>
								</div>
							</div>

							<div class="form-group row">
								<label class="control-label col-md-2">Questionnaire Description:</label>
								<div class="col-md-8">
									<textarea class="form-control form-control-lg" id="exampleTextarea" rows="3" name="description" placeholder="Enter Question Description"  required><?php echo $result->Evaluation_Item_Description ?>
									</textarea>
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
										<button class="btn btn-primary btn-lg" type="submit" name="update_questionaire"><i class="fa fa-fw fa-lg fa-check-circle"></i>Save</button>&nbsp;&nbsp;&nbsp;<a class="btn btn-secondary btn-lg" href="Questionnaire.php"><i class="fa fa-fw fa-lg fa-times-circle"></i>Back</a>
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