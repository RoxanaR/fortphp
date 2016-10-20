<?php
namespace Rrazlab\Fortphp\Helper;

class ConfigHelper {

    private $configRoute;

    public function __construct($config)
    {
        $this->configRoute = new ConfigRoute($config['routes'], $config['defaults']);
    }
}
