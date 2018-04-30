<?php
require_once("php/Empleado.php");
require_once("php/Fabrica.php");


if (isset($_GET['legajo'])) {

    $seEncontro = false;
    $archivo = fopen("archivos/empleados.txt", "r");
    $fabricaNueva = new Fabrica("La de vivir", 7);

    $fabricaNueva->TraerDeArchivo();
    $empleados = $fabricaNueva->GetEmpleados();
    foreach ($empleados as $emp) {
        if ($_GET['legajo'] == $emp->GetLegajo()) {
            if ($fabricaNueva->EliminarEmpleado($emp)) {
                echo "Se elimino el empleado";
                $fabricaNueva->GuardarEnArchivo();
                $seEncontro = true;
            } else {
                echo "No se pudo eliminar el empleado";
            }

            $seEncontro = true;
            break;
        }
    }

    if (!$seEncontro) {
        echo "No se encontro el empleado";
    }
    fclose($archivo);
}

?>
</br>
<a href="../mostrar.php">Mostrar</a>
<a href="../index.html">Volver</a>