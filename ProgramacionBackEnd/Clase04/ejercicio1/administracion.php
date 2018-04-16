<?php    


    $extension = pathinfo($_FILES["archivo"]["name"], PATHINFO_EXTENSION);
    //"anda al archivo, elegi el name y decime la extension"
    
    if($extension != "jpg" && $extension != "jpeg" && $extension != "png")
    {
        echo "Los unicos tipos de imagen permitidos son JPG, JPEG y PNG";
    }
    else
    {
        echo "El archivo cumple con la extension requerida.";
        
        $ubicacion = "./archivos/".date("ymdhsf").".".$extension;
        //guarda la ruta y nombre del archivo

        move_uploaded_file($_FILES["archivo"]["tmp_name"], $ubicacion);
        //mueve el archivo de temporal a definitivo en ./archivos/FechaYhoraActual.extension

        $registro = fopen("./archivos/registoArchivos.txt", "a");

        $varQueEscribe = explode("/", $ubicacion);
        //hago un explode que separa /archivos/FechaYhoraActual.extension en "." - "archivos" y "FechaYhoraActual.extension"

        if(fwrite($registro, $varQueEscribe[2]."\r\n"))
        {//guarda el nombre y extension del archivo, y despues hace un salto de linea. Guardo la posicion 2, porque la 0 es ".", la 1 es "archivos" y la 2 es "FechayHoraACtual.extension"
            echo "Se ha guardado en el registro con exito";
        }

        fclose($registro);

        
        require_once "visor.php";
        //ejecuta visor.php
    }

?>