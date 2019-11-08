<?php include("../include/header-guidance.php") ?>
<?php include("../include/sidebar-guidance.php") ?>
<style>
	.active{
		background-color: #00635a !important;
		color:#ffffff !important;
		cursor: pointer !important;
	}

	#student, #subject, #schedule, #faculty{
		cursor: pointer !important;
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
				<h3 class="tile-title">Add a Group of Courses</h3>
				<form class="form-horizontal" id="subForm" method="POST">
				
				<hr>
					<div class="form-group row">
						<label for="inputEmail3" class="col-sm-2 col-form-label">Course:</label>
							<input type="file" id="excelfile">
					</div>
							<div class="tile-footer">
								<div class="row">
									<div class="col-md-8 col-md-offset-3">
										<button class="btn btn-primary" type="button"  onclick="ExportToTable()" name="add_subjectDetail" id="add"><i class="fa fa-fw fa-lg fa-check-circle"></i>Save</button>&nbsp;&nbsp;&nbsp;<a class="btn btn-secondary" href="Course.php"><i class="fa fa-fw fa-lg fa-arrow-circle-o-left"></i>Back</a>&nbsp;&nbsp;&nbsp;
									</div>
									<div class="loader"></div>
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
<script>
			function ExportToTable() {  
			var regex = /^([a-zA-Z0-9\s_\\.\-:])+(.xlsx|.xls)$/; 
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
														url: '../function/processCourse.php',
														data: {course: JSON.stringify(element)},
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
															location.replace('Course.php');
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
