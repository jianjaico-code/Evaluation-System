<?php 

	class Data_EvaltuationSchedule
	{
		function get_evaluationScheduleByID($id, $conn){
    		$q = "select * from evaluation where Evaluation_ID = '$id'";
    		$r = $conn -> query($q);
            return $r;
    	}

		function get_evaluationSchedule($conn){
    		$q = "select * from evaluation";
    		$r = $conn -> query($q);
    		return $r;
    	}

        function get_evaluationScheduleActive($conn){
            $q = "select * from evaluation where Status = 'Active'";
            $r = $conn -> query($q);
            return $r;
        }

    	 function update_evalSched($id, $conn){
            $evalID = $conn->real_escape_string($_POST['evalID']);
            $fromSchedule = $conn->real_escape_string($_POST['fromSchedule']);
            $toSchedule = $conn->real_escape_string($_POST['toSchedule']);
            $status = $conn->real_escape_string($_POST['status']);

            $q = "UPDATE evaluation SET 
                    Evaluation_ScheduleFrom = '$fromSchedule',
                    Evaluation_ScheduleTo = '$toSchedule',
                    Status = '$status'
                WHERE Evaluation_ID = '$evalID'";
            $conn->query($q);
        }

		function set_Schedule($post, $conn){
			$setSchedule =  date('Y-m-d',strtotime($_POST['setSchedule']));
			$lastSchedule = date('Y-m-d',strtotime($_POST['lastSchedule']));
			$status = $_POST['status'];
		
			$q = "INSERT INTO evaluation VALUES(null, '$setSchedule', '$lastSchedule', '$status') ";
			$conn->query($q);
		}

		function active_sched($id, $conn){
		    $id = $conn->real_escape_string($id);
            $q = "UPDATE evaluation SET Status = 'Active' WHERE Evaluation_ID = '$id'";
            $conn->query($q);
        }

        function deactive_sched($id, $conn){
            $id = $conn->real_escape_string($id);
            $q = "UPDATE evaluation SET Status = 'Inactive' WHERE Evaluation_ID = '$id'";
            $conn->query($q);
        }

	}
 ?>