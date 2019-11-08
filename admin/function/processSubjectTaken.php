<?php 
    include ("../connection.php");
    $data  = json_decode($_POST['student']);
    
    $Student_ID = $data->Student_ID;
    $Lastname = $data->Lastname;
    $Firstname = $data->Firstname;
    $Middlename = $data->Middlename;
    $Course = $data->Course;

    $subject = $_POST['subj'];
    $schedule = $_POST['sched'];

    $q = "INSERT into subject_taken_handle values (NULL,'$subject', '$Student_ID', '$schedule')";
    $conn->query($q);

