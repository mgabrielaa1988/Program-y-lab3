/// <reference path="./punto.ts" />
var Test;
(function (Test) {
    var Rectangulo = /** @class */ (function () {
        function Rectangulo(v1, v3) {
            this._vertice1 = v1;
            this._vertice2 = new Test.Punto(v1.GetX(), v3.GetY());
            this._vertice3 = v3;
            this._vertice4 = new Test.Punto(v3.GetX(), v1.GetY());
            this._ladoUno = this._vertice2.GetX() - v1.GetX();
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
