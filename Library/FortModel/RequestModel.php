<?php
namespace FortModel;

class RequestModel {

    /**
     * @var $method string {GET | POST | PUT | DELETE}
     */
    public $method;
    /**
     * @var $uri string - uri of the current request
     */
    public $uri;
    /**
     * @var $params array - array of params sent through request
     */
    public $params;

    /**
     * Validate url
     */
    public function __construct()
    {
        $this->method = $_SERVER['REQUEST_METHOD'];
        $this->uri = $_SERVER['REQUEST_URI'];
        // split url params into array values
        $raw = array_filter(explode('&', $_SERVER['QUERY_STRING']));
        foreach($raw as $param) {
            // split obtained params and added in array as key and value
            $a = array_filter(explode('=', $param));
            if (count($a) == 2) {
                $this->params[$a[0]] = $a[1];
            }
        }
    }

    /**
     * @return array - return params array
     */
    public function getParams()
    {
        return $this->params;
    }
}
