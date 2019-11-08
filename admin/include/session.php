<?php
     include("../connection.php");
     
     $user_check = $_SESSION['Faculty_ID'];
     
     if(!isset($_SESSION['Faculty_ID'])){
         header("location: ../../index.php");
     }