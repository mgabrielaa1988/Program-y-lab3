var Mostrar;
(function (Mostrar) {
    function EnviarJSON() {
        var xhttp = new XMLHttpRequest();
        var objJSON = {
            "producto": [{ "codigoBarra": 1, "nombre": "Serenisima", "precio": 4.5 },
                { "codigoBarra": 2, "nombre": "Sancor", "precio": 23.5 },
                { "codigoBarra": 3, "nombre": "Lechosa", "precio": 63.5 }
            ]
        };
        xhttp.open("POST", "./ejer5.php");
        xhttp.setRequestHeader("content-type", "application/x-www-form-urlencoded");
        xhttp.send();
        xhttp.onreadystatechange = function () {
            if (xhttp.readyState == 4 && xhttp.status == 200) {
                document.getElementById('mostrar').innerHTML = xhttp.responseText;
            }
        };
    }
    Mostrar.EnviarJSON = EnviarJSON;
})(Mostrar || (Mostrar = {}));
Mostrar.EnviarJSON();
