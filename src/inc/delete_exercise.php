<?php
session_start();

include_once($_SERVER['DOCUMENT_ROOT'] . "/src/inc/config.php");
require_once($path['config'] . '/config.php');
require_once($path['auth'] . '/user_info.php');

$id = $_GET['id'];

if ($id == null) {
    redirectToUrl($path['wwww'] . '/www/index.php?error=unauthorized');
}

require_once($path['src'] . '/viewModel/ExerciseViewModel.php');
$exerciseViewModel = new ExerciseViewModel();
$exercise = $exerciseViewModel->get_by_id($_GET['id']);

$activeUser = getActiveUser();
$authorId = $exercise->get_user_id();

if ($activeUser == null || $activeUser->get_id() != $authorId) {
    redirectToUrl($path['www'] . '/index.php?error=unauthorized');
}

$result = $exerciseViewModel->delete($exercise->get_id());

redirectToUrl($path['www'] . '/index.php?success=' . $result);
