<?php 
    include ("../connection.php");
    $data  = json_decode($_POST['subject']);
    
    $Subject_Code = $data->Subject_Code;
    $Subject_Description = $data->Subject_Description;
    $Status = "Active";

    $q = "insert into subject values (?,?,?)";
    $stmt = $conn->prepare($q);
    $stmt->bind_param("sss", $Subject_Code, $Subject_Description, $Status);
    $stmt->execute();
