<?php namespace Rrazlab\Fortphp;

class Fortphp {

    private $config;

    public function __construct($config)
    {
        $this->config = $config;
    }

    public function getConfig()
    {
        return $this->config;
    }
}
