<?php
$a = 3;
$b = 5;
$c = 3;

if(($a > $b  ||$a > $c  ) &&  ( $a < $b|| $a < $c))
{
    echo "El valor del medio es : " . $a;
}
else if(($b > $c || $b > $a) && ($b < $a || $b < $c))
{
    echo "El valor del medio es : " . $b;
}
else if(($c < $a || $c < $b) && ($c > $b || $c > $a))
{
    echo " El valor del medio es : " . $c;
}
else
{
    echo "No hay valor del medio";
}

?>