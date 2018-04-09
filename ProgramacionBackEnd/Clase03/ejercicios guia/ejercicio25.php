<?php

function LeerNumPalabras($ruta)
{
    $archivo=fopen($ruta,"r");
    $stringArchivo=fread($archivo,filesize($ruta));
    $palabras=split(" ",$stringArchivo);
    $uno=0;
    $dos=0;
    $tres=0;
    $cuatro=0;
    $masDeCuatro=0;

    foreach($palabras as $pal)
    {
        if(strlen($pal)==1)
        $uno++;
        else if(strlen($pal)==2)
        $dos++;
        else if(strlen($pal)==3)
        $tres++;
        else if(strlen($pal)==4)
        $cuatro++;
        else
        $masDeCuatro++;
    }
    fclose($archivo);
    echo "
    <table border=241> 
    <caption> Tabla Luki </caption>
    <tr>
    <theader>
    <td>Una</td>
    <td>Dos</td>
    <td>Tres</td>
    <td>Cuatro</td>
    <td>Mas de cuatro</td>
    </theader>
    </tr>
    <tr>
    <td>".$uno." </td>
    <td>".$dos." </td>
    <td>".$tres." </td>
    <td>".$cuatro." </td>
    <td>".$masDeCuatro." </td>
    </tr>

    </table>";

}
LeerNumPalabras("palabras.txt");


?>