<?php
namespace Src\Controllers;

// Psr-7 Request and Response interfaces
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

class MitologyController{
  
  public function __construct($container){
    // make the container available in the class
    $this->container = $container;
  }

  public function index(Request $req, Response $res, $args){
    //$res->getBody()->write('Bienvenido a Animebook ;)');
    $vars = [
      'page' => [
        'title' => '',
        'description' => 'Este es un esqueleto de Slim 3.1',
        'usr' => 'M.A.G.S.'
      ],
    ]; 
    //return $res;
    $this->container->view->render($res, 'mitology/index.twig', $vars);
  }

  public function mitology(Request $req, Response $res, $args){
    $mitologies = array('greek'=>'Griega', 'egyptian'=>'Egipcia', 'nordic'=>'Nórdica');
    $ty = $args['type'];
    $mitology = $mitologies[$ty];
    $vars = [
      'page' => [
        'title' => ' '.$mitology,
        'description' => 'Este es un esqueleto de Slim 3.1',
        'usr' => 'M.A.G.S.'
      ],
      'mitology'=>$mitology,
      'type'=>$ty
    ]; 
    //return $res;
    $this->container->view->render($res, 'mitology/mitology.twig', $vars);
  }
}