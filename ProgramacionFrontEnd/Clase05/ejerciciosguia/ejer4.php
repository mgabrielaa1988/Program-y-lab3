<?php
$obj = new stdClass();
$obj=json_decode($_POST['obj']);

foreach($obj->producto as $prod)
{
    echo "</br>".$prod->codigoBarra." ".$prod->nombre." ".$prod->precio."</br>";
}

?>