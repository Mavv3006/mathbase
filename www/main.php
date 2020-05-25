<?php
$site_name = "Mathbase";
include_once($_SERVER['DOCUMENT_ROOT'] . "/inc/config.php");

require_once($path['src'] . '/html/head.php');
?>

<body>
    <?php require_once($path['src'] . '/html/header.php'); ?>
    <?php require_once($path['src'] . '/html/exercise_list.php'); ?>
    <?php require_once($path['src'] . '/html/footer.php'); ?>
</body>