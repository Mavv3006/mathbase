<?php

/*
This is the page, which handles sign up requests.
It uses $_POST['id']
*/

require_once('auth.php');

try {
    $auth->admin()->deleteUserById($_POST['id']);
} catch (\Delight\Auth\UnknownIdException $e) {
    die('Unknown ID');
}
