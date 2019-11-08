<?php 
	class Data_subjectTakenHandle
	{

		function get_Teachers($conn){
				$q = "select * from faculty where Position = 'Teacher' and  Status = 'Active'";
				$r = $conn -> query($q);
				return $r;
		}

		function get_SubjectOffer($conn){
				$q = "SELECT subject_offer.Subject_Code , subject.Subject_Description , subject_offer.Subject_Offer_ID,
							subject_offer.Faculty_ID, faculty.Faculty_Lastname, faculty.Faculty_Firstname
				from subject_offer
				INNER JOIN subject on subject_offer.Subject_Code = subject.Subject_Code
				INNER JOIN faculty on subject_offer.Faculty_ID = faculty.Faculty_ID
                WHERE subject_offer.Status = 'Active';";
				$r = $conn -> query($q);
				return $r;
		}

		function get_subjectTakenHandle($conn){
			$q = "SELECT subject_taken_handle.Subject_Student_Taken , subject_taken_handle.Student_ID, 
						subject_offer.Subject_Code, term.Term_Name, sy.SY_Name,
                        student.Lastname, student.Firstname, student.Middlename,
                        subject.Subject_Description
				from subject_taken_handle
    			INNER JOIN subject_offer on subject_taken_handle.Subject_Offer_ID = subject_offer.Subject_Offer_ID
    			INNER JOIN sy on subject_offer.SY_ID = sy.SY_ID
    			INNER JOIN term on subject_offer.Term_ID = term.Term_ID 
                INNER JOIN student on subject_taken_handle.Student_ID = student.Student_ID
                INNER JOIN subject on subject_offer.Subject_Code = subject.Subject_Code
    			ORDER BY Subject_Student_Taken;";
    		$r = $conn -> query($q);
			return $r;
		}

		function get_subjectTakenHandleByID($id, $conn){
			$q = "SELECT subject_taken_handle.Subject_Student_Taken , 
						subject_taken_handle.Student_ID, 
        				subject_offer.Subject_Code, term.Term_Name, 
    					sy.SY_Name, 
						subject_offer.Subject_Offer_ID, 
                        subject_offer.Faculty_ID
				from subject_taken_handle
    			INNER JOIN subject_offer on subject_taken_handle.Subject_Offer_ID = subject_offer.Subject_Offer_ID
    			INNER JOIN sy on subject_offer.SY_ID = sy.SY_ID
    			INNER JOIN term on subject_offer.Term_ID = term.Term_ID
                INNER JOIN faculty on subject_offer.Faculty_ID = faculty.Faculty_ID
				WHERE Subject_Student_Taken = '$id'";
				$r = $conn -> query($q);
		   		$result = $r->fetch_object();
		   		return $result;
		}

		function add_subjectTakenHandle($post, $conn){
			$schedule =  $conn->real_escape_string($_POST['schedule']);
			$students =  $conn->real_escape_string($_POST['students']);
			$subject =  $conn->real_escape_string($_POST['subject']);
	

			$q = "INSERT INTO subject_taken_handle VALUES (null, $subject, $students, $schedule)";
			mysqli_query($conn, $q);
		}
	}
 ?>