<?php

session_start();
require_once('auth.php');
require_once('../config/routes.php');

$auth->logOut();

$user_location = $_SESSION[USER_LOCATION];
if (isset($user_location)) {
    $page = PAGE[$user_location];
    if (isset($page)) {
        redirect("../" .  $page);
    } else {
        http_response_code(404);
        die();
    }
} else {
    redirect("../public/");
}