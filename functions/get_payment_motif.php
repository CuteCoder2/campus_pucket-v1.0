<?php
ob_start();


require_once dirname(__DIR__)."../classes/motif.php";

$motif = new paymentMotif();

echo json_encode($motif->getPaymentMotif());
ob_end_flush();