<?php

include CLASSES . 'Autoloader.php';

Autoloader::register();

$db = new Database();

$session = new Session();
session_set_save_handler($session, true);
session_start();

$router = new Router();