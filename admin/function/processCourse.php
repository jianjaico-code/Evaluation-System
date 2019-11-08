<?php 
    include ("../connection.php");
    $data  = json_decode($_POST['course']);
    
    $Course_ID = $data->Course_ID;
    $Course_Name = $data->Course_Name;
    $Status = "Active";

    $q = "INSERT INTO course VALUES ('$Course_ID','$Course_Name','$Status')";
  	$conn->query($q);
