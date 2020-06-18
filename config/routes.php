<?php

define('USER_LOCATION', "user_location");
define(
    'PAGE',
    array(
        "profile" => 'www/profile.php',
        "main" => 'www/main.php',
        "index" => 'www/index.php',
        "show" => 'www/exercise.php',
        "create" => 'www/new_exercise.php',
    )
);

/**
 * Sets the location of the User in the $_SESSION variable.
 *
 * @param string $location a key from the PAGE array
 * @param array $get (optional) an array of get parameters
 * @return void
 */
function setUserLocation(string $location, array $get = null)
{
    $userLocation = $location;
    if (isset($get)) {
        $userLocation = concatGet($userLocation, $get);
    }
    $_SESSION[USER_LOCATION] = $userLocation;
}

/**
 * Concatinates the get parameters with the location string.
 *
 * @param string $userLocation a key from the PAGE array
 * @param array $get an array of get parameters
 * @return string the combined string
 */
function concatGet(string $userLocation, array $get): string
{
    $userLocation = $userLocation . '?';
    foreach ($get as $key => $value) {
        $userLocation = $userLocation . $key . "=" . $value . "&";
    }
    $length = strlen($userLocation);
    $userLocation = substr($userLocation, 0, $length - 1);
    return $userLocation;
}

/**
 * Gets the key from the PAGE array.
 *
 * @return string The key from the PAGE array
 */
function getPage(): string
{
    $pos = strpos($_SESSION[USER_LOCATION], "?");
    if ($pos) {
        return substr($_SESSION[USER_LOCATION], 0, $pos);
    } else {
        return $_SESSION[USER_LOCATION];
    }
}
function concatParam(string $page): string
{
    $pos = strpos($_SESSION[USER_LOCATION], "?");
    if ($pos) {
        return $page . substr($_SESSION[USER_LOCATION], $pos);
    } else {
        return $page;
    }
}

function redirect()
{
    $user_location = getPage();
    if (isset($user_location)) {
        $page = PAGE[$user_location];
        if (isset($page)) {
            redirectToUrl("../" .  concatParam($page));
        } else {
            http_response_code(404);
            die();
        }
    } else {
        redirectToUrl("../www/");
    }
}

function redirectToUrl(string $url, bool $permanent = false)
{
    header('Location: ' . $url, true, $permanent ? 301 : 302);

    exit();
}

function redirectToPage(string $page)
{
    redirectToUrl("../" . PAGE[$page]);
}
