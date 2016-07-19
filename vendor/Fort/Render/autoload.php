<?php
namespace Fort\Render;

function autoload($name){
    if (strpos($name, 'Fort\Render') !== 0) {
        return;
    }

    $objectData = explode('\\', $name);
    $fileName = end($objectData);
    $file = __DIR__ . '/src/' . $fileName . '.php' ;
    if (is_file($file)) {
        require_once($file);
    }
}

spl_autoload_register('Fort\Render\autoload');
