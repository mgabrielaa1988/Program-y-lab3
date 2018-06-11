<?php

$op = isset($_POST["op"]) ? $_POST["op"] : null;


switch ($op) {

    case "subirFoto":

        $objRetorno = new stdClass();
        $objRetorno->Ok = false;

<<<<<<< HEAD
        $destino = "./fotos/" . date("Ymd_His") . ".jpg";
=======
        $destino = "./fotos/" . $_POST['codigo'] . ".jpg";
>>>>>>> 102937be68bba71e6c1923a8b9040f374c8251a6
        
        if(move_uploaded_file($_FILES["foto"]["tmp_name"], $destino) ){
            $objRetorno->Ok = true;
            $objRetorno->Path = $destino;
        }

        echo json_encode($objRetorno);

        break;

    default:
        echo ":(";
        break;
}