<?php
    include ("../connection.php");



    $res =  $conn->real_escape_string($_POST['res']);
    $term =  $conn->real_escape_string($_POST['term']);
    $sy =  $conn->real_escape_string($_POST['sy']);

    $q = "select * from evaluation_sets where 
        Term_ID = '$term' AND
        SY_ID = '$sy'  AND
        Evaluation_Item_ID = '$res'";
    $r = $conn->query($q);   

    if(mysqli_num_rows($r) > 0){
        echo "Existed";
    }else{           
        $q2 = "INSERT INTO evaluation_sets VALUES ($term, $sy, $res) 
            ON DUPLICATE KEY UPDATE 
            Term_ID = $term,
            SY_ID = $sy,
            Evaluation_Item_ID = $res;
        ;";
        $conn->query($q2); 
    }


    

    