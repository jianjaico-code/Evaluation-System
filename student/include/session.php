<?php
    include("../connection.php");
    session_start();
    
    $user_check = $_SESSION['Student_ID'];
    
    if(!isset($_SESSION['Student_ID'])){
        header("location: ../index.php");
    }