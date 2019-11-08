<?php include("../include/header-guidance.php") ?>
<?php include("../include/sidebar-guidance.php") ?>
<?php include("../function/function_SubjectOffer.php") ?>
<?php
	$data = new Data_subjectFaculty();
		if (isset($_POST['add_subject'])) {

			$faculty = $_POST['faculty'];
			 if ($faculty == 0) {
				$errorTwo = 1;
			}else{
				// $data->add_setSubjectFaculty($conn);
			}
// echo"<script>location.replace('SubjectOffer.php');</script>";
}


			
$subject = $data -> get_Subject($conn);
$sy = $data -> get_SY($conn);
$semester = $data -> get_semester($conn);
$faculty = $data -> get_Faculty($conn);
?>
<style type="text/css">
	.active{
		background-color: #00635a !important;
		color:#ffffff !important;
		cursor: pointer !important;
	}

	#subject, #faculty{
		cursor: pointer !important;
	}
	.button{
		margin-left: 16px;
	}
	.loader {
	  	border: 5px solid #f3f3f3;
	    border-top: 5px solid #3498db;
	    border-radius: 50%;
	    width: 50px;
	    margin-left: 50%;
	    display: none;
	    height: 50px;
	    animation: spin 2s linear infinite;
	}

	@keyframes spin {
	  0% { transform: rotate(0deg); }
	  100% { transform: rotate(360deg); }
	}

</style>
<main class="app-content">
	<div class="clearix"></div>
	<div class="col-md-12">
		<div class="col-md-12">
			<div class="tile">
				<h3 class="tile-title">Set Subject Offer	</h3>
				<div class="alert alert-warning collapse hide text-center  <?php if(isset($errorOne)) echo 'show';?>">
					<strong>Didn't select Subject </strong>Please fill another.
				</div>

				<div class="alert alert-warning collapse hide text-center  <?php if(isset($errorTwo)) echo 'show';?>">
					<strong>Didn't select Faculty </strong>Please fill another.
				</div>
				<hr>
				<div class="tile-body">
					<div class="container">
						<form class="form-horizontal" method="POST">
								<div class="form-group row">
								<label for="inputEmail3" class="col-sm-2 col-form-label">Subject:</label>
								<input class="button" type="file" id="excelfile">	
							</div>
							<hr>
							<div class="form-group row">
								<label for="inputEmail3" class="col-sm-2 col-form-label">Faculty:</label>
								<input type="hidden" name="faculty" id="faculties" value="">
								<button type="button" class="btn btn-primary button" data-toggle="modal" data-target="#facultyModal">
								Select a Faculty
								</button>
								<div class="col-sm-7">
									<div id="data2">Please choose a Faculty</div>
								</div>
							</div>
							<hr>
							<div class="form-group row">
								<label for="inputEmail3" class="col-sm-2 col-form-label">Term</label>
								<div class="col-sm-7">
									<select class="form-control form-control-lg" id="terms" name="term" required>
										<option readonly  hidden value="">-- Select A Semester --</option>
										<?php while ($row2 = $semester->fetch_object()): ?>
										<option value="<?php echo $row2->Term_ID ?>">
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
									<select class="form-control form-control-lg" id="schooYears" name="shoolYear" required>
										<option readonly  hidden value="">-- Select A School Year --</option>
										<?php while($row3 = $sy->fetch_object()):  ?>
										<option value=" <?php echo $row3->SY_ID; ?>">
										<?php echo $row3->SY_Name ?></option>
										<?php endwhile ?>
									</select>
								</div>
							</div>
							<hr>
							
							<div class="form-group row">
								<label class="control-label col-md-2 " >Select Status</label>
								<div class="col-md-7">
									<select class="form-control form-control-lg" id="statuss"  name="status" required>
										<option>Active</option>
										<option>Inactive</option>
									</select>
								</div>
							</div>
							<div class="tile-footer">
								<div class="row">
									<div class="col-lg-12 ">
										<div class="col-lg-10 col-md-offset-3">
											<button class="btn btn-primary" type="submit" onclick="ExportToTable()" name="add_subject"><i class="fa fa-fw fa-lg fa-check-circle"></i>Save</button>&nbsp;&nbsp;&nbsp;<a class="btn btn-secondary" href="SubjectOffer.php"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>
										</div>
										<div class="loader"></div>
									</div>
								</div>
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
											<?php  while ($row = $subject -> fetch_object()): ?>
											<tr>
												<td><?php echo $row->Subject_Code ?></td>
												<td><?php echo $row->Subject_Description ?></td>
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
					<button id="save1" type="button" class="btn btn-primary">Save changes</button>
				</div>
			</div>
		</div>
	</div>
