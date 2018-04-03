<?php
abstract class FiguraGeometrica{

    protected $_color;
    protected $_perimetro;
    protected $_superficie;


    public function __construct(){

    }
    public function GetColor()
    {
        return $this->_color;
    }
    public function SetColor($valor)
    {
        $this->_color=$valor;
    }

    public function ToString()
    {
        return "Color: ".$this->_color." Perimetro: ".$this->_perimetro." Superficie: ".$this->_superficie;
    }
    public abstract function Dibujar();

    protected abstract function CalcularDatos();

}

class Rectangulo extends FiguraGeometrica
{
    private $_altura;
    private $_base;

    public function __construct($ladoUno,$ladoDos)
    {
        parent::__construct();
        $this->_altura=$ladoUno;
        $this->_base=$ladoDos;
        $this->CalcularDatos();
    }
    protected function CalcularDatos()
    {
        $this->_perimetro=$this->_altura*2+$this->_base*2;
        $this->_superficie=$this->_altura*$this->_base;
    }
    public function Dibujar()
    {
      
        for($alturaDibujo=1;$alturaDibujo<=$this->_altura;$alturaDibujo++)
        {
            for($baseDibujo=1;$baseDibujo<=$this->_base;$baseDibujo++)
            {
                echo "*";
            }
            echo "</br>";
        }

    }
    public function ToString()
    {
        return parent::ToString()." Altura: ".$this->_altura." Base: ".$this->_base."</br>";
    }
}
class Triangulo extends FiguraGeometrica
{
    private $_altura;
    private $_base;

    public function __construct($ladoUno,$ladoDos)
    {
        parent::__construct();
        $this->_altura=$ladoUno;
        $this->_base=$ladoDos;
        $this->CalcularDatos();

    }
    protected function CalcularDatos()
    {
        $this->_perimetro=10;
        $this->_superficie=($this->_altura*$this->_base)/2;
    }
    public function Dibujar()
    {
       for($i=0;$i<$this->_perimetro;$i++)
       {
           for($j=0;$j<$this->_perimetro-$i-1;$j++)
               print("&nbsp;");
            for($j=0;$j<=$i;$j++)
                print("*");
            print("</br>");
       }
    }

    public function ToString()
    {
        return parent::ToString()." Altura: ".$this->_altura." Base: ".$this->_base."</br>";
    }
}

$rectangulo=new Rectangulo(2,4);
$triangulo=new Triangulo(6,6);
$rectangulo->SetColor("Gris");
$triangulo->SetColor("Rojo");
echo "Rectangulo: " . $rectangulo->ToString()."</br>";
echo "Triangulo: ".$triangulo->ToString();
//$rectangulo->Dibujar()."</br>";
$triangulo->Dibujar();
?>