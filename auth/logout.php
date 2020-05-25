<?php

require_once('auth.php');
require_once('../config/routes.php');

$auth->logOut();
redirect();
