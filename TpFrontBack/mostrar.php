<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HTML5-Listado de empleados</title>
</head>
<body>
    <h2>Listado de Empleados</h2>
    <table align="center">
        <tr>
            <td>
                <h4>Info</h4>
            </td>
        </tr>
        <tr>
            <td colspan="2">
                <hr>
            </td>
        </tr>
  

    <!-- EMPIEZA PHP -->
<?php
require_once "php/Empleado.php";

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
foreach($empleados as $emp)
{
    ?> 
    <tr>
        <td>
            <?php echo $emp->ToString() ?>
        </td>
        <td>
            <a href="eliminar.php/?legajo=<?php echo $emp->GetLegajo()?>">Eliminar</a>
        </td>
    </tr>
<?php
}
?>
<!-- TERMINA PHP-->
    <tr>
        <td colspan="2">
            <hr>
        </td>
    </tr>

    <tr>
        <td>
            <a href="index.html">Alta de empleados</a>
        </td>
    </tr>
</table>


</body>
</html>