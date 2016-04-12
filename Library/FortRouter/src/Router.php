<?php
namespace FortRouter;
use FortModel\RequestModel;

class Router {
    /**
     * @var $routes array - routes array
     */
    private $routes;

    /**
     * Router constructor - init routes array
     */
    public function __construct()
    {
        $this->routes = array();
    }

    /**
     * Create a new route - add to route array
     * @param $route \Router\Route
     */
    public function add($route)
    {
        $this->routes[] = $route;
    }

    /**
     * Exec method from class specific to the matched route.
     * @return boolean {true | false} - true if route found
     */
    public function exec()
    {
        $requestModel = new RequestModel();
        foreach($this->routes as $route) {
            if ($requestModel->method === $route->method && $requestModel->uri === $route->url) {
                $controllerName = 'Controller\\' . $route->controller;
                $controllerObject = new $controllerName();
                $actionName = $route->action;
                echo $controllerObject->$actionName();
                return true;
            }
        }
        echo '404';
        return false;
    }
}
