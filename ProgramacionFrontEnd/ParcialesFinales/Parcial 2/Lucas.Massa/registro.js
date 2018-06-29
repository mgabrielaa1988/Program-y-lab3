var Test;
(function (Test) {
    var Registradora = /** @class */ (function () {
        function Registradora() {
        }
        Registradora.Registrar = function () {
            if (Registradora.ValidarCampos()) {
                var email_1 = document.getElementById('email').value;
                var clave = document.getElementById('clave').value;
                var apellido = document.getElementById('apellido').value;
                var legajo = document.getElementById('legajo').value;
                var nombre = document.getElementById('nombre').value;
                var confirmar = document.getElementById('confirmar').value;
                var foto = document.getElementById('foto');
                var stringJSON = JSON.stringify({
                    "correo": email_1,
                    "clave": clave,
                    "nombre": nombre,
                    "apellido": apellido,
                    "legajo": legajo,
                    "perfil": foto.name,
                    "foto": foto
                });
                var seEncontro_1 = false;
                var stringusers = localStorage.getItem("JWTKey");
                if (stringusers) {
                    var usuarios = JSON.parse(stringusers);
                    usuarios.forEach(function (element) {
                        console.log(element);
                        if (element.correo == email_1) {
                            document.getElementById('mostrarErrores').innerHTML = "<div class=\"alert alert-danger\" role=\"alert\">\n                              El usuario ya esta registrado\n                            </div>";
                            seEncontro_1 = true;
                        }
                    });
                }
                if (!seEncontro_1) {
                    localStorage.setItem("JWTKey", stringJSON);
                }
            }
        };
        Registradora.ValidarCampos = function () {
            var email = document.getElementById('email').value;
            var clave = document.getElementById('clave').value;
            var apellido = document.getElementById('apellido').value;
            var legajo = parseInt(document.getElementById('legajo').value);
            var nombre = document.getElementById('nombre').value;
            var confirmar = document.getElementById('confirmar').value;
            var foto = document.getElementById('foto');
            var retorno = true;
            var emailRegex = /^[-\w.%+]{1,64}@(?:[A-Z0-9-]{1,63}\.){1,125}[A-Z]{2,63}$/i;
            if (apellido.length > 15) {
                document.getElementById('errorApellido').innerHTML = "*";
                document.getElementById('mostrarErrorEmail').innerHTML += "<div class=\"alert alert-danger\" role=\"alert\">\n                El email no puede ser de mas de 15 caracteres\n              </div>";
                retorno = false;
            }
            if (!emailRegex.test(email)) {
                document.getElementById('errorEmail').innerHTML = "*";
                document.getElementById('mostrarErrorEmail').innerHTML += "<div class=\"alert alert-danger\" role=\"alert\">\n                El email no tiene un formato valido.\n              </div>";
                retorno = false;
            }
            if (nombre.length > 10) {
                document.getElementById('errorNombre').innerHTML = "*";
                document.getElementById('mostrarErrores').innerHTML += "<div class=\"alert alert-danger\" role=\"alert\">\n                El nombre no puede ser de mas de 10 caracteres\n              </div>";
                retorno = false;
            }
            if (!isNaN(legajo) && (legajo < 3 || legajo > 6)) {
                document.getElementById('errorLegajo').innerHTML = "*";
                document.getElementById('mostrarErrores').innerHTML += "<div class=\"alert alert-danger\" role=\"alert\">\n                El legajo debe ser un numero entre 3 y 6.\n              </div>";
                retorno = false;
            }
            var fotoExt = foto.name.split('.').pop.toString();
            if (fotoExt != 'jpg' || fotoExt != 'png') {
                document.getElementById('errorFoto').innerHTML = "*";
                document.getElementById('mostrarErrores').innerHTML += "<div class=\"alert alert-danger\" role=\"alert\">\n                No es una extension valida\n              </div>";
                retorno = false;
            }
            if (clave.length < 4 || clave.length > 8) {
                document.getElementById('errorClave').innerHTML = "*";
                document.getElementById('mostrarErrorClave').innerHTML = "<div class=\"alert alert-danger\" role=\"alert\">\n                La clave tiene que ser entre 4 y 8 caracteres\n              </div>";
                retorno = false;
            }
            else if (clave != confirmar) {
                document.getElementById('errorClave').innerHTML = "*";
                document.getElementById('mostrarErrorClave').innerHTML = "<div class=\"alert alert-danger\" role=\"alert\">\n                Error al confirmar la clave.\n              </div>";
                retorno = false;
            }
            return retorno;
        };
        return Registradora;
    }());
    Test.Registradora = Registradora;
})(Test || (Test = {}));
