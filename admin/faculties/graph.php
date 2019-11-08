<?php
	include("../include/header-faculty.php");
	include("../include/sidebar-faculty.php");

      include("function/app.php");
      $data = new app();

      $id = $_SESSION['Faculty_ID'];

      $result = $data->getCurrentData($conn, $id);

      $finalArr = array();
      $arr1 = array();
      $arr2 = array();
      $arr3 = array();

      while ($row = $result -> fetch_object()) {
            $offerID = $row -> Subject_Offer_ID;
            $result2 = $data->getAllStudentsEvaluation($conn,$offerID);

            $row2 = $result2 -> fetch_object();
            
            if($row->Term_ID == 1){
                  array_push($arr1, $row2->average_rate);
            }
            else if($row->Term_ID == 2){
                  array_push($arr2, $row2->average_rate);
            }
            else if($row->Term_ID == 3){
                  array_push($arr3, $row2->average_rate); 
            }
      }
      if($arr1 != null){
            $res1 = array_sum($arr1) / count($arr1);
            array_push($finalArr, $res1);
      }
      else {
            array_push($finalArr, 0);
      }
      
      if($arr2 != null){
            $res2 = array_sum($arr2) / count($arr2);
            array_push($finalArr, $res2);
      }
      else {
            array_push($finalArr, 0);
      }
      
      if($arr3 != null){
            $res3 = array_sum($arr3) / count($arr3);
            array_push($finalArr, $res3);
      }
      else{
            array_push($finalArr, 0); 
      }
?>
<main class="app-content ">
	<div class="clearix">
		<div class="tile">
			<div class="row ">
				<div class="col-md-10 mx-auto">
					<div class="tile">
						<h3 class="tile-title">Improvements</h3>
						<div class="embed-responsive embed-responsive-16by9">
							<canvas class="embed-responsive-item" id="barChartDemo"></canvas>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</main>
<?php include("../include/footer-faculty.php") ?>
 <script type="text/javascript">
      let arr = [];

      arr.push(data)
      var data = {
      	labels: ["First Sem", "Second Sem", "Summer"],
      	datasets: [
      		{
      			label: "My Second dataset",
      			fillColor: "rgba(151,187,205,0.2)",
      			strokeColor: "rgba(151,187,205,1)",
      			pointColor: "rgba(151,187,205,1)",
      			pointStrokeColor: "#fff",
      			pointHighlightFill: "#fff",
      			pointHighlightStroke: "rgba(151,187,205,1)",
      			data: <?php echo json_encode($finalArr) ?>
      		}
      	]
      };
      var ctxb = $("#barChartDemo").get(0).getContext("2d");
      var barChart = new Chart(ctxb).Bar(data);
     
</script>
