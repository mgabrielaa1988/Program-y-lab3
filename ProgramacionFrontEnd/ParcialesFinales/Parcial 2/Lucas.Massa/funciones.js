var Test;
(function (Test) {
    var Manejadora = /** @class */ (function () {
        function Manejadora() {
        }
        Manejadora.RecuperarEmail = function () {
            if (Manejadora.ValidarCampos()) {
                var email_1 = document.getElementById('email').value;
                var clave_1 = document.getElementById('clave').value;
                var seEncontro_1 = false;
                var stringusers = localStorage.getItem("JWTKey");
                if (stringusers) {
                    var usuarios = JSON.parse(stringusers);
                    usuarios.forEach(function (element) {
                        console.log(element);
                        if (element.clave == clave_1 && element.correo == email_1) {
                            window.location.assign('./principal.html');
                            seEncontro_1 = true;
                        }
                    });
                }
                if (!seEncontro_1) {
                    document.getElementById('mostrarErrores').innerHTML = "<div class=\"alert alert-danger\" role=\"alert\">\n                    El usuario no esta registrado\n                  </div>";
                }
            }
        };
        Manejadora.ValidarCampos = function () {
            var email = document.getElementById('email').value;
            var clave = document.getElementById('clave').value;
            var retorno = true;
            var emailRegex = /^[-\w.%+]{1,64}@(?:[A-Z0-9-]{1,63}\.){1,125}[A-Z]{2,63}$/i;
            if (email == "") {
                document.getElementById('errorEmail').innerHTML = "*";
                document.getElementById('mostrarErrorEmail').innerHTML = "<div class=\"alert alert-warning\" role=\"alert\">\n                El email se encuentra vacio.\n              </div>";
                retorno = false;
            }
            else if (!emailRegex.test(email)) {
                document.getElementById('errorEmail').innerHTML = "*";
                document.getElementById('mostrarErrorEmail').innerHTML = "<div class=\"alert alert-warning\" role=\"alert\">\n                El email no tiene un formato valido.\n              </div>";
                retorno = false;
            }
            if (clave == "") {
                document.getElementById('errorClave').innerHTML = "*";
                document.getElementById('mostrarErrorClave').innerHTML = "<div class=\"alert alert-warning\" role=\"alert\">\n                La clave se encuentra vacia.\n              </div>";
                retorno = false;
            }
            else if (clave.length < 4 || clave.length > 8) {
                document.getElementById('errorClave').innerHTML = "*";
                document.getElementById('mostrarErrorClave').innerHTML = "<div class=\"alert alert-warning\" role=\"alert\">\n                La clave tiene que ser mayor a 4 caracteres y menor a 8.\n              </div>";
                retorno = false;
            }
            return retorno;
        };
        return Manejadora;
    }());
    Test.Manejadora = Manejadora;
})(Test || (Test = {}));
