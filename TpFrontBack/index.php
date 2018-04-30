<?php
session_start();
require_once "php/Fabrica.php";
require_once "php/Empleado.php";
require_once "php/ValidarSesion.php";
if (isset($_POST['dni'])) {
    $fabricaNueva = new Fabrica("La de vivir", 7);
    $fabricaNueva->TraerDeArchivo();
    $empleados = $fabricaNueva->GetEmpleados();
    foreach ($empleados as $emp) {
        if ($emp->GetDni() == $_POST['dni']) {

            ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>HTML5-Formulario Modificar Empleados</title>
    <script src="javascript/validaciones.js"></script>
</head>

<body>
    <form action="administracion.php" method="POST" enctype="multipart/form-data">
        <h2>Modificar Empleado</h2>

        <table align="center">
            <tr>
                <td>
                    <h4>Datos personales</h4>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <hr>
                </td>
            </tr>

            <tr>
                <td>DNI:</td>
                <td>
                    <input type="number" id="txtDni" name="dni" <?php echo "value='" . $emp->GetDni() . "'"; ?> readonly>
                </td>
                <td>
                    <span style="display:none" id="errDni">*</span>
                </td>
            </tr>
            <tr>
                <td>Apellido:</td>
                <td>
                    <input type="text" id="txtApellido" name="apellido" <?php echo "value='" . $emp->GetApellido() . "'"; ?>>
                </td>
                <td>
                    <span style="display:none" id="errApellido">*</span>
                </td>
            </tr>
            <tr>
                <td>Nombre</td>
                <td>
                    <input type="text" id="txtNombre" name="nombre" <?php echo "value='" . $emp->GetNombre() . "'"; ?>>
                </td>
                <td>
                    <span style="display:none" id="errNombre">*</span>
                </td>

            </tr>
            <tr>
                <td>Sexo</td>
                <td>
                    <select id="selGenero" name="genero">
                        <option value="default">Seleccione</option>
                        <option value="Masculino" <?php if ($emp->GetSexo() == "Masculino") echo "selected"; ?>>Masculino</option>
                        <option value="Femenino"  <?php if ($emp->GetSexo() == "Femenino") echo "selected"; ?>>Femenino</option>
                    </select>
                </td>
                <td>
                    <span style="display:none" id="errGenero">*</span>
                </td>
            </tr>
            <tr>
                <td>
                    <h4>Datos Laborales</h4>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <hr>
                </td>
            </tr>
            <tr>
                <td>Legajo</td>
                <td>
                    <input type="number" id="txtLegajo" name="legajo"<?php echo "value='" . $emp->GetLegajo() . "'"; ?> readonly>
                </td>
                <td>
                    <span style="display:none" id="errLegajo">*</span>
                </td>
            </tr>
            <tr>
                <td>Sueldo</td>
                <td>
                    <input type="number" id="txtSueldo" name="sueldo" step="500" <?php echo "value='" . $emp->GetSueldo() . "'"; ?>>
                </td>
                <td>
                    <span style="display:none" id="errSueldo">*</span>
                </td>
            </tr>
            <tr>
                <td>Turno</td>
            </tr>
            <tr>
                <td>
                    <input type="radio" id="tManiana" value="tManiana" name="turnos" <?php if ($emp->GetTurno() == "tManiana") echo "checked"; ?>>Mañana</td>
            </tr>
            <tr>
                <td>
                    <input type="radio" id="tTarde" value="tTarde" name="turnos" <?php if ($emp->GetTurno() == "tTarde") echo "checked"; ?>>Tarde</td>
            </tr>
            <tr>
                <td>
                    <input type="radio" id="tNoche" value="tNoche" name="turnos" <?php if ($emp->GetTurno() == "tNoche") echo "checked"; ?>>Noche</td>
            </tr>
            <tr>
                <td>
                    Foto:
                </td>
                <td>
                    <input type="file" name="foto" id="fileFoto">
                </td>
                <td>
                    <span style="display:none" id="errFoto">*</span>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <hr>
                </td>
            </tr>
            <tr>
                <td align="center" colspan="2">
                    <input type="reset" value="Limpiar">
                </td>
            </tr>
            <tr>
                <td align="center" colspan="2">
                    <input type="submit" value="Modificar" onclick="return AdministrarValidaciones()">
                </td>
                <td>
                    <input type="hidden" name="hdnModificar">
                    <?php 


                    ?>
                </td>
            </tr>
        </table>
    </form>

    <?php
    break;
}
}

} else {
    ?>
    <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
   <title>HTML 5 - Formulario Alta Empleado</title>
    <script src="javascript/validaciones.js"></script>
</head>

<body>
    <form action="administracion.php" method="POST" enctype="multipart/form-data">
        <h2>Alta de empleados</h2>

        <table align="center">
            <tr>
                <td>
                    <h4>Datos personales</h4>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <hr>
                </td>
            </tr>

            <tr>
                <td>DNI:</td>
                <td>
                    <input type="number" id="txtDni" name="dni">
                </td>
                <td>
                    <span style="display:none" id="errDni">*</span>
                </td>
            </tr>
            <tr>
                <td>Apellido:</td>
                <td>
                    <input type="text" id="txtApellido" name="apellido">
                </td>
                <td>
                    <span style="display:none" id="errApellido">*</span>
                </td>
            </tr>
            <tr>
                <td>Nombre</td>
                <td>
                    <input type="text" id="txtNombre" name="nombre">
                </td>
                <td>
                    <span style="display:none" id="errNombre">*</span>
                </td>

            </tr>
            <tr>
                <td>Sexo</td>
                <td>
                    <select id="selGenero" name="genero">
                        <option value="default">Seleccione</option>
                        <option value="Masculino">Masculino</option>
                        <option value="Femenino">Femenino</option>
                    </select>
                </td>
                <td>
                    <span style="display:none" id="errGenero">*</span>
                </td>
            </tr>
            <tr>
                <td>
                    <h4>Datos Laborales</h4>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <hr>
                </td>
            </tr>
            <tr>
                <td>Legajo</td>
                <td>
                    <input type="number" id="txtLegajo" name="legajo">
                </td>
                <td>
                    <span style="display:none" id="errLegajo">*</span>
                </td>
            </tr>
            <tr>
                <td>Sueldo</td>
                <td>
                    <input type="number" id="txtSueldo" name="sueldo" step="500">
                </td>
                <td>
                    <span style="display:none" id="errSueldo">*</span>
                </td>
            </tr>
            <tr>
                <td>Turno</td>
            </tr>
            <tr>
                <td>
                    <input type="radio" id="tManiana" value="tManiana" name="turnos" checked>Mañana</td>
            </tr>
            <tr>
                <td>
                    <input type="radio" id="tTarde" value="tTarde" name="turnos">Tarde</td>
            </tr>
            <tr>
                <td>
                    <input type="radio" id="tNoche" value="tNoche" name="turnos">Noche</td>
            </tr>
            <tr>
                <td>
                    Foto:
                </td>
                <td>
                    <input type="file" name="foto" id="fileFoto">
                </td>
                <td>
                    <span style="display:none" id="errFoto">*</span>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <hr>
                </td>
            </tr>
            <tr>
                <td align="center" colspan="2">
                    <input type="reset" value="Limpiar">
                </td>
            </tr>
            <tr>
                <td align="center" colspan="2">
                    <input type="submit" value="Enviar" onclick="return AdministrarValidaciones()">
                </td>
            </tr>
        </table>
    </form>
</body>

</html>
<?php

}
?>
</body>

</html>