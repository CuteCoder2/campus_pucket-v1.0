<?php
ob_start();

require_once dirname(__DIR__)."../classes/series.php";

$series = new series();

echo json_encode($series->getSeries());

ob_end_flush();