<?php


// 1 Обшие настройки
ini_set('display errors',1);
error_reporting(E_ALL);

// 2 Подключения файловой системы
define('ROOT', dirname(__FILE__));
include_once (ROOT. '/components/Router.php');
include_once (ROOT. '/components/Db.php');

//3 Вызов роутера 
$router = new Router();
$router->run();