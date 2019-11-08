<?php include("../include/header-guidance.php") ?>
<?php include("../include/sidebar-guidance.php") ?>
<?php include("../function/function_Subject.php") ?>
<?php include("../function/function_Department.php") ?>
<?php include("../function/function_Course.php") ?>
<?php
	$data = new Data_subject();
	$data1 = new Data_department();
	$data2 =  new Data_course();


	if (isset($_POST['add_subjectDetail'])) {
		$data->add_setSubjectDetail($conn);
		echo"<script>location.replace('SubjectDetail.php');</script>";
	}elseif (isset($_POST['update'])) {
		$data->update($id, $conn);	
		echo"<script>location.replace('SubjectDetail.php');</script>";
	}


	$subject = $data->get_subject($conn);
	$department = $data1->get_department($conn);
	$course = $data2->get_course($conn);

// 
?>
<main class="app-content">
	<div class="clearix"></div>
	<div class="col-md-12">
		<div class="col-md-12">
			<div class="tile">
				<h3 class="tile-title">Set Subject Detail</h3>
				
				<hr>
				<div class="tile-body">
					<div class="container">
						<form class="form-horizontal" method="POST">
							

							<div class="form-group row">
								<label for="inputEmail3" class="col-sm-2 col-form-label">Subject Offer:</label>
								<div class="col-sm-7">
									<select class="form-control form-control-md col-sm-11" id="inputSmall" name="subjectCode" required>
										
										<?php while($row = $subject->fetch_object() ):  ?>
										<option readonly  hidden value="">-- Set Subject --</option>
										<option value="<?php echo $row -> Subject_Code;?>">
											<?php echo $row->Subject_Code .' &nbsp;&nbsp; '.  $row->Subject_Description ;?>
										</option>
										<?php endwhile ?>
									</select>
								</div>
							</div>
							<hr>
							<div class="form-group row">
								<label for="inputEmail3" class="col-sm-2 col-form-label">Course:</label>
								<div class="col-sm-7">
									<select class="form-control form-control-md col-sm-11" id="inputSmall" name="course" required>
											<?php while($row2 = $course->fetch_object() ):  ?>
										<option readonly  hidden value="">-- Set Department --</option>
										<option value="<?php echo $row2 -> Course_ID;?>">
											<?php echo $row2->Course_Name ;?>
										</option>
										<?php endwhile ?>
									</select>
								</div>
							</div>
							<hr>
							<div class="form-group row">
								<label for="inputEmail3" class="col-sm-2 col-form-label">Department:</label>
								<div class="col-sm-7">
									<select class="form-control form-control-md col-sm-11" id="inputSmall" name="department" required>
										<?php while($row1 = $department->fetch_object() ):  ?>
										<option readonly  hidden value="">-- Set Department --</option>
										<option value="<?php echo $row1 -> Department_ID;?>">
											<?php echo $row1->Department_Name ;?>
										</option>
										<?php endwhile ?>
									</select>
								</div>
							</div>
							<div class="tile-footer">
								<div class="row">
									<div class="col-md-8 col-md-offset-3">
										<button class="btn btn-primary" type="submit" name="add_subjectDetail" id="add"><i class="fa fa-fw fa-lg fa-check-circle"></i>Save</button>&nbsp;&nbsp;&nbsp;<a class="btn btn-secondary" href="SubjectDetail.php"><i class="fa fa-fw fa-lg fa-arrow-circle-o-left"></i>Back</a>&nbsp;&nbsp;&nbsp;
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