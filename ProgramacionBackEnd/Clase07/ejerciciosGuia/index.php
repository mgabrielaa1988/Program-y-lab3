<?php

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

require_once './vendor/autoload.php';

$config['displayErrorDetails'] = true;
$config['addContentLengthHeader'] = false;

/*
¡La primera línea es la más importante! A su vez en el modo de 
desarrollo para obtener información sobre los errores
 (sin él, Slim por lo menos registrar los errores por lo que si está utilizando
  el construido en PHP webserver, entonces usted verá en la salida de la consola 
  que es útil).

  La segunda línea permite al servidor web establecer el encabezado Content-Length, 
  lo que hace que Slim se comporte de manera más predecible.
 */

//*********************************************************************************************//
//INICIALIZO EL APIREST
//*********************************************************************************************//

$app = new \Slim\App(["settings" => $config]);

$app->get('[/]', function (Request $request, Response $response) {
    $response->getBody()->write("GET => Bienvenido!!! a SlimFramework");
    return $response;

});

$app->post('[/]', function (Request $request, Response $response) {
    $response->getBody()->write("POST => Bienvenido!!! a SlimFramework");
    return $response;

});

$app->put('[/]', function (Request $request, Response $response) {
    $response->getBody()->write("PUT => Bienvenido!!! a SlimFramework");
    return $response;

});

$app->delete('[/]', function (Request $request, Response $response) {
    $response->getBody()->write("DELETE => Bienvenido!!! a SlimFramework");
    return $response;

});

$app->get('/ruteo/{param}', function (Request $request, Response $response, $args) {
    $xd = $args['param'];
    $response->getBody()->write("Parametro: " . $xd);
    return $response;
});

$app->get('/ruteo/{param}/[{param2}]', function (Request $request, Response $response, $args) {
    $xd = $args['param'];
    if (isset($args['param2'])) {
        $xd2 = $args['param2'];
        $response->getBody()->write("Parametro: " . $xd . " 2do parametro " . $xd2);
    } else {
        $response->getBody()->write("Parametro: " . $xd);
    }

    return $response;
});

$app->any('/grupo', function (Request $request, Response $response, $args) {
    $response->getBody()->write("ENTRASTE AL GRUPO " . $request->getMethod());
    return $response;
});

$app->map(['POST', 'GET'], '/map', function (Request $request, Response $response, $args) {
    $response->getBody()->write("Entraste al map" . $request->getMethod());
    return $response;
});

$app->group('/grupo', function () {
    $this->any('/', function (Request $request, Response $response, $args) {
        $response->getBody()->write("ENTRASTE A / " . $request->getMethod());
        return $response;
    });
    $this->any('/ruta', function (Request $request, Response $response, $args) {
        $response->getBody()->write("ENTRASTE A /RUTA " . $request->getMethod());
        return $response;
    });
});

$app->run();

?>