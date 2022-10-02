<?php
ob_start();

require_once dirname(__DIR__).'../classes/section.php';

$campus = new section();

echo json_encode($campus->getSection());

ob_end_flush();