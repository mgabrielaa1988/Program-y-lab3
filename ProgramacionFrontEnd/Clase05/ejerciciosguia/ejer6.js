function EnviarJSON() {
    var xhttp = new XMLHttpRequest();
    xhttp.open("POST", "./ejer6.php");
    xhttp.setRequestHeader("content-type", "application/x-www-form-urlencoded");
    xhttp.send();
    xhttp.onreadystatechange = function () {
        if (xhttp.readyState == 4 && xhttp.status == 200) {
            document.getElementById('mostrar').innerHTML = xhttp.responseText;
        }
    };
}
EnviarJSON();
