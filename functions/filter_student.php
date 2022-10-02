<?php
ob_start();

require_once dirname(__DIR__)."../classes/dbconnect.php";

$connection = new DBconnect();
$conn = $connection->connection();


$filter_stmt = " SELECT * FROM `campus_pucket`.`student` WHERE 1 ";

if(isset($_GET['matriculation']) && !empty($_GET['matriculation'])){
    
    $matriculation = $_GET['matriculation'];
    $filter_stmt .= " AND `student`.`matriculation` LIKE '%".$matriculation."%'";
}

if( isset($_GET['fname']) && !empty($_GET['fname'])){
    
    $fname = $_GET['fname'];
    $filter_stmt .= " AND `student`.`fname` LIKE '%".$fname."%'";
    
}
if(isset($_GET['oname']) && !empty($_GET['oname'])){
    
    $oname = $_GET['oname'];
    $filter_stmt .= " AND `student`.`oname` LIKE '%".$oname."%'";
}

if(isset($_GET['lname']) && !empty($_GET['lname'])){

    $lname = $_GET['lname'];
    $filter_stmt .= " AND `student`.`lname` LIKE '%".$lname."%'";
}

if(isset($_GET['class_name']) && !empty($_GET['class_name'])){

    $class_name = $_GET['class_name'];
    $filter_stmt .= " AND `student`.`class_name` LIKE '%".$class_name."%'";
}
 
if(isset($_GET['sub_serie']) && !empty($_GET['sub_serie'])){

    $sub_serie = $_GET['sub_serie'];
    $filter_stmt .= " AND `student`.`id_sub_serie` LIKE '%".$sub_serie."%'";
}

if(isset($_GET['id_section']) && !empty($_GET['id_section'])){

    $id_section = $_GET['id_section'];
    $filter_stmt .= " AND `student`.`id_section` LIKE '%".$id_section."%'";
}

if(isset($_GET['school_year']) && !empty($_GET['school_year'])){

    $school_year = $_GET['school_year'];
    $filter_stmt .= " AND `student`.`school_year` LIKE '%".$school_year."%'";
}

if(isset($_GET['gender']) && !empty($_GET['gender'])){

    $gender = $_GET['gender'];
    $filter_stmt .= " AND `student`.`sex` LIKE '%".$gender."%'";
}

if(isset($_GET['series']) && !empty($_GET['series'])){

    $series = $_GET['series'];
    $filter_stmt .= " AND `student`.`id_series` LIKE '%".$series."%'";
}

if(isset($_GET['status']) && !empty($_GET['status'])){

    $status = $_GET['status'];
    $filter_stmt .= " AND `student`.`status` LIKE '%".$status."%'";
    }else{

        $filter_stmt .= " AND `student`.`status` = 'active' ;";

    }

    $prepare_stmt = $conn->query($filter_stmt);

    $fetch_student_filtered = $prepare_stmt->fetchAll();

echo json_encode($fetch_student_filtered);




ob_end_flush();