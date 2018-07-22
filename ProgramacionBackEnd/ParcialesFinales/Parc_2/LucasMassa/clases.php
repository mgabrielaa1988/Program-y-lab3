<?php
use \Firebase\JWT\JWT as JWT;

class Medias
{
    public static function AgregarMedias($request, $response, $next)
    {
        $parametros = $request->getParsedBody();
        $color = $parametros['color'];
        $marca = $parametros['marca'];
        $precio = $parametros['precio'];
        $talle = $parametros['talle'];

        try {
            $usuario = 'root';
            $pass = '';
            $objetoPDO = new PDO('mysql:host=localhost;dbname=merceriabd;charset=utf8', $usuario, $pass);
            $sql = $objetoPDO->prepare('INSERT INTO `medias` (`color`,`marca`,`precio`,`talle`) VALUES (:color,:marca,:precio,:talle)');

            $sql->execute(array(
                'color' => $color,
                'marca' => $marca,
                'precio' => $precio,
                'talle' => $talle
            ));
            if ($sql->rowCount()) {
                return $response->withJson((['sePudo' => true]));
            } else {
                return $response->withJson((['sePudo' => false]));
            }


        } catch (PDOException $e) {
            return $response->withJson((["error" => $e->getMessage()]));
        }
    }
    public static function MostrarListado($request, $response)
    {
        try {
            $arrayEmpleados = array();
            $usuario = 'root';
            $pass = '';
            $objetoPDO = new PDO('mysql:host=localhost;dbname=merceriabd;charset=utf8', $usuario, $pass);
            $sql = $objetoPDO->prepare('SELECT * FROM `medias`');

            $sql->execute();
            while ($result = $sql->fetchObject()) {
                array_push($arrayEmpleados, $result);
            }

        } catch (PDOException $e) {
            return $response->withJson((["error" => $e->getMessage()]));
        }
        return $response->withJson(['medias' => $arrayEmpleados], 200);
    }
    public static function Modificar($request, $response)
    {
        $parametros = $request->getParsedBody();
        $usuario = 'root';
        $pass = '';
        try {
            $objetoPDO = new PDO('mysql:host=localhost;dbname=merceriabd;charset=utf8', $usuario, $pass);
            $sql = $objetoPDO->prepare('UPDATE `medias` SET `color`=:color,`marca`=:marca,`precio`=:precio,`talle`=:talle WHERE `id`=:id');
            $sql->bindValue(':color', $parametros['color']);
            $sql->bindValue(':marca', $parametros['marca']);
            $sql->bindValue(':precio', $parametros['precio']);
            $sql->bindValue(':talle', $parametros['talle']);
            $sql->bindValue(':id', $parametros['id']);
            $sql->execute();
            if ($sql->rowCount()) {
                return $response->withJson(['mensaje' => 'Se pudo modificar la media']);
            } else {
                return $response->withJson(['mensaje' => 'No se pudo modificar la media ']);
            }
        } catch (PDOException $e) {
            return $response->withJson((["error" => $e->getMessage()]));
        }
    }
    public static function Eliminar($request, $response)
    {
        $usuario = 'root';
        $pass = '';
        $parametros = $request->getParsedBody();
        try {
            $objetoPDO = new PDO('mysql:host=localhost;dbname=merceriabd;charset=utf8', $usuario, $pass);
            $sql = $objetoPDO->prepare('DELETE FROM `medias` WHERE `id`=:id');
            $sql->bindValue(':id', $parametros['id']);
            $sql->execute();
            if ($sql->rowCount()) {
                return $response->withJson(['mensaje' => 'Se pudo eliminar la media']);
            } else {
                return $response->withJson(['mensaje' => 'No se pudo eliminar la media ']);
            }
        } catch (PDOException $e) {
            return $response->withJson((["error" => $e->getMessage()]));
        }
    }
}
class Usuarios
{
    public static function AgregarUsuarios($request, $response)
    {
        $parametros = $request->getParsedBody();
        $correo = $parametros['correo'];
        $clave = $parametros['clave'];
        $nombre = $parametros['nombre'];
        $apellido = $parametros['apellido'];
        $perfil = $parametros['perfil'];
        $destino = "./fotos/usuarios/" . $correo . "-" . $apellido . ".jpg";

        try {
            $usuario = 'root';
            $pass = '';
            $objetoPDO = new PDO('mysql:host=localhost;dbname=merceriabd;charset=utf8', $usuario, $pass);
            $sql = $objetoPDO->prepare('INSERT INTO `usuarios` (`correo`,`clave`,`nombre`,`apellido`,`perfil`,`foto`) VALUES (:correo,:clave,:nombre,:apellido,:perfil,:foto)');

            $sql->execute(array(
                'correo' => $correo,
                'clave' => $clave,
                'nombre' => $nombre,
                'apellido' => $apellido,
                'perfil' => $perfil,
                'foto' => $destino
            ));

            move_uploaded_file($_FILES["foto"]["tmp_name"], $destino);
            if ($sql->rowCount()) {
                return $response->withJson((['sePudo' => true]));
            } else {
                return $response->withJson((['sePudo' => false]));
            }
        } catch (PDOException $e) {
            return $response->withJson((["error" => $e->getMessage()]));
        }
    }
    public static function ExisteEmpleado($request, $response)
    {
        $parametros = $request->getParsedBody();
        $email = $parametros['email'];
        $clave = $parametros['clave'];

        try {
            $usuario = 'root';
            $pass = '';
            $objetoPDO = new PDO('mysql:host=localhost;dbname=donfubd;charset=utf8', $usuario, $pass);
            $sql = $objetoPDO->prepare('SELECT * FROM `empleados` WHERE `email`=:email AND `clave`=:clave');

            $sql->bindValue(':email', $email);
            $sql->bindValue(':clave', $clave);
            $sql->execute();

            $result = $sql->fetch();
            if ($result) {
                return $response->withJson(array(
                    'valido' => true,
                    'usuario' => [
                        'nombre' => $result['nombre'],
                        'apellido' => $result['apellido'],
                        'email' => $result['email'],
                        'foto' => $result['foto'],
                        'legajo' => $result['legajo'],
                        'clave' => $result['clave'],
                        'perfil' => $result['perfil']
                    ]
                ));
            } else {
                return $response->withJson((['valido' => false]));
            }
        } catch (PDOException $e) {
            return $response->withJson((["error" => $e->getMessage()]));
        }
    }

