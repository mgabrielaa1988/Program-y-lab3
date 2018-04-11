<?php
require_once("php/Empleado.php");
require_once("php/Fabrica.php");


if(isset($_GET['legajo']))
{
    $seEncontro=false;
    $archivo=fopen("archivos/empleados.txt","r");
    while(!feof($archivo))
    {
        $empString=explode("-",fgets($archivo));
        if(trim($empString[0])!="")
        {
            if($_GET['legajo']==$empString[4])
            {
                $empNuevo=new Empleado($empString[0],$empString[1],$empString[2],$empString[3],$empString[4],$empString[5],$empString[6]);
                $fabricaNueva=new Fabrica("La de vivir",7);
                $fabricaNueva->TraerDeArchivo();
                if($fabricaNueva->EliminarEmpleado($empNuevo))
                {
                    echo "Se elimino el empleado";
                    $fabricaNueva->GuardarEnArchivo();
                    $seEncontro=true;
                    break;
                }
                else
                {
                    echo "No se pudo eliminar el empleado";
                    $seEncontro=true;
                    break;
                }
            }
        }   
    }
    if(!$seEncontro)
    {
        echo "No se encontro el empleado";
    }
    fclose($archivo);
}

?>
</br>
<a href="../mostrar.php">Mostrar</a>
<a href="../index.html">Volver</a>