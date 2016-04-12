<?php
namespace FortController;
use FortModel\JsonModel;

/**
 * Default controller model
 */
class BaseController {

    /**
     * Object used for encoding/decoding json data
     * @var $jsonModel Model\JsonModel
     */
    public $jsonModel;

    /**
     * Base controller construct - init general controller models
     */
    public function __construct()
    {
        $this->jsonModel = new JsonModel();
    }

    /**
     * Return JsonModel
     * @return Model\JsonModel
     */
    public function getJsonModel()
    {
        return $this->jsonModel;
    }

}
