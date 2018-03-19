<?php
$vector = array();
$contadorNumeros=0;
$contadorVector=0;
while(count($vector) < 10)
{
    if($contadorNumeros % 2 != 0)
    {
        echo "Numero: " . $contadorNumeros . "</br>";
        $vector[$contadorVector] = $contadorNumeros;
        $contadorVector++;
    }
    $contadorNumeros++;
}
?>