<?php
$persona =new stdClass();
$persona->nombre="lucas";
$persona->edad=20;
$persona->genero="alien";

echo json_encode($persona);
?>