namespace Mostrar {
    export function EnviarJSON(): void {
        let xhttp: XMLHttpRequest = new XMLHttpRequest();

        xhttp.open("POST", "./ejer5.php");
        xhttp.setRequestHeader("content-type", "application/x-www-form-urlencoded");
        xhttp.send();

        xhttp.onreadystatechange = function () {
            if (xhttp.readyState == 4 && xhttp.status == 200) {
                (<HTMLDivElement>document.getElementById('mostrar')).innerHTML = xhttp.responseText;
            }
        };
    }

}

Mostrar.EnviarJSON();