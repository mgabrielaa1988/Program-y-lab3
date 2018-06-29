namespace Test {
    export class Manejadora {
        public static RecuperarEmail() {
            if (Manejadora.ValidarCampos()) {
                let email = (<HTMLInputElement>document.getElementById('email')).value;
                let clave = (<HTMLInputElement>document.getElementById('clave')).value;
                let seEncontro = false;
                let stringusers = localStorage.getItem("JWTKey");
                if (stringusers) {
                    let usuarios = JSON.parse(stringusers);
                    usuarios.forEach((element: any) => {
                        console.log(element);
                        if (element.clave == clave && element.correo == email) {
                            window.location.assign('./principal.html');
                            seEncontro = true;
                        }

                    });
                }
                if (!seEncontro) {
                    (<HTMLDivElement>document.getElementById('mostrarErrores')).innerHTML = `<div class="alert alert-danger" role="alert">
                    El usuario no esta registrado
                  </div>`
                }
            }

        }
        public static ValidarCampos(): Boolean {
            let email = (<HTMLInputElement>document.getElementById('email')).value;
            let clave = (<HTMLInputElement>document.getElementById('clave')).value;
            let retorno = true;
            let emailRegex = /^[-\w.%+]{1,64}@(?:[A-Z0-9-]{1,63}\.){1,125}[A-Z]{2,63}$/i;
            if (email == "") {
                (<HTMLSpanElement>document.getElementById('errorEmail')).innerHTML = "*";
                (<HTMLDivElement>document.getElementById('mostrarErrorEmail')).innerHTML = `<div class="alert alert-warning" role="alert">
                El email se encuentra vacio.
              </div>`
                retorno = false;
            }
            else if (!emailRegex.test(email)) {
                (<HTMLSpanElement>document.getElementById('errorEmail')).innerHTML = "*";
                (<HTMLDivElement>document.getElementById('mostrarErrorEmail')).innerHTML = `<div class="alert alert-warning" role="alert">
                El email no tiene un formato valido.
              </div>`
                retorno = false;
            }

            if (clave == "") {
                (<HTMLSpanElement>document.getElementById('errorClave')).innerHTML = "*";
                (<HTMLDivElement>document.getElementById('mostrarErrorClave')).innerHTML = `<div class="alert alert-warning" role="alert">
                La clave se encuentra vacia.
              </div>`
                retorno = false;
            }
            else if (clave.length < 4 || clave.length > 8) {
                (<HTMLSpanElement>document.getElementById('errorClave')).innerHTML = "*";
                (<HTMLDivElement>document.getElementById('mostrarErrorClave')).innerHTML = `<div class="alert alert-warning" role="alert">
                La clave tiene que ser mayor a 4 caracteres y menor a 8.
              </div>`
                retorno = false;
            }
            return retorno;
        }
    }
}