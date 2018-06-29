namespace Test {
    export class Registradora {
        public static Registrar() {
            if (Registradora.ValidarCampos()) {
                let email = (<HTMLInputElement>document.getElementById('email')).value;
                let clave = (<HTMLInputElement>document.getElementById('clave')).value;
                let apellido = (<HTMLInputElement>document.getElementById('apellido')).value;
                let legajo = (<HTMLInputElement>document.getElementById('legajo')).value;
                let nombre = (<HTMLInputElement>document.getElementById('nombre')).value;
                let confirmar = (<HTMLInputElement>document.getElementById('confirmar')).value;
                let foto = (<HTMLInputElement>document.getElementById('foto'));
                let stringJSON = JSON.stringify({
                    "correo": email,
                    "clave": clave,
                    "nombre": nombre,
                    "apellido": apellido,
                    "legajo": legajo,
                    "perfil": foto.name,
                    "foto": foto
                });

                let seEncontro = false;
                let stringusers = localStorage.getItem("JWTKey");
                if (stringusers) {
                    let usuarios = JSON.parse(stringusers);
                    usuarios.forEach((element: any) => {
                        console.log(element);
                        if (element.correo == email) {
                            (<HTMLDivElement>document.getElementById('mostrarErrores')).innerHTML = `<div class="alert alert-danger" role="alert">
                              El usuario ya esta registrado
                            </div>`
                            seEncontro = true;
                        }
                    });
                }
                if (!seEncontro) {
                    localStorage.setItem("JWTKey", stringJSON);
                }
            }
        }
        public static ValidarCampos(): Boolean {
            let email = (<HTMLInputElement>document.getElementById('email')).value;
            let clave = (<HTMLInputElement>document.getElementById('clave')).value;
            let apellido = (<HTMLInputElement>document.getElementById('apellido')).value;
            let legajo = parseInt((<HTMLInputElement>document.getElementById('legajo')).value);
            let nombre = (<HTMLInputElement>document.getElementById('nombre')).value;
            let confirmar = (<HTMLInputElement>document.getElementById('confirmar')).value;
            let foto = (<HTMLInputElement>document.getElementById('foto'));
            let retorno = true;
            let emailRegex = /^[-\w.%+]{1,64}@(?:[A-Z0-9-]{1,63}\.){1,125}[A-Z]{2,63}$/i;
            if (apellido.length > 15) {
                (<HTMLSpanElement>document.getElementById('errorApellido')).innerHTML = "*";
                (<HTMLDivElement>document.getElementById('mostrarErrorEmail')).innerHTML += `<div class="alert alert-danger" role="alert">
                El email no puede ser de mas de 15 caracteres
              </div>`
                retorno = false;
            }
            if (!emailRegex.test(email)) {
                (<HTMLSpanElement>document.getElementById('errorEmail')).innerHTML = "*";
                (<HTMLDivElement>document.getElementById('mostrarErrorEmail')).innerHTML += `<div class="alert alert-danger" role="alert">
                El email no tiene un formato valido.
              </div>`
                retorno = false;
            }
            if (nombre.length > 10) {
                (<HTMLSpanElement>document.getElementById('errorNombre')).innerHTML = "*";
                (<HTMLDivElement>document.getElementById('mostrarErrores')).innerHTML += `<div class="alert alert-danger" role="alert">
                El nombre no puede ser de mas de 10 caracteres
              </div>`
                retorno = false;
            }
            if (!isNaN(legajo) && (legajo < 3 || legajo > 6)) {
                (<HTMLSpanElement>document.getElementById('errorLegajo')).innerHTML = "*";
                (<HTMLDivElement>document.getElementById('mostrarErrores')).innerHTML += `<div class="alert alert-danger" role="alert">
                El legajo debe ser un numero entre 3 y 6.
              </div>`
                retorno = false;
            }
            let fotoExt = foto.name.split('.').pop.toString();
            if (fotoExt != 'jpg' || fotoExt != 'png') {
                (<HTMLSpanElement>document.getElementById('errorFoto')).innerHTML = "*";
                (<HTMLDivElement>document.getElementById('mostrarErrores')).innerHTML += `<div class="alert alert-danger" role="alert">
                No es una extension valida
              </div>`
                retorno = false;
            }

            if (clave.length < 4 || clave.length > 8) {
                (<HTMLSpanElement>document.getElementById('errorClave')).innerHTML = "*";
                (<HTMLDivElement>document.getElementById('mostrarErrorClave')).innerHTML = `<div class="alert alert-danger" role="alert">
                La clave tiene que ser entre 4 y 8 caracteres
              </div>`
                retorno = false;
            }
            else if (clave != confirmar) {
                (<HTMLSpanElement>document.getElementById('errorClave')).innerHTML = "*";
                (<HTMLDivElement>document.getElementById('mostrarErrorClave')).innerHTML = `<div class="alert alert-danger" role="alert">
                Error al confirmar la clave.
              </div>`
                retorno = false;
            }
            return retorno;
        }
    }
}