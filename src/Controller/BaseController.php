<?php
namespace Rrazlab\Fortphp\Controller;
use Rrazlab\Fortphp\Model\JsonModel;
use Rrazlab\Fortphp\Render\TemplateManager;

/**
 * Default controller model
 */
class BaseController {
    /**
     * Object used for encoding/decoding json data
     * @var $jsonModel FortModel\JsonModel
     */
    public $jsonModel;

    /**
     * Object used for holding all the templates
     * @var $templateManager FortRender\TemplateManager
     */
    public $templateManager;

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

    /**
     * Return the template manager
     * @return FortRender\TemplateManager
     */
    public function getTemplateManager()
    {
        return $this->templateManager;
    }

    /**
     * Method used for rendering a specific template. It calls TemplateManager
     * with specified arguments and returns the result.
     * @var $name string - name of the template
     * @var $args array - array containing variables that need to be rendered in
     *                    the template
     * @return boolean {true|false} - return render result - true if success
     */
    public function render($name, $args) {
        return $this->getTemplateManager()->render($name, $args);
    }
}
