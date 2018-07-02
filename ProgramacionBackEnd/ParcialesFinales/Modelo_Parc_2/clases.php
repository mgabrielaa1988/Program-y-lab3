<?php
use \Firebase\JWT\JWT as JWT;

class Empleado
{
    public static function AgregarEmpleado($request, $response)
    {
        $parametros = $request->getParsedBody();
        $nombre = $parametros['nombre'];
        $apellido = $parametros['apellido'];
        $email = $parametros['email'];
        $legajo = $parametros['legajo'];
        $clave = $parametros['clave'];
        $perfil = $parametros['perfil'];
        $destino = "./fotos/usuarios/" . $email . "-" . $legajo . ".jpg";

        try {
            $usuario = 'root';
            $pass = '';
            $objetoPDO = new PDO('mysql:host=localhost;dbname=donfubd;charset=utf8', $usuario, $pass);
            $sql = $objetoPDO->prepare('INSERT INTO `empleados` (`nombre`,`apellido`,`email`,`foto`,`legajo`,`clave`,`perfil`) VALUES (:nombre,:apellido,:email,:foto,:legajo,:clave,:perfil)');

            $sql->execute(array(
                'nombre' => $nombre,
                'apellido' => $apellido,
                'email' => $email,
                'foto' => $destino,
                'legajo' => $legajo,
                'clave' => $clave,
                'perfil' => $perfil,
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
            $objetoPDO = new PDO('mysql:host=localhost;dbname=donfubd;charset=utf8', $usuario, $pass);
            $sql = $objetoPDO->prepare('SELECT * FROM `empleados`');

            $sql->execute();
            while ($result = $sql->fetchObject()) {
                array_push($arrayEmpleados, $result);
            }

        } catch (PDOException $e) {
            return $response->withJson((["error" => $e->getMessage()]));
        }
        return $response->withJson(['empleados' => $arrayEmpleados]);
    }

}


class Producto
{
    public static function AgregarProducto($request, $response)
    {
        $parametros = $request->getParsedBody();
        $nombre = $parametros['nombre'];
        $precio = $parametros['precio'];


        try {
            $usuario = 'root';
            $pass = '';
            $objetoPDO = new PDO('mysql:host=localhost;dbname=donfubd;charset=utf8', $usuario, $pass);
            $sql = $objetoPDO->prepare('INSERT INTO `productos` (`nombre`,`precio`) VALUES (:nombre,:precio)');

            $sql->execute(array(
                'nombre' => $nombre,
                'precio' => $precio
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
            $objetoPDO = new PDO('mysql:host=localhost;dbname=donfubd;charset=utf8', $usuario, $pass);
            $sql = $objetoPDO->prepare('SELECT * FROM `productos`');

            $sql->execute();
            while ($result = $sql->fetchObject()) {
                array_push($arrayEmpleados, $result);
            }

        } catch (PDOException $e) {
            return $response->withJson((["error" => $e->getMessage()]));
        }
        return $response->withJson(['productos' => $arrayEmpleados]);
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
class Middlewares
{
    public static function VerificarEmpleado($request, $response, $next)
    {
        $token = $request->getHeader('miToken');
        try {
            $jwtDecode = JWT::decode($token[0], 'example_key', array('HS256'));
            try {
                $usuario = 'root';
                $pass = '';
                $objetoPDO = new PDO('mysql:host=localhost;dbname=donfubd;charset=utf8', $usuario, $pass);
                $sql = $objetoPDO->prepare('SELECT * FROM `empleados` WHERE `email` = :email AND `clave` = :clave');
                $sql->bindValue(':email', $jwtDecode->email);
                $sql->bindValue(':clave', $jwtDecode->clave);
                $sql->execute();

                $objeto = $sql->fetch();
                if ($objeto) {
                    if ($objeto['perfil'] === "admin") {
                        $response = $next($request, $response);
                    } else if ($objeto['perfil'] === "user" && $request->isPost()) {
                        $response = $next($request, $response);
                    } else {
                        return $response->withJson(['valido' => false]);
                    }
                }
                return $response->withJson([
                    'valido' => true,
                    'usuario' => [
                        'nombre' => $objeto['nombre'],
                        'apellido' => $objeto['apellido'],
                        'email' => $objeto['email'],
                        'foto' => $objeto['foto'],
                        'legajo' => $objeto['legajo'],
                        'clave' => $objeto['clave'],
                        'perfil' => $objeto['perfil']
                    ]
                ]);
            } catch (PDOException $e) {
                return $response->withJson(["Error" => $e->getMessage()]);
            }
        } catch (Exception $e) {
            return $response->withJson((["error" => $e->getMessage()]));
        }
    }
    public static function ContarEntradas($request, $response, $next)
    {
        $archivoContador = fopen('./entradas.txt', 'r');
        while (!feof($archivoContador)) {
            $arrayArchivo = explode(":", fgets($archivoContador))[1];
        }
        $contador = $arrayArchivo[0];
        $contador++;
        fclose($archivoContador);
        $archivoContador = fopen('./entradas.txt', 'w');
        fwrite($archivoContador, 'Cuantas veces se entro en /productos :' . $contador);
        fclose($archivoContador);
        $response = $next($request, $response);
        return $response;
    }
    public static function GuardarAccesos($request, $response, $next)
    {
        $token = $request->getHeader('miToken');
        try {
            $jwtDecode = JWT::decode($token[0], 'example_key', array('HS256'));
            try {
                $usuario = 'root';
                $pass = '';
                $objetoPDO = new PDO('mysql:host=localhost;dbname=donfubd;charset=utf8', $usuario, $pass);
                $sql = $objetoPDO->prepare('SELECT * FROM `empleados` WHERE `email` = :email AND `clave` = :clave');
                $sql->bindValue(':email', $jwtDecode->email);
                $sql->bindValue(':clave', $jwtDecode->clave);
                $sql->execute();

                $objeto = $sql->fetch();
                if ($objeto) {
                    $nombre = $objeto['nombre'];
                    $apellido = $objeto['apellido'];
                }

            } catch (PDOException $e) {
                return $response->withJson(["Error" => $e->getMessage()]);
            }
        } catch (Exception $e) {
            return $response->withJson((["error" => $e->getMessage()]));
        }

        fclose($archivoContador);
        $archivoContador = fopen('./accesos.txt', 'a');
        fwrite($archivoContador, date('m.d.Y-H:i:s') . "-" . $nombre . "-" . $apellido . "\n");
        fclose($archivoContador);
        $response = $next($request, $response);
        return $response;



    }
}
?>