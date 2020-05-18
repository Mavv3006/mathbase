<?php

/*
This is the page, which handles sign up requests.
It uses $_POST['oldPassword'], $_POST['newPassword']
*/

require_once('auth.php');

try {
    $auth->changePassword($_POST['oldPassword'], $_POST['newPassword']);

    echo 'Password has been changed';
} catch (\Delight\Auth\NotLoggedInException $e) {
    die('Not logged in');
} catch (\Delight\Auth\InvalidPasswordException $e) {
    die('Invalid password(s)');
} catch (\Delight\Auth\TooManyRequestsException $e) {
    die('Too many requests');
}
