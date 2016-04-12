<?php
use FortRouter\Route;
use FortRouter\Router;

$router = new Router();

// routing config
$router->add(new Route('/', 'GET', 'IndexController', 'index'));
$router->add(new Route('/about', 'GET', 'IndexController', 'about'));

$router->exec();
