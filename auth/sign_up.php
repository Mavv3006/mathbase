<?php

/*
This is the page, which handles sign up requests.
It uses $_POST['email'],$_POST['password'] and $_POST['username']
*/

require_once('auth.php');
require_once('../config/config.php');
header('Content-Type: application/json');
try {
    $userId = $auth->register($_POST['email'], $_POST['password'], $_POST['username'], null);
    $auth->login($_POST['email'], $_POST['password']);

    echo json_encode(array(
        "sign_up" => "true"
    ));
} catch (\Delight\Auth\InvalidEmailException $e) {
    echo json_encode(array(
        "sign_up" => "false",
        "error" => "Ungültige E-Mail-Adresse",
    ));
} catch (\Delight\Auth\InvalidPasswordException $e) {
    echo json_encode(array(
        "sign_up" => "false",
        "error" => "Ungültiges Passwort",
    ));
} catch (\Delight\Auth\UserAlreadyExistsException $e) {
    echo json_encode(array(
        "sign_up" => "false",
        "error" => "User existiert bereits",
    ));
} catch (\Delight\Auth\TooManyRequestsException $e) {
    echo json_encode(array(
        "sign_up" => "false",
        "error" => "Zu viele Requests",
    ));
}
