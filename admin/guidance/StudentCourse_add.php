<?php include("../include/header-guidance.php") ?>
<?php include("../include/sidebar-guidance.php") ?>
<?php include("../function/function_Student.php") ?>
<?php include("../function/function_Course.php") ?>
<?php
	$data = new Data_students();
	$data1 =  new Data_course();
	if (isset($_POST['add_studentCourse'])) {
		$data->add_studentCourse($_POST, $conn);
		
// echo"<script>location.replace('StudentCourse.php');</script>";
}
$student = $data->get_students($conn);
$course = $data1->get_course($conn);
?>
<style>
	.active{
		background-color: #00635a !important;
		color:#ffffff !important;
		cursor: pointer !important;
	}
	#student, #course{
		cursor: pointer !important;
	}
</style>
<main class="app-content">
	<div class="clearix"></div>
	<div class="col-md-12">
		<div class="col-md-12">
			<div class="tile">
				<h3 class="tile-title">Set Student Course</h3>
				<hr>
				<div class="tile-body">
					<div class="container">
						<form class="form-horizontal" method="POST">
							<div class="form-group row">
								<label for="inputEmail3" class="col-sm-2 col-form-label">Student:</label>
								<input type="hidden" name="studentID" id="students" value="">
								<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#studentModal">
								Select a Student
								</button>
								<div class="col-sm-7">
									<div id="data">Please choose a Student</div>
								</div>
							</div>
							<hr>
							
							<div class="form-group row">
								<label for="inputEmail3" class="col-sm-2 col-form-label">Course:</label>
								<input type="hidden" name="courseID" id="courses" value="">
								<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#courseModal">
								Select a Course
								</button>
								<div class="col-sm-7">
									<div id="data2">Please choose a Course</div>
								</div>
							</div>
							<div class="tile-footer">
								<div class="row">
									<div class="col-md-8 col-md-offset-3">
										<button class="btn btn-primary" type="submit" name="add_studentCourse" id="add"><i class="fa fa-fw fa-lg fa-check-circle"></i>Save</button>&nbsp;&nbsp;&nbsp;<a class="btn btn-secondary" href="StudentCourse.php"><i class="fa fa-fw fa-lg fa-arrow-circle-o-left"></i>Back</a>&nbsp;&nbsp;&nbsp;
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
						<label for="inputEmail3" class="col-sm-2 col-form-label">Student:</label>
						<div class="col-sm-8">
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
										<?php  while ($row1 = $student -> fetch_object()): ?>
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
<div class="modal fade" id="courseModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog modal-lg" role="document">
	<div class="modal-content">
		<div class="modal-header">
			<h5 class="modal-title" id="exampleModalLabel">Course</h5>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			<span aria-hidden="true">&times;</span>
			</button>
		</div>
		<div class="modal-body">
			<div class="tile-body">
				<div class="container">
					<div class="form-group row">
						<label for="inputEmail3" class="col-sm-2 col-form-label">Course:</label>
						<div class="col-sm-8">
							<div class="table-responsive">
								<table  class="table table-hover table-bordered" id="course">
									<thead>
										<tr>
											<th>Course ID</th>
											<th>Course Name</th>
										</tr>
									</thead>
									<tbody>
										<?php  while ($row2 = $course -> fetch_object()): ?>
										<tr>
											<td><?php echo $row2->Course_ID?></td>
											<td><?php echo $row2->Course_Name ?></td>
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
				<button id="save2" type="button"  class="btn btn-primary">Save changes</button>
			</div>
		</div>
	</div>
</div>
</div>



<?php include("../include/footer-guidance.php") ?>
<script src="../../js/studentCourse_add.js"></script>