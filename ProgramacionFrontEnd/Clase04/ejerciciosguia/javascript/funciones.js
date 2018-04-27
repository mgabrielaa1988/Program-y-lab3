var Login;
(function (Login) {
    function ValidarUsuario() {
        var xhttp = new XMLHttpRequest();
        var pass = document.getElementById('iPass').value;
        var usuario = document.getElementById('iUsuario').value;
        xhttp.onreadystatechange = function () {
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
})(Login || (Login = {}));
