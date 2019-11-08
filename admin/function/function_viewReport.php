<?php
    class app
    {
        
        function hide_comment($id, $conn){
            $id = $conn->real_escape_string($id);
            $q = "UPDATE student_evaluation SET Status = 'Active' WHERE Student_Evaluation_ID = '$id'";
            $conn->query($q);
        }


        function unhide_comment($id, $conn){
            $id = $conn->real_escape_string($id);
            $q = "UPDATE faculty SET Status = 'Inactive' WHERE Student_Evaluation_ID = '$id'";
            $conn->query($q);
        }
        function getData($conn){
            $query = "SELECT subject_offer.Subject_Code , term.Term_Name, subject_offer.Subject_Offer_ID, subject_offer.Faculty_ID,
                        subject.Subject_Description
                    FROM subject_offer
                    INNER JOIN term on subject_offer.Term_ID = term.Term_ID
                    INNER JOIN subject on subject_offer.Subject_Code = subject.Subject_Code
                    WHERE subject_offer.Faculty_ID  = '".$_SESSION['Faculty_ID']."' ";
            $result = mysqli_query($conn,$query);
            return $result;
        }

        function getDataSubjectOffer($conn, $id){
            $query = "SELECT subject_offer.Subject_Code , term.Term_Name, sy.SY_Name, subject_offer.Subject_Offer_ID, subject_offer.Faculty_ID, subject.Subject_Description, faculty.Faculty_Firstname, faculty.Faculty_Middlename, faculty.Faculty_Lastname, subject_offer.Process
                    FROM subject_offer
                    INNER JOIN term on subject_offer.Term_ID = term.Term_ID
                    INNER JOIN subject on subject_offer.Subject_Code = subject.Subject_Code
                    INNER JOIN faculty on subject_offer.Faculty_ID = faculty.Faculty_ID
                    INNER JOIN sy on subject_offer.SY_ID = sy.SY_ID
                    WHERE subject_offer.Subject_Offer_ID  = '$id' ";
            $result = mysqli_query($conn,$query);
            return $result;
        }

        function getCurrentData($conn){
            $q = "SELECT DISTINCT subject_offer.Subject_Code , term.Term_Name, subject_offer.Subject_Offer_ID, subject_offer.Faculty_ID,
                    subject.Subject_Description, subject_taken_handle.Evaluation_ID, evaluation.Evaluation_ScheduleFrom, evaluation.Evaluation_ScheduleTo
                FROM subject_offer
                INNER JOIN term on subject_offer.Term_ID = term.Term_ID
                INNER JOIN subject on subject_offer.Subject_Code = subject.Subject_Code
                INNER JOIN subject_taken_handle on subject_offer.Subject_Offer_ID = subject_taken_handle.Subject_Offer_ID
                INNER JOIN evaluation on subject_taken_handle.Evaluation_ID = evaluation.Evaluation_ID
                WHERE subject_offer.Faculty_ID  = '".$_SESSION['Faculty_ID']."' ";
            $r = mysqli_query($conn,$q);
            return $r;
        }

        function getAllStudentsEvaluation($conn, $key){
            $query2 = "SELECT student_evaluation.average_rate , subject_taken_handle.Subject_Offer_ID
                    FROM student_evaluation
                    INNER JOIN subject_taken_handle on student_evaluation.Subject_Student_Taken = subject_taken_handle.Subject_Student_Taken
                    WHERE subject_taken_handle.Subject_Offer_ID  = '".$key."' ";
            $result2 = mysqli_query($conn,$query2);
            return $result2;
        }

        function getCategoryTotal($conn, $key){
            $query3 = "SELECT evaluation_rating.Evaluation_Item_ID , 
                    evaluation_rating.Rating_ID,
                    evaluation_rating.Subject_Student_Taken,
                    subject_taken_handle.Subject_Offer_ID,
                    evaluation_item.eval_cat_ID
                    FROM evaluation_rating
                    INNER JOIN subject_taken_handle ON evaluation_rating.Subject_Student_Taken = subject_taken_handle.Subject_Student_Taken
                    INNER JOIN evaluation_item on evaluation_rating.Evaluation_Item_ID = evaluation_item.Evaluation_Item_ID
                    WHERE subject_taken_handle.Subject_Offer_ID = '".$key."'";
             $result3 = mysqli_query($conn,$query3);
             return $result3;
        }

        function getCurrentComments($conn, $key){
            $query4 = "SELECT subject_taken_handle.Subject_Offer_ID , student_evaluation.Comments, student_evaluation.Status,
                    student_evaluation.Student_Evaluation_ID
                    FROM student_evaluation
                    INNER JOIN subject_taken_handle on student_evaluation.Subject_Student_Taken = subject_taken_handle.Subject_Student_Taken
                    WHERE subject_taken_handle.Subject_Offer_ID = '".$key."'";
            $result4 = mysqli_query($conn,$query4);
            return $result4;
        }

        function getSpecificComments($conn, $key){
            $query5 = "SELECT subject_taken_handle.Subject_Offer_ID , evaluation_detail.Comments, evaluation_detail.Evaluation_Item_ID, evaluation_item.Evaluation_Item_Description
                    from evaluation_detail
                    INNER JOIN subject_taken_handle on evaluation_detail.Subject_Student_Taken = subject_taken_handle.Subject_Student_Taken
                    INNER JOIN evaluation_item on evaluation_detail.Evaluation_Item_ID = evaluation_item.Evaluation_Item_ID
                    WHERE subject_taken_handle.Subject_Offer_ID = '".$key."' ";
            $result5 = mysqli_query($conn,$query5);
            return $result5;
        }

        function getAllTeacherData($conn){
            $query3 = "SELECT student_evaluation.average_rate , subject_taken_handle.Subject_Offer_ID, subject_offer.Faculty_ID
                        FROM student_evaluation
                        INNER JOIN subject_taken_handle on student_evaluation.Subject_Student_Taken = subject_taken_handle.Subject_Student_Taken
                        INNER JOIN subject_offer on subject_taken_handle.Subject_Offer_ID = subject_offer.Subject_Offer_ID
                        WHERE subject_offer.Faculty_ID  = '".$_SESSION['Faculty_ID']."'";
            $res3 = mysqli_query($conn,$query3);
            return $res3;
        }

        function getRange($conn){
            $query6 = "SELECT * FROM eval_range";
            $res6 = mysqli_query($conn, $query6);
            return $res6;
        }

        function updateProcess($conn, $id){
            $id = $conn->real_escape_string($id);
	    	$q = "UPDATE subject_offer SET Process = 2 WHERE Subject_Offer_ID = '$id'";
	    	$conn->query($q);
        }
    }