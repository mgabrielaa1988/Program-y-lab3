<?php
session_start();
require_once "php/Empleado.php";
require_once "php/Fabrica.php";
require_once "php/ValidarSesion.php";

$fabrica = new Fabrica("La de vivir", 7);
$fabrica->TraerDeArchivo();
$empleados = $fabrica->GetEmpleados();

foreach ($empleados as $emp) {
    ?> 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HTML5-Listado de empleados</title>
    <script src="javascript/validaciones.js"></script>
</head>
<body>
    <h2>Listado de Empleados</h2>
        <table align="center" width="800px">
        <tr>
            <td>
                <h4>Info</h4>
            </td>
        </tr>
        <tr>
            <td colspan="4">
                <hr>
            </td>
        </tr>
    <tr>
        <td>
            <?php echo $emp->ToString() ?>
        </td>
        <td>
            <img src="<?php echo $emp->GetPathFoto() ?>"
            alt=" <?php echo $emp->GetApellido() ?>"
            style="width:90px;height:90px;">
        </td>
        <td>
            <a href="eliminar.php/?legajo= <?php echo $emp->GetLegajo() ?> ">Eliminar</a>
        </td>
        <td>
            <input type="button" value="Modificar" onclick="AdministrarModificar(<?php echo $emp->GetDni() ?>)">
        </td>
        <td>
          <form action="index.php" id="hdnForm" method="POST">
            <input type="hidden" id="hdnEnviar" name="dni">
          </form>
        </td>
    </tr>
<?php

}
?>
<!-- TERMINA PHP-->
    <tr>
        <td colspan="4">
            <hr>
        </td>
    </tr>

    <tr>
        <td>
            <a href="index.php">Alta de empleados</a>
        </td>
    </tr>
</table>


<a href="./php/cerrarSesion.php">Desloguearse</a>

</body>
</html>