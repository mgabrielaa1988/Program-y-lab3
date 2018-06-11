<?php
require "IMiddleWare.php";
class Verificadora implements IMiddleWare{
    public static function AgregarCd($request,$response,$next){
        $parametros=$request->getParsedBody();
        try{
            $usuario='root';
            $clave='';
            $objetoPDO = new PDO('mysql:host=localhost;dbnombre=cdcol;charset=utf8', $usuario, $clave);
            $sql=$objetoPDO->prepare('INSERT INTO `cds`(`titel`, `interpret`, `jahr`) VALUES (:title, :interpreter, :year)');
            
            $sql->execute(array(
                'title' => $parametros['title'],
                'interpreter' => $parametros['interpreter'],
                'year' => $parametros['year']
            ));
        }
        catch(PDOException $e) {
            echo "Error!\n" . $e->getMessage();
        }
        $response = $next($request, $response);
        return $response;        
    }
    public static function TraerTodosCds($request,$response,$next){      
        try{
            $usuario='root';
            $clave='';
            $objetoPDO = new PDO('mysql:host=localhost;dbnombre=cdcol;charset=utf8', $usuario, $clave);
            $sql=$objetoPDO->prepare('SELECT * FROM `cds`');
            
            $sql->execute();
        
            while ($row = $sql->fetchObject()){
                $response->getBody()->write(var_dump($row));
            }     
        }
        catch(PDOException $e) {
            echo "Error!\n" . $e->getMessage();
        }
        $response = $next($request, $response);
        return $response;
    }



    public static function VerificarUsuario($request,$response,$next){
        if($request->isGet()){
            $response->getBody()->write('SE MUESTRA GET<br>');
            $response = $next($request, $response);     
        }
        else{      
            $parametros=$request->getParsedBody();
            //var_dump($parametros);
            if($parametros['nombre'] && $parametros['clave']){
                try{
                    $usuario='root';
                    $clave='';
                    $objetoPDO = new PDO('mysql:host=localhost;dbname=cdcol;charset=utf8', $usuario, $clave);
                    $sql=$objetoPDO->prepare('SELECT `nombre`,`clave` FROM `usuarios` WHERE `nombre` = :nombre AND `clave` = :clave');
                    $sql->bindValue(':nombre', $parametros['nombre']);
                    $sql->bindValue(':clave', $parametros['clave']);
                    $sql->execute();
                    $result = $sql->rowCount();
                    if($result){
                        $response->getBody()->write("Bienvenido ".$parametros['nombre']." buen ser<br>");
                        $response = $next($request, $response); 
                    }
                    else{
                        $response->getBody()->write("CREDENCIALES INVALIDAS, ACCESO DENEGADO");
                    }
                }
                catch(PDOException $e){
                    echo "Error!\n" . $e->getMessage();
                }               
            }
        }
        return $response;       
    }
}