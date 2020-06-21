<?php

/*
This is the page, which handles sign up requests.
It uses $_POST['id']
*/

require_once('auth.php');
header('Content-Type: application/json');
try {
    $auth->admin()->deleteUserById($_POST['id']);
    echo json_encode(array(
        "delete" => "true"
    ));
} catch (\Delight\Auth\UnknownIdException $e) {
    echo json_encode(array(
        "delete" => "false",
        "error" => "unknown ID",
    ));
}
