<?php
	include("../include/header-guidance.php");
	include("../include/sidebar-guidance.php");
	include("../function/function_Guidance.php");

	$data = new funcGuidance();
	$result = $data->getAllTeacher($conn);
	$eval_range = $data->getRange($conn);
	

	
?>
<style>
		.btn-outline-primary:hover, .btn-outline-danger:hover{
		color: white !important;
	}
		.btn-sm{
			padding: 5px 30px;
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
		<div class="row">
			<div data-toggle="modal" data-target="#poor" class="rangeDiv col-sm-6 col-lg-3">
				<div class="widget-small danger coloured-icon"><i class="icon fa fa-frown-o fa-3x"></i>
					<div class="info">
						<h6>Poor</h4>
					</div>
				</div>
			</div>
			<div data-toggle="modal" data-target="#fair" class="rangeDiv col-md-6 col-lg-3">
				<div class="widget-small warning coloured-icon"><i class="icon fa fa-meh-o fa-3x"></i>
					<div class="info">
						<h6>Fair</h4>
					</div>
				</div>
			</div>
			<div data-toggle="modal" data-target="#satisfactory" class="rangeDiv col-md-6 col-lg-3">
				<div class="widget-small info coloured-icon"><i class="icon fa fa-smile-o fa-3x"></i>
					<div class="info">
						<h6>Satisfactory</h4>
					</div>
				</div>
			</div>
			<div data-toggle="modal" data-target="#excellent" class="rangeDiv col-md-6 col-lg-3">
				<div class="widget-small primary coloured-icon"><i class="icon fa fa-star-o fa-3x"></i>
					<div class="info">
						<h6>Excellent</h4>
					</div>
				</div>
			</div>
			
		</div>
		
		<div class="row">
			<div class="col-md-12">
				<div class="tile">
					<div >
						<h4>Reports</h4>
					</div>
					<hr>
					<div class="tile-body">
						<form method="POST">
							<input type="hidden"  id="activate" name="activate_stats">
							<div class="table-responsive">
								<table class="table table-hover table-bordered" id="tb1">
									<thead>
										<tr>
											<th>ID</th>
											<th>Last Name</th>
											<th>First Name</th>
											<th>Middle Name</th>
											<th>Position</th>
											<th>Subjects No.</th>
											<th></th>
											<th></th>
										</tr>
									</thead>
									
									
									<tbody>
									<?php  while ($res = $result -> fetch_object()):?>
										<tr>
											<td><?php echo $res->Faculty_ID?></td>
											<td><?php echo $res->Faculty_Lastname?></td>
											<td><?php echo $res->Faculty_Firstname?></td>
											<td><?php echo $res->Faculty_Middlename?></td>
											<td><?php echo $res->Position?></td>
											<?php
												$result2 = $data->getCurrentData($conn, $res->Faculty_ID);
												$res2 = mysqli_fetch_array($result2);
												$count = mysqli_num_rows($result2);
												if($count > 0){
													echo "<td style='text-align: center'>".$count."</td>";
												}
												else{echo "<td style='text-align: center'>N/A</td>";}	
											?>
											<td class="text-center"><?php 
													$totalRes = array();
													$result4 = $data->getAllTeacherData($conn, $res->Faculty_ID);
													while($res4 = mysqli_fetch_array($result4)){
														$aves = $res4['average_rate'];
														array_push($totalRes,$aves);
													}
													if($totalRes){
														$totalArray = array_sum($totalRes) / count($totalRes);
														$totalOverall = number_format($totalArray, 2, '.', '');
														foreach ($arrOfRange as $key) {
															// if($totalOverall <= $key->range_from && $totalOverall >= $key->range_to){
															// 	echo "<h5>".$key->description."</h5>";
															// }
															if($totalOverall <= $key->range_from && $totalOverall >= $key->range_to){
																// echo $key->id;

																if ($key->id == 1) {
																	echo "<i class=' text-danger icon fa fa-frown-o fa-3x'></i>";
																}elseif ($key->id == 2) {
																	echo "<i class='icon text-warning fa fa-meh-o fa-3x'></i>";
																}elseif ($key->id == 3) {
																	echo "<i class='icon fa text-info fa-smile-o fa-3x'></i>";
																}elseif ($key->id == 4) {
																	echo "<i class='text-success icon fa fa-star-o fa-3x'></i>";
																}													
															}
														}
												}
												else{ echo "<h5>N/A</h5>"; }



												 ?></td>
											<td class="text-center"><a  class="btn  btn-primary" href="index_record.php?Faculty_ID=<?php echo $res->Faculty_ID;?>">View Details</a></td>
										</tr>
									<?php endwhile; ?>
									</tbody>
								</table>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</main>
	<?php include("../include/footer-guidance.php") ?>
	<script>
	$('#tb1').DataTable({
	order: [],
	columnDefs: [ { orderable: true, targets: [3] } ]
	});
	</script>