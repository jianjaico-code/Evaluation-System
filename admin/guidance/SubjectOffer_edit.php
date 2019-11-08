<?php include("../include/header-guidance.php") ?>
<?php include("../include/sidebar-guidance.php") ?>
<?php include("../function/function_SubjectOffer.php") ?>
<?php
	$data = new Data_subjectFaculty();
	$id = $_GET['Subject_Offer_ID'];

	if (isset($_POST['update_facultySubjectList'])) {
		$data->update_setSubjectFaculty($id, $conn);
		echo"<script>location.replace('SubjectOffer.php');</script>";
	}

	$subject = $data->get_Subject($conn);
	$sy = $data->get_SY($conn);
	$semester = $data->get_semester($conn);
	$result = $data->get_subjectProffesorListByID($id,$conn);
	?>
<main class="app-content">
	<div class="clearix"></div>
	<div class="col-md-12">
		<div class="col-md-12">
			<div class="tile">
				<h3 class="tile-title">Update Professor Subject</h3>
				<hr>
				<div class="tile-body">
					<div class="container">
						<form class="form-horizontal" method="POST">
							<div class="form-group row">
								<!-- <label for="inputEmail3" class="col-sm-2 col-form-label">Subject Offer ID:</label> -->
								<div class="col-sm-7">
									<input class="form-control col-sm-6" type="hidden" placeholder="Enter Subject Offer ID" name="subject_offerID" required value="<?php echo $result->Subject_Offer_ID ?>" readonly>
								</div>
							</div>
							<div class="form-group row">
								<label for="inputEmail3" class="col-sm-2 col-form-label">Subject</label>
								<div class="col-sm-7">
									<select class="form-control  form-control-md col-sm-8" id="inputSmall" name="subject" required>
									    <?php while($row1 = $subject->fetch_object() ):  ?>
									        <option value="<?php echo $row1->Subject_Code ?>" <?= $row1->Subject_Code === $result->Subject_Code ? 'selected' : '' ?>>
									            <?php echo $row1->Subject_Code.' &nbsp;&nbsp; '.$row1->Subject_Description; ?>
									        </option>
									    <?php endwhile; ?>
									</select>
								</div>
							</div>
							<hr>
							<div class="form-group row">
								<label for="inputEmail3" class="col-sm-2 col-form-label">Term</label>
								<div class="col-sm-7">
									<select class="form-control form-control-md col-sm-8" id="inputSmall" name="term">
										<?php while ($row2 = $semester->fetch_object()): ?>
										<option value="<?php echo $row2->Term_ID ?>" <?= $row2->Term_ID == $result->Term_ID ? 'selected' : '' ?>>
											<?php echo $row2->Term_Name; ?>
										</option>
										<?php endwhile; ?>
									</select>
								</div>
							</div>
							<hr>
							<div class="form-group row">
								<label for="inputEmail3" class="col-sm-2 col-form-label">SchoolYear</label>
								<div class="col-sm-7">
									<select class="form-control form-control-md col-sm-8" id="inputSmall" name="shoolYear">
								
										<?php while($row3 = $sy->fetch_object()):  ?>
										<option value=" <?php echo $row3->SY_ID; ?>"> 
											<?php echo $row3->SY_Name ?></option>
										<?php endwhile ?>
									</select>
								</div>
							</div>
							<div class="tile-footer">
								<div class="row">
									<div class="col-lg-12 ">
										<div class="col-lg-10 col-md-offset-3">
											<button class="btn btn-primary" type="submit" name="update_facultySubjectList"><i class="fa fa-fw fa-lg fa-check-circle"></i>Save</button>&nbsp;&nbsp;&nbsp;<a class="btn btn-secondary" href="SubjectOffer.php"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</main>
<?php include("../include/footer-guidance.php") ?>