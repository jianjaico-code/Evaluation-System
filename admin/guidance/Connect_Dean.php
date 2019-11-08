<?php include("../include/header-guidance.php") ?>
<?php include("../include/sidebar-guidance.php") ?>
<?php include("../function/function_Faculty.php") ?>
<?php include("../function/function_Dean.php") ?>
<?php
	$data = new Data_faculty();
	$data1 = new Data_dean();
	

	if (isset($_POST['add_subjectDetail'])) {
		$data1->add_deanDetail($_POST,$conn);
		// echo"<script>location.replace('SubjectDetail.php');</script>";
	}elseif (isset($_POST['update'])) {
		$data->update($id, $conn);	
		// echo"<script>location.replace('SubjectDetail.php');</script>";
	}
	$faculty = $data->get_facultyActive($conn);
	$dean = $data1->get_deanActive($conn);

	$sy = $data1->getSchoolYear($conn);
	$term = $data1->getSemester($conn);
?>
<style>
	.active{
		background-color: #00635a !important;
		color:#ffffff !important;
		cursor: pointer !important;
	}
	#subject, #course, #department{
		cursor: pointer !important;
	}
</style>
<main class="app-content">
	<div class="clearix"></div>
	<div class="col-md-12">
		<div class="col-md-12">
			<div class="tile">
				<h3 class="tile-title">Set Connect Dean</h3>
				
				<hr>
				<div class="tile-body">
					<div class="container">
						<form class="form-horizontal" method="POST">
							<div class="form-group row">
								<label for="inputEmail3" class="col-sm-2 col-form-label">Dean:</label>
								<input type="hidden" name="dean_ID" id="subjects" value="">
								<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#subjectModal">
								Select a Dean
								</button>
								<div class="col-sm-7">
									<div id="data2">Please choose a Dean</div>
								</div>
							</div>
							<hr>
							<div class="form-group row">
								<label for="inputEmail3" class="col-sm-2 col-form-label">Faculty:</label>
								<input type="hidden" name="faculty_ID" id="courses" value="">
								<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#courseModal">
								Select a Faculty
								</button>
								<div class="col-sm-7">
									<div id="data3">Please choose a Faculty</div>
								</div>
							</div>
							<div class="form-group row">
								<label class="control-label col-md-2">Standard:</label>
								<div class="col-sm-8">
									<select class="form-control  form-control-lg" id="inputSmall" name="standard" required>
										<option readonly  hidden value="">-- Select A Standard --</option>
										<?php while($row1 = $sy->fetch_object() ):  ?>
										<?php echo json_encode($row1); ?>
										<option value="<?php echo $row1->SY_Name ?>">
											<?php echo  $row1 ->Sy_ ?>
										</option>
										<?php endwhile; ?>
									</select>
								</div>
							</div>
							<hr>
							
							
							<div class="tile-footer">
								<div class="row">
									<div class="col-md-8 col-md-offset-3">
										<button class="btn btn-primary" type="submit" name="add_subjectDetail" id="add"><i class="fa fa-fw fa-lg fa-check-circle"></i>Save</button>&nbsp;&nbsp;&nbsp;<a class="btn btn-secondary" href="Connect_deanReport.php"><i class="fa fa-fw fa-lg fa-arrow-circle-o-left"></i>Back</a>&nbsp;&nbsp;&nbsp;
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


<div class="modal fade" id="subjectModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Dean:</h5>
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
							<th>Dean ID</th>
							<th>Firstname</th>
							<th>Middlename</th>
							<th>Lastname</th>

						</tr>
					</thead>
					<tbody>
						<?php  while ($row1 = $dean -> fetch_object()): ?>
						<tr>
							<td><?php echo $row1->Dean_ID ?></td>
							<td><?php echo $row1->Firstname ?></td>
							<td><?php echo $row1->Middlename ?></td>
							<td><?php echo $row1->Lastname ?></td>
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




<div class="modal fade" id="courseModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Faculty:</h5>
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
				<table  class="table table-hover table-bordered test" id="course">
					<thead>
						<tr>
							<th>Faculty ID</th>
							<th>Firstname</th>
							<th>Middlename</th>
							<th>Lastname</th>
						</tr>
					</thead>
					<tbody>
						<?php  while ($row2 = $faculty -> fetch_object()): ?>
						<tr>
							<td><?php echo $row2->Faculty_ID ?></td>
							<td><?php echo $row2->Faculty_Firstname ?></td>
							<td><?php echo $row2->Faculty_Middlename ?></td>
							<td><?php echo $row2->Faculty_Lastname ?></td>
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
<script src="../../js/dean.js"></script>