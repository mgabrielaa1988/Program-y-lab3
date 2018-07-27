/// <reference path="./funcionesLogin.ts" />
/// <reference path="./funcionesRegistro.ts" />
namespace Test {
    export class Manejadora {
        public static Limpiar(): void {
            (<HTMLInputElement>document.getElementById('nombre')).value = "";
            (<HTMLInputElement>document.getElementById('clave')).value = "";
        }

        public static AltaRegistro(): void {
            let nombre: string = (<HTMLInputElement>document.getElementById('nombre')).value;
            let apellido: string = (<HTMLInputElement>document.getElementById('apellido')).value;
            let clave: string = (<HTMLInputElement>document.getElementById('clave')).value;
            let confirmar: string = (<HTMLInputElement>document.getElementById('confirmar')).value;
            let correo: string = (<HTMLInputElement>document.getElementById('correo')).value;
            let perfil: string = (<HTMLSelectElement>document.getElementById('perfil')).value;
            let legajo: string = (<HTMLInputElement>document.getElementById('legajo')).value;
            let foto: any = (<HTMLInputElement>document.getElementById('foto'));
            console.log(nombre, clave, correo, perfil, legajo, foto);
            ValidadoraRegistro.LimpiarErrores();
            if (!(ValidadoraRegistro.ValidarVacios(nombre, apellido, correo, legajo, clave, confirmar, foto)) || !(ValidadoraRegistro.ValidarRegistro(nombre, apellido, correo, legajo, clave, confirmar, foto))) {
                return;
            }
            let usuarioJson = {
                "correo": correo,
                "clave": clave,
                "nombre": nombre,
                "apellido": apellido,
                "legajo": legajo,
                "perfil": perfil,
                "foto": "/fotos/usuarios/" + correo + "-" + legajo + ".jpg"
            };
            let seEncontro = false;
            let jsonUsuarios: any;
            let jsonOriginal: any;
            let stringusers = localStorage.getItem("JWTKey");
            if (stringusers) {
                jsonOriginal = JSON.parse(stringusers);
                jsonUsuarios = jsonOriginal.usuarios;
                jsonUsuarios.forEach((element: any) => {
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
                }

            }


        }

        public static Logear(): void {
            let correo: string = (<HTMLInputElement>document.getElementById('correo')).value;
            let clave: string = (<HTMLInputElement>document.getElementById('clave')).value;
            ValidadoraLogin.LimpiarErrores();
            if (!(ValidadoraLogin.ValidarLoginVacios(correo, clave)) || !(ValidadoraLogin.ValidarLoginFormato(correo, clave))) {
                return;
            }
            let seEncontro = false;
            let stringusers = localStorage.getItem("JWTKey");
            if (stringusers) {
                let usuarios = JSON.parse(stringusers);
                usuarios = usuarios.usuarios;
                usuarios.forEach((elemento: any) => {
                    console.log(elemento);
                    if (elemento.clave == clave && elemento.correo == correo) {
                        console.log(elemento.clave + "-" + elemento.correo)
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
                    let respuestaParseada = JSON.parse(xmlhttp.responseText);
                    if (respuestaParseada.mensaje == undefined) {
                        localStorage.setItem('miToken', respuestaParseada.split('"'));
                        window.location.assign('./principal.html');
                    }
                }
            }

        }

        public static Modificar(objJson: any): void {
            window.location.assign('./registro.php');
            window.onload = function (): void {
                (<HTMLInputElement>document.getElementById('nombre')).value = objJson.nombre;
                (<HTMLInputElement>document.getElementById('apellido')).value=objJson.apellido;
                (<HTMLInputElement>document.getElementById('correo')).value = objJson.correo;
                (<HTMLInputElement>document.getElementById('legajo')).value = objJson.legajo;
                (<HTMLInputElement>document.getElementById('talle')).value = objJson.talle;
                (<HTMLInputElement>document.getElementById('precio')).value = objJson.precio;
                (<HTMLInputElement>document.getElementById('clave')).value = objJson.talle;
                (<HTMLInputElement>document.getElementById('precio')).value = objJson.precio;
                (<HTMLInputElement>document.getElementById('id')).readOnly = true;
                (<HTMLInputElement>document.getElementById('marca')).readOnly = false;
                (<HTMLInputElement>document.getElementById('color')).readOnly = false;
                (<HTMLInputElement>document.getElementById('talle')).readOnly = false;
                (<HTMLInputElement>document.getElementById('precio')).readOnly = false;
                //(<HTMLInputElement>document.getElementById('imagen')).src="../backend.1/"+objJson.foto;
                //(<HTMLInputElement>document.getElementById('archivo')).hidden=false;
                //(<HTMLInputElement>document.getElementById('imagen')).hidden=false;
                (<HTMLInputElement>document.getElementById('divId')).hidden = false;
                (<HTMLButtonElement>document.getElementById('boton-agregar')).hidden = true;
                (<HTMLButtonElement>document.getElementById('boton-modificar')).hidden = false;
                (<HTMLButtonElement>document.getElementById('boton-borrar')).hidden = true;
                console.log(objJson);
            };

        }

        public static LimpiarForm(): void {
            (<HTMLInputElement>document.getElementById('formularioLabel')).innerText = "Agregar";
            (<HTMLInputElement>document.getElementById('id')).value = "";
            (<HTMLInputElement>document.getElementById('marca')).value = "";
            (<HTMLInputElement>document.getElementById('color')).value = "";
            (<HTMLInputElement>document.getElementById('talle')).value = "";
            (<HTMLInputElement>document.getElementById('precio')).value = "";
            (<HTMLInputElement>document.getElementById('id')).readOnly = false;
            (<HTMLInputElement>document.getElementById('marca')).readOnly = false;
            (<HTMLInputElement>document.getElementById('color')).readOnly = false;
            (<HTMLInputElement>document.getElementById('talle')).readOnly = false;
            (<HTMLInputElement>document.getElementById('precio')).readOnly = false;
            //(<HTMLImageElement>document.getElementById('imagen')).hidden=true;
            (<HTMLButtonElement>document.getElementById('boton-agregar')).hidden = false;
            (<HTMLButtonElement>document.getElementById('boton-borrar')).hidden = true;
            (<HTMLButtonElement>document.getElementById('boton-modificar')).hidden = true;
            (<HTMLDivElement>document.getElementById('divId')).hidden = true;
        }

        public static Deslogear(): void {
            localStorage.removeItem("miToken");
            window.location.assign('./home.html');
        }


        public static EliminarEmpleado(objJson: any): any {
            console.log(objJson);
            let correo = objJson.correo;
            let legajo = objJson.legajo;
            console.log('Correo y legajo a eliminar: ' + correo + " " + legajo);
            //let foto : any = (<HTMLInputElement> document.getElementById("fotoSubir"));
            var r = confirm("Desea borrar a " + objJson.apellido + " " + objJson.nombre);
            if (r == false) {
                return;
            }
            let usuariosLocales = localStorage.getItem("JWTKey");
            if (usuariosLocales) {
                let local_usuarios_original = JSON.parse(usuariosLocales);
                let local_usuarios: any = local_usuarios_original.usuarios;
                local_usuarios_original = { usuarios: [] };
                local_usuarios.forEach((element: any) => {
                    if (correo != element.correo) {
                        local_usuarios_original.usuarios.push(element);
                    }
                });
                console.log(local_usuarios_original);
                var xmlhttp = new XMLHttpRequest();

                xmlhttp.open("POST", "../backend/eliminarUsuario.php", true);
                xmlhttp.setRequestHeader("content-type", "application/x-www-form-urlencoded");
                xmlhttp.send("correo=" + correo + "&legajo=" + legajo);

                xmlhttp.onreadystatechange = function () {
                    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                        if (xmlhttp.responseText != "error") {
                            localStorage.removeItem("JWTKey");
                            localStorage.setItem("JWTKey", JSON.stringify(local_usuarios_original));
                            alert('Usuario eliminado');
                            location.reload();
                        }
                        else {
                            alert('No se pudo eliminar');
                        }
                    }
                }
            }
        }
    }
}
