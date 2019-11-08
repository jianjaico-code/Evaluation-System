<?php
$sql = "SELECT Faculty_Firstname, Faculty_Lastname, Faculty_Middlename FROM  faculty
WHERE Faculty_ID = '".$_SESSION['Faculty_ID']."' ";
$result =  $conn -> query($sql);
$row = $result -> fetch_object();
?>
<!-- Sidebar menu-->
<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
<aside class="app-sidebar">
    <div class="app-sidebar__user">
        <div class="container" style="text-align: auto">
            <p class="app-sidebar__user-name"><?php echo $row -> Faculty_Firstname.' '. $row -> Faculty_Middlename .' '.$row-> Faculty_Lastname ?></p>
            <p class="app-sidebar__user-designation">Faculty/Teacher</p>
        </div>
    </div>
    <hr>
    <ul class="app-menu">
        <li>
            <a class="app-menu__item " href="../faculties/index.php">
                <i class="app-menu__icon fa fa-home"></i>
                <span class="app-menu__label">Home</span>
            </a>
        </li>
        <li>
            <a class="app-menu__item " href="../faculties/subject.php">
                <i class="app-menu__icon fa fa-align-left "></i>
                <span class="app-menu__label">Subjects</span>
            </a>
        </li>
         <li>
            <a class="app-menu__item " href="../faculties/graph.php">
                <i class="app-menu__icon fa fa-bar-chart "></i>
                <span class="app-menu__label">Statistics</span>
            </a>
        </li>
    </ul>
</aside>