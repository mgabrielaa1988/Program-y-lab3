namespace Test
{
    export class Manejadora
    {
        public static Limpiar():void
        {
            (<HTMLInputElement>document.getElementById('nombre')).value="";
            (<HTMLInputElement>document.getElementById('clave')).value="";
        }

        public static Logear():void
        {
            let nombre:string=(<HTMLInputElement>document.getElementById('nombre')).value;
            let clave:string=(<HTMLInputElement>document.getElementById('clave')).value;
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.open("POST", "../backend.1/test", true);
            xmlhttp.setRequestHeader("content-type","application/x-www-form-urlencoded");
            xmlhttp.send("nombre="+nombre+'&clave='+clave);

            xmlhttp.onreadystatechange = function () {
                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                    console.log(xmlhttp.responseText);
                    localStorage.setItem('miToken',xmlhttp.responseText);
                    window.location.href='./listadoCd.php';
                }
            }
        }
    }
}