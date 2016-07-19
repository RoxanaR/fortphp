<?php
namespace Controller;
use Fort\Controller\BaseController;
use Fort\Render\BaseTemplate;

class IndexController extends BaseController {

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Index page method
     */
    public function index()
    {
        $this->render('home', array('username' => 'rraz'));
    }

}
