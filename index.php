<?php

ini_set('display_errors',1);
error_reporting(E_ALL);


define('Root', dirname(__FILE__));

require Root.'/components/Router.php';
require Root.'/components/Db.php';
require Root.'/components/Session.php';
require Root.'/models/Login.php';
require Root.'/models/Zapisi.php';


$router = new Router();
$router ->run();

