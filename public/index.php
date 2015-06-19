<?php

require '../vendor/autoload.php';

use Common\Config\Ini as IniConfig;
use Common\View\Renderer;
use Common\Database\Connector;
use \Common\Utils\AppRegistry;

define('BASE_DIR', realpath(__DIR__ . '/../') . DIRECTORY_SEPARATOR);

define('APP_DEVELOPMENT_MODE', 'development');
define('APP_STAGING_MODE', 'staging');
define('APP_PRODUCTION_MODE', 'production');

ini_set('error_reporting', E_STRICT | E_ALL);
ini_set('display_errors', 'On');

AppRegistry::getInstance();

AppRegistry::set('environment', getenv('environment'));

if (php_sapi_name() === 'cli'             ||
    $_SERVER['HTTP_HOST'] === 'localhost' ||
    !in_array(
        AppRegistry::get('environment'),
        [APP_DEVELOPMENT_MODE, APP_STAGING_MODE, APP_PRODUCTION_MODE]))
{
    AppRegistry::set('environment', APP_DEVELOPMENT_MODE);
}

AppRegistry::set('config', IniConfig::getInstance(
    BASE_DIR            .
    DIRECTORY_SEPARATOR .
    'protected'         .
    DIRECTORY_SEPARATOR .
    'configuration'     .
    DIRECTORY_SEPARATOR .
    AppRegistry::get('environment') . '.ini'
));

$config = AppRegistry::get('config');

AppRegistry::set('renderer', new Renderer($config));
AppRegistry::set('connector', Connector::getInstance($config));
AppRegistry::set('app', new \Slim\Slim($config->offsetGet('common')));

/**
 * @var Closure $controllers
 */
$controllers = require_once(BASE_DIR . 'protected/controllers/public.php');

/**
 * @var \Slim\Slim
 */
$controllers(
    AppRegistry::get('app'),
    AppRegistry::get('config'),
    AppRegistry::get('renderer'),
    AppRegistry::get('connector')
)->run();