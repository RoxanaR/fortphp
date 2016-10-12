<?php
namespace Rrazlab\Fortphp\Config;
use Rrazlab\Fortphp\Config\ConfigModel;

class Config {
    /**
     * Instance of ConfigModel used for config array validation
     * @var ConfigModel
     */
    private $configModel;

    /**
     * Init config object
     * @param  array $config - config array
     */
    public function init($config)
    {
        if ($this->configModel == null) {
            $this->configModel = new ConfigModel();
        }
        $this->configModel->init($config);
    }

    /**
     * Get default specific value
     * @param  string $name - default name
     * @return string|boolean - if default value is set, return value, else
     *                          return false
     */
    public function getDefault($name)
    {
        return $this->configModel->getDefaults($name);
    }

    /**
     * Get all default values
     * @return array|boolean - if there is at least one default value, return it
     *                         else return false
     */
    public function getDefaults()
    {
        return $this->configModel->getDefaults();
    }

    /**
     * Get a specific route based on name
     * @param  string $name - route name
     * @return array|boolean - return route if defined else return false
     */
    public function getRoute($name)
    {
        return $this->configModel->getRoutes($name);
    }

    /**
     * Get all routes
     * @return array|boolean - return all routes
     */
    public function getRoutes()
    {
        return $this->configModel->getRoutes();
    }

    /**
     * Get a specific view based on name
     * @param  string $name - view name
     * @return array|boolean - return view if defined else return false
     */
    public function getView($name)
    {
        return $this->configModel->getViews($name);
    }

    /**
     * Get all views
     * @return array|boolean - if there is at least one view, return it
     *                         else return false
     */
    public function getViews()
    {
        return $this->configModel->getViews();
    }

    /**
     * Get config
     * @return array|boolean - return config if it isset else return false
     */
    public function getConfig()
    {
        return $this->configModel->getConfig();
    }
}
