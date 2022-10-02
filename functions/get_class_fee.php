<?php
ob_start();

require_once dirname(__DIR__).'../classes/class.php';


if(isset($_GET['class_name']) AND !empty($_GET['class_name'])){

        $class = new classes();
        
        $class_detaile = $class->getClassById($_GET['class_name']);
        
        echo json_encode($class_detaile);
        
}

    ob_end_flush();