<?php
session_start();
include_once($_SERVER['DOCUMENT_ROOT'] . "/src/inc/config.php");
include_once($path['config'] . "/config.php");

$site_name = "Mathbase";
require_once($_SERVER['DOCUMENT_ROOT'] . '/src/html/head.php');
setUserLocation("main");
?>

<body>
    <?php require_once($_SERVER['DOCUMENT_ROOT'] . '/src/html/header.php'); ?>
    <?php require_once($_SERVER['DOCUMENT_ROOT'] . '/src/html/exercise_list.php'); ?>
    <?php require_once($_SERVER['DOCUMENT_ROOT'] . '/src/html/footer.php'); ?>
</body>