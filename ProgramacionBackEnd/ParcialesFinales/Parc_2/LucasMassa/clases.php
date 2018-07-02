<?php
use \Firebase\JWT\JWT as JWT;
class Medias
{
    public static function AgregarMedias($request, $response,$next)
    {
        $parametros = $request->getParsedBody();
        $color = $parametros['color'];
        $marca = $parametros['marca'];
        $precio =$parametros['precio'];
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
        return $response->withJson(['medias' => $arrayEmpleados],200);
    }
    public static function Modificar($request, $response)
    {
        $parametros = $request->getParsedBody();
        $id = $parametros['id'];
        $precio = $parametros['precio'];
        $nombre = $parametros['nombre'];

        try {
            $usuario = 'root';
            $pass = '';
            $objetoPDO = new PDO('mysql:host=localhost;dbname=donfubd;charset=utf8', $usuario, $pass);
            $sql = $objetoPDO->prepare('UPDATE `productos` SET `nombre`=:nombre,`precio`=:precio WHERE `id`=:id');
            $sql->bindValue(':nombre', $nombre);
            $sql->bindValue(':precio', $precio);
            $sql->bindValue(':id', $id);
            $sql->execute();
            if ($sql->rowCount()) {
                return $response->withJson((["sePudo" => true]));
            } else {
                return $response->withJson((["sePudo" => false]));
            }

        } catch (PDOException $e) {
            return $response->withJson((["error" => $e->getMessage()]));
        }
    }
    public static function Eliminar($request, $response)
    {
        $parametros = $request->getParsedBody();
        $id = $parametros['id'];

        try {
            $usuario = 'root';
            $pass = '';
            $objetoPDO = new PDO('mysql:host=localhost;dbname=donfubd;charset=utf8', $usuario, $pass);
            $sql = $objetoPDO->prepare('DELETE FROM `productos` WHERE `id`=:id');

            $sql->bindValue(':id', $id);
            $sql->execute();

            if ($sql->rowCount()) {
                return $response->withJson((["sePudo" => true]));
            } else {
                return $response->withJson((["sePudo" => false]));
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

    public static function MostrarListado($request, $response,$next)
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
        return $response->withJson(['empleados' => $arrayEmpleados],200);
    }

}



class Middlewares
{
    public function VerificarSeteados($request, $response, $next)
    {
        $params = $request->getParsedBody();
        if(isset($params['correo']) && isset($params['clave'])){
            $response=$next($request,$response);
            return $response;
        }
        else{
            return $response->withJson(["mensaje" => "no existe correo o clave"],409);
        }
    }

    public static function VerificarVacios($request,$response,$next){
        $params = $request->getParsedBody();
        if($params['correo'] == "" || $params['clave'] == ""){
            return $response->withJson(["mensaje" => 'correo o clave vacios']);
        }else{
            $response=$next($request,$response);
            return $response;
        }
    }
    public function VerificarBD($request,$response,$next){
        $params=$request->getParsedBody();
        $correo=$params['correo'];
        $clave=$params['clave'];
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
                $response=$next($request,$response);
                return $response;
            }else{
                return $response->withJson(['mensaje' => 'No existe el correo y la clave en la BD']);
            }
        } catch (PDOException $e) {
            return $response->withJson(["Error" => $e->getMessage()]);
        }
    }
}
?>