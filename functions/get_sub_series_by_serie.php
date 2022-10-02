<?php
ob_start();

require_once dirname(__DIR__).'../classes/sub_serie.php';

$series = new subSeries();
if(isset($_GET['id_serie'])){

    echo json_encode($series->getSubSerieById($_GET['id_serie']));
}
ob_end_flush();