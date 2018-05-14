<?php
        try {

            //CREO INSTANCIA DE PDO, INDICANDO ORIGEN DE DATOS, USUARIO Y CONTRASE�A
            $usuario='root';
            $clave='';

            $objetoPDO = new PDO('mysql:host=localhost;dbname=cdcol;charset=utf8', $usuario, $clave);
            echo "FUNCIONO !!! :D ";
            
        } catch (PDOException $e) {

            echo "Error!!!\n" . $e->getMessage();
        }
?>