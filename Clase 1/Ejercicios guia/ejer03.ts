function Ejercicio03(numero: number , cadena? :string):void
{
    if(cadena != null)
    {
        for(let i=0;i<numero;i++)
        {
            console.log(cadena + "\n");
        }
    }
    else
    {
        console.log(numero*-1);
    }
}