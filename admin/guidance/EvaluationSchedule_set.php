<?php include("../include/header-guidance.php") ?>
<?php include("../include/sidebar-guidance.php") ?>
<?php include("../function/function_EvaluationSchedule.php") ?>
<?php
	$data = new Data_EvaltuationSchedule();
	
	if (isset($_POST['add_Schedule'])) {

		$data->set_Schedule($_POST, $conn);
		echo"<script>location.replace('EvaluationSchedule.php');</script>";
		 
	}
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
								<label class="control-label col-md-2">Set Evaluation:</label>
								<div class="col-md-8">
									<input class="form-control  form-control-lg" type="date"  name="setSchedule" placeholder="Course ID" required>
								</div>
							</div>


							<div class="form-group row">
								<label class="control-label col-md-2">Set Evaluation:</label>
								<div class="col-md-8">
									<input class="form-control  form-control-lg" type="date"  name="lastSchedule" placeholder="Course ID" required>
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

						
							<div class="row">
								<div class="col-md-8 col-md-offset-3">
									<button class="btn btn-lg btn-primary" type="submit" name="add_Schedule"   id="demoNotify""><i class="fa fa-fw fa-lg fa-check-circle"></i>Save</button>&nbsp;&nbsp;&nbsp;<a class="btn btn-lg btn-secondary" href="EvaluationSchedule.php"><i class="fa fa-fw fa-lg fa-times-circle"></i>Back</a>
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