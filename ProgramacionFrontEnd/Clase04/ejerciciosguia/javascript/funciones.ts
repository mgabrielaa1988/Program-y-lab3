namespace Login{

  
    export function ValidarUsuario():void
    {  
        let xhttp:XMLHttpRequest=new XMLHttpRequest();

        var pass:string=(<HTMLInputElement>document.getElementById('iPass')).value;
        var usuario:string=(<HTMLInputElement>document.getElementById('iUsuario')).value;

        xhttp.onreadystatechange=function(){
            if(xhttp.readyState == 4 && xhttp.status==200)
            {
                if(xhttp.responseText=="ok")
                {
                    document.body.style.backgroundColor="green";
                    alert("OK");
                }
                else
                {
                    document.body.style.backgroundColor="red";
                    alert("error");
                }
            }
        }

        xhttp.open("POST","./php/validar.php");
        xhttp.setRequestHeader("content-type","application/x-www-form-urlencoded");
        xhttp.send("iUsuario="+usuario+"&iPass="+pass);
        

    }




}