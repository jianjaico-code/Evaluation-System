<?php 

	class Data_dean
	{
		

		function getSchoolYear($conn){
	   		$q1 = "SELECT * FROM sy";
			$r = $conn -> query($q1);
			return $r;
	   	}

	   	function getSyAndTerm($conn, $term, $sy){
	   		$q1 = "SELECT * FROM subject_offer where SY_ID  = '$sy' and Term_ID = '$term' ";
			$r = $conn -> query($q1);
				return $r;
	   	}

	   	function getSemester($conn){
	   		$q2 = "SELECT * FROM term;";
			$r = $conn -> query($q2);
				return $r;
	   	}

		 function getAllTeacherData($conn, $key){
            $query3 = "SELECT student_evaluation.average_rate , subject_taken_handle.Subject_Offer_ID, subject_offer.Faculty_ID
                        FROM student_evaluation
                        INNER JOIN subject_taken_handle on student_evaluation.Subject_Student_Taken = subject_taken_handle.Subject_Student_Taken
                        INNER JOIN subject_offer on subject_taken_handle.Subject_Offer_ID = subject_offer.Subject_Offer_ID
                        WHERE subject_offer.Faculty_ID  = '".$key."'";
			$res3 = mysqli_query($conn,$query3);
            return $res3;
        }

        function get_DeanDep($conn, $id){
        	$sql = "SELECT * from department 
				WHERE Faculty_ID = '".$id."' ";
				return $result =  $conn -> query($sql);
        }

		function getAllStudentsEvaluation($conn, $key){
            $query2 = "SELECT student_evaluation.average_rate , subject_taken_handle.Subject_Offer_ID
                    FROM student_evaluation
                    INNER JOIN subject_taken_handle on student_evaluation.Subject_Student_Taken = subject_taken_handle.Subject_Student_Taken
                    WHERE subject_taken_handle.Subject_Offer_ID  = '".$key."' ";
            $result2 = mysqli_query($conn,$query2);
            return $result2;
        }

		 function getRange($conn){
            $query6 = "SELECT * FROM eval_range";
            $res6 = mysqli_query($conn, $query6);
            return $res6;
        }


	   function getCurrentData($conn, $key, $sy, $term){

	   		$term = $_POST['semester'];
			$sy = $_POST['schoolYear'];

			echo $term .' '. $sy ;

            $q = "SELECT DISTINCT subject_offer.Subject_Code , term.Term_Name, subject_offer.Subject_Offer_ID, subject_offer.Faculty_ID,
                    subject.Subject_Description, subject_taken_handle.Evaluation_ID, evaluation.Evaluation_ScheduleFrom, evaluation.Evaluation_ScheduleTo
                FROM subject_offer
                INNER JOIN term on subject_offer.Term_ID = term.Term_ID
                INNER JOIN subject on subject_offer.Subject_Code = subject.Subject_Code
                INNER JOIN subject_taken_handle on subject_offer.Subject_Offer_ID = subject_taken_handle.Subject_Offer_ID
                INNER JOIN evaluation on subject_taken_handle.Evaluation_ID = evaluation.Evaluation_ID
                WHERE subject_offer.Faculty_ID  = '".$key."' ";
            $r = mysqli_query($conn,$q);
            return $r;
        }

	   function add_deanDetail($post,$conn){

			$dean_ID = $conn->real_escape_string($_POST['dean_ID']);
			$faculty_ID = $conn->real_escape_string($_POST['faculty_ID']);	

			$q = "INSERT INTO dean_detail VALUES(NULL,'$faculty_ID', '$dean_ID')";
			$conn->query($q);
		}
	  
	    function get_Dean($conn){
	    	$q = "SELECT * FROM dean order by Lastname asc;";
				$r = $conn -> query($q);
				return $r;
	    }
	    
	     function get_DeanDetail($conn, $id, $sem, $sy){
	    	if(($sem == null) && ($sy == null)){
	    		$q = "SELECT DISTINCT subject_offer.Faculty_ID, subject_offer.Department_ID, faculty.Faculty_Firstname,
					faculty.Faculty_Middlename, faculty.Faculty_Lastname, subject_offer.SY_ID, subject_offer.Term_ID
			        FROM subject_offer
			        INNER JOIN faculty ON subject_offer.Faculty_ID = faculty.Faculty_ID
			        WHERE subject_offer.Department_ID = '$id'";
				$r = $conn -> query($q);

	    	}else{
	    		$q = "SELECT DISTINCT subject_offer.Faculty_ID, subject_offer.Department_ID, faculty.Faculty_Firstname,
					faculty.Faculty_Middlename, faculty.Faculty_Lastname, subject_offer.SY_ID, subject_offer.Term_ID
					FROM subject_offer
					INNER JOIN faculty ON subject_offer.Faculty_ID = faculty.Faculty_ID
			        WHERE subject_offer.Department_ID = '$id' AND subject_offer.Sy_ID = '$sy' AND subject_offer.Term_ID = '$sem'";
				$r = $conn -> query($q);

			}
			return $r;
	    }


	     function get_deanActive($conn){
	    	$q = "SELECT * FROM dean where Status = 'Active' order by Lastname asc;";
				$r = $conn -> query($q);
				return $r;
	    }

	     function active_faculty($id, $conn){
	        $id = $conn->real_escape_string($id);
	    	$q = "UPDATE faculty SET Status = 'Active' WHERE Faculty_ID = '$id'";
	    	$conn->query($q);
	    }


	    function deactive_faculty($id, $conn){
	        $id = $conn->real_escape_string($id);
	    	$q = "UPDATE faculty SET Status = 'Inactive' WHERE Faculty_ID = '$id'";
	    	$conn->query($q);
	    }


	    function add_dean($post, $conn){

	    	$dean_id = $conn->real_escape_string($post['dean_id']);
	    	$firstName = $conn->real_escape_string($post['firstName']);
	    	$lastName = $conn->real_escape_string($post['lastName']);
	    	$middleName = $conn->real_escape_string($post['middleName']);
	    	$status = $conn->real_escape_string($post['status']);
	    	$password = $conn->real_escape_string($post['password']);

			$q = "INSERT INTO dean VALUES (
					'$dean_id',
					'$firstName',
					'$lastName',
					'$middleName',
					'$status',
					'$password')";
			$conn->query($q);
	    }

	    function update_dean($id, $conn){

			$dean_id = $conn->real_escape_string($_POST['dean_id']);
	    	$firstName = $conn->real_escape_string($_POST['firstName']);
	    	$lastName = $conn->real_escape_string($_POST['lastName']);
	    	$middleName = $conn->real_escape_string($_POST['middleName']);
	    	$status = $conn->real_escape_string($_POST['status']);
	    	$password = $conn->real_escape_string($_POST['password']);

	    	$q = "UPDATE dean set 
	    			Firstname = '$firstName',
	    			Lastname = '$lastName',
	    			Middlename = '$middleName',
	    			Status = '$status',
	    			Password = '$password'
				WHERE Dean_ID = '$dean_id' ";
			$conn->query($q);

	    }

	    
	  function get_DeanByID($id, $conn) {
	      $id = $conn->real_escape_string($id);
		  $q = "SELECT * FROM dean WHERE Dean_ID = '$id'";
		    $r = $conn->query($q);
            $result = $r->fetch_object();
            return $result;
		}


	   
	}