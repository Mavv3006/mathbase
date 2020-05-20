<?php

/*
This is the page, which handles sign up requests.
It uses $_POST['email'],$_POST['password'] and $_POST['username']
*/

require_once('auth.php');
require_once('../config/config.php');

try {
    $userId = $auth->register($_POST['email'], $_POST['password'], $_POST['username'], null);
    $auth->login($_POST['email'], $_POST['password'], $rememberDuration);

    $userLocation = PAGE[$_SESSION[USER_LOCATION]];
    if (isset($userLocation)) {
        header("Location: ../" .  $userLocation . '?id=' . $userId);
        die();
    } else {
        http_response_code(404);
        die();
    }
} catch (\Delight\Auth\InvalidEmailException $e) {
    die('Invalid email address');
} catch (\Delight\Auth\InvalidPasswordException $e) {
    die('Invalid password');
} catch (\Delight\Auth\UserAlreadyExistsException $e) {
    die('User already exists');
} catch (\Delight\Auth\TooManyRequestsException $e) {
    die('Too many requests');
}
