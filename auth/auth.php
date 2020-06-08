<?php
include_once($_SERVER['DOCUMENT_ROOT'] . "/src/inc/config.php");

require_once($path['vendor'] . '/autoload.php');
require_once($path['src'] . '/database/AuthDatabase.php');


use Delight\Auth\Auth;

$authDB = new AuthDatabase();
$db = $authDB->get_db();

$auth = new Auth($db);
