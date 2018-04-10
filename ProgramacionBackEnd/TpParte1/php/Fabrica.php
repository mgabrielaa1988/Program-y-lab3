<?php
require_once("interfaces.php");
class Fabrica implements IArchivo
{
    private $_cantidadMaxima;
    private $_empleados;
    private $_razonSocial;

    public function __construct($razonSocial,$cantMax=5)
    {
        $this->_cantidadMaxima=$cantMax;
        $this->_razonSocial=$razonSocial;
        $this->_empleados=array();
    }
    public function AgregarEmpleado($emp)
    {
        if(count($this->_empleados)<$this->_cantidadMaxima)
        {
            array_push($this->_empleados,$emp);
            $this->EliminarEmpleadoRepetido();
            return true;
        }
        else
        {
            return false;
        }
            
    }
    public function CalcularSueldos()
    {
        $sumaSueldos=0;
        foreach($this->_empleados as $empleado)
            $sumaSueldos+=$empleado->getSueldo();

        return $sumaSueldos;
    }
    public function EliminarEmpleado($emp)
    {
        $indice=array_search($emp,$this->_empleados);
        if($indice>=0)
        {
            unset($this->_empleados[$indice]);
            return true;
        }
        else
        {
            return false;
        }
    }
    private function EliminarEmpleadoRepetido()
    {
        if(count($this->_empleados)>1)
        $this->_empleados=array_unique($this->_empleados);
    }

    public function ToString()
    {
        $numEmpleados=count($this->_empleados);
        $infoFabrica="Cantidad maxima:".$this->_cantidadMaxima ." Empleados:".$numEmpleados ." Razon social: ".$this->_razonSocial."</br>Empleados:</br>";
        foreach($this->_empleados as $emp)
        {
            $infoFabrica.=$emp->toString();
        }
        return $infoFabrica;
    }

    public function GuardarEnArchivo($nombreArchivo="archivos/empleados.txt")
    {
        $archivo=fopen($nombreArchivo,"w");
        foreach($this->_empleados as $emp)
        {
            fwrite($archivo,$emp->ToString()."\r\n");
        }
        fclose($archivo);
    }
    public function TraerDeArchivo($nombreArchivo="archivos/empleados.txt")
    {
        $archivo=fopen($nombreArchivo,"r");
        while(!feof($archivo))
        {
            $empString=explode("-",fgets($archivo));
            if(trim($empString[0])!="")
            {
                $empNuevo=new Empleado($empString[0],$empString[1],$empString[2],$empString[3],$empString[4],$empString[5],$empString[6]);
                $this->AgregarEmpleado($empNuevo);
            }
            
        }
        fclose($archivo);
    }
}
?>