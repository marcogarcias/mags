<?php
namespace Src\Controllers;

// Psr-7 Request and Response interfaces
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

class VueController{
  
  public function __construct($container){
    // make the container available in the class
    $this->container = $container;
  }

  public function index(Request $req, Response $res, $args){
    $res->getBody()->write('Ejemplos de VueJS v2');
  }

  public function example(Request $req, Response $res, $args){
    $desc='';
    $example = $args['example'];
    switch ($example) {
      case 1:
        $desc='Uso de v-for para mostrar listas';
        break;
      case 2:
        $desc='Uso de Data binding con v-bind';
        break;
      case 3:
        $desc='VUEjs y AJAX, manejo de respuesta JSON con VUE-RESOURCE';
        break;
      default:
        $desc='Sin descripcion';
        break;
    }
    $vars = [
      'page' => [
        'title' => 'VUEJS V2',
        'description' => 'Ejemplos de VueJs - '.$desc,
        'usr' => 'M.A.G.S.'
      ],
      'example'=>$example
    ]; 
    //return $res;
    $this->container->view->render($res, 'vue/example.twig', $vars);
  }
}