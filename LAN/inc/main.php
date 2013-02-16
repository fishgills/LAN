<?php

include("template.php");

function my_autoloader($class) {
    include 'classes/' . strtolower($class) . '.class.php';
}

spl_autoload_register('my_autoloader');