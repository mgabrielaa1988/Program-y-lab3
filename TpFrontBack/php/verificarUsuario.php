<?php
session_start();
if (isset($_POST['apellido']) && isset($_POST['dni'])) {
    $archivoTexto = fopen("../archivos/empleados.txt", "r");
    while (!feof($archivoTexto)) {
        $empleadoArray = explode("-", fgets($archivoTexto));
        if (trim($empleadoArray[0] != "")) {
            if ($_POST['apellido'] == $empleadoArray[1] && $_POST['dni'] == $empleadoArray[2]) {
                $_SESSION['DNIEmpleado'] = $_POST['dni'];
                header("Location: http://localhost/TpFrontBack/mostrar.php");
            }

        }
    }
    echo "No se encontro el usuario.";
    fclose($archivoTexto);
}

echo "</br><a href='../login.html'>Volver</a>";



?>