<?php 

	class Data_subjectFaculty
	{
	   	function get_Subject($conn){
	   		$q = "SELECT subject_detail.Subject_Code, subject.Subject_Description
				FROM subject 
    			INNER JOIN subject_detail on subject.Subject_Code = subject_detail.Subject_Code";
	   		$r = $conn -> query($q);
	   		return $r;
	   	}

	   	function get_SY($conn){
	   		$q = "select * from sy";
	   		$r = $conn -> query($q);
	   		return $r;
	   	}

		function get_Faculty($conn){
			$q = "select * from faculty where Position = 'TEACHER' or Position = 'DEAN' and  Status = 'Active'";
			$r = $conn -> query($q);
			return $r;
		}
		function get_dean($conn){
			$q = "select * from faculty where position = 'dean' and status = 'Active'";
			$r = $conn -> query($q);
			return $r;
		}
				
	   function get_semester($conn){
	   		$q ="select * from term";
	   		$r = $conn -> query($q);
	   		 return $r;
	   }

	    function active_subjectOffer($id, $conn){
	        $id = $conn->real_escape_string($id);
            $q = "UPDATE subject_offer SET Status = 'Active' WHERE Subject_Offer_ID = '$id'";
             $conn->query($q);
        }


        function deactive_subjectOffer($id, $conn){
            $id = $conn->real_escape_string($id);
            $q = "UPDATE subject_offer SET Status = 'Inactive' WHERE Subject_Offer_ID = '$id'";
             $conn->query($q);
        }

	   	function get_SubjectFacultyList($conn){
			   $q = "select subject_offer.Subject_Offer_ID, term.Term_Name, term.Term_ID, subject.Subject_Code, subject.Subject_Description, sy.SY_Name, faculty.Faculty_ID, faculty.Faculty_Lastname, faculty.Faculty_Firstname, faculty.Faculty_Middlename, subject_offer.Status, subject_offer.Department_ID
				from subject_offer 
				inner join subject on subject_offer.Subject_Code = subject.Subject_Code
				inner join sy on subject_offer.SY_ID = sy.SY_ID
				inner join term on subject_offer.Term_ID = term.Term_ID 
                INNER JOIN faculty on subject_offer.Faculty_ID = faculty.Faculty_ID
				order by Subject_Offer_ID";
			$r = $conn -> query($q);
			return $r;
	   	}

	   	function get_subjectProffesorListByID($id , $conn){
	   	    $id = $conn->real_escape_string($id);
	   		$q = "select subject.Subject_Description ,subject.Subject_Code, subject_offer.Subject_Offer_ID, term.Term_Name , term.Term_ID
	   			from subject_offer
	   			inner join subject on subject_offer.Subject_Code = subject.Subject_Code
                inner join term on subject_offer.Term_ID = term.Term_ID
				where subject_offer.Subject_Offer_ID = '$id'";
	   		$r = $conn->query($q);
            $result = $r->fetch_object();
            return $result;
	   	}

	   	 function add_setSubjectFaculty($post,$conn){
	   	 	
	   	 	$subjectCode = $conn->real_escape_string($_POST['subject']);
	   	 	$termID = $conn->real_escape_string($_POST['term']);
			$schoolYearID = $conn->real_escape_string($_POST['shoolYear']);
			$facultyID = $conn->real_escape_string($_POST['faculty']);
			$stat =  $conn->real_escape_string($_POST['status']);
			$department =  $conn->real_escape_string($_POST['department']);
			$process = '1';

	   		$q = "INSERT into subject_offer values (NULL,'$schoolYearID', '$termID', '$subjectCode',
	   			 '$facultyID', '$stat','$process', '$department'  )";
			$conn->query($q);
	   }

	   function update_setSubjectFaculty($id, $conn){
	   		$subject_offer = $conn->real_escape_string($_POST['subject_offerID']);
	   		$subjectCode = $conn->real_escape_string($_POST['subject']);
	   		$termID = $conn->real_escape_string($_POST['term']);
	   		$shoolYearID = $conn->real_escape_string($_POST['shoolYear']);


	   		$q = "update subject_offer set 
	    			SY_ID = '$shoolYearID',
	    			Term_ID = '$termID',
	    			Subject_Code = '$subjectCode'
				where Subject_Offer_ID = '$subject_offer' ";
			$conn->query($q);
	   }
	}
 ?>