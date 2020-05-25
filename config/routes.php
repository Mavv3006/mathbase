<?php

define('USER_LOCATION', "user_location");
define(
    'PAGE',
    array(
        "profile" => 'public/profile.php',
        "main" => 'public/main.php',
        "index" => 'public/index.php',
        "show" => 'public/exercise.php',
        "create" => 'public/new_exercise.php',
    )
);


function setUserLocation(string $location)
{
    $_SESSION[USER_LOCATION] = $location;
}

function redirect($url, $permanent = false)
{
    header('Location: ' . $url, true, $permanent ? 301 : 302);

    exit();
}
