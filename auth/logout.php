<?php

require_once('auth.php');
require_once('../config/routes.php');

$auth->logOut();
// TODO: redirect from profile.php to index.php on logout
redirect();
