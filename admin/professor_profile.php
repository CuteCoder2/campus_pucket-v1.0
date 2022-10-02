<?php

ob_start();

session_start();


require_once("../includes/header_link.php");

require_once("../includes/navbar.php");

require_once("../includes/sidebar.php");

require_once("../includes/body_professor_profile.php");

require_once("../includes/footer.php");

require_once("../includes/footer_link.php");


ob_end_flush();
?>