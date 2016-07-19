<?php
namespace Fort\Router;

class Route {
    /**
     * Request URL
     * @var $url string
     */
    public $url;

    /**
     * Method of the request
     * @var $action ['GET', 'POST', 'PUT', 'DELETE']
     */
    public $method;

    /**
     * Controller name
     * @var $action string
     */
    public $controller;

    /**
     * Method from controller
     * @var $action string
     */
    public $action;

    /**
     * Route object
     * @param $url string
     * @param $method string
     * @param $controller string
     * @param $action string
     */
    public function __construct($url, $method, $controller, $action)
    {
        $this->url = $url;
        $this->method = $method;
        $this->controller = $controller;
        $this->action = $action;
    }

}
