<?php
$dbh = new PDO('mysql:host=internal-db.s109806.gridserver.com;dbname=db109806_lan', "db109806", "PQN6QczB", array(
            //PDO::ATTR_PERSISTENT => true
        ));
$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

include("template.php");

function my_autoloader($class) {
    include 'classes/' . strtolower($class) . '.class.php';
}

spl_autoload_register('my_autoloader');

Authenticate::prepare();