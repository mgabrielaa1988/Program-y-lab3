<?php
require_once "administracion.php";

$archivo=fopen("archivos/empleados.txt","r");
$empleados=array();
while(!feof($archivo))
{
    $archivoEmpleado=explode("-",fgets($archivo));
    if(trim($archivoEmpleado[0])!="")
    {
        $emp=new Empleado($archivoEmpleado[0],$archivoEmpleado[1],$archivoEmpleado[2],$archivoEmpleado[3],$archivoEmpleado[4],$archivoEmpleado[5],$archivoEmpleado[6]);
        array_push($empleados,$emp);
    }
    
}
fclose($archivo);
echo "</br>";
foreach($empleados as $emp)
{
    echo "</br>".$emp->ToString();
}

echo "<a href=\"index.html\">Volver</a>";

?>