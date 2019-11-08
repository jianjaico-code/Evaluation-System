<?php include("../include/header-guidance.php") ?>
<?php include("../include/sidebar-guidance.php") ?>
<?php include("../function/function_Questionnaire.php") ?>
<?php
	$data = new Data_questionnaire();
	$idTerm = $_GET['Term_ID'];
	$idSy = $_GET['SY_ID'];
	$result = $data->get_evaluation_report($idTerm, $idSy, $conn);
	$result2 = $data -> get_listQuestionnaire($conn);
	$result3 = $data-> getEvaluationSched($conn);
	$num = 1;
?>
<style>
		.btn-outline-primary:hover, .btn-outline-danger:hover{
		color: white !important;
	}
		.btn{
			padding: 5px 60px;
		}

		.selected{
		background-color: #00635a !important;
		color:#ffffff !important;
		cursor: pointer !important;
	}

    #questionnaire2{
		cursor: pointer !important;
	}
</style>
	
	<main class="app-content">
		<div class="row">
			<div class="col-md-12">
				<div class="tile">
					<div >
					<h4>Sets of Questions</h4>
				</div>
				<div class="module-option clearfix">
				
						<div class="pull-left">
							<?php

								$row2 = $result3 -> fetch_object();

								date_default_timezone_set('Asia/Manila');
								$dToday = date("Y-m-d");
								$dToday = date('Y-m-d', strtotime($dToday));
							 

							 	
							 	$dataTo = $row2 -> Evaluation_ScheduleTo;
								$dataFrom = $row2 -> Evaluation_ScheduleFrom;				 	
				

								$dateBegin = date('Y-m-d', strtotime($dataFrom));
								$dateEnd = date('Y-m-d', strtotime($dataTo));
							
							 ?>
							 <?php if(($dToday >= $dateBegin) && ($dToday < $dateEnd)) : ?>
								<a data-toggle="modal" data-target="#questionModal" title="Add Group of Students"  class="btn btn-primary disabled text-white">Add Question</a>
							<?php else: ?>
								<a data-toggle="modal" data-target="#questionModal" title="Add Group of Students"  class="btn btn-primary text-white">Add Question</a>
							<?php endif; ?>
						</div>
						
						<div class="pull-right">
							<a href="Questionnaire_Add_Set.php" title="Add Group of Students"  class="btn btn-danger text-white">Back</a>
						</div>
						
					</div>
				
				<hr>
				<div class="tile-body">
				<input type="hidden" name="question" id="res" value="">
				<input type="hidden" name="sy" id="sy" value="<?php echo $idSy; ?>">
				<input type="hidden" name="term" id="term" value="<?php echo $idTerm; ?>">
					<form method="POST">
						<?php include("../modals/modal_confirm/modal_confirm.php") ?>


						<input type="hidden"  id="activate" name="activate_stats">
						<div class="table-responsive">
							<table class="table table-hover table-bordered" id="table1">
								<thead>
									<tr>
										<th>Questions ID</th>
										<th class="text-center">Description</th>
										<th></th>
									</tr>
								</thead>
								<tbody>

									<?php  while ($row = $result -> fetch_object()): ?>
									<tr>
										<td><?php echo $num++."."; ?></td>
										<td><?php echo $row->Evaluation_Item_Description ;?></td>
										<td><button class="btn btn-danger text-white">Remove</button></td>
										
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

<div class="modal fade" id="questionModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Questions</h5>
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
				<table  class="table table-hover table-bordered test" id="questionnaire2">
					<thead>
						<tr>
							<th>ID</th>
							<th>Question Description</th>
							<th>Category</th>
						</tr>
					</thead>
					<tbody>
						<?php  while ($row1 = $result2 -> fetch_object()): ?>
						<tr>
							<td><?php echo $row1->Evaluation_Item_ID ?></td>
							<td><?php echo $row1->Evaluation_Item_Description ?></td>
							<td><?php echo $row1->eval_cat_name ?></td>
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
	        <button id="saveNewQuest" type="button" class="btn btn-primary">Save changes</button>
	      </div>
	    </div>
	  </div>
	</div>
</div>
<?php include("../include/footer-guidance.php") ?>
<script src="../../js/subjectAdd.js"></script>