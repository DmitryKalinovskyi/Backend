<?php

function register($class): void{
    $path = __DIR__ . "\\" . $class.'.php';
    require_once  $path;
}


spl_autoload_register('register');