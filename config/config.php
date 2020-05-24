<?php

define('USER_LOCATION', "user_location");
define(
    'PAGE',
    array(
        "profile" => 'html/profile.php',
        "index" => 'index.php',
    )
);

function get_config_array(): array
{
    return array(
        'host' => 'localhost',
        'password' => '',
        'username' => 'root',
        'dbName' => 'mathbase_mathbase',
    );
}

function setUserLocation(string $location)
{
    $_SESSION[USER_LOCATION] = $location;
}

function redirect($url, $permanent = false)
{
    header('Location: ' . $url, true, $permanent ? 301 : 302);

    exit();
}
