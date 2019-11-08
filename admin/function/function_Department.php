<?php 

    class Data_department
    {
       
        function get_department($conn){
            $q = "select department.Department_ID, department.Department_Name, faculty.Faculty_ID,
    faculty.Faculty_Firstname, faculty.Faculty_Middlename, faculty.Faculty_Lastname, department.Status
    from department
    INNER JOIN faculty on department.Faculty_ID = faculty.Faculty_ID";
            $r = $conn -> query($q);
            return $r;
        }

         function get_departmentAtive($conn){
            $q = "select * from department where Status = 'Active' ";
            $r = $conn -> query($q);
            return $r;
        }

        function get_departmentAtiveDean($conn){
            $q = "SELECT department.Department_ID , department.Department_Name,
                    faculty.Faculty_ID , faculty.Faculty_Firstname, faculty.Faculty_Middlename, faculty.Faculty_Lastname
                    FROM department
                    INNER JOIN faculty on department.Faculty_ID = faculty.Faculty_ID ";
            $r = $conn -> query($q);
            return $r;
        }


         function active_department($id, $conn){
            $id = $conn->real_escape_string($id);
            $q = "UPDATE department SET Status = 'Active' WHERE  Department_ID = '$id'";
            $conn->query($q);
        }


        function deactive_department($id, $conn){
            $id = $conn->real_escape_string($id);
            $q = "UPDATE department SET Status = 'Inactive' WHERE Department_ID = '$id'";
            $conn->query($q);
        }

        function get_departmentByID($id, $conn){
            $id = $conn->real_escape_string($id);
            $q = "SELECT * FROM department WHERE Department_ID = '$id'";
            $r = $conn->query($q);
            $result = $r->fetch_object();
            return $result;
        }


        function add_department($post, $conn){
            
           
        }

        function update_department($id, $conn){
            $departmentID = $conn->real_escape_string($_POST['departmentID']);
            $departmentName = $conn->real_escape_string($_POST['departmentName']);
            $status = $conn->real_escape_string($_POST['status']);

            $q = "UPDATE department SET 
                    Department_Name = '$departmentName',
                    Status = '$status'
                WHERE Department_ID = '$departmentID'";
            $conn->query($q);
        }

       
    }
 ?>