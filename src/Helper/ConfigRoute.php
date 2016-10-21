<?php
namespace Rrazlab\Fortphp\Helper;

class ConfigRoute {

    /**
     * Holds the default values of a config. The array contains valid data.
     * @var array
     */
    private $defaults;

    /**
     * Holds the data for all the routes. This array contains valid data.
     * @var array
     */
    private $routes;

    /**
     * Arrays containing the keys that are allowed to be used in routes and
     * default objects.
     *
     * @var $allowedKeys['defaults'] contains values used for validating the
     * default values that are sent within the config object. If config array
     * contains default values that are not found in this array, they will be
     * ignored.
     *
     * @var $allowedKeys['routes'] contains values that refers to routes. The
     * route array can have key - value pairs, the keys should be found in this
     * array in order to be valid.
     *
     * @var array
     */
    public static $allowedKeys = [
        'defaults' => ["method", "controller", "view"],
        'routes' => ["url", "method", "controller", "action", "view"]
    ];

    /**
     * This array holds all the keys that a route should have in order to be
     * considered valid. The route is valid if has all the required keys
     * specified by this array or if there is specified a default value for
     * that key.
     *
     * @var array
     */
    public static $requiredKeys = ['url', 'method', 'controller', 'action'];

    /**
     * ConfigRoute constructor
     *
     * @param array $routes - array containing routes that should be validated
     * @param array $defaults - array containing default values that should
     *                          be validated
     */
    public function __construct($routes = null, $defaults = null)
    {
        $this->assignDefaults($defaults);
        $this->assignRoutes($routes);
    }

    /**
     * Take all default values from config that are valid (can be found in
     * @var $allowedKeys['defaults']). If a value is not in the @var
     * $allowedKeys['defaults'], it is ignored.
     *
     * @param  array $defaults - defaults values that comes from the application
     * @return boolean [true|false] - return false if @var $this->defaults is
     *                                empty else return true
     */
    private function assignDefaults($defaults = null)
    {
        // set defaults values to an empty array if @param $defaults is null
        if (!($defaults && is_array($defaults))) {
            $this->defaults = [];
            return false;
        }

        // filter available keys - if a default key is not valid, it is ignored
        $resultKeys = array_intersect(array_keys($defaults),
            SELF::$allowedKeys['defaults']);

        // take all the valid default values iterating throw the valid keys
        $this->defaults = [];
        foreach($resultKeys as $key) {
            $this->defaults[$key] = $defaults[$key];
        }

        return !empty($this->defaults);
    }

    /**
     * Validate route data: create @var $routes merging the config array from
     * app and the @var $defaults.
     *
     * @param  array $routes - config array that comes from app
     * @return boolean [true|false] - true if route object is valid, false if
     *                                @param $routes is null
     */
    private function assignRoutes($routes = null)
    {
        // set route array to an empty array if @param $routes is null
        if (!($routes && is_array($routes))) {
            $this->routes = [];
            return false;
        }

        foreach ($routes as $key => $route) {
            // TODO add to documentation: "if route has keys that are not allowed, route will be ignored"
            // if route has keys that are not allowed continue the loop and
            // ignore the route
            if (array_diff(array_keys($route), SELF::$allowedKeys['routes'])) {
                continue;
            }

            // Iterate throw required keys and check for that key in route
            // object. If a required key is not a key of route and the required
            // key is not defined in the @var $this->defaults array set flag to
            // false and ignore the route.
            $validRoute = true;
            foreach(SELF::$requiredKeys as $requiredKey) {
                if (!(isset($route[$requiredKey]))) {
                    if (isset($this->defaults[$requiredKey])) {
                        $route[$requiredKey] = $this->defaults[$requiredKey];
                    } else {
                        $validRoute = false;
                    }
                }
            }
            // final validation - if flag false do not add route to array
            if ($validRoute) {
                $this->routes[] = $route;
            }
        }
        return true;
    }
}
