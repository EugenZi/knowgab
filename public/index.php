<?php

require '../vendor/autoload.php';

use Common\Config\Ini as IniConfig;
use Common\View\Renderer;
use Common\Database\Connector;

define('BASE_DIR', realpath(__DIR__ . '/../') . DIRECTORY_SEPARATOR);

define('APP_DEVELOPMENT_MODE', 'development');
define('APP_STAGING_MODE', 'staging');
define('APP_PRODUCTION_MODE', 'production');

ini_set('error_reporting', E_STRICT | E_ALL);
ini_set('display_errors', 'On');

$environment = getenv('environment');

if (php_sapi_name() === 'cli' || $_SERVER['HTTP_HOST'] === 'localhost' || !in_array($environment, [
        APP_DEVELOPMENT_MODE,
        APP_STAGING_MODE,
        APP_PRODUCTION_MODE
    ])) {
    $environment = APP_DEVELOPMENT_MODE;
}

$config = IniConfig::getInstance(
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
$controllers = require_once(BASE_DIR . 'protected/controllers/public.php');

/**
 * @var \Slim\Slim
 */
$controllers($slim, $config, $renderer, $dbConnector)->run();