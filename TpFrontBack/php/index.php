<?php
require "Empleado.php";
require "Fabrica.php";

$empUno = new Empleado("Lucas", "Massa", 40675318, "H", 514, 752.3, 3);
$empDos = new Empleado("Santi", "Bonazi", 4046834, "H", 512, 352.23, 6);
$empTres = new Empleado("Martina", "Albelorio", 147325, "H", 351, 123.23, 2);
$empRepetido = new Empleado("Santi", "Bonazi", 4046834, "H", 512, 352.23, 6);

$fabrica = new Fabrica("Para vivir");
$fabrica->AgregarEmpleado($empUno);
$fabrica->AgregarEmpleado($empDos);
$fabrica->AgregarEmpleado($empTres);
$fabrica->AgregarEmpleado($empRepetido);
echo "Suma de sueldos: " . $fabrica->CalcularSueldos() . "</br>";
echo $fabrica->ToString() . "</br>";
if ($fabrica->EliminarEmpleado($empUno)) {
    echo "Empleado eliminado con exito </br>";
} else {
    echo "No se pudo eliminar</br>";
}

echo $fabrica->ToString() . "</br>";




?>