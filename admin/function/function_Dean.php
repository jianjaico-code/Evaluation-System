<?php 

	class Data_dean
	{
	   

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
	     function get_DeanDetail($conn){
	    	$q = "SELECT dean.Dean_ID, dean.Firstname, dean.Middlename, dean.Lastname, faculty.Faculty_ID, faculty.Faculty_Firstname, faculty.Faculty_Middlename, faculty.Faculty_Lastname FROM dean_detail INNER JOIN dean on dean.Dean_ID = dean_detail.Dean_ID INNER JOIN faculty on dean_detail.Faculty_ID = faculty.Faculty_ID";
				$r = $conn -> query($q);
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
 ?>