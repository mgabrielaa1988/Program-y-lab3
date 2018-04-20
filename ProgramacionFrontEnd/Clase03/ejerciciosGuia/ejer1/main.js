var Test;
(function (Test) {
    var Punto = /** @class */ (function () {
        function Punto(x, y) {
            this._x = x;
            this._y = y;
        }
        Punto.prototype.GetX = function () {
            return this._x;
        };
        Punto.prototype.GetY = function () {
            return this._y;
        };
        Punto.prototype.ToString = function () {
            return this._x + "-" + this._y;
        };
        return Punto;
    }());
    Test.Punto = Punto;
})(Test || (Test = {}));
/// <reference path="./punto.ts" />
var Test;
(function (Test) {
    var Rectangulo = /** @class */ (function () {
        function Rectangulo(v1, v3) {
            console.log(v1.GetX());
            this._vertice1 = v1;
            this._vertice2 = new Test.Punto(v3.GetX(), this._vertice1.GetY());
            this._vertice3 = v3;
            this._vertice4 = new Test.Punto(v1.GetX(), v3.GetY());
            this._ladoUno = (this._vertice2.GetX() - v1.GetX());
            this._ladoDos = v1.GetY() - this._vertice4.GetY();
            this._perimetro = this._ladoUno * 2 + this._ladoDos * 2;
            this._area = this._ladoUno * this._ladoDos;
        }
        Rectangulo.prototype.GetArea = function () {
            return this._area;
        };
        Rectangulo.prototype.GetPerimetro = function () {
            return this._perimetro;
        };
        Rectangulo.prototype.ToString = function () {
            return this._area + "-" + this._ladoUno + "-" + this._ladoDos + "-" + this._perimetro /* -${this._vertice1.ToString()}-${this._vertice2.ToString()}-${this._vertice3.ToString()}-${this._vertice4.ToString()} */;
        };
        return Rectangulo;
    }());
    Test.Rectangulo = Rectangulo;
})(Test || (Test = {}));
/// <reference path="./rectangulo.ts" />
var puntoUno = new Test.Punto(3, 6);
var puntoTres = new Test.Punto(6, 3);
var rectangulo = new Test.Rectangulo(puntoUno, puntoTres);
console.log(rectangulo.ToString());
/*
    1(3,6)                2(6,6)    LADO UNO = 3


    4(3,3)                3(6,3)


*/ 
