<?php
ob_start();

session_start();

require_once dirname(__DIR__)."../classes/staff.php";
require_once dirname(__DIR__)."../classes/identifier.php";

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
$post = $_POST['post'];
$service = $_POST['service'];
$campus = $_POST['campus'];
$section = $_POST['section'];

// staff onject 
$staff = new staff();

// identifier object 
$identifier = new identifiyer();

if (    isset($fname) AND
// !empty($fname) AND
isset($lname) AND
// !empty($lname) AND
isset($pob) AND
// !empty($pob) AND
isset($dob) AND
// !empty($dob) AND
isset($sex) AND
// !empty($sex) AND
isset($nationality) AND
// !empty($nationality) AND
isset($resident)
// !empty($resident)
 )
 {

     // generating student matrculation number
     $matriculation = $identifier->setStaffMatricultion($fname,$lname,$post);

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

             $imagNewName = "../upload/staffmedias/".$matriculation.$date.".".$imgExtenion;
             
             move_uploaded_file($imgtempLoca,$imagNewName);
                 
     }else{

         $imagNewName = dirname(__DIR__)."../img/user.png";
     }
}else{
 $imagNewName = dirname(__DIR__)."../img/user.png";
}
}else{
 $imagNewName = dirname(__DIR__)."../img/user.png";
 
 }



 $staff->newStaff($matriculation,$fname,$oname,$lname,$imagNewName,$contact,$sex,$dop,$pob,$nationality,$resident,$religion,$marital_status,$email,$post,$campus,$section);

 header("location:../admin/all_staffs.php");




}




}