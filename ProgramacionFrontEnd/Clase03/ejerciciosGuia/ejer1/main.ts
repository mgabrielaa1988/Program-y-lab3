/// <reference path="./rectangulo.ts" />
var puntoUno:Test.Punto= new Test.Punto(3,6);
var puntoTres:Test.Punto=new Test.Punto(6,3);

var rectangulo:Test.Rectangulo=new Test.Rectangulo(puntoUno,puntoTres);
console.log(rectangulo.ToString());


/* 
    1(3,6)                2(6,6)    LADO UNO = 3


    4(3,3)                3(6,3)


*/