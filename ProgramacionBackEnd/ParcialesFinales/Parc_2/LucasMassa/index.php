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
            "email" => $params['email'],
            "clave" => $params['clave'],
            "iat" => $fecha,
            "exp" => $fecha+20000
        );
        $jwt = JWT::encode($payload, $key);
        $objRetorno = new stdClass();
        $objRetorno->jwt = $jwt;
        return $response->withJson($objRetorno,200);
    })->add(\Middlewares::class.":VerificarBD")
    ->add(\Middlewares::class."::VerificarVacios")
    ->add(\Middlewares::class.":VerificarSeteados");
    
    

    $this->get('[/]',function(Request $request,Response $response){
        $elToken= $request->getHeader('miToken');
        try
        {
            $jwtDecode = JWT::decode($elToken[0],'llave',array('HS256'));
            return $response->withJson(["mensaje" => 'token valido'],200);
        }
        catch(Exception $e)
        {
            return $response->withJson(["mensaje"=>"token invalido"],409);
        }
    });
});
$app->run(/* function(Request $request,Response $response,$next){
    $response =$next($request,$response);
    if($request->isDelete()){
        $parametros = $request->getParsedBody();
        $id = $parametros['id'];
        $elToken= $request->getHeader('miToken');
        try
        {
            $usuario = 'root';
            $pass = '';
            $objetoPDO = new PDO('mysql:host=localhost;dbname=merceriabd;charset=utf8', $usuario, $pass);
            $sql = $objetoPDO->prepare('SELECT * FROM `medias` WHERE `correo`=:correo AND `clave` =:clave');
            $sql->bindValue(':correo', $jwtDecode->correo);
            $sql->bindValue(':clave', $jwtDecode->clave);
            $sql->execute();
            $objeto = $sql->fetch();
            if ($objeto) {
                if ($objeto['perfil'] === "propietario") {
                    $sql2 = $objetoPDO->prepare('DELETE FROM `medias` WHERE `id`=:id');
                    $sql2->bindValue(':id',$id);
                    $sql2->execute();
                    if($sql->rowCount()){
                        return $response->withJson(['mensaje'=>'Se pudo eliminar']);
                    }else{
                        return $response->withJson(['mensaje'=>'No se pudo eliminar']);
                    }
                }
                else{
                    return $response->withJson(['mensaje'=>'No se tienen permisos']);
                }
                } else {
                    return $response->withJson(['mensaje'=>'No se encontro la media a eliminar']);
                }
        }
        catch(Exception $e)
        {
            $response->withJson(["mensaje"=>"token invalido"],409);
        }
        
    }
    return $response;
} */);
?>