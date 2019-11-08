<?php 
    class Data_course
    {
    function get_course($conn){
        $q = "select * from course";
        $r =  $conn-> query($q);
        return $r;
        }

    function getCourseByID($id, $conn){
        $id = $conn->real_escape_string($id);
        $q = "SELECT * from course where Course_ID = '$id'";
        $r = $conn->query($q);
        $result = $r->fetch_object();
        return $result;

        }
        
     function get_courseActive($conn){
            $q = "SELECT * from course WHERE Status = 'Active'";
            $r =  $conn-> query($q);
        return $r;
        }

     function active_course($id, $conn){
         
            $id = $conn->real_escape_string($id);
            $q = "UPDATE course SET Status = 'Active' WHERE Course_ID = '$id'";
            $conn->query($q);
        }


        function deactive_course($id, $conn){
            $id = $conn->real_escape_string($id);
            $q = "UPDATE course SET Status = 'Inactive' WHERE Course_ID = '$id'";
            $conn->query($q);
        }


    function add_course($post, $conn){ 
            $courseID = $conn->real_escape_string($_POST['courseID']);
            $couseName = $conn->real_escape_string($_POST['couseName']);
            $status = $conn->real_escape_string($_POST['status']);

            $q = "INSERT INTO course VALUES ('$courseID','$couseName','$status')";
            $conn->query($q);
        }


    function update_course($id, $conn){
            $courseID = $conn->real_escape_string($_POST['courseID']);
            $couseName =$conn->real_escape_string($_POST['courseDesc']);
            $status =  $conn->real_escape_string($_POST['status']);

            $q = "UPDATE course SET 
                    Course_Name = '$couseName',
                    Status = '$status'
                WHERE Course_ID = '$courseID'";
            $conn->query($q);
        }
    }
 ?>