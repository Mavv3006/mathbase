<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/database/AuthDatabase.php';


use Delight\Auth\Auth;

$authDB = new AuthDatabase();
$db = $authDB->get_db();

$auth = new Auth($db);
