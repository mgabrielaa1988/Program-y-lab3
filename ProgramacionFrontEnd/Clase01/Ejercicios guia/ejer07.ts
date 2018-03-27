function NumerosPrimos():void
{
    let numero:number=1;
    let contadorDivisores:number=0;
    let primeraVez:Boolean;
    let numerosPrimos:number=0;
    for(let numero:number=0;numerosPrimos<20;numero++)
    {
        primeraVez=false;
        for(let i:number=1;i<numero;i++)
        {
            if(numero%numero==0 && !primeraVez)
            {
                contadorDivisores++;
                primeraVez=true;
            }
            if(numero%i==0)
                contadorDivisores++;
        }
        if(contadorDivisores==2)
        {
            numerosPrimos++;
            console.log(`Numero primo: ${numero} \n`);
        }
        contadorDivisores=0;
    }
    
    
   /* var contadorPrimos : number = 0;
    for(var i : number = 2; contadorPrimos<=20;i++)
    {
        for(var k : number = 2; k<i/2;k++)
        {
            if(i%k==0)
            {
                break;
            }
        }
        if(i%k!=0 || i==2)
        {
            contadorPrimos++;
            console.log(i + "\n");
        }
    }*/
} 

NumerosPrimos();