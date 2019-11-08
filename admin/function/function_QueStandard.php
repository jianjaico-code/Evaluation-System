<?php 

	class Data_queStandard
	{

 		function getStandard($conn){
	   		$q = "SELECT * FROM evaluation_category order by eval_cat_ID asc;";
			$r = $conn -> query($q);
			return $r;

	   	}

	   	function active_queStandard($id, $conn){
	   	    $id = $conn->real_escape_string($id);
            $q = "UPDATE evaluation_category SET Status = 'Active' WHERE eval_cat_ID = '$id'";
            $conn->query($q);
        }


        function deactive_queStandard($id, $conn){
            $id = $conn->real_escape_string($id);
            $q = "UPDATE evaluation_category SET Status = 'Inactive' WHERE eval_cat_ID = '$id'";
           $conn->query($q);
        }

        function add_queStandard($post, $conn){

	   		$id = $conn->real_escape_string($_POST['standardID']);
			$description = $conn->real_escape_string($_POST['standardDescription']);
			$status = $conn->real_escape_string($_POST['status']);

			$q = "insert into evaluation_category values ('$id', '$description', '$status')";
		  	 $conn->query($q);
	   	}

	   	function get_queStandardByID($id,$conn){
	   	    $id = $conn->real_escape_string($id);
	    	$q = "SELECT * FROM evaluation_category WHERE eval_cat_ID = '$id'";
          	$r = $conn->query($q);
            $result = $r->fetch_object();
            return $result;
	    }


	    function update_queStandard($id, $conn){
	    	$id = $conn->real_escape_string($_POST['standardID']);
	    	$description = $conn->real_escape_string($_POST['standardDescription']);
	    	$status =  $conn->real_escape_string($_POST['status']);

	    	$q = "UPDATE evaluation_category set 
	    			eval_cat_name	 = '$description',
	    			Status = '$status'
				where eval_cat_ID = '$id'";
			$conn->query($q);
			}
	}
 ?>