<?php
session_start();

include_once($_SERVER['DOCUMENT_ROOT'] . "/src/inc/config.php");

/*
This is the page, which handles sign up requests.
It uses $_POST['email'], $_POST['password'], $_POST['remember']
*/
require_once('auth.php');
require_once($path['config'] . '/config.php');

header('Content-Type: application/json');

try {
    if (!isset($_POST['remember'])) {
        // do not keep logged in after session ends
        $rememberDuration = null;
    } else if ($_POST['remember'] == 1) {
        // keep logged in for one year
        $rememberDuration = (int) (60 * 60 * 24 * 365.25);
    } else {
        // do not keep logged in after session ends
        $rememberDuration = null;
    }

    $auth->login($_POST['email'], $_POST['password'], $rememberDuration);
    echo json_encode(array(
        "login" => "true",
    ));
} catch (\Delight\Auth\InvalidEmailException $e) {
    echo json_encode(array(
        "login" => "false",
        "error" => "Wrong email address",
    ));
} catch (\Delight\Auth\InvalidPasswordException $e) {
    echo json_encode(array(
        "login" => "false",
        "error" => "Wrong password",
    ));
} catch (\Delight\Auth\EmailNotVerifiedException $e) {
    echo json_encode(array(
        "login" => "false",
        "error" => "Email not verified",
    ));
} catch (\Delight\Auth\TooManyRequestsException $e) {
    echo json_encode(array(
        "login" => "false",
        "error" => "Too many requests",
    ));
}
