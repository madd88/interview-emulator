<?php
session_start();

use core\classes\Db;
use core\classes\Router;

spl_autoload_register(function ($class) {
    $path = str_replace('\\', '/', $class) . '.php';

    if (file_exists($path))
        require $path;
});

define('DIR_TMPL', __DIR__ . "/views/");
define('MAIN_LAYOUT', 'main');

Db::connect();
Router::start();
