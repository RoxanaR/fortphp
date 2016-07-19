<?php
namespace Fort\Router;

function autoload($name){
    if (strpos($name, 'Fort\Router') !== 0) {
        return;
    }

    $objectData = explode('\\', $name);
    $fileName = end($objectData);
    $file = __DIR__ . '/src/' . $fileName . '.php' ;
    if (is_file($file)) {
        require_once($file);
    }
}

spl_autoload_register('Fort\Router\autoload');
