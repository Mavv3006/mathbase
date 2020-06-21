<?php

require_once('auth.php');
require_once('../config/routes.php');

$auth->logOut();

header('Content-Type: application/json');
echo json_encode(array(
    "logout" => "true"
));

redirectToUrl("../../www/main.php");
