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
