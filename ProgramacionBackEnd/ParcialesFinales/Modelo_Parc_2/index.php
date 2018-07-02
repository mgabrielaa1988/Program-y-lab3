<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;
use \Firebase\JWT\JWT as JWT;

require 'vendor/autoload.php';
require 'clases.php';
$config['displayErrorDetails'] = true;
$config['addContentLengthHeader'] = false;
$app = new \Slim\App(["settings" => $config]);

$app->group('/empleados', function () {
    $this->post('/alta', function (Request $request, Response $response) {
        return Empleado::AgregarEmpleado($request, $response);
    });
    $this->post('/email/clave/', function (Request $request, Response $response) {
        $params = $request->getParsedBody();
        $key = "example_key";
        $fecha = time();
        $payload = array(
            "email" => $params['email'],
            "clave" => $params['clave'],
            "iat" => $fecha
         // "exp" => fecha+10000
        );
        $jwt = JWT::encode($payload, $key);
        $objRetorno = new stdClass();
        $objRetorno->jwt = $jwt;
        return json_encode($objRetorno);
        //return Empleado::ExisteEmpleado($request, $response);
    });
    $this->get('[/]', function (Request $request, Response $response) {
        return Empleado::MostrarListado($request, $response);
    });
})->add(\Middlewares::class . '::VerificarEmpleado');

$app->group('/productos', function () {
    $this->post('/alta', function (Request $request, Response $response) {
        return Producto::AgregarProducto($request, $response);
    })->add(\Middlewares::class.'::GuardarAccesos');
    $this->get('[/]', function (Request $request, Response $response) {
        return Producto::MostrarListado($request, $response);
    });
    $this->put('/modificar', function (Request $request, Response $response) {
        return Producto::Modificar($request, $response);
    });
    $this->delete('/eliminar', function (Request $request, Response $response) {
        return Producto::Eliminar($request, $response);
    });
})->add(\Middlewares::class.'::ContarEntradas');

$app->run();
?>