<?php 
    include ("../connection.php");
    $data  = json_decode($_POST['subject']);

    $Subject_Code = $data->Subject_Code;
    $course = $_POST['course'];
    $department = $_POST['department'];
    $q = "INSERT into subject_detail values (NULL,'$department', '$course', '$Subject_Code')";
    $conn->query($q);

