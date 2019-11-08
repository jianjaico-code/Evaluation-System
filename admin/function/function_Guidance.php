<?php

    class funcGuidance{
        function getAllData($conn){
            $query = "SELECT subject_taken_handle.Subject_Student_Taken as subTaken,  student_evaluation.Subject_Student_Taken, student.Student_ID, student.Firstname, student.Lastname, student.Middlename, subject_offer.Subject_Code, evaluation.Evaluation_ScheduleFrom, evaluation.Evaluation_ScheduleTo, re_evaluate.Subject_Student_Taken as reSubTaken
                        FROM subject_taken_handle
                        LEFT JOIN student_evaluation on subject_taken_handle.Subject_Student_Taken = student_evaluation.Subject_Student_Taken
                        LEFT JOIN re_evaluate on subject_taken_handle.Subject_Student_Taken = re_evaluate.Subject_Student_Taken
                        INNER JOIN student on subject_taken_handle.Student_ID = student.Student_ID
                        INNER JOIN subject_offer on subject_taken_handle.Subject_Offer_ID = subject_offer.Subject_Offer_ID
                        INNER JOIN evaluation on subject_taken_handle.Evaluation_ID = evaluation.Evaluation_ID 
                        WHERE student_evaluation.Subject_Student_Taken IS NULL";
            $res = mysqli_query($conn,$query);
            return $res;
        }

        function getRange($conn){
            $query2 = "SELECT * FROM eval_range";
            $res2 = mysqli_query($conn, $query2);
            return $res2;
        }

        function reactivateEvaluation($conn, $key){
            $subRes = $key['subTakenVal'];
            echo $subRes;
            $q = "insert into re_evaluate values (null,'$subRes')";
			 $conn->query($q);
        }

        function getAllTeacherData($conn, $key){
            $query3 = "SELECT student_evaluation.average_rate , subject_taken_handle.Subject_Offer_ID, subject_offer.Faculty_ID
                        FROM student_evaluation
                        INNER JOIN subject_taken_handle on student_evaluation.Subject_Student_Taken = subject_taken_handle.Subject_Student_Taken
                        INNER JOIN subject_offer on subject_taken_handle.Subject_Offer_ID = subject_offer.Subject_Offer_ID
                        WHERE subject_offer.Faculty_ID  = '".$key."'";
            $res3 = mysqli_query($conn,$query3);
            return $res3;
        }

        function getAllTeacherSubjects($conn, $id){
            $q = 'SELECT * FROM ';
        }

        function getAllTeacher($conn){
            $query4 = "SELECT * FROM faculty where Position = 'Teacher' or Position = 'Dean' ";
            $res4 = mysqli_query($conn, $query4);
            return $res4;
        }
        

        function getAllStudentsEvaluation($conn, $key){
            $query2 = "SELECT student_evaluation.average_rate , subject_taken_handle.Subject_Offer_ID
                    FROM student_evaluation
                    INNER JOIN subject_taken_handle on student_evaluation.Subject_Student_Taken = subject_taken_handle.Subject_Student_Taken
                    WHERE subject_taken_handle.Subject_Offer_ID  = '".$key."' ";
            $result2 = mysqli_query($conn,$query2);
            return $result2;
        }

        function getCurrentData($conn, $key){
            $q = "SELECT DISTINCT subject_offer.Subject_Code , term.Term_Name, subject_offer.Subject_Offer_ID, subject_offer.Faculty_ID,
                    subject.Subject_Description, subject_taken_handle.Evaluation_ID, evaluation.Evaluation_ScheduleFrom, evaluation.Evaluation_ScheduleTo, sy.SY_Name
                FROM subject_offer
                INNER JOIN term on subject_offer.Term_ID = term.Term_ID
                INNER JOIN subject on subject_offer.Subject_Code = subject.Subject_Code
                INNER JOIN subject_taken_handle on subject_offer.Subject_Offer_ID = subject_taken_handle.Subject_Offer_ID
                INNER JOIN evaluation on subject_taken_handle.Evaluation_ID = evaluation.Evaluation_ID
                INNER JOIN sy on subject_offer.SY_ID = sy.SY_ID
                WHERE subject_offer.Faculty_ID  = '".$key."' ";
            $r = mysqli_query($conn,$q);
            return $r;
        }
    }