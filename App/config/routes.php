<?php
use Fort\Router\Route;
use Fort\Router\RouteManager;

$router = new Fort\Router\RouteManager();

// routing config
$router->add(new Route('/', 'GET', 'Controller\IndexController', 'index'));
$router->add(new Route('/about', 'GET', 'Controller\\IndexController', 'about'));

$router->exec();
