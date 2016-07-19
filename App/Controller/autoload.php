<?php
namespace Controller;

function autoload($name){
    $objectData = explode('\\', $name);
    $fileName = end($objectData);
    $file = __DIR__ . '/src/' . $fileName . '.php' ;
    if (is_file($file)) {
        require_once($file);
    }
}

spl_autoload_register('Controller\autoload');
