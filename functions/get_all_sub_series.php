<?php
ob_start();

require_once dirname(__DIR__).'../classes/sub_serie.php';

$sub_serie = new subSeries();

echo json_encode($sub_serie->getSubSerie());
ob_end_flush();