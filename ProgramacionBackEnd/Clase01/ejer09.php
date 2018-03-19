<?php

$enteros = array();
$suma = 0;
$promedio;
$contadorNumeros= 0;
for($contadorNumeros;$contadorNumeros < 5;$contadorNumeros++)
{
    $enteros[$contadorNumeros]=rand(1,10);
    $suma+=$enteros[$contadorNumeros];
    echo "Numero: " . $enteros[$contadorNumeros] . "</br>";
}

$promedio = $suma / count($enteros);

if($promedio < 6)
echo "El promedio es menor a 6";
else if($promedio > 6)
echo "El promedio es mayor a 6";
else if($promedio == 6)
echo "El promedio es igual a 6";


?>