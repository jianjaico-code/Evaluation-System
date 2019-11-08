<?php include("include/header-student.php") ?>
<?php 

	$sql = "SELECT student.Student_ID, student.Firstname, student.Middlename,student.Lastname, student_course.Course_ID
		FROM student
        INNER JOIN student_course on student.Student_ID = student_course.Student_ID
        WHERE student_course.Student_ID = '".$_SESSION['Student_ID']."' ";
        $result2 =  $conn -> query($sql);
		$row = $result2 -> fetch_object();
        
  

	$q = "SELECT course.Course_ID, evaluation.Evaluation_ScheduleTo, evaluation.Evaluation_ScheduleFrom,  student.Student_ID, subject.Subject_Code, subject.Subject_Description, subject_taken_handle.Subject_Student_Taken, evaluation.Evaluation_ID, subject_offer.Faculty_ID, faculty.Faculty_Lastname, faculty.Faculty_Firstname, faculty.Faculty_Middlename, re_evaluate.Subject_Student_Taken as reSubTaken
			FROM subject_taken_handle
			LEFT JOIN re_evaluate on subject_taken_handle.Subject_Student_Taken = re_evaluate.Subject_Student_Taken
			INNER JOIN student on subject_taken_handle.Student_ID = student.Student_ID
			INNER JOIN subject_offer on subject_taken_handle.Subject_Offer_ID = subject_offer.Subject_Offer_ID
			INNER JOIN subject on subject_offer.Subject_Code = subject.Subject_Code
			INNER JOIN subject_detail on subject.Subject_Code = subject_detail.Subject_Code
			INNER JOIN course on subject_detail.Course_ID = course.Course_ID
			INNER JOIN evaluation on subject_taken_handle.Evaluation_ID = evaluation.Evaluation_ID
			INNER JOIN faculty on subject_offer.Faculty_ID = faculty.Faculty_ID
			WHERE student.Student_ID  = '".$_SESSION['Student_ID']."' ";
		$result =  $conn -> query($q);

 ?>
<div class="container body">
			<div class="table-responsive">
				<table class="table table-bordered">
					<thead id="student_info" >
						<tr>
							<th>
								<ul>
									<li>Student Name:</li>
									<li  class="font-weight-bold"><?php  echo $row -> Lastname.' '.$row -> Middlename .' ' .$row -> Firstname?></li>
								</ul>
							</th>
							<th>
								<ul>
									<li>Student Number:</li>
									<li  class="font-weight-bold"><?php echo $row -> Student_ID ?></li>
								</ul>
							</th>
							<th>
								<ul>
									<li>Course Code:</li>
									<li  class="font-weight-bold"><?php  echo $row -> Course_ID?></li>
								</ul>
							</th>
							
						</tr>
					</thead>
				</table>
				<table  class="table table-bordered">
					<thead class="text-center" id="data">
						<tr>
							<th>Course Code</th>
							<th>Subject Code</th>
							<th>Subject Name</th>
							<th>Instructor</th>
							<th>Evaluate</th>
						</tr>
					</thead>
					<tbody class="body_data">
						<?php 
							date_default_timezone_set('Asia/Manila');
							$dToday = date("Y-m-d");
							$dToday=date('Y-m-d', strtotime($dToday));

							
							while ($row1 = $result -> fetch_object()): 
							$currentSubTakenID = $row1 -> Subject_Student_Taken;
								
							$dataTo = $row1 -> Evaluation_ScheduleTo;
							$dataFrom = $row1 -> Evaluation_ScheduleFrom;

							$dateBegin = date('Y-m-d', strtotime($dataFrom));
							$dateEnd = date('Y-m-d', strtotime($dataTo));

							$reEval = $row1 -> reSubTaken;
						?>
						<?php if(($dToday >= $dateBegin) && ($dToday < $dateEnd) || $reEval) : ?>
						<tr>
							<td class="text-center"><?php echo $row1 -> Course_ID; ?></td>
							<td class="text-center"><?php echo $row1 -> Subject_Code; ?></td>
							<td class="text-center"><?php echo $row1 -> Subject_Description; ?></td>
							<td class="text-center"><?php echo $row1-> Faculty_Firstname .' &nbsp;&nbsp;'.  $row1-> Faculty_Middlename .'  &nbsp;&nbsp; '. $row1-> Faculty_Lastname ; ?></td>
							<td class="text-center">
							<?php 
							error_reporting(E_ALL & ~E_NOTICE);
							$res = "SELECT * FROM `student_evaluation` WHERE `Subject_Student_Taken` = $currentSubTakenID";
							$res = $conn->real_escape_string($res);
							$result3 =  $conn -> query($res);
							$data = $result3 -> fetch_object();
								if(!$data -> Subject_Student_Taken){
								 echo "<a class='btn btn-info btn-sm Evaluate' href='questionnaire.php?Subject_Student_Taken=$currentSubTakenID'>Evaluate</a>";
								}
								else{
									echo "Finished" .' '.$data -> dateEval ;
								}							
								
							?>
							</td>

						</tr>
						<?php endif; ?>
						<?php endwhile; ?>
					</tbody>
				</table>
			</div>
		</div>
		
		<br><hr>

<?php include("include/footer-student.php") ?>

