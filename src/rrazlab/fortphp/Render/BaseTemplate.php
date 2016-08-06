<?php
namespace Rrazlab\Fortphp\Render;

class BaseTemplate {

    /**
     * @var $name string - template name
     */
    private $name;

    /**
     * @var $html string - template html data
     */
    private $html;

    /**
     * Template constructor
     * @var $name string - name of the template
     */
    public function __construct($name = '') {
        if (!$name) {
            $name = 'template_' . mt_rand(1000, 9999);
        }
        $this->setName($name);
    }

    /**
     * Render current template html - replace placeholders from html with
     * the passed params
     * @param $args array
     * @return boolean {true|false}
     */
    public function render($args) {
        if (!is_array($args)) {
            return false;
        }
        $result = $this->html;
        foreach ($args as $key => $value) {
            $result = str_replace("{{" . $key . "}}", $value, $result);
        }
        echo $result;
        return true;
    }

    /**
     * Set template name
     * @param $name string
     * @return FortRender\BaseTemplate
     */
    public function setName($name) {
        $this->name = $name;
        return $this;
    }

    /**
     * Return template name
     * @return string
     */
    public function getName() {
        return $this->name;
    }

    /**
     * Set template html
     * @param $html string
     * @return FortRender\BaseTemplate
     */
    public function setHTML($html) {
        $this->html = $html;
        return $this;
    }
}
