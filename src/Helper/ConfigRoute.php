<?php
namespace Rrazlab\Fortphp\Helper;

class ConfigRoute {

    private $defaults, $routes;

    public static $allowedKeys = [
        'defaults' => ["method", "controller", "view"],
        'routes' => ["url", "method", "controller", "action", "view"]
    ];

    public static $requiredKeys = ['url', 'method', 'controller', 'action'];

    public function __construct($routes = null, $defaults = null)
    {
        $this->assignDefaults($defaults);
        $this->assignRoutes($routes);
    }

    /**
     * Take all default values from config that are valid (can be found in
     * $allowedKeys)
     */
    private function assignDefaults($defaults = null)
    {
        if (!($defaults && is_array($defaults))) {
            $this->defaults = [];
            return false;
        }

        $result = array_intersect(array_keys($defaults), SELF::$allowedKeys['defaults']);
        $this->defaults = $result ? $result : [];
    }

    private function assignRoutes($routes = null)
    {
        if (!($routes && is_array($routes))) {
            $this->routes = [];
            return false;
        }

        foreach ($routes as $key => $route) {
            if (!(array_diff(array_keys($route), SELF::$allowedKeys['routes']))) {
                $this->routes[] = $route;
            }
        }

        array_filter();

        foreach($this->routes as $key => $route) {

            if (!(isset($route['url']) || isset($this->defaults['url']))) {
                unset $this->routes[$key];
            }
        }
    }

    public function getRouteData($name)
    {
        if (!isset($this->routes[$name])) {
            return false;
        }

        $result = array();
        $result['url'] = isset($this->routes[$name]['url']) : $this->routes[$name]['url'] ? false;


        return array(
            'url' =>
        )
    }
}
