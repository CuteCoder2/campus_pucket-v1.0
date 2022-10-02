<?php
ob_start();

require_once dirname(__DIR__).'../classes/year.php';

$campus = new year();

echo json_encode($campus->getLastTwoYear());

ob_end_flush();