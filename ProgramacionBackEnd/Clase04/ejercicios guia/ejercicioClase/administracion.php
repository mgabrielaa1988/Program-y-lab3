<?php
$extension=pathinfo($_FILES['archivo']['name']);
if($extension['extension']!='jpg' && $extension['extension']!='png' && $extension['extension']!='jpeg')
{
    echo "EXTENSION INVALIDA";
}
else
{
    $nombre=date("YMdis").'.'.$extension['extension'];
    move_uploaded_file($_FILES['archivo']['tmp_name'],"./fotos/".$nombre);
    $archivoTexto=fopen("./archivos/imgList.txt","a");
    fwrite($archivoTexto,$nombre."\r\n");
    fclose($archivoTexto);
    require_once('visor.php');
}

?>