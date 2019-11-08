<?php include("../include/header-guidance.php") ?>
<?php include("../include/sidebar-guidance.php") ?>
<?php include("../function/function_Student.php") ?>
<?php include("../function/function_StudentTakenHandle.php") ?>
<?php include("../function/function_EvaluationSchedule.php") ?>
<?php
	$data1 = new Data_subjectTakenHandle();
	$data2 = new Data_students();
	$data3 = new Data_EvaltuationSchedule();

	if (isset($_POST['add_subjectDetail'])) {
		$data1->add_subjectTakenHandle($_POST,$conn);
		echo"<script>location.replace('SubjectTaken.php');</script>";
		$res = $_POST['students'];
		
	}elseif (isset($_POST['update'])) {
		$data->update($id, $conn);	
		echo"<script>location.replace('SubjectTaken.php');</script>";
	}

	$schedule = $data3->get_evaluationScheduleActive($conn);
	$subject = $data1->get_SubjectOffer($conn);
	$faculty = $data1->get_Teachers($conn);
	$students = $data2->get_students($conn);
?>
<style>
	.active{
		background-color: #00635a !important;
		color:#ffffff !important;
		cursor: pointer !important;
	}

	#student, #subject, #schedule, #faculty{
		cursor: pointer !important;
	}
</style>
<main class="app-content">
	<div class="clearix"></div>
	<div class="col-md-12">
		<div class="col-md-12">
			<div class="tile">
				<h3 class="tile-title">Enroll a Student</h3>
				<form class="form-horizontal" id="subForm" method="POST">
				
				<hr>
					<div class="form-group row">
						<label for="inputEmail3" class="col-sm-2 col-form-label">Student:</label>
							<input type="hidden" name="students" id="students" value="">
							<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#studentModal">
							Select a Student
							</button>
						<div class="col-sm-7">
							<div id="data">Please choose a Student</div>
						</div>
					</div>

					<div class="form-group row">
						<label for="inputEmail3" class="col-sm-2 col-form-label">Subject:</label>
							<input type="hidden" name="subject" id="subjects" value="">
							<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#subjectModal">
							Select a Subject
							</button>
						<div class="col-sm-7">
							<div id="data2">Please choose a Subject</div>
						</div>
					</div>

					<div class="form-group row">
						<label for="inputEmail3" class="col-sm-2 col-form-label">Schedule:</label>
							<input type="hidden" name="schedule" id="schedules" value="">
							<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#scheduleModal">
							Select a Shedule
							</button>
						<div class="col-sm-7">
							<div id="data3">Please choose a Schedule</div>
						</div>
					</div>
							
							<div class="tile-footer">
								<div class="row">
									<div class="col-md-8 col-md-offset-3">
										<button class="btn btn-primary" type="submit" name="add_subjectDetail" id="add"><i class="fa fa-fw fa-lg fa-check-circle"></i>Save</button>&nbsp;&nbsp;&nbsp;<a class="btn btn-secondary" href="SubjectTaken.php"><i class="fa fa-fw fa-lg fa-arrow-circle-o-left"></i>Back</a>&nbsp;&nbsp;&nbsp;
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


<div class="modal fade" id="studentModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Student</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
	  <div class="tile-body">
		<div class="container">
		
			<div class="form-group row">
				<label for="inputEmail3" class="col-sm-1 col-form-label"></label>
				<div class="col-sm-10">
		
				<div class="table-responsive">
				<table  class="table table-hover table-bordered" id="student">
					<thead>
						<tr>
							<th>Student ID</th>
							<th>Last Name</th>
							<th>First Name</th>
						</tr>
					</thead>
					<tbody>
						<?php  while ($row1 = $students -> fetch_object()): ?>
						<tr>
							<td><?php echo $row1->Student_ID?></td>
							<td><?php echo $row1->Lastname ?></td>
							<td><?php echo $row1->Firstname ?></td>
						</tr>
						<?php endwhile; ?>
					</tbody>
				</table>
				</div>
				</div>
				
			</div>
      </div>
	  </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
	        <button id="save" type="button"  class="btn btn-primary">Save changes</button>
	      </div>
	    </div>
	  </div>
	</div>
</div>



<div class="modal fade" id="subjectModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Subject</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
	  <div class="tile-body">
		<div class="container">
		
			<div class="form-group row">
				<label for="inputEmail3" class="col-sm-1 col-form-label"></label>
				
				<div class="col-sm-10">
		
				<div class="table-responsive">
				<table  class="table table-hover table-bordered test" id="subject">
					<thead>
						<tr>
							<th>Subject Offer ID</th>
							<th>Subject Code</th>
							<th>Subject Description</th>
							<th>Faculty</th>
						</tr>
					</thead>
					<tbody>
						<?php  while ($row2 = $subject -> fetch_object()): ?>
						<tr>
							<td class="text-center"><?php echo $row2->Subject_Offer_ID?></td>
							<td><?php echo $row2->Subject_Code ?></td>
							<td><?php echo $row2->Subject_Description ?></td>
							<td><?php echo $row2->Faculty_ID.'&nbsp;&nbsp; '. $row2->Faculty_Firstname.'&nbsp;&nbsp; '.$row2->Faculty_Lastname?></td>
						</tr>
						<?php endwhile; ?>
					</tbody>
				</table>
				</div>
				</div>
				
			</div>
	      </div>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
	        <button id="save2" type="button" class="btn btn-primary">Save changes</button>
	      </div>
	    </div>
	  </div>
	</div>
</div>


<div class="modal fade" id="scheduleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Schedule</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
	  <div class="tile-body">
		<div class="container">
		
			<div class="form-group row">
				<label for="inputEmail3" class="col-sm-1 col-form-label"></label>
				<div class="col-sm-10">
		
				<div class="table-responsive">
				<table class="table table-hover table-bordered" id="schedule">
					<thead>
						<tr>
							<th>ID</th>
							<th>From</th>
							<th>To</th>
						</tr>
					</thead>
					<tbody>
						<?php  while ($row3 = $schedule -> fetch_object()): ?>
						<tr>
							<td><?php echo $row3->Evaluation_ID?></td>
							<td><?php echo $row3->Evaluation_ScheduleFrom?></td>
							<td><?php echo $row3->Evaluation_ScheduleTo ?></td>
						</tr>
						<?php endwhile; ?>
					</tbody>
				</table>
				</div>
				</div>
				
			</div>
	      </div>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
	        <button id="save3" type="button" class="btn btn-primary">Save changes</button>
	      </div>
	    </div>
	  </div>
	</div>
</div>
<?php include("../include/footer-guidance.php") ?>
<script src="../../js/subjectAdd.js"></script>

