<?php
ob_start();
require_once dirname(__DIR__).'../classes/campus.php';

$campus = new campus();

echo json_encode($campus->getCampus());

ob_end_flush();