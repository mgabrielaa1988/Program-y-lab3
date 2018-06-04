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

// RUTAS
$app->get('[/]', function (Request $request, Response $response) {
    $response->getBody()->write("Hola mundo !<br>");
    return $response;
});
// FUNCION MIDDLEWARE EN RUTEO
$app->get('/nivelRuteo', function (Request $request, Response $response) {
    $response->getBody()->write("Hola mundo !<br>");
    return $response;
})->add(function ($request, $response, $next) {
    $response->getBody()->write("<pre>                 Antes nivel ruteo </pre></br>");
    $response = $next($request, $response);
    $response->getBody()->write("<pre>                 Despues nivel ruteo </pre></br>");
    return $response;
});

// FUNCION MIDDLEWARE EN GRUPO

$app->group('/credenciales', function () {
    $this->get('[/]', function (Request $request, Response $response) {
        $response->getBody()->write('Estoy en GET - GRUPO<br>');
        return $response;
    });
    $this->post('[/]', function (Request $request, Response $response) {
        $response->getBody()->write('Solo admins , Hola: ' . $request->getParsedBody()['nombre'] . "<br>");
        return $response;
    });
})->add(function ($request, $response, $next) {
    if ($request->isGet())
        $response->getBody()->write('es GET<br>');
    else if ($request->isPost()) {
        $parametros = $request->getParsedBody();
        if (isset($parametros['perfil']) && isset($parametros['nombre'])) {
            if ($parametros['perfil'] == "ADMIN") {
                $response = $next($request, $response);
                return $response;
            } else {
                $response->getBody()->write('No se tiene permisos adecuados.<br>');
            }

        } else {
            $response->getBody()->write('No se puede acceder a la pagina <br>');
        }

    }
    return $response;
});
// MIDDLEWARE PDO EJERCICIO FINAL   
$app->group('/DB', function () {
    $this->post('/verificarUsuario', function (Request $request, Response $response) {
        $response->getBody()->write('USUARIO ENCONTRADO!');
        return $response;
    })->add(function ($request, $response, $next) {
        $nombre = $request->getParsedBody()['nombre'];
        $password = $request->getParsedBody()['password'];
        $objetoPDO = new PDO('mysql:host=localhost;dbname=mi_db;charset=utf8', "root", "");
        $sql = $objetoPDO->prepare('SELECT * FROM usuarios WHERE nombre=:nombre AND password=:password ');
        $sql->bindValue(':nombre', $nombre);
        $sql->bindValue(':password', $password);
        $sql->execute();
        $result = $sql->rowCount();
        $response->getBody()->write($result);
        if ($result === 1) {
            $response = $next($request, $response);
            return $response;
        } else
            $response->getBody()->write("Usuario no encontrado");

        return $response;
    });
    $this->post('/agregarUsuario', function (Request $request, Response $response) {
        $response->getBody()->write('Usuario agregado!');
        return $response;
    });
})->add(function ($request, $response, $next) {
    $parametros = $request->getParsedBody();
    if ($request->isPost()) {
        if (isset($parametros['perfil']) && isset($parametros['nombre']) && isset($parametros['password'])) {
            if ($parametros['perfil'] == "admin") {
                $nombre = $parametros['nombre'];
                $password = $parametros['password'];
                $objetoPDO = new PDO('mysql:host=localhost;dbname=mi_db;charset=utf8', "root", "");
                $sql = $objetoPDO->prepare(`INSERT INTO usuarios (nombre,password) VALUES ('$nombre','$password')`);
                $sql->bindValue(':nombre', $nombre);
                $sql->bindValue(':password', $password);
                $sql->execute();
                $response=$next($request,$response);
                return $response;
            }
        }
    }
    return $response;
});

//FUNCIONES MIDDLEWARE
$mwAntesDespues = function ($request, $response, $next) {
    $response->getBody()->write('Antes nivel global <br>'); // PRIMERA PAGINA
    $response = $next($request, $response); // PAGINA 
    $response->getBody()->write("Despues nivel global");
    return $response;
};

//Agregar el middleware
//$app->add($mwAntesDespues);
// RUN RUN HACE EL MOTOR
$app->run();
?>