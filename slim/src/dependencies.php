<?php
// DIC configuration

$container = $app->getContainer();

/*
// view renderer
$container['renderer'] = function ($c) {
    $settings = $c->get('settings')['renderer'];
    return new Slim\Views\PhpRenderer($settings['template_path']);
};
*/
// Twig view dependency
$container['view'] = function ($c) {
  $cf = $c->get('settings')['view'];
  $view = new \Slim\Views\Twig($cf['path'], $cf['twig']);
  $view->addExtension(new \Slim\Views\TwigExtension(
    $c->router,
    $c->request->getUri()
  ));
  return $view;
};

// monolog
$container['logger'] = function ($c) {
    $settings = $c->get('settings')['logger'];
    $logger = new Monolog\Logger($settings['name']);
    $logger->pushProcessor(new Monolog\Processor\UidProcessor());
    $logger->pushHandler(new Monolog\Handler\StreamHandler($settings['path'], $settings['level']));
    return $logger;
};

/**
 *  Aquí registrar los controladores
 */

// Elegir un nombre para el controlador
$container['MitologyController']=function($container){
  // se usa el namespace
  // $container es inyectado para pasarlo al constructor de la clase
  return new \Src\Controllers\MitologyController($container);
};

$container['VueController']=function($container){
  // se usa el namespace
  // $container es inyectado para pasarlo al constructor de la clase
  return new \Src\Controllers\VueController($container);
};