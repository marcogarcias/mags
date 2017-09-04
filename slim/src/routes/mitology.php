<?php
// Psr-7 Request and Response interfaces
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

// Routes
/*$app->get('/[{name}]', function ($request, $response, $args) {
    // Sample log message
    $this->logger->info("Slim-Skeleton '/' route");

    // Render index view
    return $this->renderer->render($response, 'index.phtml', $args);
});
*/
// para que se pueda mandar a llamar un método del controlador 
// hay que registrar el controlador en las dependencias
$app->group('/mitology', function(){
	$this->get('', 'MitologyController:index');
	$this->get('/type/{type}', 'MitologyController:mitology');
});

