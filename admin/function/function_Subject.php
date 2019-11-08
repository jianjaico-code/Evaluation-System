<?php 
	class Data_subject
	{

		function get_Subject($conn){
			$q = "select * from subject";
			$r = $conn -> query($q);
			return $r;
		}

		function get_SubjectAtive($conn){
			$q = "select * from subject where Status = 'Active'";
			$r = $conn -> query($q);
			return $r;
		}

		function get_departmentBySubjectCode($conn){
			

			$q = "select department.Department_Name, course.Course_Name, subject_detail.Subject_Code, subject_detail.Subject_Detail_ID, subject.Subject_Description
				from department 
				inner join subject_detail on department.Department_ID = subject_detail.Department_ID
				inner join course on subject_detail.Course_ID = course.Course_ID
				inner join subject on subject_detail.Subject_Code = subject.Subject_Code";
				$r =  $conn -> query($q);
		    	return $r;
		}	

		function active_subject($id, $conn){
		    $id = $conn->real_escape_string($id);
            $q = "UPDATE subject SET Status = 'Active' WHERE Subject_Code = '$id'";
            $conn->query($q);
        }

        function deactive_subject($id, $conn){
            $id = $conn->real_escape_string($id);
            $q = "UPDATE subject SET Status = 'Inactive' WHERE Subject_Code = '$id'";
            $conn->query($q);
        }

		function get_subjectByID($id,$conn){
		    $id = $conn->real_escape_string($id);
			$q = "SELECT * FROM subject WHERE Subject_Code = '$id'";
	    	$r = $conn->query($q);
            $result = $r->fetch_object();
            return $result;
		}

		function get_SubjectDetailByID($id, $conn){
            $id = $conn->real_escape_string($id);
			$q ="select * from subject_detail where Subject_Code = '$id'";
			$r = $conn->query($q);
            $result = $r->fetch_object();
            return $result;
		}

		function add_subject($conn){
			$subjectID = $conn->real_escape_string($_POST['subject_ID']);
			$subjectDescription = $conn->real_escape_string($_POST['subject_Description']);
			$status = $conn->real_escape_string($_POST['status']);
			$q = "INSERT INTO subject VALUES('$subjectID', '$subjectDescription','$status') ";
			$conn->query($q);
		}

		function update_subject($id, $conn){
			$subjectCode = $conn->real_escape_string($_POST['subjectCode']);
			$description = $conn->real_escape_string($_POST['subjectDescription']);
			$status = $conn->real_escape_string($_POST['status']);

	    	$q = "UPDATE subject SET 
	    		Subject_Description = '$description',
	    		Status = '$status'
				WHERE Subject_Code = '$subjectCode'";
		   $conn->query($q);
		}

		function add_setSubjectDetail($conn){
			
			$departmentID = $conn->real_escape_string($_POST['department']);
			$courseID = $conn->real_escape_string($_POST['course']);	
			$subjectCode = $conn->real_escape_string($_POST['subject']);

			$q = "INSERT INTO subject_detail VALUES(NULL,'$departmentID', '$courseID','$subjectCode')";
			$conn->query($q);
		}
		
		function update($id, $conn){
			$departmentID = $conn->real_escape_string($_POST['department']);
			$courseID = $conn->real_escape_string($_POST['course']);	
			$subjectCode = $conn->real_escape_string($_POST['subjectCode']);

			$q = "UPDATE subject_detail SET 
	    		Department_ID = '$departmentID',
	    		Course_ID = '$courseID'
				WHERE Subject_Code = '$subjectCode'";
			$conn->query($q);
		}
}
 ?>