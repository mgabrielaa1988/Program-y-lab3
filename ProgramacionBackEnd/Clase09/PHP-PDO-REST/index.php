<?php

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

require_once "Verificadora.php";

require_once './vendor/autoload.php';
$config['displayErrorDetails'] = true;
$config['addContentLengthHeader'] = false;


$app = new \Slim\App(["settings" => $config]);


$app->group('/credenciales', function () {
    $this->get('/', function ($request, $response, $args) {
        $response->getBody()->write("Desea loguear?");        
    })->add(function ($request, $response, $next) {
        return Verificadora::TraerTodosCds($request,$response,$next);
    });

    $this->post('/', function ($request, $response, $args) {
        $response->getBody()->write("Se ha logueado (POST)");        
    })->add(function ($request, $response, $next) {
        return Verificadora::AgregarCd($request,$response,$next);
    });
    
    $this->put('/', function ($request, $response, $args) {
        $response->getBody()->write("Se ha logueado (PUT)");        
    });

    $this->delete('/', function ($request, $response, $args) {
        $response->getBody()->write("Se ha logueado (DELETE)");        
    })->add(function ($request, $response, $next) {
       // return Verificadora::EliminarCd($request,$response,$next);
    });
})->add(function ($request, $response, $next) {
    return Verificadora::VerificarUsuario($request,$response,$next);
});

$app->run();