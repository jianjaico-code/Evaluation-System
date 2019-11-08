<?php include("../include/header-guidance.php") ?>
<?php include("../include/sidebar-guidance.php") ?>
<?php include("../function/function_EvaluationSchedule.php") ?>
<?php
	$data = new Data_EvaltuationSchedule();
	$id = $_GET['Evaluation_ID'];

	if (isset($_POST['edit_Sched'])) {
		$data->update_evalSched($id , $conn);
		echo"<script>location.replace('EvaluationSchedule.php');</script>";
	}
	$result = $data->get_evaluationScheduleByID($id, $conn);

?>
<main class="app-content">
	<div class="clearix"></div>
	<div class="col-md-12">
		<div class="col-md-12">
			<div class="tile">
				<h3 class="tile-title"> Set New Evaluation Schedule</h3>
				<div class="alert alert-danger collapse hide text-center  <?php if(isset($error)) echo 'show';?>">
					<strong>Student ID exit </strong>Please fill another.
				</div>
				<hr>
				<div class="tile-body">
					<div class="container">
						
						<form class="form-horizontal" method="POST">
							
							<div class="form-group row">
								<label class="control-label col-md-2">Course ID:</label>
								<div class="col-md-8">
									<input class="form-control  form-control-lg" type="text" readonly name="evalID" placeholder="Course ID" required value="<?php echo $result->Evaluation_ID ?>">
								</div>
							</div>


							<div class="form-group row">
								<label class="control-label col-md-2">Set Evaluation:</label>
								<div class="col-md-8">
									<input class="form-control  form-control-lg" type="date" name="fromSchedule" placeholder="Enter Course Description" required value="<?php echo $result->Evaluation_ScheduleFrom  ?>">
								</div>
							</div>
							<div class="form-group row">
								<label class="control-label col-md-2">Last Evaluation:</label>
								<div class="col-md-8">
									<input class="form-control  form-control-lg" type="date" name="toSchedule" placeholder="Enter Course Description" required value="<?php echo $result->Evaluation_ScheduleTo  ?>">
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
						
							<div class="row">
								<div class="col-md-8 col-md-offset-3">
									<button class="btn btn-primary" type="submit" name="edit_Sched"   id="demoNotify""><i class="fa fa-fw fa-lg fa-check-circle"></i>Save</button>&nbsp;&nbsp;&nbsp;<a class="btn btn-secondary" href="EvaluationSchedule.php"><i class="fa fa-fw fa-lg fa-times-circle"></i>Back</a>
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