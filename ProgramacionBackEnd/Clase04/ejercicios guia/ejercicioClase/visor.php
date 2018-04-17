<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

</head>
<body>
<table>
    <?php
    $archivoImg=fopen("./archivos/imgList.txt","r");
    while(!feof($archivoImg))
    {
        $nombre=trim(fgets($archivoImg));
        if($nombre)
        {
            ?>
            <!-- HTML EMPIEZA -->
            <tr>
                <td>
                    <a href="zoom.php?rutaImg=./fotos/<?php echo $nombre;?>">
                    <img
                     src="./fotos/<?php echo $nombre;?>"
                     alt="<?php echo $nombre; ?>"
                     style="width:100px;height:100px;"
                    >
                    </a>
                    
                </td>
            </tr>
            <!-- HTML TERMINA -->
            <?php
        }
    }
    ?> 
</table>    
</body>
</html>