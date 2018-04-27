var Login;
(function (Login) {
    var xhttp = new XMLHttpRequest();
    function ValidarUsuario() {
        var pass = document.getElementById('iPass').value;
        var usuario = document.getElementById('iUsuario').value;
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
        };
        xhttp.open("POST", "./php/validar.php");
        xhttp.setRequestHeader("content-type", "application/x-www-form-urlencoded");
        xhttp.send("iUsuario=" + usuario + "&iPass=" + pass);
    }
    Login.ValidarUsuario = ValidarUsuario;
    function TraerTodos() {
        xhttp.onreadystatechange = function () {
            if (xhttp.readyState == 4 && xhttp.status == 200) {
                if (xhttp.responseText != null) {
                    document.getElementById('mostrar').innerHTML = xhttp.responseText;
                }
                else {
                    document.getElementById('mostrar').innerHTML = "No se pudo traer los datos";
                }
            }
        };
        xhttp.open("POST", "./php/filtrar.php");
        xhttp.setRequestHeader("content-type", "application/x-www-form-urlencoded");
        xhttp.send("orden=todos");
    }
    Login.TraerTodos = TraerTodos;
    function TraerPorNombre() {
    }
    Login.TraerPorNombre = TraerPorNombre;
    function TraerArgentina() {
    }
    Login.TraerArgentina = TraerArgentina;
})(Login || (Login = {}));
