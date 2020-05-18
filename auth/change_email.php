<?php

/*
This is the page, which handles sign up requests.
It uses $_POST['password'], $_POST['newEmail']
*/

require_once('auth.php');

try {
    if ($auth->reconfirmPassword($_POST['password'])) {
        $auth->changeEmail($_POST['newEmail'], function ($selector, $token) {
            echo 'Email has been changed';
        });
    } else {
        echo 'We can\'t say if the user is who they claim to be';
    }
} catch (\Delight\Auth\InvalidEmailException $e) {
    die('Invalid email address');
} catch (\Delight\Auth\UserAlreadyExistsException $e) {
    die('Email address already exists');
} catch (\Delight\Auth\EmailNotVerifiedException $e) {
    die('Account not verified');
} catch (\Delight\Auth\NotLoggedInException $e) {
    die('Not logged in');
} catch (\Delight\Auth\TooManyRequestsException $e) {
    die('Too many requests');
}