    public static function MostrarListado($request, $response)
    {
        try {
            $arrayEmpleados = array();
            $usuario = 'root';
            $pass = '';
            $objetoPDO = new PDO('mysql:host=localhost;dbname=merceriabd;charset=utf8', $usuario, $pass);
            $sql = $objetoPDO->prepare('SELECT * FROM `usuarios`');

            $sql->execute();
            while ($result = $sql->fetchObject()) {
                array_push($arrayEmpleados, $result);
            }

        } catch (PDOException $e) {
            return $response->withJson((["error" => $e->getMessage()]));
        }
        return $response->withJson(['empleados' => $arrayEmpleados], 200);
    }

}



class Middlewares
{
    public function VerificarSeteados($request, $response, $next)
    {
        $params = $request->getParsedBody();
        if (isset($params['correo']) && isset($params['clave'])) {
            $response = $next($request, $response);
            return $response;
        } else {
            return $response->withJson(["mensaje" => "no existe correo o clave"], 409);
        }
    }

    public static function VerificarVacios($request, $response, $next)
    {
        $params = $request->getParsedBody();
        if ($params['correo'] == "" || $params['clave'] == "") {
            return $response->withJson(["mensaje" => 'correo o clave vacios']);
        } else {
            $response = $next($request, $response);
            return $response;
        }
    }
    public function VerificarBD($request, $response, $next)
    {
        $params = $request->getParsedBody();
        $correo = $params['correo'];
        $clave = $params['clave'];
        try {
            $usuario = 'root';
            $pass = '';
            $objetoPDO = new PDO('mysql:host=localhost;dbname=merceriabd;charset=utf8', $usuario, $pass);
            $sql = $objetoPDO->prepare('SELECT * FROM `usuarios` WHERE `correo` = :correo AND `clave` = :clave');
            $sql->bindValue(':correo', $correo);
            $sql->bindValue(':clave', $clave);
            $sql->execute();
            $objeto = $sql->fetch();
            if ($objeto) {
                $response = $next($request, $response);
                return $response;
            } else {
                return $response->withJson(['mensaje' => 'No existe el correo y la clave en la BD']);
            }
        } catch (PDOException $e) {
            return $response->withJson(["Error" => $e->getMessage()]);
        }
    }

