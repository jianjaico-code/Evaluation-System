<?php 
	class Data_students
	{
		//functions for student course
		function get_studentCourse($conn)
		{
			$q = "SELECT student_course.Student_ID , student.Firstname, student.Lastname, 
			student.Middlename, student_course.Course_ID, course.Course_Name
			FROM student_course 
	        INNER JOIN student ON student_course.Student_ID = student.Student_ID 
	        INNER JOIN course on student_course.Course_ID = course.Course_ID";
			$r = $conn -> query($q);
			return $r;	
		}

		function get_students($conn){
			$q = "SELECT student.Student_ID , student.Lastname, student.Firstname, student.Middlename, course.Course_ID , course.Course_Name, student.Status
					FROM student_course 
                    INNER JOIN student on student_course.Student_ID = student.Student_ID
                    INNER JOIN course on student_course.Course_ID = course.Course_ID";
			$r = $conn -> query($q);
			return $r;
		}
    	


		 function active_student($id, $conn){
		     $id = $conn->real_escape_string($id);
	    	$q = "UPDATE student SET Status = 'Active' WHERE Student_ID = '$id'";
	    	$conn->query($q);
	    }


	    function deactive_student($id, $conn){
	        $id = $conn->real_escape_string($id);
	    	$q = "UPDATE student SET Status = 'Inactive' WHERE Student_ID = '$id'";
	    	$conn->query($q);
	    }


		function add_studentCourse($post, $conn){
		   	$studentID = $conn->real_escape_string($_POST['studentID']);
	    	$courseID = $conn->real_escape_string($_POST['courseID']);
	    
	    	$q = "INSERT INTO student_course VALUES ('$studentID','$courseID')";
			$conn->query($q);
		}

		function get_studentsActive($conn){
			$q = "select * from student where Status = 'Active'";
			$r = $conn -> query($q);
			return $r;
		}

		function get_studentByID($id,$conn){
		    $id = $conn->real_escape_string($id);
			$q = "SELECT * FROM student WHERE Student_ID = '$id'";
	    	  $r = $conn->query($q);
            $result = $r->fetch_object();
            return $result;
	    }


	     function add_student($post, $conn){

	    	$studentID = $conn->real_escape_string($post['studentID']);
	    	$firstname = $conn->real_escape_string($post['firstName']);
	    	$lastName = $conn->real_escape_string($post['lastName']);
	    	$middleName = $conn->real_escape_string($post['middleName']);
	    	$password = $conn->real_escape_string($post['password']);
	    	$status = $conn->real_escape_string($post['status']);

	    	$q = "INSERT INTO student VALUES (
	    			'$studentID',
	    			'$password',
	    			'$lastName',
	    			'$firstname',
	    			'$middleName',
	    			'$status')";
			$conn->query($q);
	    }


	     function add_studentAndCourse($post, $conn){

	    	$studentID = $conn->real_escape_string($post['studentID']);
	    	$courseID = $conn->real_escape_string($post['courseID']);

	    	$q = "INSERT INTO student_course VALUES ('$studentID', '$courseID')";
			$conn->query($q);
	    }



	      function update_student($id, $conn){

			$studentID = $conn->real_escape_string($_POST['studentID']);
	    	$firstName = $conn->real_escape_string($_POST['firstName']);
	    	$lastName = $conn->real_escape_string($_POST['lastName']);
	    	$middleName = $conn->real_escape_string($_POST['middleName']);
	    	$password = $conn->real_escape_string($_POST['password']);
	    	$status = $conn->real_escape_string($_POST['status']);

	    	$q = "UPDATE student SET 
	    			Password = '$password',
	    			Lastname = '$lastName',
	    			Firstname = '$firstName',
	    			Middlename = '$middleName',
	    			Status = '$status'
				WHERE Student_ID = '$studentID'";
			$conn->query($q);
	    }

	}
 ?>