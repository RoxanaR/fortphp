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

/*<?php

// ========== Require controllers ==========
foreach ($config['controllers'] as $controller) {
    require_once($controller['path']);
}

// ========== Require views ================
foreach*/
