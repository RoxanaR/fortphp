<?php namespace Rrazlab\Fortphp;

use Rrazlab\Fortphp\Helper\ConfigHelper;

class Fortphp {

    private $configHelper, $routeManager;

    public function __construct($config)
    {
        $this->configHelper = new ConfigHelper($config);

        $this->routeManager = new RouteManager();
        $this->routeManager->add(new Route());
    }
}
