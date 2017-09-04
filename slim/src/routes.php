<?php
// Psr-7 Request and Response interfaces
use Psr\Http\Message\ServerRequestInterface as Req;
use Psr\Http\Message\ResponseInterface as Res;
/*
// Routes
$app->get('/[{name}]', function ($request, $response, $args) {
  // Sample log message
  $this->logger->info("Slim-Skeleton '/' route");
  die('okok');
  // Render index view
  //return $this->renderer->render($response, 'index.phtml', $args);
});
*/
$app->get('/', function ($req, $res, $args) {
  // Sample log message
  $this->logger->info("Slim-Skeleton '/' route");
  $res->getBody()->write("<h1>Aplicaciones de Max.</h1>");
  return $res;
});