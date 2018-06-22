var Test;
(function (Test) {
    var Manejadora = /** @class */ (function () {
        function Manejadora() {
        }
        Manejadora.Limpiar = function () {
            document.getElementById('nombre').value = "";
            document.getElementById('clave').value = "";
        };
        Manejadora.Logear = function () {
            var nombre = document.getElementById('nombre').value;
            var clave = document.getElementById('clave').value;
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.open("POST", "../backend.1/test", true);
            xmlhttp.setRequestHeader("content-type", "application/x-www-form-urlencoded");
            xmlhttp.send("nombre=" + nombre + '&clave=' + clave);
            xmlhttp.onreadystatechange = function () {
                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                    console.log(xmlhttp.responseText);
                    localStorage.setItem('miToken', xmlhttp.responseText);
                    window.location.href = './listadoCd.php';
                }
            };
        };
        return Manejadora;
    }());
    Test.Manejadora = Manejadora;
})(Test || (Test = {}));
