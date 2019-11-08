<?php include("../include/header-guidance.php") ?>
<?php include("../include/sidebar-guidance.php") ?>
<?php include("../function/function_Student.php") ?>
<?php include("../function/function_Course.php") ?>
<?php
	$data = new Data_students();
	$data1 =  new Data_course();
		
	if (isset($_POST['add_student'])) {

	$username = $_POST['studentID'];
	$course = $_POST['courseID'];
    $student = "SELECT Student_ID FROM student WHERE Student_ID = '$username' ";
	$r = $conn->query($student);
    $result = $r->fetch_object();
	if ($course == "") {
		$errorTwo = 1;
	}else if($result -> num_rows > 0) {
		$error = 1;
		}else{
		$data->add_student($_POST, $conn);
		$data->add_studentCourse($_POST, $conn);
		echo"<script>location.replace('Student.php');</script>";
	}
}

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
	.button{
		margin-left: 16px;
	}
</style>
<main class="app-content">
	<div class="clearix"></div>
	<div class="col-md-12">
			<div class="tile">
				<h3 class="tile-title">Add New Student</h3>
				<div class="alert alert-danger collapse hide text-center  <?php if(isset($error)) echo 'show';?>">
					<strong>Faculty ID exit </strong>Please fill another.
				</div>
				<div class="alert alert-warning collapse hide text-center  <?php if(isset($errorTwo)) echo 'show';?>">
					<strong>Didn't select Course </strong>Please fill another.
				</div>
				<hr>
				<div class="tile-body">
					<div class="container">
						<form class="form-horizontal" method="POST">
							<div class="form-group row">
								<label class="control-label col-md-2 pull-right">Student ID:</label>
								<div class="col-md-8">
									<input class="form-control  form-control-lg" type="text" placeholder="Enter Student ID" name="studentID" required>
								</div>
							</div>

							<div class="form-group row">
								<label class="control-label col-md-2">First Name</label>
								<div class="col-md-8">
									<input class="form-control  form-control-lg" type="text" placeholder="Enter Student First Name" name="firstName" required>
								</div>
							</div>
							<div class="form-group row">
								<label class="control-label col-md-2">Last Name</label>
								<div class="col-md-8">
									<input class="form-control  form-control-lg" type="text" placeholder="Enter Last name" name="lastName" required>
								</div>
							</div>
							<div class="form-group row">
								<label class="control-label col-md-2">Middle Name</label>
								<div class="col-md-8">
									<input class="form-control  form-control-lg" type="text" placeholder="Enter Middle name" name="middleName" required>
								</div>
							</div>
							
							<div class="form-group row">
								<label class="control-label col-md-2">Password</label>
								<div class="col-md-8">
									<input class="form-control  form-control-lg" type="password" placeholder="Enter Student Password" name="password" required>
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

					<div class="form-group row">
							<label for="inputEmail3" class="col-sm-2 col-form-label">Course:</label>
								<input type="hidden" name="courseID" id="courses" value="" required>
								<button type="button" class="btn btn-primary button" data-toggle="modal" data-target="#courseModal">
								Select a Course
								</button>
								<div class="col-sm-7">
									<div id="data2">Please choose a Course</div>
								</div>
							</div>
							<div class="tile-footer">
								<div class="row">
									<div class="col-md-8 col-md-offset-3">
										<button class="btn btn-primary btn-lg" type="submit" name="add_student"><i class="fa fa-fw fa-lg fa-check-circle"></i>Register</button>&nbsp;&nbsp;&nbsp;<a class="btn btn-secondary btn-lg" href="Student.php"><i class="fa fa-fw fa-lg fa-times-circle"></i>Back</a>
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