function SignoZodiaco(fecha:string)
{
    let arrayFecha:string[]=fecha.split("-",2);
    let signo:string="";
    let dia:number=parseInt(arrayFecha[0]);
    let mes:string=arrayFecha[1];
    switch(mes)
    {
        case "01":
        if(dia<20)
            signo="Capricornio";
        else
            signo="Acuario";
        break;
        case "02":
        if(dia<18)
            signo="Acuario";
        else
            signo="Piscis";
        break;
        case "03":
        if(dia<21)
            signo="Piscis";
        else
            signo="Aries";
        break;
        case "04":
        if(dia<20)
            signo="Aries";
        else
            signo="Tauro";
        break;
        case "05":
        if(dia<21)
            signo="Tauro";
        else
            signo="Geminis";
        break;
        case "06":
        if(dia<21)
            signo="Geminis";
        else
            signo="Cancer";
        break;
        case "07":
        if(dia<23)
            signo="Cancer";
        else
            signo="Leo";
        break;
        case "08":
        if(dia<23)
            signo="Leo";
        else
            signo="Virgo";
        break;
        case "09":
        if(dia<23)
            signo="Virgo";
        else
            signo="Libra";
        break;
        case "10":
        if(dia<23)
            signo="Libra";
        else
            signo="Escorpio";
        break;
        case "11":
        if(dia<22)
            signo="Escorpio";
        else
            signo="Sagitario";
        break;
        case "12":
        if(dia<22)
            signo="Sagitario";
        else
            signo="Capricornio";
        break;
    }
    console.log(`Tu fecha de nacimiento: ${fecha}, tu signo es: ${signo}`);
}

SignoZodiaco("30-09-1997");