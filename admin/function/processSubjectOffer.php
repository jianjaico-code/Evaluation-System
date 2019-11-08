<?php 
    include ("../connection.php");
    $data  = json_decode($_POST['subject']);

    $Subject_Code = $data->Subject_Code;
    $faculty = $_POST['fac'];
    $term = $_POST['ter'];
    $shoolYear = $_POST['sy'];
    $status = $_POST['stat'];

    $q = "INSERT into subject_offer values (NULL,'$shoolYear', '$term', '$Subject_Code', '$faculty','$status')";
    $conn->query($q);