</div>




<div class="modal fade" id="facultyModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Faculty</h5>
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
									<table  class="table table-hover table-bordered test" id="faculty">
										<thead>
											<tr>
												<th>Faculty ID</th>
												<th>Lastname</th>
												<th>Firstname</th>
												<th>Middlename</th>
											</tr>
										</thead>
										<tbody>
											<?php  while ($row1 = $faculty -> fetch_object()): ?>
											<tr>
												<td><?php echo $row1->Faculty_ID ?></td>
												<td><?php echo $row1->Faculty_Lastname ?></td>
												<td><?php echo $row1->Faculty_Firstname ?></td>
												<td><?php echo $row1->Faculty_Middlename ?></td>
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

<script>
	function ExportToTable() {  
	var regex = /^([a-zA-Z0-9\s_\\.\-:])+(.xlsx|.xls)$/; 
	var faculties = $("#faculties").val();
	var term = $("#terms option:selected").val()
	var shoolYear = $("#schooYears option:selected").val();
	var status = $("#statuss").find(":selected").text();

	if (regex.test($("#excelfile").val().toLowerCase())) {  
			var xlsxflag = false;
			if ($("#excelfile").val().toLowerCase().indexOf(".xlsx") > 0) {  
					xlsxflag = true;  
			}   
			if (typeof (FileReader) != "undefined") {  
					var reader = new FileReader();  
					reader.onload = function (e) {  
							var data = e.target.result;  
								
							if (xlsxflag) {  
									var workbook = XLSX.read(data, { type: 'binary' });  
							}  
							else {  
									var workbook = XLS.read(data, { type: 'binary' });  
							}  
							var sheet_name_list = workbook.SheetNames;  
							
							var cnt = 0; 
							sheet_name_list.forEach(function (y) { 
									if (xlsxflag) {  
											var exceljson = XLSX.utils.sheet_to_json(workbook.Sheets[y]);  
									}  
									else {  
											var exceljson = XLS.utils.sheet_to_row_object_array(workbook.Sheets[y]);
									}  
									if (exceljson.length > 0 && cnt == 0) {    
										exceljson.forEach(element => {
											$.ajax({
												type: 'POST',
												url: '../function/processSubjectOffer.php',
												data: {subject: JSON.stringify(element), fac: faculties, ter: term, sy: shoolYear, stat: status},
												dataType: 'json'
										})
										.done( function( data ) {
												console.log('done');
												console.log(data);
										});
											cnt++;  
										console.log(exceljson.length);
													if(exceljson.length == cnt){
														setTimeout(() => {
															location.replace('SubjectOffer.php');
															console.log(exceljson.length+ "---" + cnt);
														}, 5000);
													}
												});
												$(".loader").css("display", "block");
									}  
							});  
							}  
							if (xlsxflag) { 
									reader.readAsArrayBuffer($("#excelfile")[0].files[0]);  
							}  
							else {  
									reader.readAsBinaryString($("#excelfile")[0].files[0]);  
							}  
					}  
					else {  
							alert("Sorry! Your browser does not support HTML5!");  
					}  
			}  
			else {  
					alert("Please upload a valid Excel file!");  
			}  
	}
</script>
<?php include("../include/footer-guidance.php") ?>
<script src="../../js/subjectOffer.js"></script>