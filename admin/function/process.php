<?php 
    include ("../connection.php");
    $data  = json_decode($_POST['student']);
    
    $Lastname = $data->Lastname;
    $Student_ID = $data->Student_ID;
    $Firstname = $data->Firstname;
    $Middlename = $data->Middlename;
    $Course = $data->Course;
    $Status = "Active";

    $q = "INSERT INTO student VALUES ('$Student_ID', '$Student_ID', '$Lastname', '$Firstname', '$Middlename', '$Status')";
    $conn->query($q);

    $q2 = "INSERT INTO student_course VALUES ('$Student_ID', '$Course')";
    $conn->query($q2);
    