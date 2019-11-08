<?php
	include("../include/header-guidance.php");
	include("../include/sidebar-guidance.php");
	include("../function/function_viewReport.php");

	$id = $_GET['Subject_Offer_ID'];
	
	$data = new app();
	$faculty = $data->getDataSubjectOffer($conn, $id);
	$facID = $faculty -> fetch_object();

	$process = $facID -> Process;
	if(isset($_POST['proceed'])) {
		$data->updateProcess($conn, $id);
		echo"<script>location.replace('index.php');</script>";
	}
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

		@media print {
		#noPrint {
   		 	display: none;
			}
  		@page {
  			 margin: 0; 
  			}
		body { 
			margin: 0.50cm; 
  			}
  			/**/
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

<div class="text-center"><img src="../assets/img/header.jpg" width="800" height="140" alt="" id="logo" > </div>
<div class="container-fluid body">
<br>
<div class="row">
	<div class="col-sm-6">
<b style="font-size: 16px"><?php echo $facID -> Faculty_Firstname .'&nbsp&nbsp'.  $facID -> Faculty_Middlename .'&nbsp&nbsp'.  $facID -> Faculty_Lastname?></b><br>
<?php echo $facID -> Subject_Code  .' &nbsp&nbsp'. $facID -> Subject_Description ?><br>
<?php echo $facID -> Term_Name?><br>
<?php echo $facID -> SY_Name?><br>
	</div>

	<div class="col-sm-6">
		<button class="float-right btn btn-primary btn-lg" id="noPrint" onclick="myFunction()">Print Report</button>
		<a style="margin-right: 10px;" href="view_report.php?Subject_Offer_ID=<?php echo $id;?>" title="Back" class="btn btn-primary btn-lg float-right"id="noPrint">Back</a>
	</div>
</div>
			
	<div class="row">
		<div class="col-12">
			<!-- <h2 class="text-center">Evaluation Score</h2> -->


			<br>
			<div class="table-responsive">
				<table id="myTb" class="table table-bordered stick-top">
					<thead id="data">
						<tr>
							<th>Standards</th>
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

		<div  class="col-12"><br>
		<h1 class="text-center">General Comments</h1><br>
			<div class="table-responsive">
				<table class="table table-bordered stick-top">
					<thead class="text-center" id="data">
						<tr>
							<th>Comments:</th>
						</tr>
					</thead>
					<?php while($res2 = mysqli_fetch_array($result2)): ?>
					<tbody class="body_data">
						<td width="90%"><?php echo $res2['Comments'] ?></td>
					</tbody>
					<?php endwhile;?>	
				</table>
			</div>
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
function exportData(){
	var tab_text="<table border='2px'><tr bgcolor='#87AFC6'>";
    var textRange; var j=0;
    tab = document.getElementById('myTb'); // id of table

    for(j = 0 ; j < tab.rows.length ; j++) 
    {     
        tab_text=tab_text+tab.rows[j].innerHTML+"</tr>";
        tab_text=tab_text+"</tr>";
    }

    tab_text=tab_text+"</table>";
    tab_text= tab_text.replace(/<A[^>]*>|<\/A>/g, "");//remove if u want links in your table
    tab_text= tab_text.replace(/<img[^>]*>/gi,""); // remove if u want images in your table
    tab_text= tab_text.replace(/<input[^>]*>|<\/input>/gi, ""); // reomves input params

    var ua = window.navigator.userAgent;
    var msie = ua.indexOf("MSIE "); 

    if (msie > 0 || !!navigator.userAgent.match(/Trident.*rv\:11\./))      // If Internet Explorer
    {
        txtArea1.document.open("txt/html","replace");
        txtArea1.document.write(tab_text);
        txtArea1.document.close();
        txtArea1.focus(); 
        sa=txtArea1.document.execCommand("SaveAs",true,"Say Thanks to Sumit.xls");
    }  
    else                 //other browser not tested on IE 11
        sa = window.open('data:application/vnd.ms-excel,' + encodeURIComponent(tab_text));  

    return (sa);
}

$('#tb1').DataTable({
order: [],
columnDefs: [ { orderable: true, targets: [3] } ]
});

function myFunction() {
  window.print();
}
</script>