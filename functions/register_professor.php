<?php
ob_start();

session_start();


require_once dirname(__DIR__)."../classes/teacher.php";
require_once dirname(__DIR__)."../classes/teacher_has_subject.php";
require_once dirname(__DIR__)."../classes/identifier.php";

$teacher = new teacher();
$teacherSubject = new teacherSubject();
$identifier = new identifiyer();



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
$subject = $_POST['subject'];


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
    // generating teacher matrculation number
    $matriculation = $identifier->setTeacherMatricultion($fname,$lname);

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

                        $imagNewName = "../upload/teachersmedias/".$matriculation.$date.".".$imgExtenion;
                        // moving teacher image
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

                // registrinf teacher
                $teacher->newTeacher($matriculation,$fname,$oname,$lname,$imagNewName,$contact,$sex,$dob,$pob,$nationality,$resident,$religion,$marital_status,$email);

                // assigning subject to teacher
                $teacherSubject->newTeacherSubject($matriculation,$subject);

                header("location:../admin/all_professors.php");
        }else{
            echo "all requirement not meeted";
            }

    }
    else{
        echo "POSt method not used";
    }
    
    ob_end_flush();