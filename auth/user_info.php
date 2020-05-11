<?php
require_once('auth.php');
include_once('../models/User.php');

/**
 * Gets the currently signed in user.
 *
 * @return User Gets the currently signed in user
 */
function getActiveUser(): User
{
    if ($auth->isLoggedIn()) {
    return new User($auth->getUserId(), $auth->getEmail(), $auth->getUsername());
    } else {
        return null;
    }
}
