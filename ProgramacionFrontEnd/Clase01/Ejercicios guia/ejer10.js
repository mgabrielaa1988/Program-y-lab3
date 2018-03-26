function MostrarInformacion(info) {
    var largoCadena;
    var mayus = 0;
    var minus = 0;
    for (largoCadena = 0; largoCadena < info.length; largoCadena++) {
        if (info[largoCadena] == info[largoCadena].toUpperCase())
            mayus++;
        else
            minus++;
    }
    if (mayus > 0 && minus == 0) {
        console.log("La cadena esta llena de mayusculas. " + mayus);
    }
    else if (minus > 0 && mayus == 0) {
        console.log("La cadena esta llena de minusculas. " + minus);
    }
    else {
        console.log("La cadena tiene minusculas y mayusculas\nMinus=" + minus + "\nMayus=" + mayus);
    }
}
MostrarInformacion('LUCAS');
