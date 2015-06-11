<?php

require '../vendor/autoload.php';

use Common\Config\Config;
use Common\View\Renderer;
use Common\Database\Connector;

define('BASE_DIR', realpath(__DIR__ . '/../') . DIRECTORY_SEPARATOR);

$config = Config::getInstance(
    BASE_DIR            .
    '..'                .
    DIRECTORY_SEPARATOR .
    'config.ini'
);

$renderer    = new Renderer($config);
$dbConnector = Connector::getInstance($config);
$app         = new \Slim\Slim($config['common']);

/**
 * @var Closure $controllers
 */
$controllers = require_once(BASE_DIR . DIRECTORY_SEPARATOR . 'controllers.php');

$controllers($app, $config, $renderer, $dbConnector);