<?php 

	class Data_questionnaire
	{

	 	function get_addQuestionnaire($conn){
			$q = "SELECT (MAX(Evaluation_Item_ID) + 1) AS max_id FROM evaluation_item  ;";
			$r = $conn -> query($q) ;
			$result = $r ->fetch_object();
			return 	$result;

	   	}

	   	function getEvaluationSched($conn){
			$q = "SELECT Evaluation_ID, Evaluation_ScheduleFrom , Evaluation_ScheduleTo FROM evaluation 
	 ORDER BY Evaluation_ID DESC";
			$r = $conn -> query($q);
			return $r;

	   	}

	   	function get_listQuestionnaire($conn){
	   		$q = "SELECT evaluation_item.Evaluation_Item_ID ,
				evaluation_item.Evaluation_Item_Description,
		        evaluation_category.eval_cat_name,
		        evaluation_item.Status
		        FROM evaluation_item
		        INNER JOIN evaluation_category on evaluation_item.eval_cat_ID = evaluation_category.eval_cat_ID;";
			$r = $conn -> query($q);
			return $r;

	   	}

	   	 function get_questionnaireByID($id,$conn){
	   	    $id = $conn->real_escape_string($id);
	    	$q = "SELECT * FROM evaluation_item WHERE Evaluation_Item_ID = '$id'";
          	$r = $conn->query($q);
            $result = $r->fetch_object();
            return $result;
	    }

	   	function add_questionnaire($post, $conn){

	   		$store = $conn->real_escape_string($_POST['firstName']);
			$description = $conn->real_escape_string($_POST['description']);
			$stan = $conn->real_escape_string($_POST['standard']);
			$status = $conn->real_escape_string($_POST['status']);

			$q = "insert into evaluation_item values ('$store', '$description','$stan', '$status')";
		  	$conn->query($q);
	   	}


	   	  function active_question($id, $conn){
	   	    $id = $conn->real_escape_string($id);
	    	$q = "UPDATE evaluation_item SET Status = 'Active' WHERE Evaluation_Item_ID = '$id'";
	    	$conn->query($q);
	    }


	    function deactive_question($id, $conn){
	        $id = $conn->real_escape_string($id);
	    	$q = "UPDATE evaluation_item SET Status = 'Inactive' WHERE Evaluation_Item_ID = '$id'";
	    	$conn->query($q);
	    }

	    

	    function update_questionnaire($id, $conn){
	    	$question_id = $conn->real_escape_string($_POST['question']);
	    	$description = $conn->real_escape_string($_POST['description']);
	    	$stan = $conn->real_escape_string($_POST['standard']);
	    	$status = $conn->real_escape_string($_POST['status']);

	    	$q = "UPDATE evaluation_item set 
	    			Evaluation_Item_Description = '$description',
	    			eval_cat_ID = '$stan',
	    			Status = '$status'
				where Evaluation_Item_ID = '$question_id'";
				$conn->query($q);

			}


		function get_rating($conn){
			$q = "SELECT * FROM rating";
			$r = $conn -> query($q);
			return $r;
		}

		function get_ratingByID($id,$conn){
		    $id = $conn->real_escape_string($id);
	  		$q = "SELECT * FROM rating WHERE Rating_ID = '$id'";
         	$r = $conn->query($q);
            $result = $r->fetch_object();
            return $result;
		}

		function add_rating($post, $conn){
			
	   		$ratngID = $conn->real_escape_string($_POST['ratingID']);
			$ratingDescription = $conn->real_escape_string($_POST['ratingDescription']);
			$qualitativeDescription = $conn->real_escape_string($_POST['qualitativeDescription']);
			$status = $conn->real_escape_string($_POST['status']);

			$q = "INSERT INTO rating VALUES ('$ratngID', '$ratingDescription', '$qualitativeDescription', '$status')";
		  	$conn->query($q);
		}

		function add_question_set($post, $conn){
			$question = $post['question'];
			$thePostIdArray = explode(',', $question);
			
	
			foreach ($thePostIdArray as &$value) {
				$term = $conn->real_escape_string($post['term']);
				$shoolYear = $conn->real_escape_string($post['shoolYear']);

				$q = "INSERT INTO evaluation_sets VALUES ('$term', '$shoolYear', '$value')";
		  		$conn->query($q);
			}
		}

		 function update_rating($id, $conn){
	    	$ratngID = $conn->real_escape_string($_POST['ratingID']);
			$ratingDescription = $conn->real_escape_string($_POST['ratingDescription']);
			$qualitative_Description = $conn->real_escape_string($_POST['Qualitative_Description']);
			$status = $conn->real_escape_string($_POST['status']);

	    	$q = "UPDATE rating set 
	    			Rating_Description = '$ratingDescription',
	    			Qualitative_Description = '$qualitative_Description', 
	    			Status = '$status'
				where Rating_ID = '$ratngID'";
			$conn->query($q);
		}

	  	 function active_rating($id, $conn){
	  	    $id = $conn->real_escape_string($id);
            $q = "UPDATE rating SET Status = 'Active' WHERE Rating_ID = '$id'";
            $conn->query($q);
        }

        function deactive_rating($id, $conn){
            $id = $conn->real_escape_string($id);
            $q = "UPDATE rating SET Status = 'Inactive' WHERE Rating_ID = '$id'";
            $conn->query($q);
		}
		
		function get_SY($conn){
			$q = "select * from sy";
			$r = $conn -> query($q);
			return $r;
		}

		function get_semester($conn){
			$q ="select * from term";
			$r = $conn -> query($q);
			return $r;
		}

		function get_evaluation_sets($conn){
			$q = "SELECT DISTINCT term.Term_Name, sy.SY_Name, term.Term_ID, sy.SY_ID
			from evaluation_sets
    		INNER JOIN term on evaluation_sets.Term_ID = term.Term_ID
    		INNER JOIN sy on evaluation_sets.SY_ID = sy.SY_ID";
			$r = $conn -> query($q);
			return $r;
		}



		function get_evaluation_report($idTerm, $idSy, $conn){
			$idTerm = $conn->real_escape_string($idTerm);
			$idSy = $conn->real_escape_string($idSy);
			$q = "SELECT term.Term_ID, sy.SY_ID, evaluation_sets.Evaluation_Item_ID, evaluation_item.Evaluation_Item_Description
			from evaluation_sets
			INNER JOIN term on evaluation_sets.Term_ID = term.Term_ID
			INNER JOIN sy on evaluation_sets.SY_ID = sy.SY_ID
            INNER JOIN evaluation_item on evaluation_sets.Evaluation_Item_ID = evaluation_item.Evaluation_Item_ID
			WHERE term.Term_ID  = '$idTerm' and sy.SY_ID =  '$idSy'";
			$r = $conn->query($q);
            return $r;
		}
		
	}
 ?>