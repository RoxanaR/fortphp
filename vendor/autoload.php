<?php
$modules = ['Fort/Render', 'Fort/Controller', 'Fort/Model', 'Fort/Router'];
$rootDir = __DIR__;

foreach ($modules as $module) {
    require_once($rootDir . '/' . $module . '/autoload.php');
}
