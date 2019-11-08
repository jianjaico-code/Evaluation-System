<?php
	include("../include/header-dean.php");
	include("../include/sidebar-dean.php");
	include("function/function_viewReport.php");
	
	$data = new app();
?>
<style>
		.btn-outline-primary:hover, .btn-outline-danger:hover{
		color: white !important;
	}
		.btn-sm{
			padding: 5px 30px;
		}

		strong { 
		  font-size: 20px;
		}

</style>
<main class="app-content">
	<div class="row">
		<div class="col-md-12">
			<div class="tile">
				<?php
	
	$Subject_Offer_ID = $_GET['Subject_Offer_ID'];

	$arr = array();

	$cat1 = array();
	$cat2 = array();
	$cat3 = array();
	$cat4 = array();
	$cat5 = array();

	$result = $data->getCategoryTotal($conn,$Subject_Offer_ID);
	$result2 = $data->getCurrentComments($conn, $Subject_Offer_ID);
	$result3 = $data->getSpecificComments($conn, $Subject_Offer_ID);

	while($res = mysqli_fetch_array($result)){
		if($res['eval_cat_ID'] == 1){
			array_push($cat1,$res['Rating_ID']);
		}
		else if($res['eval_cat_ID'] == 2){
			array_push($cat2,$res['Rating_ID']);
		}
		else if($res['eval_cat_ID'] == 3){
			array_push($cat3,$res['Rating_ID']);
		}
		else if($res['eval_cat_ID'] == 4){
			array_push($cat4,$res['Rating_ID']);
		}
		else if($res['eval_cat_ID'] == 5){
			array_push($cat5, $res['Rating_ID']);
		}
	}

		$cat1Average = array_sum($cat1) / count($cat1);
		$cat2Average = array_sum($cat2) / count($cat2);
		$cat3Average = array_sum($cat3) / count($cat3);
		$cat4Average = array_sum($cat4) / count($cat4);
		$cat5Average = array_sum($cat5) / count($cat5);

		$round1 = number_format($cat1Average, 2, '.', '');
		$round2 = number_format($cat2Average, 2, '.', '');
		$round3 = number_format($cat3Average, 2, '.', '');
		$round4 = number_format($cat4Average, 2, '.', '');
		$round5 = number_format($cat5Average, 2, '.', '');		
?>
<?php
	$result4 = $data->getAllStudentsEvaluation($conn,$Subject_Offer_ID);
	while($res6 = mysqli_fetch_array($result4)){
		$ave = $res6['average_rate'];
		array_push($arr,$ave);
	}
	$average  = array_sum($arr) / count($arr);
	$averageRounded = number_format($average, 2, '.', '');
?>

<div class="container-fluid body">
	
	<div class="row">
		<div class="col-12">
			<!-- <h2 class="text-center">Evaluation Score</h2> -->
			<br>
			<div class="table-responsive">
				<table class="table table-bordered stick-top">
					<thead id="data">
						<tr>
							<th>Question Description</th>
							<th class="text-center">Score</th>
						</tr>
					</thead>
					<tbody class="body_data">
							<tr>
								<td>Professionalism:</td>
								<td class="text-center"> <?php echo $round1 ?></td>
							</tr>
							<tr>
								<td >Instructional Planning and Delivery:</td>
								<td class="text-center"><?php echo $round2 ?></td>
							</tr>
							<tr>
								<td >Student Engagement:</td>
								<td class="text-center"><?php echo $round3 ?></td>
							</tr>
							<tr>
								<td>Learning Environment:</td>
								<td class="text-center"><?php echo $round4 ?></td>
							</tr>
							<tr>
								<td>Assessment Skill:</td>
								<td class="text-center"><?php echo $round5 ?></td>
							</tr>
							<tr>
								<td><b>Total:</b></td>
								<td class="text-center"><strong><?php echo $averageRounded ?></strong></td>
							</tr>
					</tbody>
				</table>
			</div>


		</div>
		<div class="col-12"><br>
		<h1 class="text-center">General Comments</h1><br>
			<ul class="list-group">
			<?php while($res2 = mysqli_fetch_array($result2)): ?>

				<li class="list-group-item"><?php echo $res2['Comments'] ?></li>
			
			<?php endwhile;?>
			</ul>
		</div>

		<div  class="col-12"><br>
		<h1 class="text-center">Specific Comments</h1><br>
			<div class="table-responsive">
				<table class="table table-bordered stick-top">
					<thead class="text-center" id="data">
						<tr>
							<th>Question Description:</th>
							<th>Specific Comments</th>
						</tr>
					</thead>
					<?php while($res3 = mysqli_fetch_array($result3)): ?>
					<tbody class="body_data">
						<td width="55%"><?php echo $res3['Evaluation_Item_Description'] ?></td>
						<td><?php echo $res3['Comments'] ?></td>
					</tbody>
					<?php endwhile;?>	
				</table>
			</div>
		</div>
	</div>
</div>

<br>
<hr>
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