<?php
$vectorUno  = array();
$vectorDos  = array();
$vectorTres =array();
array_push($vectorUno,'Perro',' Gato','Raton','Araña','Mosca');
array_push($vectorDos,1986,1996,2015,78,86);
array_push($vectorTres,'php','mysql','html5','typescript','ajax');

$vectorDeVectores= array();
array_push($vectorDeVectores,$vectorUno,$vectorDos,$vectorTres);


foreach($vectorDeVectores as $vector)
{
    foreach($vector as $contenido )
    {
        echo  $contenido. ' ';
    }
    echo '</br>';
}

echo '</br>' . var_dump($vectorDeVectores);

?>