namespace Login {

    let xhttp: XMLHttpRequest = new XMLHttpRequest();
    export function ValidarUsuario(): void {
        var pass: string = (<HTMLInputElement>document.getElementById('iPass')).value;
        var usuario: string = (<HTMLInputElement>document.getElementById('iUsuario')).value;

        xhttp.onreadystatechange = function () {
            console.log(xhttp.responseText);
            if (xhttp.readyState == 4 && xhttp.status == 200) {

                if (xhttp.responseText == "ok") {
                    document.body.style.backgroundColor = "green";
                    alert("OK");
                }
                else {
                    document.body.style.backgroundColor = "red";
                    alert("error");
                }
            }
        }

        xhttp.open("POST", "./php/validar.php");
        xhttp.setRequestHeader("content-type", "application/x-www-form-urlencoded");
        xhttp.send("iUsuario=" + usuario + "&iPass=" + pass);


    }

    export function TraerTodos(): void {
        xhttp.onreadystatechange = function () {

            if (xhttp.readyState == 4 && xhttp.status == 200) {
                if (xhttp.responseText != "error") {
                    (<HTMLDivElement>document.getElementById('mostrar')).innerHTML = xhttp.responseText;
                }
                else {
                    (<HTMLDivElement>document.getElementById('mostrar')).innerHTML = "No se pudo traer los datos";
                }

            }
        }

        xhttp.open("POST", "./php/filtrar.php");
        xhttp.setRequestHeader("content-type", "application/x-www-form-urlencoded");
        xhttp.send("orden=todos");
    }
    export function TraerPorNombre(): void {
        let nombre = "Adriane";
        xhttp.onreadystatechange = function () {
            if (xhttp.readyState == 4 && xhttp.status == 200) {
                if (xhttp.responseText == "error") {
                    (<HTMLDivElement>document.getElementById('mostrar')).innerHTML = "No se pudo traer los datos";
                }
                else {
                    (<HTMLDivElement>document.getElementById('mostrar')).innerHTML = xhttp.responseText;
                }
            }
        }
        xhttp.open("POST", "./php/filtrar.php");
        xhttp.setRequestHeader("content-type", "application/x-www-form-urlencoded");
        xhttp.send("orden=pornombre&nombre=" + nombre);

    }
    export function TraerArgentina(): void {
        xhttp.onreadystatechange = function () {

            if (xhttp.readyState == 4 && xhttp.status == 200) {
                if (xhttp.responseText == "error") {
                    (<HTMLDivElement>document.getElementById('mostrar')).innerHTML = "No se pudo traer los datos";
                }
                else {
                    (<HTMLDivElement>document.getElementById('mostrar')).innerHTML = xhttp.responseText;
                }
            }
        }
        xhttp.open("POST", "./php/filtrar.php");
        xhttp.setRequestHeader("content-type", "application/x-www-form-urlencoded");
        xhttp.send("orden=argentina");
    }



}