<?php
session_start();
$site_name = "Mathbase";
include_once($_SERVER['DOCUMENT_ROOT'] . "/src/inc/config.php");
include_once($path['config'] . "/config.php");

require_once($path['src'] . '/html/head.php');
?>

<body>
    <?php require_once($path['src'] . '/html/header.php'); ?>
    <?php require_once($path['src'] . '/html/exercise_list.php'); ?>
    <?php require_once($path['src'] . '/html/footer.php'); ?>
</body>