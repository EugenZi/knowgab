<?php

/**
 * @param Slim\Slim                 $app
 * @param Common\Config\            $config
 * @param Common\View\Renderer      $renderer
 * @param Common\Database\Connector $dbConnector
 */
return function($app, $config, $renderer, $dbConnector) {

    $app->get('/', function() use ($app, $renderer) {
        echo $renderer->setData(['a'=>10, 'b' => 20])->render('index.html.php');
    });

    $app->get('/page/:name', function($pageName) {

    });

    $app->get('/dictionary', function() {

    });

    $app->get('/locale/:locale', function($locale) {

    });

    return $app;

};