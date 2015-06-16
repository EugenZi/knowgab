<?php

require '../vendor/autoload.php';

use Common\Config\Config;
use Common\View\Renderer;
use Common\Database\Connector;

define('BASE_DIR', realpath(__DIR__ . '/../') . DIRECTORY_SEPARATOR);

define('APP_DEVELOPMENT_MODE', 'development');
define('APP_STAGING_MODE', 'staging');
define('APP_PRODUCTION_MODE', 'production');

ini_set('error_reporting', E_STRICT | E_ALL);
ini_set('display_errors', 'On');

$environment = getenv('environment');

if (php_sapi_name() === 'cli' || !in_array($environment, [
        APP_DEVELOPMENT_MODE,
        APP_STAGING_MODE,
        APP_PRODUCTION_MODE
    ])) {
    $environment = APP_DEVELOPMENT_MODE;
}

$config = Config::getInstance(
    BASE_DIR            .
    DIRECTORY_SEPARATOR .
    'protected'         .
    DIRECTORY_SEPARATOR .
    'configuration'     .
    DIRECTORY_SEPARATOR .
    $environment . '.ini'
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