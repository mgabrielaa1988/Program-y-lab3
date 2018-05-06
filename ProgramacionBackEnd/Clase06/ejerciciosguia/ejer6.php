<?php
$coleccion =new stdClass();
$persona =new stdClass();
$persona->nombre="Lucas";
$persona->edad=20;
$persona2 =new stdClass();
$persona2->nombre="santo";
$persona2->edad=2;

$coleccion->cant=2;
$coleccion->personas=array();

array_push($coleccion->personas,$persona);
array_push($coleccion->personas,$persona2);


echo json_encode($coleccion);

?>