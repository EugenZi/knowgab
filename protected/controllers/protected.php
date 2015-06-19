<?php

use \App\Model\PageModel;

/**
 * @param \Slim\Slim                 $app
 * @param Common\Config\            $config
 * @param Common\View\Renderer      $renderer
 * @param \PDO $dbConnector
 * @return \Slim\Slim
 */
return function($app, $config, $renderer, $dbConnector) {

    $app->get('/', function() use ($app, $renderer, $dbConnector) {

        $page     = PageModel::findBy(['is_main' => 1]);
        $pageList = PageModel::findAllBy(['is_main' => 0], ['name', 'title']);

        echo $renderer->render(
            'page.html.php',
            [
                'page' => $page,
                'pageList' => $pageList
            ]
        );
    });

    $app->get('/page/:name', function($name) use ($app, $renderer, $dbConnector) {

        $page = PageModel::findOneBy(['is_main' => 0, 'name' => $name]);

        echo $renderer->render(
            'page.html.php',
            ['page' => $page]
        );
    });

    $app->get('/dictionary', function() {

    });

    $app->get('/locale/:locale', function($locale) {

    });

    return $app;

};