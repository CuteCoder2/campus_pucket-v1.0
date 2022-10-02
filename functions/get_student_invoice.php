<?php

ob_start();

require_once dirname(__DIR__)."../classes/payment.php";
require_once dirname(__DIR__)."../classes/year.php";

// invoice object
$invoice = new Payment();

// Year object 
$year = new year();

$current_year = $year->getLastYear();
foreach($current_year as $row){
   
    $school_year = $row['school_year'];
}

if (isset($_GET['matriculation'])){

    $matriculation = $_GET['matriculation'] ;
    $student_info = $invoice->getStudentPayment($school_year,$matriculation);

    echo json_encode($student_info);
}







ob_end_flush();