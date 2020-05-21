<?php
session_start();
$site_name = "Mathbase";
include  $_SERVER['DOCUMENT_ROOT'] . '/html/head.php';
require_once($_SERVER['DOCUMENT_ROOT'] . '/config/config.php');
setUserLocation("index");

$site_name = "Aufgabenliste";
include_once($_SERVER['DOCUMENT_ROOT'] . '/html/head.php');

?>

<body>
<?php include $_SERVER['DOCUMENT_ROOT'].'/html/header.php'; ?>
<?php include $_SERVER['DOCUMENT_ROOT'].'/html/menu.php';?>
<?php include $_SERVER['DOCUMENT_ROOT'].'/html/exercise_list.php'; ?>
<?php include $_SERVER['DOCUMENT_ROOT'].'/html/footer.php';?>
</body>