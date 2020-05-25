<?php

include_once("routes.php");

function get_config_array(): array
{
    return array(
        'host' => 'localhost',
        'password' => '',
        'username' => 'root',
        'dbName' => 'mathbase_mathbase',
    );
}
