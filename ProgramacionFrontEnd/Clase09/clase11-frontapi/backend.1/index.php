<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;
use \Firebase\JWT\JWT as JWT;

require 'vendor/autoload.php';
require 'verificadora.php';

$config['displayErrorDetails'] = true;
$config['addContentLengthHeader'] = false;

$app = new \Slim\App(["settings" => $config]);

$app->group('/test', function (){
    $this->post('[/]', function (Request $request, Response $response) {   
        $params=$request->getParsedBody();
        $key = "example_key";
        $fecha = time();
        $payload=array(
            "user"=> $params['nombre'],
            "pass"=> $params['clave'],
            "iat"=> $fecha,
            "exp"=> $fecha+1000
        );
        $jwt = JWT::encode($payload, $key);
        return $response->withJson($jwt,200);
    })->add(\Verificadora::class.':VerificarUsuario');
    $this->post('/', function (Request $request, Response $response, array $args){
        $elToken= $request->getHeader('miToken');
        if(empty($elToken[0])|| $elToken[0] === "")
        {
            echo "el token esta vacio";
        }
        try
        {
            $jwtDecode = JWT::decode($elToken[0],'example_key',array('HS256'));
            $eltoken=Verificadora::TraerLosCds($request,$response);
            return $response->withJson($eltoken,200);
        }
        catch(Exception $e)
        {
            return json_encode("mensaje"=>"no se pudo cargar la lista");
        }
    });
});

$app->run();

?>