<?php
    class Verificadora
    {
        public function VerificarUsuario($request,$response,$next)
        {
            if($request->isGet())
            {
                $response = $next($request, $response);
            }
            else
            {
                $parametros=$request->getParsedBody();
                $nombre=$parametros['nombre'];
                $clave=$parametros['clave'];
                try
                {
                    $usuario='root';
                    $pass='';
                    $objetoPDO = new PDO('mysql:host=localhost;dbname=cdcol;charset=utf8', $usuario, $pass);
                    $sql=$objetoPDO->prepare('SELECT `nombre`,`clave` FROM `usuarios` WHERE `nombre` = :nombre AND `clave` = :clave');
                    $sql->bindValue(':nombre', $nombre);
                    $sql->bindValue(':clave', $clave);
                    $sql->execute();
                    $result = $sql->rowCount();
                    if($result)
                    {
                        $response = $next($request, $response);
                    }
                    else
                    {
                        $response->getBody()->write('Error nombre o clave incorrectos <br>');
                    }
                }
                catch(PDOException $e)
                {
                    echo "Error!\n" . $e->getMessage();
                }
            }
            return $response;
        }
        public static function TraerLosCds($request,$response)
        {
            $arrayDeCds=array();
            try
            {
                $usuario='root';
                $pass='';
                $objetoPDO = new PDO('mysql:host=localhost;dbname=cdcol;charset=utf8', $usuario, $pass);
                $sql=$objetoPDO->prepare('SELECT `titel`,`interpret`,`jahr`,`id` FROM `cds`');
                $sql->execute();
                while($result = $sql->fetchObject())
                {
                    array_push($arrayDeCds,$result);
                }
            }
            catch(PDOException $e)
            {
                echo "Error!\n" . $e->getMessage();
            }
            return $arrayDeCds;
        }
    }
    
?>