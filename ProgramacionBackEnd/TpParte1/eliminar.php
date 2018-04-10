<?php
require_once("php/Empleado.php");
require_once("php/Fabrica.php");
if(isset($_GET['legajo']))
{
    $archivo=fopen("archivos/empleados.txt","r");
    while(!feof($archivo))
    {
        $empString=explode("-",fgets($archivo));
        if(trim($empString[4])!="" && $empString[4]==$_GET['legajo'])
        {
            $empNuevo=new Empleado($empString[0],$empString[1],$empString[2],$empString[3],$empString[4],$empString[5],$empString[6]);
            $fabricaNueva=new Fabrica("La de vivir",7);
            $fabricaNueva->TraerDeArchivo();
            if($fabricaNueva->EliminarEmpleado($empNuevo))
            {
                echo "Se elimino el empleado";
                $fabricaNueva->GuardarEnArchivo();
            }
            else
            {
                echo "No se pudo eliminar el empleado";
            }
            echo "<a href=\"mostrar.php\">Mostrar</a>";
            echo "<a href=\"index.html\">Volver</a>";
        }   
    }
    fclose($archivo);
}
echo "<a href=\"mostrar.php\">Mostrar</a>";
echo "<a href=\"index.html\">Volver</a>";

?>