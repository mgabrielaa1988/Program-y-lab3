<?php 
$dia =(int)date("d");
$mes =date("m");


if($mes >= 9 && $mes <= 11 )
echo "Es primavera </br>";
else if($mes == 12 || $mes <= 3 )
echo "Es verano </br>";
else if($mes >= 4 && $mes <= 6)
echo "Es otoño </br>";
else
echo "Es invierno </br>";


echo date("m.d.y");
echo "</br>" . date("j, n, Y");
echo "</br>" . date("j-m-y");
echo "</br>" . date("D M j G:i:s T Y");
?>