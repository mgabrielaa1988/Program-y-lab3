function NumerosPrimos() {
    var numero = 1;
    var contadorDivisores = 0;
    var primeraVez;
    var numerosPrimos = 0;
    for (var numero_1 = 0; numerosPrimos < 20; numero_1++) {
        primeraVez = false;
        for (var i = 1; i < numero_1; i++) {
            if (numero_1 % numero_1 == 0 && !primeraVez) {
                contadorDivisores++;
                primeraVez = true;
            }
            if (numero_1 % i == 0)
                contadorDivisores++;
        }
        if (contadorDivisores == 2) {
            numerosPrimos++;
            console.log("Numero primo: " + numero_1 + " \n");
        }
        contadorDivisores = 0;
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
