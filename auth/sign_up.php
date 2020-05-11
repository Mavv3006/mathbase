<?php

/*
This is the page, which handles sign up requests.
It uses $_POST['email'],$_POST['password'] and $_POST['username']
*/

require_once('auth.php');

try {
    $userId = $auth->register($_POST['email'], $_POST['password'], $_POST['username'], null);

    // The user has been signed up
    echo 'We have signed up a new user with the ID ' . $userId;
} catch (\Delight\Auth\InvalidEmailException $e) {
    die('Invalid email address');
} catch (\Delight\Auth\InvalidPasswordException $e) {
    die('Invalid password');
} catch (\Delight\Auth\UserAlreadyExistsException $e) {
    die('User already exists');
} catch (\Delight\Auth\TooManyRequestsException $e) {
    die('Too many requests');
}
