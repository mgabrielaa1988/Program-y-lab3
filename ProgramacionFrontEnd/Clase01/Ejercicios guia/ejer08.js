"use strict";
exports.__esModule = true;
function Factorial(numero) {
    var i = 1;
    var resultado = 1;
    for (i; i <= numero; i++) {
        resultado = resultado * i;
    }
    console.log(resultado);
}
exports.Factorial = Factorial;
