function Palindromo(cadena) {
    var array = cadena.split("");
    var largo;
    var esPalin = true;
    var sinEspacios = "";
    for (i in array) {
        if (array[i] != " ") {
            sinEspacios += array[i].toLowerCase();
        }
    }
    sinEspacios.toLowerCase();
    var arrayAlReves = sinEspacios.split("").reverse();
    var arrayOriginal = sinEspacios.split("");
    for (largo = 0; largo < arrayOriginal.length; largo++) {
        if (arrayOriginal[largo] != arrayAlReves[largo]) {
            console.log(arrayOriginal[largo] + " " + arrayAlReves[largo]);
            esPalin = false;
            break;
        }
    }
    if (esPalin)
        console.log("La cadena es palindromo");
    else
        console.log("La cadena no es palindromo");
}
Palindromo("Amor a Roma");
