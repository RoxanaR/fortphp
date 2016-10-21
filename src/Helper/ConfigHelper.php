<?php
namespace Rrazlab\Fortphp\Helper;

class ConfigHelper {

    private $configRoute;

    /**
     * @param array $config - config array from app
     */
    public function __construct($config)
    {
        $this->configRoute = new ConfigRoute($config['routes'], $config['defaults']);
    }
}
