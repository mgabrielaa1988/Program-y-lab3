"use strict";
exports.__esModule = true;
var ejer06_1 = require("./ejer06");
var ejer08_1 = require("./ejer08");
function PotenciaFactorial(numero) {
    if (numero > 0) {
        console.log(ejer08_1.Factorial(numero));
    }
    else
        console.log(ejer06_1.Potencia(numero));
}
PotenciaFactorial(-2);
