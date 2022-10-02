<?php
ob_start();
session_start();
require_once dirname(__DIR__ )."../classes/sub_serie.php";
// sub serie object 
$sub_serie = new subSeries();

if($_SERVER['REQUEST_METHOD'] == 'POST'){

    $id_course = $_POST['id_course'];
    $course_name = $_POST['course_name'];
    $departement = $_POST['departement'];
    $id_certificate = $_POST['id_certificate'];
    $picture = $_FILES['picture'];
    $about = $_POST['about'];
    
    
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

             $imagNewName = "../upload/course/".$id_course.$date.".".$imgExtenion;
             
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

 $sub_serie->newSubSerie($id_course,$course_name,$departement,$imagNewName,$about,$id_certificate);

 header('location:../admin/all_courses.php');
}


ob_end_flush();