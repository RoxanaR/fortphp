<?php
namespace Rrazlab\Fortphp\Model;

class JsonModel {

    /**
     * Encode array to json format
     * @param $array array - data to encode
     * @return string - data in json format
     */
    public function jsonEncode($array)
    {
        return json_encode($array);
    }

    /**
     * Decode json string to php array
     * @param $jsonData string - data in json format
     * @return array - php array
     */
    public function jsonDecode($jsonData)
    {
        return json_decode($jsonData);
    }
}
