<?php

/*
This is the page, which handles sign up requests.
It uses $_POST['email'], $_POST['password'], $_POST['remember']
*/

require_once('auth.php');
$auth->logOut();