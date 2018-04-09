<?php
require_once("Empleado.php");

if(count($_POST)!=0)
{
    $empleadoForm=new Empleado($_POST['nombre'],$_POST['apellido'],$_POST['dni'],$_POST['genero'],$_POST['legajo'],$_POST['sueldo'],$_POST['turnos']);
    echo $empleadoForm->ToString();
    $archivo=fopen("archivos/empleados.txt","a");
    
    if(fwrite($archivo,$empleadoForm->ToString()."\r\n")>0)
    {
        ?> <a href="mostrar.php">Mostrar</a> <?php
    }
    else
    {
        ?> <a href="index.html">Volver</a> <?php
    }
       
    
    fclose($archivo);
}


?>  