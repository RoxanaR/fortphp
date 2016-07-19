<?php
namespace Fort\Model;

function autoload($name){
    if (strpos($name, 'Fort\Model') !== 0) {
        return;
    }

    $objectData = explode('\\', $name);
    $fileName = end($objectData);
    $file = __DIR__ . '/src/' . $fileName . '.php' ;
    if (is_file($file)) {
        require_once($file);
    }
}

spl_autoload_register('Fort\Model\autoload');
