<?php
class Middlewares
{
    // AGREGAR NECESITA RECIBIR:
    //  nombre
    //  password
    public function VerificarUsuario($request, $response, $next)
    {
        $parametros = $request->getParsedBody();
        $nombreUsuario = $parametros['nombre'];
        $password = $parametros['password'];
        $objPDO = new PDO('mysql:host=localhost;dbname=restdb;charset=utf8', "root", "");

        $objSQL = $objPDO->prepare('SELECT * FROM usuarios WHERE usuario=:nombreUsuario AND password=:password');
        $objSQL->bindValue(':nombreUsuario', $nombreUsuario);
        $objSQL->bindValue(':password', $password);
        $objSQL->execute();
        $filasUsuarios = $objSQL->rowCount();

        if ($filasUsuarios === 1)
            $response = $next($request, $response);
        else
            $response->getBody()->write("Usuario no encontrado");

        return $response;
    }

    // AGREGAR NECESITA RECIBIR POR POST:
    //  perfil = admin
    //  nombreAgregar
    //  passwordAgregar

    // ELIMINAR NECESITA RECIBIR POR DELETE:
    //  perfil = super_admin
    //  nombreEliminar
    //  passwordEliminar

    public function FuncionesAdmin($request, $response, $next)
    {
        $parametros = $request->getParsedBody();

        if ($request->isPost() && isset($parametros['perfil']) && $parametros['perfil'] == 'admin') {
            $nombreUsuario = $parametros['nombreAgregar'];
            $password = $parametros['passwordAgregar'];
            try {

                $objPDO = new PDO('mysql:host=localhost;dbname=restdb;charset=utf8', "root", "");

                $objSQL = $objPDO->prepare('INSERT INTO `usuarios`(`usuario`, `password`) VALUES (:nombreUsuario,:password)');
                $objSQL->bindValue(':nombreUsuario', $nombreUsuario);
                $objSQL->bindValue(':password', $password);

                if ($objSQL->execute()) {
                    $response->getBody()->write('Usuario agregado!<br>');
                } else
                    $response->getBody()->write('El usuario ya se encuentra en la DB!<br>');

            } catch (PDOException $e) {
                $response->getBody()->write($e->getMessage());
            }
        } else if ($request->isDelete() && isset($parametros['perfil']) && $parametros['perfil'] == 'super_admin') {
            $nombreUsuario = $parametros['nombreEliminar'];
            $password = $parametros['passwordEliminar'];
            try {
                $objPDO = new PDO('mysql:host=localhost;dbname=restdb;charset=utf8', "root", "");

                $objSQL = $objPDO->prepare('DELETE FROM `usuarios` WHERE usuario=:nombreUsuario AND password=:password');
                $objSQL->bindValue(':nombreUsuario', $nombreUsuario);
                $objSQL->bindValue(':password', $password);

                if ($objSQL->execute()) {
                    $response->getBody()->write('Usuario borrado!<br>');
                } else
                    $response->getBody()->write('El usuario no se pudo borrar de la DB! <br>');

            } catch (PDOException $e) {
                $response->getBody()->write($e->getMessage());
            }
        }

        return $next($request, $response);
    }

    public function CalcularTiempo($request, $response, $next)
    {
        if ($request->isPut() || $request->IsGet()) {
            $starttime = microtime(true);
            $response = $next($request, $response);
            $endtime = microtime(true);
            $timediff = $endtime - $starttime;

            $response->getBody()->write('Se tardo: ' . $timediff . " ms");
        }
        return $next($request, $response);
    }
}

?>