<?php
var_dump($_POST['obj']);
$obj=new stdClass();
$obj=json_decode($_POST['obj']);
echo "</br>Mostrando JSON en php ".$obj->producto->codigoBarra.$obj->producto->nombre.$obj->producto->precio."</br>";
?>

