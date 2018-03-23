function Factorial(numero :number)
{
    var i : number=1;
    var resultado=1;
    for(i;i<=numero;i++)
    {
        resultado = resultado * i;
    }
    console.log(resultado);
}
Factorial(4);