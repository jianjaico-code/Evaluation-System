<?php
    include "../../connection.php";
    $evalItemID = $_POST['evalItemID'];
    $subTakenID = $_POST['subTakenID'];
    $specificComment= $_POST['specificComment'];
 
    $pair = "SELECT * FROM evaluation_detail WHERE Subject_Student_Taken = $subTakenID && Evaluation_Item_ID = $evalItemID";
    $qPair =  $conn -> query($pair);
    
    $data = $qPair -> fetch_object();
    
    if($data == null){
        $q = "INSERT INTO evaluation_detail (Subject_Student_Taken, Evaluation_Item_ID, Comments) VALUES ('$subTakenID', '$evalItemID', '$specificComment')";

        $query = mysqli_query($conn, $q);
        
        if($query){
            echo json_encode("Data Inserted Successfully");
        }
        else {
            echo json_encode('problem');
        }

    }
    else{
        echo "ALREADY COMMENTED";
    }


    
?>