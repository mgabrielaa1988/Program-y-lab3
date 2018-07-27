var Test;
(function (Test) {
    var ValidadoraLogin = /** @class */ (function () {
        function ValidadoraLogin() {
        }
        ValidadoraLogin.LimpiarErrores = function () {
            document.getElementById("errorCorreo").innerHTML = "";
            document.getElementById("errorClave").innerHTML = "";
            document.getElementById("alertaLogin").innerHTML = "";
            document.getElementById("alertaLogin").hidden = true;
            document.getElementById("errorCorreo").hidden = true;
            document.getElementById("errorClave").hidden = true;
        };
        ValidadoraLogin.LimpiarCampos = function () {
            document.getElementById("correo").value = "";
            document.getElementById("clave").value = "";
            this.LimpiarErrores();
        };
        ValidadoraLogin.ValidarLoginVacios = function (mail, clave) {
            if (clave == "" && mail == "") {
                document.getElementById("errorCorreo").innerHTML = "*";
                document.getElementById("errorClave").innerHTML = "*";
                document.getElementById("alertaLogin").innerHTML = "Correo y Contraseña se encuentran vacios";
                document.getElementById("alertaLogin").hidden = false;
                document.getElementById("errorCorreo").hidden = false;
                document.getElementById("errorClave").hidden = false;
                return false;
            }
            else {
                if (mail == "") {
                    document.getElementById("errorCorreo").innerHTML = "*";
                    document.getElementById("alertaLogin").innerHTML = "Correo se encuentra vacio";
                    document.getElementById("alertaLogin").hidden = false;
                    document.getElementById("errorCorreo").hidden = false;
                    return false;
                }
                else {
                    if (clave == "") {
                        document.getElementById("errorClave").innerHTML = "*";
                        document.getElementById("alertaLogin").innerHTML = "Contraseña se encuentra vacia";
                        document.getElementById("alertaLogin").hidden = false;
                        document.getElementById("errorClave").hidden = false;
                        return false;
                    }
                }
            }
            return true;
        };
        ValidadoraLogin.ValidarLoginFormato = function (mail, clave) {
            if (!(this.validarMail(mail)) && !(this.validarClave(clave))) {
                document.getElementById("errorCorreo").innerHTML = "*";
                document.getElementById("errorClave").innerHTML = "*";
                document.getElementById("alertaLogin").innerHTML = "Correo y Contraseña tienen formato invalido";
                document.getElementById("errorCorreo").hidden = false;
                document.getElementById("errorClave").hidden = false;
                document.getElementById("alertaLogin").hidden = false;
                return false;
            }
            else {
                if (!(this.validarMail(mail))) {
                    document.getElementById("errorCorreo").innerHTML = "*";
                    document.getElementById("alertaLogin").innerHTML = "Correo tiene formato invalido";
                    document.getElementById("alertaLogin").hidden = false;
                    document.getElementById("errorCorreo").hidden = false;
                    return false;
                }
                else {
                    if (!(this.validarClave(clave))) {
                        document.getElementById("errorClave").innerHTML = "*";
                        document.getElementById("alertaLogin").innerHTML = "Contraseña tiene formato invalido";
                        document.getElementById("alertaLogin").hidden = false;
                        document.getElementById("errorClave").hidden = false;
                        return false;
                    }
                }
            }
            return true;
        };
        ValidadoraLogin.validarMail = function (mail) {
            var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
            return re.test(String(mail).toLowerCase());
        };
        ValidadoraLogin.validarClave = function (clave) {
            if (clave.length >= 4 && clave.length <= 8) {
                return true;
            }
            else {
                return false;
            }
        };
        return ValidadoraLogin;
    }());
    Test.ValidadoraLogin = ValidadoraLogin;
})(Test || (Test = {}));
var Test;
(function (Test) {
    var ValidadoraRegistro = /** @class */ (function () {
        function ValidadoraRegistro() {
        }
        ValidadoraRegistro.LimpiarErrores = function () {
            document.getElementById("errorApellido").innerHTML = "";
            document.getElementById("errorApellido").hidden = true;
            document.getElementById("errorNombre").innerHTML = "";
            document.getElementById("errorNombre").hidden = true;
            document.getElementById("errorEmail").innerHTML = "";
            document.getElementById("errorEmail").hidden = true;
            document.getElementById("errorLegajo").innerHTML = "";
            document.getElementById("errorLegajo").hidden = true;
            document.getElementById("errorClave").innerHTML = "";
            document.getElementById("errorClave").hidden = true;
            document.getElementById("errorConfirmar").innerHTML = "";
            document.getElementById("errorConfirmar").hidden = true;
            document.getElementById("errorFoto").innerHTML = "";
            document.getElementById("errorFoto").hidden = true;
            document.getElementById("alertaRegistro").innerHTML = "";
            document.getElementById("alertaRegistro").hidden = true;
        };
        ValidadoraRegistro.ValidarVacios = function (nombre, apellido, mail, legajo, clave, confirmar, foto) {
            var errores = [];
            if (nombre == "") {
                errores.push("Nombre");
                document.getElementById("errorNombre").innerHTML = "*";
                document.getElementById("errorNombre").hidden = false;
            }
            if (apellido == "") {
                errores.push("Apellido");
                document.getElementById("errorApellido").innerHTML = "*";
                document.getElementById("errorApellido").hidden = false;
            }
            if (mail == "") {
                errores.push("Email");
                document.getElementById("errorEmail").innerHTML = "*";
                document.getElementById("errorEmail").hidden = false;
            }
            if (legajo == "") {
                errores.push("Legajo");
                document.getElementById("errorLegajo").innerHTML = "*";
                document.getElementById("errorLegajo").hidden = false;
            }
            if (clave == "") {
                errores.push("Clave");
                document.getElementById("errorClave").innerHTML = "*";
                document.getElementById("errorClave").hidden = false;
            }
            if (confirmar == "") {
                errores.push("Confirmar");
                document.getElementById("errorConfirmar").innerHTML = "*";
                document.getElementById("errorConfirmar").hidden = false;
            }
            if (foto.value == "") {
                console.log(errores.push("Foto"));
                document.getElementById("errorFoto").innerHTML = "*";
                document.getElementById("errorFoto").hidden = false;
            }
            if (errores.length == 0) {
                console.log(errores);
                return true;
            }
            var stringErrores = "Los siguientes campos estan vacios: <br>";
            errores.forEach(function (error) {
                stringErrores += error + "<br>";
            });
            document.getElementById("alertaRegistro").innerHTML = stringErrores;
            document.getElementById("alertaRegistro").hidden = false;
            console.log(errores);
            return false;
        };
        ValidadoraRegistro.ValidarRegistro = function (nombre, apellido, mail, legajo, clave, confirmar, foto) {
            var legajoParsed = parseInt(legajo);
            var errores = [];
            errores = this.ValidarNombreApellido(nombre, apellido, errores);
            errores = this.validarMail(mail, errores);
            errores = this.ValidarLegajo(legajoParsed, errores);
            errores = this.ValidarClaveConfirmar(clave, confirmar, errores);
            errores = this.ValidarFoto(foto, errores);
            if (errores.length == 0) {
                console.log(errores);
                return true;
            }
            var stringErrores = "Los siguientes campos tienen errores de formato: <br>";
            errores.forEach(function (error) {
                stringErrores += error + "<br>";
            });
            document.getElementById("alertaRegistro").innerHTML = stringErrores;
            document.getElementById("alertaRegistro").hidden = false;
            console.log(errores);
            return false;
        };
        ValidadoraRegistro.ValidarNombreApellido = function (nombre, apellido, errores) {
            if (apellido.length > 15) {
                errores.push("Apellido");
                document.getElementById("errorApellido").innerHTML = "*";
                document.getElementById("errorApellido").hidden = false;
            }
            if (nombre.length > 10) {
                errores.push("Nombre");
                document.getElementById("errorNombre").innerHTML = "*";
                document.getElementById("errorNombre").hidden = false;
            }
            return errores;
        };
        ValidadoraRegistro.validarMail = function (mail, errores) {
            var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
            if (!(re.test(String(mail).toLowerCase()))) {
                errores.push("Email");
                document.getElementById("errorEmail").innerHTML = "*";
                document.getElementById("errorEmail").hidden = false;
            }
            return errores;
        };
        ValidadoraRegistro.ValidarLegajo = function (legajo, errores) {
            if (legajo < 100 || legajo > 999999) {
                errores.push("Legajo");
                document.getElementById("errorLegajo").innerHTML = "*";
                document.getElementById("errorLegajo").hidden = false;
            }
            return errores;
        };
        ValidadoraRegistro.ValidarClaveConfirmar = function (clave, confirmar, errores) {
            if (clave.length > 8 || clave.length < 4) {
                errores.push("Clave");
                document.getElementById("errorClave").innerHTML = "*";
                document.getElementById("errorClave").hidden = false;
            }
            if (confirmar !== clave) {
                errores.push("Confirmar");
                document.getElementById("errorConfirmar").innerHTML = "*";
                document.getElementById("errorConfirmar").hidden = false;
            }
            return errores;
        };
        ValidadoraRegistro.ValidarFoto = function (foto, errores) {
            var filePath = foto.value;
            var allowedExtensions = /(\.jpg|\.png)$/i;
            if (!allowedExtensions.exec(filePath)) {
                errores.push("Foto - Solo JPG y PNG");
                document.getElementById("errorFoto").innerHTML = "*";
                document.getElementById("errorFoto").hidden = false;
            }
            return errores;
        };
        return ValidadoraRegistro;
    }());
    Test.ValidadoraRegistro = ValidadoraRegistro;
})(Test || (Test = {}));
/// <reference path="./funcionesLogin.ts" />
/// <reference path="./funcionesRegistro.ts" />
var Test;
(function (Test) {
    var Manejadora = /** @class */ (function () {
        function Manejadora() {
        }
        Manejadora.Limpiar = function () {
            document.getElementById('nombre').value = "";
            document.getElementById('clave').value = "";
        };
        Manejadora.AltaRegistro = function () {
            var nombre = document.getElementById('nombre').value;
            var apellido = document.getElementById('apellido').value;
            var clave = document.getElementById('clave').value;
            var confirmar = document.getElementById('confirmar').value;
            var correo = document.getElementById('correo').value;
            var perfil = document.getElementById('perfil').value;
            var legajo = document.getElementById('legajo').value;
            var foto = document.getElementById('foto');
            console.log(nombre, clave, correo, perfil, legajo, foto);
            Test.ValidadoraRegistro.LimpiarErrores();
            if (!(Test.ValidadoraRegistro.ValidarVacios(nombre, apellido, correo, legajo, clave, confirmar, foto)) || !(Test.ValidadoraRegistro.ValidarRegistro(nombre, apellido, correo, legajo, clave, confirmar, foto))) {
                return;
            }
            var usuarioJson = {
                "correo": correo,
                "clave": clave,
                "nombre": nombre,
                "apellido": apellido,
                "legajo": legajo,
                "perfil": perfil,
                "foto": "/fotos/usuarios/" + correo + "-" + legajo + ".jpg"
            };
            var seEncontro = false;
            var jsonUsuarios;
            var jsonOriginal;
            var stringusers = localStorage.getItem("JWTKey");
            if (stringusers) {
                jsonOriginal = JSON.parse(stringusers);
                jsonUsuarios = jsonOriginal.usuarios;
                jsonUsuarios.forEach(function (element) {
                    console.log(element);
                    if (element.correo == correo) {
                        alert('El usuario ya esta registrado');
                        seEncontro = true;
                    }
                });
            }
            if (!seEncontro) {
                jsonOriginal.usuarios.push(usuarioJson);
                var formData = new FormData();
                formData.append('correo', correo);
                formData.append('legajo', legajo);
                formData.append('foto', foto.files[0]);
                var xmlhttp = new XMLHttpRequest();
                xmlhttp.open("POST", "../backend/altaRegistro.php", true);
                xmlhttp.setRequestHeader("enctype", "multipart/form-data");
                xmlhttp.send(formData);
                xmlhttp.onreadystatechange = function () {
                    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                        if (xmlhttp.responseText != "error") {
                            console.log('Exito al dar de alta a usuario!');
                            window.location.assign('home.html');
                            localStorage.setItem("JWTKey", JSON.stringify(jsonOriginal));
                        }
                        else {
                            alert('Error no se pudo subir la foto');
                        }
                    }
                };
            }
        };
        Manejadora.Logear = function () {
            var correo = document.getElementById('correo').value;
            var clave = document.getElementById('clave').value;
            Test.ValidadoraLogin.LimpiarErrores();
            if (!(Test.ValidadoraLogin.ValidarLoginVacios(correo, clave)) || !(Test.ValidadoraLogin.ValidarLoginFormato(correo, clave))) {
                return;
            }
            var seEncontro = false;
            var stringusers = localStorage.getItem("JWTKey");
            if (stringusers) {
                var usuarios = JSON.parse(stringusers);
                usuarios = usuarios.usuarios;
                usuarios.forEach(function (elemento) {
                    console.log(elemento);
                    if (elemento.clave == clave && elemento.correo == correo) {
                        console.log(elemento.clave + "-" + elemento.correo);
                        seEncontro = true;
                    }
                });
            }
            if (!seEncontro) {
                alert('Usuario o contraseña incorrectos');
                window.location.assign('./home.html');
            }
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.open("POST", "../backend/login/", true);
            xmlhttp.setRequestHeader("content-type", "application/x-www-form-urlencoded");
            xmlhttp.send("correo=" + correo + '&clave=' + clave);
            xmlhttp.onreadystatechange = function () {
                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                    console.log(xmlhttp.responseText);
                    var respuestaParseada = JSON.parse(xmlhttp.responseText);
                    if (respuestaParseada.mensaje == undefined) {
                        localStorage.setItem('miToken', respuestaParseada.split('"'));
                        window.location.assign('./principal.html');
                    }
                }
            };
        };
        Manejadora.Modificar = function (objJson) {
            window.location.assign('./registro.php');
            window.onload = function () {
                document.getElementById('nombre').value = objJson.nombre;
                document.getElementById('apellido').value = objJson.apellido;
                document.getElementById('correo').value = objJson.correo;
                document.getElementById('legajo').value = objJson.legajo;
                document.getElementById('talle').value = objJson.talle;
                document.getElementById('precio').value = objJson.precio;
                document.getElementById('clave').value = objJson.talle;
                document.getElementById('precio').value = objJson.precio;
                document.getElementById('id').readOnly = true;
                document.getElementById('marca').readOnly = false;
                document.getElementById('color').readOnly = false;
                document.getElementById('talle').readOnly = false;
                document.getElementById('precio').readOnly = false;
                //(<HTMLInputElement>document.getElementById('imagen')).src="../backend.1/"+objJson.foto;
                //(<HTMLInputElement>document.getElementById('archivo')).hidden=false;
                //(<HTMLInputElement>document.getElementById('imagen')).hidden=false;
                document.getElementById('divId').hidden = false;
                document.getElementById('boton-agregar').hidden = true;
                document.getElementById('boton-modificar').hidden = false;
                document.getElementById('boton-borrar').hidden = true;
                console.log(objJson);
            };
        };
        Manejadora.LimpiarForm = function () {
            document.getElementById('formularioLabel').innerText = "Agregar";
            document.getElementById('id').value = "";
            document.getElementById('marca').value = "";
            document.getElementById('color').value = "";
            document.getElementById('talle').value = "";
            document.getElementById('precio').value = "";
            document.getElementById('id').readOnly = false;
            document.getElementById('marca').readOnly = false;
            document.getElementById('color').readOnly = false;
            document.getElementById('talle').readOnly = false;
            document.getElementById('precio').readOnly = false;
            //(<HTMLImageElement>document.getElementById('imagen')).hidden=true;
            document.getElementById('boton-agregar').hidden = false;
            document.getElementById('boton-borrar').hidden = true;
            document.getElementById('boton-modificar').hidden = true;
            document.getElementById('divId').hidden = true;
        };
        Manejadora.Deslogear = function () {
            localStorage.removeItem("miToken");
            window.location.assign('./home.html');
        };
        Manejadora.EliminarEmpleado = function (objJson) {
            console.log(objJson);
            var correo = objJson.correo;
            var legajo = objJson.legajo;
            console.log('Correo y legajo a eliminar: ' + correo + " " + legajo);
            //let foto : any = (<HTMLInputElement> document.getElementById("fotoSubir"));
            var r = confirm("Desea borrar a " + objJson.apellido + " " + objJson.nombre);
            if (r == false) {
                return;
            }
            var usuariosLocales = localStorage.getItem("JWTKey");
            if (usuariosLocales) {
                var local_usuarios_original_1 = JSON.parse(usuariosLocales);
                var local_usuarios = local_usuarios_original_1.usuarios;
                local_usuarios_original_1 = { usuarios: [] };
                local_usuarios.forEach(function (element) {
                    if (correo != element.correo) {
                        local_usuarios_original_1.usuarios.push(element);
                    }
                });
                console.log(local_usuarios_original_1);
                var xmlhttp = new XMLHttpRequest();
                xmlhttp.open("POST", "../backend/eliminarUsuario.php", true);
                xmlhttp.setRequestHeader("content-type", "application/x-www-form-urlencoded");
                xmlhttp.send("correo=" + correo + "&legajo=" + legajo);
                xmlhttp.onreadystatechange = function () {
                    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                        if (xmlhttp.responseText != "error") {
                            localStorage.removeItem("JWTKey");
                            localStorage.setItem("JWTKey", JSON.stringify(local_usuarios_original_1));
                            alert('Usuario eliminado');
                            location.reload();
                        }
                        else {
                            alert('No se pudo eliminar');
                        }
                    }
                };
            }
        };
        return Manejadora;
    }());
    Test.Manejadora = Manejadora;
})(Test || (Test = {}));
