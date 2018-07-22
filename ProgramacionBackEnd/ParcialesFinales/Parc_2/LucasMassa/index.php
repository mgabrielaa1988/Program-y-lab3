<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;
use \Firebase\JWT\JWT as JWT;

require 'vendor/autoload.php';
require 'clases.php';
$config['displayErrorDetails'] = true;
$config['addContentLengthHeader'] = false;
$app = new \Slim\App(["settings" => $config]);

$app->group('/medias', function () {
    $this->post('[/]', function (Request $request, Response $response) {
        return Medias::AgregarMedias($request, $response);
    });

    $this->get('[/]', function (Request $request, Response $response) {
        return Medias::MostrarListado($request, $response);
    });
});

$app->group('/usuarios', function () {
    $this->post('[/]', function (Request $request, Response $response) {
        return Usuarios::AgregarUsuarios($request, $response);
    });
    $this->get('[/]', function (Request $request, Response $response) {
        return Usuarios::MostrarListado($request, $response);
    });

});
$app->group('/login', function () {
    $this->post('[/]', function (Request $request, Response $response) {
        $params = $request->getParsedBody();
        $key = "llave";
        $fecha = time();
        $payload = array(
            "correo" => $params['correo'],
            "clave" => $params['clave'],
            "iat" => $fecha,
            "exp" => $fecha + 20000
        );
        $jwt = JWT::encode($payload, $key);
        $objRetorno = new stdClass();
        $objRetorno->jwt = $jwt;
        return $response->withJson($objRetorno, 200);
    })->add(\Middlewares::class . ":VerificarBD")
        ->add(\Middlewares::class . "::VerificarVacios")
        ->add(\Middlewares::class . ":VerificarSeteados");
});

$app->put('/modificarMedia', function (Request $request, Response $response) {
    return Medias::Modificar($request, $response);
})->add(\Middlewares::class . '::EsEncargado')
    ->add(\Middlewares::class . '::EsPropietario')
    ->add(\Middlewares::class . ':VerificarToken');

$app->delete('/borrarMedia', function (Request $request, Response $response) {
    return Medias::Eliminar($request, $response);
})->add(\Middlewares::class . '::EsPropietario')
    ->add(\Middlewares::class . ':VerificarToken');

/* ->add(\Middlewares::class . ":EsEncargado")
    ->add(\Middlewares::class . '::EsPropietario') */


$app->run();
?>