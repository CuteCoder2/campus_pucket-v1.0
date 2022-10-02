<?php
ob_start();

require_once dirname(__DIR__)."../classes/payment_method.php";

$paymentMethod = new paymentMethod();

echo json_encode($paymentMethod->getPaymentMethod());
ob_end_flush();