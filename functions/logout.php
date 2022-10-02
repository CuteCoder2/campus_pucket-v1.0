<?php

ob_start();

session_start();
if(session_unset() &&
session_destroy()){

    header("location:../");
}else{

    echo 'session not destroyed';
}

ob_end_flush();

