<?php include("../include/header-guidance.php") ?>
<?php include("../include/sidebar-guidance.php") ?>
<?php include("../function/function_Student.php") ?>
<?php include("../function/function_StudentTakenHandle.php") ?>
<?php
	$data1 = new Data_subjectTakenHandle();
	$data2 = new Data_students();

	$id = $_GET['Subject_Student_Taken'];

	if (isset($_POST['update_subject_taken_handle'])) {
		$data1->update_subjectTakenHandle($id, $conn);
		echo"<script>location.replace('SubjectTaken.php');</script>";
	}

	$subject = $data1->get_SubjectOffer($conn);
	$faculty = $data1->get_Teachers($conn);
	$students = $data2->get_students($conn);
	$result = $data1->get_subjectTakenHandleByID($id,$conn);
?>
<main class="app-content">
	<div class="clearix"></div>
	<div class="col-md-12">
		<div class="col-md-12">
			<div class="tile">
				<h3 class="tile-title">Edit a Tag Student</h3>
				<hr>
				<div class="tile-body">
					<div class="container">
						<form class="form-horizontal" method="POST">
							<div class="form-group row" hidden>
								<label for="inputEmail3" class="col-sm-2 col-form-label">Subject Offer ID:</label>
								<div class="col-sm-7">
									<input class="form-control col-sm-6" type="text"  name="subjectStudentTaken"  value="<?php echo $result->Subject_Student_Taken ?>" readonly>
								</div>
							</div>
							<hr>
							<div class="form-group row">
								<label for="inputEmail3" class="col-sm-2 col-form-label">Student:</label>
								<div class="col-sm-7">
									<select class="form-control form-control-md col-sm-12" id="inputSmall" name="students" required>
										<?php while($row1 = $students->fetch_object() ):  ?>
											<option value="<?php echo $row1->Student_ID ?>" <?= $row1->Student_ID === $result->Student_ID ? 'selected' : '' ?>>
											<?php echo $row1->Student_ID . ' &nbsp;&nbsp;' . $row1->Lastname . '&nbsp;&nbsp;' . $row1->Firstname . '&nbsp;&nbsp; ' . $row1->Middlename  ;?>
										<?php endwhile ?>
									</select>
								</div>
							</div>
							<hr>
							<div class="form-group row">
								<label for="inputEmail3" class="col-sm-2 col-form-label">Subject:</label>
								<div class="col-sm-7">
									<select class="form-control form-control-md col-sm-12" id="inputSmall" name="subject" required>
										<?php while($row2 = $subject->fetch_object() ):  ?>
											<option value="<?php echo $row2->Subject_Offer_ID ?>" <?= $row2->Subject_Offer_ID === $result->Subject_Offer_ID ? 'selected' : '' ?>>
											<?php echo $row2->Subject_Offer_ID . '&nbsp;&nbsp;&nbsp;&nbsp;'.  $row2->Subject_Code .'&nbsp;&nbsp;' . $row2->Subject_Description ;?>
										<?php endwhile ?>
									</select>
								</div>
							</div>
							<hr>
							<div class="form-group row">
								<label for="inputEmail3" class="col-sm-2 col-form-label">Professor:</label>
								<div class="col-sm-7">
									<select class="form-control form-control-md col-sm-12" id="inputSmall" name="teacher" required>
											<?php while($row3 = $faculty->fetch_object() ):  ?>
											<option value="<?php echo $row3->Faculty_ID ?>" <?= $row3->Faculty_ID === $result->Faculty_ID ? 'selected' : '' ?>>
											<?php echo $row3->Faculty_ID .'&nbsp;&nbsp;&nbsp;&nbsp;' . $row3->Faculty_Lastname .' &nbsp;&nbsp;' . $row3->Faculty_Firstname .' &nbsp;&nbsp;' . $row3->Faculty_Middlename;?>
										<?php endwhile ?>
									</select>
								</div>
							</div>
							<div class="tile-footer">
								<div class="row">
									<div class="col-md-8 col-md-offset-3">
										<button class="btn btn-primary" type="submit" name="update_subject_taken_handle" id="add"><i class="fa fa-fw fa-lg fa-check-circle"></i>Save</button>&nbsp;&nbsp;&nbsp;<a class="btn btn-secondary" href="SubjectTaken.php"><i class="fa fa-fw fa-lg fa-arrow-circle-o-left"></i>Back</a>&nbsp;&nbsp;&nbsp;
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