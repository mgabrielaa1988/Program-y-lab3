<?php 
$operadores = array('+','-','/','*');
$op1 = 10;
$op2 = 2;

foreach($operadores as $operador)
{
    switch($operador)
    {
        case '+':
            echo "Resultado: " . ($op1 + $op2);
            break;
        case '-':
            echo "Resultado: " . ($op1 - $op2);
            break;
        case '/':
            echo "Resultado: " . ($op1 / $op2);
            break;
        case '*':
            echo "Resultado: " . ($op1 * $op2);
            break;

    }
    echo "</br>";
}

?>