<?php
session_start();

include_once($_SERVER['DOCUMENT_ROOT'] . "/src/inc/config.php");

/*
This is the page, which handles sign up requests.
It uses $_POST['email'], $_POST['password'], $_POST['remember']
*/
require_once('auth.php');
require_once($path['config'] . '/config.php');

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
    redirect();
} catch (\Delight\Auth\InvalidEmailException $e) {
    die('Wrong email address');
} catch (\Delight\Auth\InvalidPasswordException $e) {
    die('Wrong password');
} catch (\Delight\Auth\EmailNotVerifiedException $e) {
    die('Email not verified');
} catch (\Delight\Auth\TooManyRequestsException $e) {
    die('Too many requests');
}
