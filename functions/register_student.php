<?php
ob_start();

session_start();

require_once dirname(__DIR__)."../classes/student.php";
require_once dirname(__DIR__)."../classes/parent.php";
require_once dirname(__DIR__)."../classes/parent_has_student.php";
require_once dirname(__DIR__)."../classes/identifier.php";
require_once dirname(__DIR__)."../classes/payment.php";
require_once dirname(__DIR__)."../classes/achieve_student.php";

if($_SERVER['REQUEST_METHOD'] == 'POST'){



$fname = $_POST['fname'];
$oname = $_POST['lname'];
$lname = $_POST['lname'];
$pob = $_POST['POB'];
$dob = $_POST['DOB'];
$sex = $_POST['sex'];
$contact = $_POST['contact'];
$email = $_POST['email'];
$nationality = $_POST['nationality'];
$resident = $_POST['resident'];
$religion = $_POST['religion'];
$marital_status = $_POST['marital_status'];
$picture = $_FILES['picture'];
$pfname = $_POST['pfname'];
$poname = $_POST['poname'];
$plname = $_POST['plname'];
$psex = $_POST['psex'];
$pcontact = $_POST['pcontact'];
$pemail = $_POST['pemail'];
$relation = $_POST['relation'];
$president = $_POST['president'];
$class_name = $_POST['class_name'];
$series = $_POST['series'];
$subserie = $_POST['subseris'];
$student_fee = $_POST['student_fee'];
$campus = $_POST['campus'];
$section = $_POST['section'];
$school_year = $_POST['school_year'];
$registratio_fee = $_POST['registratio_fee'];
$method = $_POST['method'];
$motif = $_POST['motif'];



    //new student object
    $student = new student();
    // new parent_has_student object
    $parent = new parents();
    // new parentStudent object
    $parentStudent = new parentStudent();
    // new identifier object
    $identifier = new identifiyer();
    // new payment object
    $payment = new payment();
    //ne studentAchieve object
    $studentAchieve = new studentAchieve();


    if(
        isset($fname) AND
        !empty($fname) AND
        isset($lname) AND
        !empty($lname) AND
        isset($pob) AND
        !empty($pob) AND
        isset($dob) AND
        !empty($dob) AND
        isset($sex) AND
        !empty($sex) AND
        isset($nationality) AND
        !empty($nationality) AND
        isset($resident) AND
        !empty($resident) 

    ){
        // generating student matrculation number
        $matriculation = $identifier->setStudentMatricultion($subserie,$school_year,$fname,$lname);

        $img = $picture;
        if(isset($img)){

            $imgName = $img['name'];
            $imgtempLoca = $img['tmp_name'];
            $imgError = $img['error'];
            
        $img_explod = explode('.',$imgName);
        
        $allowed_extension = ['jpep','jpg','mpeg','png'];
        
        $imgExtenion = end($img_explod);
        
        strtolower($imgExtenion);
        
        if(in_array($imgExtenion,$allowed_extension)){
            if($imgError == 0){
                $date =  date('YmdHis');

                $imagNewName = "../upload/studentmedias/".$matriculation.$date.".".$imgExtenion;
                
                move_uploaded_file($imgtempLoca,$imagNewName);
                    
        }else{

            $imagNewName = "../img/user.png";
        }
}else{
    $imagNewName = "../img/user.png";
}
}else{
    $imagNewName = "../img/user.png";
    
    }


        // registring student 
        $student->addNewStudent($matriculation,$fname,$oname,$lname,$imagNewName,$contact,$sex,$dob,$pob,$nationality,$resident,$religion,$marital_status,$email,$student_fee,$class_name,$series,$subserie,$campus,$school_year,$campus);

        //register student in Achieve
        $id_achieve = $matriculation.$date.$class_name.$campus; 
        $studentAchieve->newAchieve($id_achieve,$school_year,$class_name,$matriculation);

        // regitring parent
        $parent->newParent($pcontact,$pfname,$poname,$plname,"",$psex,$president,$pemail);

        // linking student to parent
        $parentStudent->newParentStudent($matriculation,$pcontact);

        // do first payment
        //generating payment identifier
        $payment_identifier = $identifier->setInvoiceNumber();

        $payment->newPayment($payment_identifier,$registratio_fee,$matriculation,$_SESSION['matriculation'],$motif,$method,$campus,$school_year,$class_name,$student_fee);

        header("location:../admin/all_students.php");

    }else{
        header("loction:../../../views/Verify Info be for submiting page.php");

    }
    
}else{
    header("loction:../../../views/page not found.php");

}

ob_end_flush();