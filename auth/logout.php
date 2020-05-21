<?php

session_start();
require_once('auth.php');
require_once('../config/config.php');

$auth->logOut();

$userLocation = PAGE[$_SESSION[USER_LOCATION]];
if (isset($userLocation)) {
    redirect("../" . $userLocation);
    die();
} else {
    http_response_code(404);
    die();
}