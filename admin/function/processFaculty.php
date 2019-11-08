<?php 
    include ("../connection.php");
    $data  = json_decode($_POST['faculty']);
    
    $Faculty_ID = $data->Faculty_ID;
    $Faculty_Lastname = $data->Faculty_Lastname;
    $Faculty_Firstname = $data->Faculty_Firstname;
    $Faculty_Middlename = $data->Faculty_Middlename;
    $Position = $data->Position;
    $Password = $data->Faculty_ID;
    $Status = "Active";

   $q = "INSERT INTO faculty VALUES (
                    '$Faculty_ID',
                    '$Faculty_Firstname',
                    '$Faculty_Lastname',
                    '$Faculty_Middlename',
                    '$Position',
                    '$Status',
                    '$Password')";
            $conn->query($q);
