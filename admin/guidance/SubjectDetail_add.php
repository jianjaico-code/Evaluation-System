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
	$subject = $data->get_SubjectAtive($conn);
	$department = $data1->get_departmentAtive($conn);
	$course = $data2->get_courseActive($conn);
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
				<h3 class="tile-title">Set Subject Detail</h3>
				
				<hr>
				<div class="tile-body">
					<div class="container">
						<form class="form-horizontal" method="POST">
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
							<hr>
							<div class="form-group row">
								<label for="inputEmail3" class="col-sm-2 col-form-label">Course:</label>
								<input type="hidden" name="course" id="courses" value="">
								<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#courseModal">
								Select a Course
								</button>
								<div class="col-sm-7">
									<div id="data3">Please choose a Course</div>
								</div>
							</div>
							<hr>
							<div class="form-group row">
								<label for="inputEmail3" class="col-sm-2 col-form-label">Department:</label>
								<input type="hidden" name="department" id="departments" value="">
								<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#departmentModal">
								Select a Department
								</button>
								<div class="col-sm-7">
									<div id="data4">Please choose a Department</div>
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
							<th>Subject Code</th>
							<th>Subject Description</th>
						</tr>
					</thead>
					<tbody>
						<?php  while ($row1 = $subject -> fetch_object()): ?>
						<tr>
							<td><?php echo $row1->Subject_Code ?></td>
							<td><?php echo $row1->Subject_Description ?></td>
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
        <h5 class="modal-title" id="exampleModalLabel">Course</h5>
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
							
							<th>Course Code</th>
							<th>Course Description</th>
						</tr>
					</thead>
					<tbody>
						<?php  while ($row2 = $course -> fetch_object()): ?>
						<tr>
							<td><?php echo $row2->Course_ID ?></td>
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
	        <button id="save3" type="button" class="btn btn-primary">Save changes</button>
	      </div>
	    </div>
	  </div>
	</div>
</div>



<div class="modal fade" id="departmentModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Department</h5>
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
				<table  class="table table-hover table-bordered test" id="department">
					<thead>
						<tr>
							
							<th>Course Code</th>
							<th>Course Description</th>
						</tr>
					</thead>
					<tbody>
						<?php  while ($row3 = $department -> fetch_object()): ?>
						<tr>
							<td><?php echo $row3->Department_ID ?></td>
							<td><?php echo $row3->Department_Name ?></td>
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
	        <button id="save4" type="button" class="btn btn-primary">Save changes</button>
	      </div>
	    </div>
	  </div>
	</div>
</div>




<?php include("../include/footer-guidance.php") ?>
<script src="../../js/subjectDetail_add.js"></script>