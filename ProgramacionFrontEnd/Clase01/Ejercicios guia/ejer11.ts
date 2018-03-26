function Palindromo(cadena:string)
{
    let array:string[]=cadena.split("");
    let largo:number;
    let esPalin:Boolean=true;
    let sinEspacios:string="";
    for (i in array) {
        if (array[i] != " ") {
            sinEspacios += array[i].toLowerCase();
        }
    }
    sinEspacios.toLowerCase();
    let arrayAlReves:string[]=sinEspacios.split("").reverse();
    let arrayOriginal:string[]=sinEspacios.split("");
    for(largo=0;largo<arrayOriginal.length;largo++)
    {
        if(arrayOriginal[largo]!=arrayAlReves[largo])
        {
            console.log(arrayOriginal[largo]+" "+arrayAlReves[largo]);
            esPalin=false;
            break;
        }
    }
    if(esPalin)
    console.log("La cadena es palindromo");
    else
    console.log("La cadena no es palindromo");
}
Palindromo("Amor a Roma");