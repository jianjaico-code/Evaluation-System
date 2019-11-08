<?php 

	class Data_faculty
	{
	   
	  
	    function get_faculty($conn){
	    	$q = "SELECT * FROM faculty order by Faculty_Lastname asc;";
				$r = $conn -> query($q);
				return $r;
	    }

	    function get_dean($conn){
	    	$q = "SELECT * FROM faculty where Position = 'Dean' and Status = 'Active';";
				$r = $conn -> query($q);
				return $r;
	    }


	     function get_facultyActive($conn){
	    	$q = "SELECT * FROM faculty where Status = 'Active' and Position = 'TEACHER' order by Faculty_Lastname asc;";
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


	    function add_faculty($post, $conn){

	    	$faculty_id = $conn->real_escape_string($post['faculty_id']);
	    	$firstName = $conn->real_escape_string($post['firstName']);
	    	$lastName = $conn->real_escape_string($post['lastName']);
	    	$middleName = $conn->real_escape_string($post['middleName']);
	    	$position = $conn->real_escape_string($post['position']);
	    	$status = $conn->real_escape_string($post['status']);
	    	$password = $conn->real_escape_string($post['password']);

			$q = "INSERT INTO faculty VALUES (
					'$faculty_id',
					'$firstName',
					'$lastName',
					'$middleName',
					'$position',
					'$status',
					'$password')";
			$conn->query($q);
	    }

	    function update_faculty($id, $conn){

			$facultyID =$conn->real_escape_string($_POST['faculty_id']);
	    	$firstName = $conn->real_escape_string($_POST['firstName']);
	    	$lastName = $conn->real_escape_string($_POST['lastName']);
	    	$middleName = $conn->real_escape_string($_POST['middleName']);
	    	$position = $conn->real_escape_string($_POST['position']);
	    	$status = $conn->real_escape_string($_POST['status']);
	    	$password = $conn->real_escape_string($_POST['password']);

	    	$q = "UPDATE faculty set 
	    			Faculty_Firstname = '$firstName',
	    			Faculty_Lastname = '$lastName',
	    			Faculty_Middlename = '$middleName',
	    			Position = '$position',
	    			Status = '$status',
	    			Password = '$password'
				WHERE Faculty_ID = '$facultyID' ";
			$conn->query($q);

	    }

	    
	  function get_FacultyID($id, $conn) {
	      $id = $conn->real_escape_string($id);
		  $q = "SELECT * FROM faculty WHERE Faculty_ID = '$id'";
		    $r = $conn->query($q);
            $result = $r->fetch_object();
            return $result;
		}


	   
	}
 ?>