    public function VerificarToken($request, $response, $next)
    {
        $elToken = $request->getHeader('miToken');
        try {
            $jwtDecode = JWT::decode($elToken[0], 'llave', array('HS256'));
            $response = $next($request, $response);
            $params = $request->getParsedBody();
            $params['tokenCorreo'] = $jwtDecode->correo;
            $params['tokenClave'] = $jwtDecode->clave;
            return $response;
        } catch (Exception $e) {
            return $response->withJson(["mensaje" => "token invalido"], 409);
        }
    }
    public static function EsPropietario($request, $response, $next)
    {
        $elToken = $request->getHeader('miToken');
        $jwtDecode = JWT::decode($elToken[0], 'llave', array('HS256'));
        $usuario = 'root';
        $pass = '';
        $objetoPDO = new PDO('mysql:host=localhost;dbname=merceriabd;charset=utf8', $usuario, $pass);
        $sql = $objetoPDO->prepare('SELECT * FROM `usuarios` WHERE `correo`=:correo AND `clave` =:clave');
        $sql->bindValue(':correo', $jwtDecode->correo);
        $sql->bindValue(':clave', $jwtDecode->clave);
        $sql->execute();
        $objeto = $sql->fetch();
        if ($objeto) {
            if ($objeto['perfil'] === 'propietario') {
                $response = $next($request, $response);
                return $response;
            } else {
                return $response->withJson(['mensaje' => 'No se tienen permisos de propietario']);
            }
        } else {
            return $response->withJson(['mensaje' => 'No se encontro el usuario']);
        }
    }
    public function EsEncargado($request, $response, $next)
    {
        $elToken = $request->getHeader('miToken');
        $jwtDecode = JWT::decode($elToken[0], 'llave', array('HS256'));
        $usuario = 'root';
        $pass = '';
        $objetoPDO = new PDO('mysql:host=localhost;dbname=merceriabd;charset=utf8', $usuario, $pass);
        $sql = $objetoPDO->prepare('SELECT * FROM `usuarios` WHERE `correo`=:correo AND `clave` =:clave');
        $sql->bindValue(':correo', $jwtDecode->correo);
        $sql->bindValue(':clave', $jwtDecode->clave);
        $sql->execute();
        $objeto = $sql->fetch();
        if ($objeto) {
            if ($objeto['perfil'] === 'encargado' || $objeto['perfil'] === 'propietario') {
                /* 
                    BUENO ACA TENGO UN PROBLEMA, SI EL USUARIO ENTRA COMO ENCARGADO NO VA A SER PROPIETARIO 
                    Y NO VA A PASAR EL MIDDLEWARE DE PROPIETARIO , LO MISMO AL REVEZ
                    NO ENCUENTRO FORMA PARA AVISARLE AL  SIGUIENTE MIDDLEWARE QUE LO PASE PORQUE YA SE ACTIVO UNO
                 */
                $response = $next($request, $response);
                return $response;
            } else {
                return $response->withJson(['mensaje' => 'No se tienen permisos de encargado']);
            }
        } else {
            return $response->withJson(['mensaje' => 'No se encontro el usuario']);
        }
    }
}

?>