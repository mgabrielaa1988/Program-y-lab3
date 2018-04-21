<?php
require_once("php/Fabrica.php");
require_once("php/Empleado.php");
    $fabrica=new Fabrica("La de vivir",7);
    $fabrica->TraerDeArchivo();
    if(isset($_POST['nombre']))
    {
        $empleadoForm=new Empleado($_POST['nombre'],$_POST['apellido'],$_POST['dni'],$_POST['genero'],$_POST['legajo'],$_POST['sueldo'],$_POST['turnos']);
        if($fabrica->AgregarEmpleado($empleadoForm))
        {
            $fabrica->GuardarEnArchivo();
            echo "Empleado guardado perfectamente </br><a href=\"mostrar.php\">Mostrar</a>";
        }
        else
        {
            echo "No pudo Agregarse a la fabrica"."<a href=\"index.html\">Volver</a>";
        }
    }
echo "</br><a href=\"index.html\">Volver</a>";

    

?>