<?php include("include/header-student.php") ?>
<?php
	$id = $_GET['Subject_Student_Taken'];
	$q = "SELECT course.Course_ID,  student.Student_ID, subject.Subject_Code,subject_taken_handle.Subject_Student_Taken, subject_offer.Subject_Offer_ID, subject.Subject_Description, evaluation.Evaluation_ID, faculty.Faculty_Lastname, faculty.Faculty_Firstname,faculty.Faculty_Middlename
			FROM student
			INNER JOIN subject_taken_handle on student.Student_ID = subject_taken_handle.Student_ID
			INNER JOIN subject_offer on subject_taken_handle.Subject_Offer_ID = subject_offer.Subject_Offer_ID
			INNER JOIN faculty on subject_offer.Faculty_ID = faculty.Faculty_ID
			INNER JOIN subject on subject_offer.Subject_Code = subject.Subject_Code
			INNER JOIN subject_detail on subject.Subject_Code = subject_detail.Subject_Code
			INNER JOIN course on subject_detail.Course_ID = course.Course_ID
			INNER JOIN evaluation ON subject_taken_handle.Evaluation_ID = evaluation.Evaluation_ID
        
			WHERE subject_taken_handle.Subject_Student_Taken  = '$id' ";
		$result =  $conn -> query($q);

		$q3 ="SELECT * from rating ORDER BY Rating_ID DESC;";
		$result3 =  $conn -> query($q3);

		
		$res = $result -> fetch_object();
		$evalID = $res -> Evaluation_ID;
		$subTakenID = $res -> Subject_Student_Taken;
		$subOfferID = $res -> Subject_Offer_ID;

		// alert($evalID);
		
	if (isset($_POST['submit'])) {
		$mes = $_POST['message'];
		$arr = array();

		$jio=mysqli_query($conn,"SELECT DISTINCT evaluation_sets.Evaluation_Item_ID , evaluation_item.Evaluation_Item_Description, evaluation_sets.Evaluation_Item_ID
		from evaluation_sets 
		INNER JOIN evaluation_item on evaluation_sets.Evaluation_Item_ID = evaluation_item.Evaluation_Item_ID
        INNER JOIN subject_offer on evaluation_sets.Term_ID = subject_offer.Term_ID and evaluation_sets.SY_ID = subject_offer.SY_ID
        WHERE evaluation_sets.Term_ID = subject_offer.Term_ID and evaluation_sets.SY_ID = subject_offer.SY_ID
 ")or die ("erorr");
		while(list($Evaluation_Item_ID,$Evaluation_Item_Description,$eval_cat_ID)=mysqli_fetch_array($jio))
		{
			$evl_val=$conn->real_escape_string($_POST['radio'.$Evaluation_Item_ID]);
			
		array_push($arr,$evl_val);
		mysqli_query($conn,"INSERT INTO `evaluation_rating`(`Evaluation_Rating_ID`,`Evaluation_Item_ID`,`Rating_ID`, `Subject_Student_Taken`) VALUES (null, '$Evaluation_Item_ID','$evl_val','$subTakenID')") or die (mysqli_error($connection));
		
		    
		}

		date_default_timezone_set('Asia/Manila');
		$dToday = date("Y-m-d");
		$dToday=date('Y-m-d', strtotime($dToday));
		$Status = 'Active';

		$average  = array_sum($arr) / count($arr);
		$averageRounded = number_format($average, 2, '.', '');
		
		$evalIDs = mysqli_real_escape_string($conn, $evalID);
		$subTakenIDs = mysqli_real_escape_string($conn, $subTakenID);
		$mess = mysqli_real_escape_string($conn, $mes);
		$averageRoundeds = mysqli_real_escape_string($conn, $averageRounded);
		
    	mysqli_query($conn, "INSERT INTO `student_evaluation`(`Student_Evaluation_ID`, `Evaluation_ID`, `Subject_Student_Taken`, `Comments`, `average_rate` , `dateEval`, `Status`) VALUES (null, '$evalIDs', '$subTakenIDs', '$mess', '$averageRoundeds', '$dToday', '$Status') ")or die (mysqli_error($connection));	
		echo"<script>location.replace('index.php');</script>";
	}	
?>
<style>
	input{
		margin: 5px !important;
	}
	
	.btnSpec{
		display:block;
	 	 height: 25px;
		  width: 25px;
		  border-radius: 50%;
		  border: 1px solid red;
	}
</style>
<div class="container-fluid body">
	<div class="table-responsive">
		<table class="table table-bordered">
			<thead id="student_info" >
			<?php //echo json_encode($res); ?>
				<tr>
					<th>
						<ul >
							<li>Subject Code:</li>
							<li  class="font-weight-bold"><?php echo $res -> Subject_Code; ?></li>
						</ul>
					</th>

					<th>
						<ul>
							<li>Subject Description:</li>
							<li  class="font-weight-bold"><?php echo $res -> Subject_Description; ?></li>
						</ul>
					</th>
					<th>
						<ul>
							<li>Professor:</li>
							<li  class="font-weight-bold"><?php echo $res -> Faculty_Firstname .' '.  $res -> Faculty_Middlename .' '.  $res -> Faculty_Lastname; ?></li>
						</ul>
					</th>
				</tr>
			</thead>
		</table>
		<form method="POST">
		<table class="table table-bordered stick-top">
			<thead class="text-center" id="data">
				<tr>
					<th class="text-center">Scale</th>
					<th>Rating</th>
					<th>Qualitative Description</th>
				</tr>
			</thead>
			<tbody class="body_data">
				<?php while ($row1 = $result3 -> fetch_object()): ?>
				<tr>
					<td class="text-center"><?php echo $row1 -> Rating_ID ?></td>
					<td class="text-center" style="width: 20%"><?php echo $row1 -> Rating_Description ?></td>
					<td><?php echo $row1 -> Qualitative_Description ?></td>
				</tr>
				<?php endwhile; ?>
				
			</tbody>
		</table>
		<table class="table table-bordered stick-top">
			<thead class="text-center" id="data">
				<tr>
					<th></th>
					<th>Questions</th>
					<th id="try">Rating</th>
					<th id="try"></th>
				</tr>
			</thead>
			<tbody class="body_data">
				<?php 
					$jio=mysqli_query($conn,"SELECT DISTINCT evaluation_sets.Evaluation_Item_ID , evaluation_item.Evaluation_Item_Description, evaluation_sets.Evaluation_Item_ID
						from evaluation_sets 
						INNER JOIN evaluation_item on evaluation_sets.Evaluation_Item_ID = evaluation_item.Evaluation_Item_ID
				        INNER JOIN subject_offer on evaluation_sets.Term_ID = subject_offer.Term_ID and evaluation_sets.SY_ID = subject_offer.SY_ID
				        WHERE evaluation_sets.Term_ID = subject_offer.Term_ID and evaluation_sets.SY_ID = subject_offer.SY_ID")or die ("error");
					$num = 1;
					while(list($Evaluation_Item_ID,$Evaluation_Item_Description,$eval_cat_ID)=mysqli_fetch_array($jio))
					{ ?>
						<tr>
						<td style="width:3%" class="text-center"><?php echo $num++."."; ?></td>
						<td><?php echo $Evaluation_Item_Description; ?> </td>
						
						<?php
							$q1 = "SELECT * FROM rating ORDER BY Rating_ID ASC";
							$r1 = $conn -> query($q1);
							echo "<td style='width:20%' class='text-center'>";
							
							while($row = $r1 -> fetch_object()){
								echo "<input style='height:17px; width:18px;' id='radio' type='radio' name='radio$Evaluation_Item_ID' value='" . $row -> Rating_ID . "' required>".$row -> Rating_ID;"";
							}
							echo "</td>";
						 ?>
						 <td>
							<div style="text-align: center;" >
								<button type="button" class="btnSpec" data-toggle="modal" data-target="#comment<?php echo $Evaluation_Item_ID ?>" title="Specific Comments">
									<i class="ion-ios-arrow-down"></i>
								</button>
							</div>
						 </td>
						</tr>

						<div class="modal fade" id="comment<?php echo $Evaluation_Item_ID ?>">
							<div class="modal-dialog modal-dialog-centered modal-lg">
							<div class="modal-content">
							
							
								<div class="modal-header">
								<h4 class="modal-title"><?php echo $Evaluation_Item_Description.'.' ?></h4>
								<button type="button" class="close" data-dismiss="modal">&times;</button>
								</div>

								<div class="modal-body">									
									<input type="hidden" value="<?php echo $Evaluation_Item_ID ?>" name="evalItemID" id="evalItemID">
									<input type="hidden" value="<?php echo $subTakenID ?>" name="subTakenID" id="subTakenID">	
									<textarea name="specificComment" id="specificComment<?php echo $Evaluation_Item_ID ?>" cols="105" rows="3"  placeholder="This just optional"></textarea>
									</div>
									<script>
										function mySpecificComment(id, target){
											$('#specComment<?php echo $Evaluation_Item_ID ?>').click(function(){
												var evalItemID = id;
												var subTakenID = $('#subTakenID').val();
												var specificComment = $('#specificComment<?php echo $Evaluation_Item_ID ?>').val();
												$.ajax({
													method:'POST',
													data:{
														evalItemID: evalItemID,
														subTakenID: subTakenID,
														specificComment: specificComment
													},
													url:"include/setData.php",
													success: function(result){
														console.log(result);
														$('#specComment<?php echo $Evaluation_Item_ID ?>').replaceWith("");	
														$('#specificComment<?php echo $Evaluation_Item_ID ?>').replaceWith("Already gave a specified Comment...");
													}
												})
											});
										}
									</script>
									
								<div class="modal-footer">
									<button type="submit" id="specComment<?php echo $Evaluation_Item_ID ?>" name="specComment<?php echo $Evaluation_Item_ID ?>" class="btn btn-primary" data-dismiss="modal">Submit</button>
								</div>
								<script>
									mySpecificComment('<?php echo $Evaluation_Item_ID ?>', 'imNotification-<?php echo $Evaluation_Item_ID ?>');
								</script>
							</div>
							</div>
					   </div>
					<?php } ?>			
			</tbody>
			<tfoot class="body_data">
			<tr>
				<td  colspan="4" >
					<div class="form-group">
						<textarea class="form-control" name="message" rows="4" required placeholder="Enter your comment here..."></textarea>
					</div>
				</td>
			</tr>
			<tr>
				<td colspan="4" class="text-center">
					<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
					 	Submit Evaluation
					</button>

					<div class="modal fade" id="exampleModal" role="dialog">
					<div class="modal-dialog">
						<div class="modal-content">
							<!-- Modal Header -->
							<div class="modal-header">
								<h4 class="modal-title">Confirmation</h4>
								<button type="button" class="close" data-dismiss="modal">&times;</button>
							</div>
							<!-- Modal body -->
							<div class="modal-body">
								<div class="alert alert-info" role="alert">
									Are you sure you want to proceed ?
								</div>
							</div>
							<!-- Modal footer -->
							<div class="modal-footer">
								<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
								<button type="submit" name="submit" class="btn btn-danger" name="active">Proceed</button>
							</div>
						</div>
					</div>
					</div>
				</td>

			</tr>
			</tfoot>
		</table>
		</form>
	</div>
</div>



<br>
<hr>
<?php include("include/footer-student.php") ?>
<script src="../js/ajax.js"></script>

