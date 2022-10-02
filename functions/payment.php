<?php
ob_start();
session_start();

require_once dirname(__DIR__)."../classes/payment.php";
require_once dirname(__DIR__)."../classes/identifier.php";
require_once dirname(__DIR__)."../classes/year.php";
// payment object 
$payment = new payment();
// identifier object 
$identifier = new identifiyer();
// year object 
$year = new year();

$current_year = $year->getLastYear();

foreach($current_year as $row){
    $school_year = $row['school_year'];
}


if($_SERVER['REQUEST_METHOD'] == "POST"){

    if(isset($_POST['amount']) AND !empty($_POST['amount']) AND
        isset($_POST['motif']) AND !empty($_POST['motif']) AND
        isset($_POST['method']) AND !empty($_POST['method']) AND
        isset($_POST['stud_matri']) AND !empty($_POST['stud_matri']) AND
        isset($_POST['stud_fee']) AND !empty($_POST['stud_fee'])
    ){

        $amount_paid = $_POST['amount'];
        $motif = $_POST['motif'];
        $method = $_POST['method'];
    $stud_matri = $_POST['stud_matri'];
    $stude_fee = $_POST['stud_fee'];

    //invoice number
    $num_invoice = $identifier->setInvoiceNumber();
    // register new payment
    $payment->newPayment($num_invoice,$amount_paid,$stud_matri,$_SESSION['matriculation'],$motif,$method,$_SESSION['id_campus'],$school_year,'form 1',$stude_fee);
    
    header('location:../admin/fees_collection.php');
    }else{
        header('Location:404/php');
    }
}else{
    header('Location:404.php');
}


ob_end_flush();