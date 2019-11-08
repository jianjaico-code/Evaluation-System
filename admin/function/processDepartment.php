<?php 
    include ("../connection.php");
    $data  = json_decode($_POST['department']);
    
    $Department_ID = $data->Department_ID;
    $Department_Name = $data->Department_Name;
    $Status = "Active";

    $q = "INSERT INTO department VALUES ('$Department_ID','$Department_Name','$Status')";
    $conn->query($q);
