<?php include("../include/header-guidance.php") ?>
<?php include("../include/sidebar-guidance.php") ?>
<?php include("../function/function_Questionnaire.php") ?>

<?php
    $data = new Data_questionnaire();
    $result = $data -> get_listQuestionnaire($conn);
    $sy = $data -> get_SY($conn);
    $term = $data -> get_semester($conn);

    if (isset($_POST['addSet'])) {
    	$term_id = $_POST['term'];
    	$sy_id = $_POST['shoolYear'];
		$sql = "SELECT * FROM evaluation_sets WHERE Term_ID = '$term_id' and SY_ID = '$sy_id' ";
		$result = $conn -> query($sql);

		if ($result -> num_rows > 0) {
			$error = 1;
		}else{
        $data->add_question_set($_POST,$conn);
		}
	}
?>
<style>
	.selected{
		background-color: #00635a !important;
		color:#ffffff !important;
		cursor: pointer !important;
	}

    #questionnaire{
		cursor: pointer !important;
	}
</style>
<main class="app-content">
<div class="row">
		<div class="col-md-12">
			<div class="tile">
					<h4>Edit Sets of Questions</h4>
				<div class="alert alert-danger collapse hide text-center  <?php if(isset($error)) echo 'show';?>">
					<strong>Questionnaire already exist for this School Year and Term </strong>Please fill another.
				</div>
				<hr>
				<div class="tile-body">
                <div class="container">
						<form class="form-horizontal" method="POST">

                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">Questions:</label>
                            <input type="hidden" name="question" id="question" value="">
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#questionModal">
                            Select Questions
                            </button>
                        <div class="col-sm-7">
                            <div id="qui">Please Select a Questions</div>
                        </div>
                    </div>

                    <hr>
							<div class="form-group row">
								<label for="inputEmail3" class="col-sm-2 col-form-label">Term</label>
								<div class="col-sm-7">
									<select class="form-control form-control-lg" id="inputSmall" name="term" required>
										<option dreadonly  hidden value="">-- Select A Semester --</option>
                                        <?php while ($row1 = $term->fetch_object()): ?>
										<option value="<?php echo $row1->Term_ID ?>">
											<?php echo $row1->Term_Name; ?>
										</option>
										<?php endwhile; ?>
									</select>
								</div>
							</div>
							<hr>
							<div class="form-group row">
								<label for="inputEmail3" class="col-sm-2 col-form-label">SchoolYear</label>
								<div class="col-sm-7">
									<select class="form-control form-control-lg" id="inputSmall" name="shoolYear" required>
										<option dreadonly  hidden value="">-- Select A School Year --</option>
										<?php while($row2 = $sy->fetch_object()):  ?>
										<option value=" <?php echo $row2->SY_ID; ?>">
										<?php echo $row2->SY_Name ?></option>
										<?php endwhile ?>
									</select>
								</div>
							</div>

                    <div class="tile-footer">
                        <div class="row">
                            <div class="col-md-8 col-md-offset-3">
                                <button class="btn btn-primary" type="submit" name="addSet" id="addSet"><i class="fa fa-fw fa-lg fa-check-circle"></i>Save</button>&nbsp;&nbsp;&nbsp;<a class="btn btn-secondary" href="Questionnaire_Add_Set.php"><i class="fa fa-fw fa-lg fa-arrow-circle-o-left"></i>Back</a>&nbsp;&nbsp;&nbsp;
                            </div>
                        </div>
                    </div>
                    </form>
                    </div>
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
				<table  class="table table-hover table-bordered test" id="questionnaire">
					<thead>
						<tr>
							<th>ID</th>
							<th>Question Description</th>
							<th>Category</th>
						</tr>
					</thead>
					<tbody>
						<?php  while ($row3 = $result -> fetch_object()): ?>
						<tr>
							<td><?php echo $row3->Evaluation_Item_ID ?></td>
							<td><?php echo $row3->Evaluation_Item_Description ?></td>
							<td><?php echo $row3->eval_cat_name ?></td>
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
	        <button id="saveME" type="button" class="btn btn-primary">Save changes</button>
	      </div>
	    </div>
	  </div>
	</div>
</div>
<?php include("../include/footer-guidance.php") ?>
<script src="../../js/subjectAdd.js"></script>