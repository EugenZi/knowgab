<?php

require '../vendor/autoload.php';

use Common\Config\Config;
use Common\View\Renderer;
use Common\Database\Connector;

define('BASE_DIR', realpath(__DIR__ . '/../') . DIRECTORY_SEPARATOR);

ini_set('error_reporting', E_STRICT | E_ALL);
ini_set('display_errors', 'On');

$config = Config::getInstance(
    BASE_DIR            .
    DIRECTORY_SEPARATOR .
    'config.ini'
);

$renderer    = new Renderer($config);
$dbConnector = Connector::getInstance($config);
$slim        = new \Slim\Slim($config['common']);

/**
 * @var Closure $controllers
 */
$controllers = require_once(BASE_DIR . 'protected/controllers/controllers.php');

/**
 * @var \Slim\Slim
 */
$app = $controllers($slim, $config, $renderer, $dbConnector);
$app->run();