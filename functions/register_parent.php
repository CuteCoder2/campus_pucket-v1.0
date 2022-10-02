<?php
ob_start();

if($_SERVER['REQUEST_METHOD'] == 'POST'){

    require_once dirname(__DIR__)."../classes/parent.php";
    require_once dirname(__DIR__)."../classes/parent_has_student.php";

    // parent object 
    $parent = new parents();
    // parent has student
    $parentStudent = new parentStudent();



    if(isset($_POST['fname']) AND
        !empty($_POST['fname'])  AND
        isset($_POST['lname'])  AND
        !empty($_POST['lname'])  AND
        isset($_POST['relation'])  AND
        !empty($_POST['relation'])  AND
        isset($_POST['contact'])  AND
        !empty($_POST['contact'])  AND
        isset($_POST['resident'])  AND
        !empty($_POST['resident'])  AND
        isset($_POST['sex'])  AND 
        !empty($_POST['sex'])  AND
        isset($_POST['student_matriculation'])  AND
        !empty($_POST['student_matriculation'])){

            $fname = $_POST['fname'];
            $oname = $_POST['oname'];
            $lname = $_POST['lname'];
            $relation = $_POST['relation'];
            $contact = $_POST['contact'];
            $email = $_POST['email'];
            $resident = $_POST['resident'];
            $gender = $_POST['sex'];
            $student_matriculation = $_POST['student_matriculation'];
            $picture = "../img/user.png";

            // Register Student
            $parent->newParent($contact,$fname,$oname,$lname,$picture,$gender,$resident,$email);
            
            $parentStudent->newParentStudent($student_matriculation,$contact);
            
            header("location:../admin/all_parents.php");
    }else{

        header("location:../erro.php");
    }

}else{
    header("location:../erro.php");
}


ob_end_flush();