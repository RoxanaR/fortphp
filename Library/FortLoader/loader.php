<?php
    $rootDir = __DIR__ . '/../';

    // include router
    require_once($rootDir . 'FortRouter/src/Route.php');
    require_once($rootDir . 'FortRouter/src/Router.php');

    // include controllers
    require_once($rootDir . 'FortController/BaseController.php');

    // include models
    require_once($rootDir . 'FortModel/GenericEntityModel.php');
    require_once($rootDir . 'FortModel/DatabaseModel.php');
    require_once($rootDir . 'FortModel/JsonModel.php');
    require_once($rootDir . 'FortModel/RequestModel.php');
