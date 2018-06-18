<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

// FIRE BASE PARA CODIFICAR Y DECODIFICAR JWT
use \Firebase\JWT\JWT as JWT;

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

// RUTAS
$app->group('/test', function () {

    $this->get('[/]', function (Request $request, Response $response) {
        $response->getBody()->write("Bienvenido a la Clase 10 de JTW");
    });

    $this->post('/recuperar', function (Request $request, Response $response) {
        $parametros = $request->getParsedBody();
        $tiempo = time();
        $payload = array(
            'iat' => $tiempo,
            'data' => [
                'usuario' => $parametros['usuario'],
                'clave' => $parametros['clave']
            ]
        );
        $token = JWT::encode($payload, 'unaClave');

        return $response->withJson($token, 200);
    });

    $this->get('/verificar/{token}', function (Request $request, Response $response, $args) {
        $token = $args['token'];

        if (empty($token) || $token === "") {
            throw new Exception('token vacio');
        }

        try {
            $decodificado = JWT::decode($token, 'unaClave', array('HS256'));
            $response->getBody()->write("Token validado");
        } catch (Exception $e) {
            throw new Exception("JWT No valido " . $e->getMessage());
        }
        return $response;

    });

});



$app->run();
?>