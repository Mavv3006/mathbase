<?php
 include_once($_SERVER['DOCUMENT_ROOT'] . "/src/inc/config.php");
 
require_once('auth.php');
require_once($path['src'] . '/models/User.php');
require_once($path['src'] . '/viewModel/UserViewmodel.php');

/**
 * Gets the currently signed in user.
 *
 * @return User|null Gets the currently signed in user or null
 */
function getActiveUser()
{
    global $auth;
    if ($auth->isLoggedIn()) {
        $userViewmodel = new UserViewModel();
        $picture = $userViewmodel->get_picture($auth->getUserId());

        return new User($auth->getUserId(), $auth->getUsername(), $auth->getEmail(), $picture,);
    } else {
        return null;
    }
}
