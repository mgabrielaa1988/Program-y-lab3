<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <table align="center">
        <tr>
            <td> 
                <img src="<?php echo $ubicacion; ?>" width="250" height="250">
            </td>
            <!-inyecta php en html para pasarle la ruta del archivo. $ubicacion se definio en administracion.php->
        </tr>
    </table>

    <table align="left">
        <?php

            $archivo = fopen("./archivos/registoArchivos.txt", "r");

            while(!feof($archivo))
            {
                echo 
                "
                <tr>
                    <td> 
                        <img src= ". "./archivos/".(fgets($archivo))." width='250' height='250'> 
                    </td>
                    
                    <td>
                        <a href='zoom.html'>Zoom</a>
                    </td>
                </tr>
                
                "; 

                //aca arriba inyecta html en el php, cosa que cada lectura del archivo lo meta en una imagen
            }

            fclose($archivo);

        ?>
    <!-inyecta php en html para pasarle la ruta del archivo->
    </table>
</body>
</html>