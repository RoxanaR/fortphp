<?php
namespace Fort\Render;
use Fort\Render\BaseTemplate;

class TemplateManager {

    /**
     * @var $templates array - contains all templates
     */
    private $templates;

    /**
     * Template manager constructor
     * @var $config array - containing all views - data taken from config
     */
    public function __construct($config) {
        $this->templates = array();
        foreach($config as $key => $value) {
            $template = new BaseTemplate($key);
            $template->setHTML(file_get_contents($value));
            $this->templates[$key] = $template;
        }
    }

    /**
     * Render a specific template
     * @var $name string - name of the template that will render
     * @var $args array - parameters that will be used in template
     * @return boolean {true|false} - true if template found
     */
    public function render($name, $args) {
        if (array_key_exists($name, $this->templates)) {
            $this->templates[$name]->render($args);
            return true;
        }
        return false;
    }

}
