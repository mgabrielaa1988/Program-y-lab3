import { Potencia } from "./ejer06";

import { Factorial } from "./ejer08";

function PotenciaFactorial(numero:number)
{
    if(numero>0)
    {
        console.log(Factorial(numero));
    }
    else
    console.log(Potencia(numero));
}


PotenciaFactorial(-2);

