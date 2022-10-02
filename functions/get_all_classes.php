<?php
ob_start();
require_once dirname(__DIR__)."../classes/class.php";

$classes = new Classes();

echo json_encode($classes->getAllClasses());

ob_end_flush();