<?php
$num=rand(20,60);
$vectorNum= str_split($num);

echo 'El numero es: ' . $num . '</br>';

if($num >= 20 && $num <= 60)
{
    switch($vectorNum[0])
    {
        case 2:
        if($num == 20)
        echo 'Veinte';
        else
        echo 'Veinti';
        break;
        case 3:
        echo 'Treinta';
        break;
        case 4:
        echo 'Cuarenta';
        break;
        case 5:
        echo 'Cincuenta';
        break;
        case 6:
        echo 'Sesenta';
        break;
    }
    if($vectorNum[1] != 0)
    {
        if($num < 20 || $num > 29)
        echo ' y ';

        switch($vectorNum[1])
        {
            case 1:
            echo 'uno';
            break;
            case 2:
            echo 'dos';
            break;
            case 3:
            echo 'tres';
            break;
            case 4:
            echo 'cuatro';
            break;
            case 5:
            echo 'cinco';
            break;
            case 6:
            echo 'seis';
            break;
            case 7:
            echo 'siete';
            break;
            case 8:
            echo 'ocho';
            break;
            case 9:
            echo 'nueve';
            break;
            default:
            break;
        }
    }
}


?>