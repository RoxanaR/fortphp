<?php
namespace Rrazlab\Fortphp\Router;
use Rrazlab\Fortphp\Model\RequestModel;

class RouteManager {
    /**
     * @var $routes array - routes array
     */
    private $routes;

    private $defaults;

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
                $controllerName = 'Fort\\Controller\\' . $route->controller;
                $controllerName = $route->controller;
                $controllerObject = new $controllerName();
                $actionName = $route->action;
                echo $controllerObject->$actionName();
                return true;
            }
        }
        echo '404';
        return false;
    }

    public function parseRoutes($routes)
    {
        if (!is_array($routes)) {
            return false;
        }
        
        foreach($routes as $route) {
            $this->routeManager->add(
                new Route($route['url'], $route['method'], $route['controller'], $route['action'])
            );
        }
    }

    public function setDefaults($defaults)
    {
        if (!is_array($defaults)) {
            return false;
        }

        $this->defaults = $defaults;
    }
}
