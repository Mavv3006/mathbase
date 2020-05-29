<?php
$dirs = explode("/", substr($_SERVER['PHP_SELF'], 1));
$path['rel'] = "";
for ($i = 0; $i < count($dirs) - 1; $i++) {
    $path['rel'] .= "../";
}
$path['server'] = $_SERVER['DOCUMENT_ROOT'];

$path['assets'] = $path['rel'] . "assets";
$path['auth'] = $path['rel'] . "auth";
$path['config'] = $path['rel'] . "config";
$path['css'] = $path['rel'] . "css";
$path['inc'] = $path['rel'] . "inc";
$path['js'] = $path['rel'] . "js";
$path['src'] = $path['rel'] . "src";
$path['vendor'] = $path['rel'] . "vendor";
$path['www'] = $path['rel'] . "www";