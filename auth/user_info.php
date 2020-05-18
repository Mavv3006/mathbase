<?php
require_once('../models/User.php');
require_once('auth.php');

/**
 * Gets the currently signed in user.
 *
 * @return User Gets the currently signed in user
 * @return null If no User is currently signed in
 */
function getActiveUser()
{
    global $auth;
    if ($auth->isLoggedIn()) {
    return new User($auth->getUserId(), $auth->getUsername(), $auth->getEmail());
    } else {
        return null;
    }
}
