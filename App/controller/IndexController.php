<?php
namespace Controller;
use FortController\BaseController;

class IndexController extends BaseController {

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        echo 'index page';
    }

    public function about()
    {
        echo 'about page';
    }

}
