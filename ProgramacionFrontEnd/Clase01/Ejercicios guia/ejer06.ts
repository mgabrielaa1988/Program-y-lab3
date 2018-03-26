export {Potencia};
function Potencia(numero : number):number
{
    return Math.pow(numero,3);
}

function Mostrar():void
{
    console.log(Potencia(2));
}

