var __extends = (this && this.__extends) || (function () {
    var extendStatics = Object.setPrototypeOf ||
        ({ __proto__: [] } instanceof Array && function (d, b) { d.__proto__ = b; }) ||
        function (d, b) { for (var p in b) if (b.hasOwnProperty(p)) d[p] = b[p]; };
    return function (d, b) {
        extendStatics(d, b);
        function __() { this.constructor = d; }
        d.prototype = b === null ? Object.create(b) : (__.prototype = b.prototype, new __());
    };
})();
var Entidades;
(function (Entidades) {
    var Persona = /** @class */ (function () {
        function Persona(nombre, apellido, edad) {
            this._nombre = nombre;
            this._apellido = apellido;
            this._edad = edad;
        }
        Persona.prototype.personaToString = function () {
            return this._nombre + "-" + this._apellido + "-" + this._edad + "\n";
        };
        return Persona;
    }());
    Entidades.Persona = Persona;
    var Ciudadano = /** @class */ (function (_super) {
        __extends(Ciudadano, _super);
        function Ciudadano(nombre, apellido, edad, dni, pais) {
            var _this = _super.call(this, nombre, apellido, edad) || this;
            _this._dni = dni;
            _this._pais = pais;
            return _this;
        }
        Ciudadano.prototype.ciudadanoToJson = function () {
            return { "nombre": this._nombre, "apellido": this._apellido, "edad": this._edad.toString(), "dni": this._dni.toString(), "pais": this._pais };
        };
        return Ciudadano;
    }(Persona));
    Entidades.Ciudadano = Ciudadano;
})(Entidades || (Entidades = {}));
var Test;
(function (Test) {
    var Manejadora = /** @class */ (function () {
        function Manejadora() {
        }
        Manejadora.AgregarCiudadano = function () {
            var nombre = document.getElementById('txtNombre').value;
            var apellido = document.getElementById('txtApellido').value;
            var edad = document.getElementById('txtEdad').value;
            var dni = document.getElementById('txtDni').value;
            var pais = document.getElementById('cboPais').selected;
            var ciud = new Entidades.Ciudadano(nombre, apellido, parseInt(edad), parseInt(dni), pais);
            var xhttp = new XMLHttpRequest();
            console.log(JSON.stringify(ciud.ciudadanoToJson()));
            xhttp.open("POST", "./BACKEND/administrar.php");
            xhttp.setRequestHeader("content-type", "application/x-www-form-urlencoded");
            xhttp.send("caso=agregar&cadenaJson=" + JSON.stringify(ciud.ciudadanoToJson()));
            console.log(JSON.stringify(ciud.ciudadanoToJson()));
            xhttp.onreadystatechange = function () {
                if (xhttp.readyState == 4 && xhttp.status == 200) {
                    //console.log(xhttp.responseText);
                }
            };
        };
        Manejadora.MostrarCiudadanos = function () {
            var xhttp = new XMLHttpRequest();
            xhttp.open("POST", "/BACKEND/administrar.php");
            xhttp.setRequestHeader("content-type", "application/x-www-form-urlencoded");
            xhttp.send("caso=mostrar");
            var ciudJSON;
            xhttp.onreadystatechange = function () {
                if (xhttp.readyState == 4 && xhttp.status == 200) {
                    ciudJSON = JSON.parse(xhttp.responseText);
                    document.getElementById("divTabla").innerHTML = ciudJSON.nombre + ciudJSON.apellido + ciudJSON.edad + ciudJSON.dni + ciudJSON.pais;
                }
            };
        };
        return Manejadora;
    }());
    Test.Manejadora = Manejadora;
})(Test || (Test = {}));
