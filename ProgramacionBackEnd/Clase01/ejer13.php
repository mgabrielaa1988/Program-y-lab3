<?php 
$vectorUno  = array();
$vectorDos  = array();
$vectorTres =array();

array_push($vectorUno,'Perro',' Gato','Raton','Araña','Mosca');
array_push($vectorDos,1986,1996,2015,78,86);
array_push($vectorTres,'php','mysql','html5','typescript','ajax');

$vectorMezclado=array_merge($vectorUno,$vectorDos,$vectorTres);

foreach($vectorMezclado as $contenido)
{ 
    echo $contenido . '</br>' ;
}   
?>