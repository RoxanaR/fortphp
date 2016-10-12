<?php
namespace Rrazlab/Fortphp/Controller;

class ControllerFactory {

    private $controllers;

    public function __construct()
    {
        $this->controllers = array();
    }

    public function get($alias)
    {
        if (!array_has_key($alias, $this->controllers)) {
            return false;
        }
        return new $this->controllers[$alias];
    }

}
