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
            <p class="app-sidebar__user-designation">Guidance/Admin</p>
        </div>
    </div>
    <hr>
    <ul class="app-menu">
        <li>
            <a class="app-menu__item " href="../guidance/index.php">
                <i class="app-menu__icon fa fa-home"></i>
                <span class="app-menu__label">Home</span>
            </a>
        </li>

        <li class="treeview">
            <a class="app-menu__item" href="#" data-toggle="treeview">
                <i class="app-menu__icon fa fa-users"></i>
                <span class="app-menu__label">User</span>
                <i class="treeview-indicator fa fa-angle-right"></i>
            </a>
            <ul class="treeview-menu">
                <li><a class="treeview-item" href="../guidance/Faculty.php">
                <i class="app-menu__icon fa fa-user-plus"></i>Faculty and Staff</a></li>
                <li><a class="treeview-item" href="../guidance/Student.php">
                <i class="app-menu__icon fa fa-user-plus"></i>Students</a></li>
                <li><a class="treeview-item" href="../guidance/SubjectTaken.php">
                <i class="app-menu__icon fa fa-graduation-cap"></i>Enrolled Students</a></li>
            </ul>
        </li>

        <li>
            <a class="app-menu__item " href="../guidance/Department.php">
                <i class="app-menu__icon fa fa-building-o  "></i>
                <span class="app-menu__label">Department</span>
            </a>
        </li>
        <li>
            <a class="app-menu__item " href="../guidance/Course.php">
                <i class="app-menu__icon fa fa-file-text-o"></i>
                <span class="app-menu__label">Course</span>
            </a>
        </li>
        <li class="treeview">
            <a class="app-menu__item" href="#" data-toggle="treeview">
                <i class="app-menu__icon fa fa-book"></i>
                <span class="app-menu__label">Subject</span>
                <i class="treeview-indicator fa fa-angle-right"></i>
            </a>
            <ul class="treeview-menu">
                <li><a class="treeview-item" href="../guidance/Subject.php">
                <i class="app-menu__icon fa fa-align-left "></i>Subject List</a></li>
                <li><a class="treeview-item" href="../guidance/SubjectDetail.php">
                <i class="app-menu__icon fa fa-cogs"></i>Manage Subject</a></li>
                <li><a class="treeview-item" href="../guidance/SubjectOffer.php">
                <i class="app-menu__icon fa  fa-list  "></i>Subject Offer</a></li>
                
                
            </ul>
        </li>
        <li class="treeview">
            <a class="app-menu__item" href="#" data-toggle="treeview">
                <i class="app-menu__icon fa fa-list-ol"></i>
                <span class="app-menu__label">Questionnaire</span>
                <i class="treeview-indicator fa fa-angle-right"></i>
            </a>
            <ul class="treeview-menu">
                <li><a class="treeview-item" href="../guidance/QuestionnaireStandard.php"><i class="icon fa fa-align-right"></i>Questinnaire Standard</a></li>
                
            </ul>
            <ul class="treeview-menu">
                <li><a class="treeview-item" href="../guidance/Rating.php"><i class="icon fa fa-list"></i>Evaluation Rating</a></li>
                
            </ul>
            <ul class="treeview-menu">
                <li><a class="treeview-item" href="../guidance/Questionnaire.php"><i class="icon fa fa-list-alt "></i>Questionnaire List</a></li>
                
            </ul>
            
        </li>
         <li>
            <a class="app-menu__item " href="../guidance/Questionnaire_Add_Set.php">
                <i class="app-menu__icon fa fa-wpforms  "></i>
                <span class="app-menu__label">Set A Questions</span>
            </a>
        </li>
        
        <li>
            <a class="app-menu__item " href="../guidance/WhoDidNotTakeExam.php">
                <i class="app-menu__icon fa fa-bar-chart "></i>
                <span class="app-menu__label">Did Not Take Evaluation</span>
            </a>
        </li>
        <li>
            <a class="app-menu__item " href="../guidance/EvaluationSchedule.php">
                <i class="app-menu__icon fa fa-calendar "></i>
                <span class="app-menu__label">Set Evaluation Date</span>
            </a>
        </li>
       
        
    </ul>
</aside>