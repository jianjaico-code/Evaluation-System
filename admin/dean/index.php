<?php
	include("../include/header-dean.php");
	include("../include/sidebar-dean.php");
	include("function/function_Dean.php");
	
	$id = $_SESSION['Faculty_ID'];
	$data = new Data_dean();
	$sy = $data -> getSchoolYear($conn);
	$term = $data -> getSemester($conn);
	$eval_range = $data->getRange($conn);
	$dean = $data->get_DeanDep($conn, $id);

	$row = $dean -> fetch_object();
	$DeptID = $row -> Department_ID;
	
	if (isset($_POST['goButton'])) {
		$semester = $_POST['semester'];
		$schoolYear = $_POST['schoolYear'];

		$result = $data->get_DeanDetail($conn, $DeptID, $semester, $schoolYear);

	} 

	// $result = $data->get_DeanDetail($conn, $DeptID, null, null);

	

$totalData = array();
	
?>

<style>
		.btn-outline-primary:hover, .btn-outline-danger:hover{
		color: white !important;
	}
		.btn-sm{
			padding: 5px 30px;
		}
		.mt-4{
			margin-top: 29px !important;
		}
</style>
<main class="app-content">

	<div class="clearix">
	
	<?php 
			$arrOfRange = array();
			while($range = $eval_range -> fetch_object()){
				$obj = $range;
				array_push($arrOfRange, $obj);
			}
		?>
<!-- 		<div class="row">
			<div data-toggle="modal" data-target="#poor" class="rangeDiv col-sm-6 col-lg-3">
				<div class="widget-small primary coloured-icon"><i class="icon fa fa-users fa-3x"></i>
					<div class="info">
						<h6>Poor</h4>
					</div>
				</div>
			</div>
			<div data-toggle="modal" data-target="#fair" class="rangeDiv col-md-6 col-lg-3">
				<div class="widget-small info coloured-icon"><i class="icon fa fa-thumbs-o-up fa-3x"></i>
					<div class="info">
						<h6>Fair</h4>
					</div>
				</div>
			</div>
			<div data-toggle="modal" data-target="#satisfactory" class="rangeDiv col-md-6 col-lg-3">
				<div class="widget-small warning coloured-icon"><i class="icon fa fa-files-o fa-3x"></i>
					<div class="info">
						<h6>Satisfactory</h4>
					</div>
				</div>
			</div>
			<div data-toggle="modal" data-target="#excellent" class="rangeDiv col-md-6 col-lg-3">
				<div class="widget-small danger coloured-icon"><i class="icon fa fa-star fa-3x"></i>
					<div class="info">
						<h6>Excellent</h4>
					</div>
				</div>
			</div>
			
		</div> -->
		
		<div class="row">
			<div class="col-md-12">
				<div class="tile">
					<form method="POST">
						<div class="form-row">
							<div class="col-5">
								<label for="exampleFormControlSelect1">Semester:</label>
								<select class="form-control  form-control-lg" id="inputSmall" name="semester">
										<option readonly  hidden value="">-- Select A Semester --</option>
										<?php while($row2 = $term->fetch_object() ):  ?>
										<option value="<?php echo $row2->Term_ID ?>">
											<?php echo  $row2 ->Term_Name ?>
										</option>
										<?php endwhile; ?>
									</select>
							</div>
							<div class="col-5">
								<label for="exampleFormControlSelect1">School Year:</label>
								<select class="form-control  form-control-lg" id="inputSmall" name="schoolYear">
										<option readonly  hidden value="">-- Select A School Year --</option>
										<?php while($row1 = $sy->fetch_object() ):  ?>
										<option value="<?php echo $row1->SY_ID ?>">
											<?php echo  $row1 ->SY_Name ?>
										</option>
										<?php endwhile; ?>
									</select>
							</div>
							<div class="col-2">
								<button type="submit" class="btn btn-lg btn-primary mt-4 btn-block" name="goButton">GO</button>
							</div>
						</div>
					</form>
					<div ><br>
						<h4>Reports <?php echo $DeptID?></h4>
					</div>
					<hr>
					<div class="tile-body">
						<form method="POST">
							<input type="hidden"  id="activate" name="activate_stats">
							<div class="table-responsive">
							<?php if (isset($_POST['goButton'])):?>
								<table class="table table-hover table-bordered" >
									<thead>
										<tr>
											<th>ID</th>
											<th>Last Name</th>
											<th>First Name</th>
											<th>Middle Name</th>
											<th>Overall Total</th>
										</tr>
									</thead>
									<tbody>
									<?php  while ($res = $result -> fetch_object()):?>
										<tr>
											<td><?php echo $res->Faculty_ID?></td>
											<td><?php echo $res->Faculty_Lastname?></td>
											<td><?php echo $res->Faculty_Firstname?></td>
											<td><?php echo $res->Faculty_Middlename?></td>
											<td class="text-center"> <?php
												$totalRes = array();
												
												$result4 = $data->getAllTeacherData($conn, $res->Faculty_ID);
												while($res4 = mysqli_fetch_array($result4)){
													$aves = $res4['average_rate'];
													array_push($totalRes,$aves);
												}
												if($totalRes){
													$totalArray = array_sum($totalRes) / count($totalRes);
													$totalOverall = number_format($totalArray, 2, '.', '');
													echo "<h3>".$totalOverall."</h3>";
													array_push($totalData, $totalOverall);
												}
												else{ echo "<h5>No Evaluation Yet</h5>"; }
											?></td>
										</tr>
									<?php endwhile; ?>
									<tr>
										<td colspan="4" style="text-align: right"> <h3>Overall Total:</h3></td>
										<td>
											<?php
									$totalSet = array_sum($totalData) / count($totalData);
									$totalSetData = number_format($totalSet, 2, '.', '');
									echo "<h3 class ='text-center'> ".$totalSetData."</h3>";	

									foreach ($arrOfRange as $key) {
										if($totalSetData <= $key->range_from && $totalSetData >= $key->range_to){
											// echo "<h2>".$key->description."</h2>";
											}
										}
									?>
										</td>
									</tr>
									</tbody>
								</table>
								<?php endif;?>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</main>
	<?php include("../include/footer-guidance.php") ?>
<!-- 	<script>
	$('#tb1').DataTable({
	order: [],
	columnDefs: [ { orderable: true, targets: [3] } ]
	});
	</script> -->