window.onload = function () {
    var xmlhttp = new XMLHttpRequest();
    var myToken = localStorage.getItem('miToken');
    console.log(myToken);
    if (myToken === null) {
        alert("Usuario no logeado");
        window.location.href = './home.php';
        return;
    }
    console.log(myToken);
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            console.log(xmlhttp.responseText);
            xmlhttp.responseText;
            /* console.log(respuesta);
            
            if(respuesta.mensaje==undefined)
            {
                let stringTabla:string="<table>";
                respuesta.forEach((cd:any) => {
                    stringTabla+="<tr><td>"+cd.titel+"</td><td>"+cd.interpret+"</td><td>"+cd.jahr+"</td><td>"+cd.id+"</td></tr>";
                });
                stringTabla+="</table>";
                (<HTMLDivElement>document.getElementById('container-fluid')).innerText+=stringTabla;
            }
            else
            {
                window.location.href='./home.php';
            } */
        }
    };
    xmlhttp.open("GET", "../backend.1/test/", true);
    xmlhttp.setRequestHeader("miToken", myToken);
    xmlhttp.send();
};
