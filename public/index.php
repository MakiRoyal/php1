<?php

require_once __DIR__ . '/../src/Controller/TrainingController.php';

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Selective\BasePath\BasePathMiddleware;
use Slim\Factory\AppFactory;

require_once __DIR__ . '/../vendor/autoload.php';


$app = AppFactory::create();

$app->addRoutingMiddleware();


$app->add(new BasePathMiddleware($app));

$app->addErrorMiddleware(true, true, true);


$app->get('/', function (Request $request, Response $response) {
    $response->getBody()->write('Et ce ratio dit hello world ?');
    return $response;
})->setName('root');

$app->get('/trainings', function (Request $request, Response $response) {

    $trainingsController = new TrainingController();
    $trainings = $trainingsController->getAll();

    $jsonResponse = json_encode(['status' => 200, 'data' => $trainings]);

    $response->getBody()->write($jsonResponse);

    return $response->withHeader('Content-Type', 'application/json');
});


$app->run();