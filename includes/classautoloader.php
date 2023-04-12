<?php

spl_autoload_register('classAutoloader');

function classAutoloader ($className) {
    $url = $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];

    if(strpos($url, 'includes') !== false) {
        $path = '../classes/';
    } else {
        $path = 'classes/';
    }

    $extension = '.php';

    require_once $path . $className . $extension;

}