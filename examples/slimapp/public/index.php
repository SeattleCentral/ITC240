<?php

define('BASEPATH', dirname(__FILE__));

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;
use \Slim\App as App;
use \Slim\Views\Twig as Twig;
use \Slim\Views\TwigExtension as Ext;

require '../vendor/autoload.php';

$app = new App;

$container = $app->getContainer();

$container['view'] = function($container) {
    $view = new Twig(BASEPATH.'/templates', [
        'cache' => false // BASEPATH.'/.cache'
    ]);
    
    $view->addExtension(new Ext($container->get('router'), BASEPATH));
    return $view;
}; 

$app->get('/', function(Request $request, Response $response, $args) {
    $response->getBody()->write('<h1>Howdy world!</h1>');
    return $response;
});

$app->get('/greet/{name}', function(Request $request, Response $response, $args) {
    $context = [
        'name' => $args['name'],
        'date' => '2018-10-22'
    ];
    $this->view->render($response, 'home.html', $context);
});

$app->run();