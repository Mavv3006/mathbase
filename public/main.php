<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/config/config.php');
setUserLocation("main");

$site_name = "Mathbase";
require_once($_SERVER['DOCUMENT_ROOT'] . '/src/html/head.php');
?>

<body>
    <?php require_once($_SERVER['DOCUMENT_ROOT'] . '/src/html/header.php'); ?>
    <?php require_once($_SERVER['DOCUMENT_ROOT'] . '/src/html/exercise_list.php'); ?>
    <?php require_once($_SERVER['DOCUMENT_ROOT'] . '/src/html/footer.php'); ?>
</body>