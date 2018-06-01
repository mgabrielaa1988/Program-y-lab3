<?php
if(isset($_POST['nombre'])){
    $nombre=$_POST['nombre'];
    $obj=new stdClass();
    $obj->nombre=$nombre;
    echo json_encode($obj);
}
else if(isset($_POST['json']))
{
    $obj = new stdClass();
    $obj=json_decode(json_encode($_POST['json']));
    $obj->nombre.=" El Grande.";

    echo json_encode($obj);
}
?>