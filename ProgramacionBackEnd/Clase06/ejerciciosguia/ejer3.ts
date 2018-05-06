namespace Mostrar {
    export function EnviarJSON(): void {
        let xhttp: XMLHttpRequest = new XMLHttpRequest();
        var objJSON = {
            "producto": { "codigoBarra": 1, "nombre": "Serenisima", "precio": 4.5 }

        };
        xhttp.open("POST", "./ejer3.php");
        xhttp.setRequestHeader("content-type", "application/x-www-form-urlencoded");
        xhttp.send("obj=" + JSON.stringify(objJSON));

        xhttp.onreadystatechange = function () {
            if (xhttp.readyState == 4 && xhttp.status == 200) {
                console.log(xhttp.responseText);
                (<HTMLDivElement>document.getElementById('mostrar')).innerHTML = xhttp.responseText;
            }
        };
    }

}

Mostrar.EnviarJSON();