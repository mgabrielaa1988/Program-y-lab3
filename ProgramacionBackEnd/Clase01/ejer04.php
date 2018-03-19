<?php
$numero = 0;
$contadorNumeros = 0;
$numerosEnteros = 1;
for($numerosEnteros ; $numero < 1000; $numerosEnteros++)
{
    echo "Numeros que sumo: " . $numero . " y " . $numerosEnteros . "</br>";
    $numero+= $numerosEnteros;
    $contadorNumeros++;
}

echo "Cuantos veces sume: " . $contadorNumeros;

?>