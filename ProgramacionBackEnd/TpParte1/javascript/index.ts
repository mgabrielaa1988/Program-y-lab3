function CalcularSueldoMaximo():void
{
    if((<HTMLInputElement>document.getElementById("tManiana")).checked)
    {
        (<HTMLInputElement>document.getElementById("txtSueldo")).max="20000";
    }
    else if((<HTMLInputElement>document.getElementById("tTarde")).checked)
    {
        (<HTMLInputElement>document.getElementById("txtSueldo")).max="18500";
    }
    else
    {
        (<HTMLInputElement>document.getElementById("txtSueldo")).max="25000";
    }
}

function AdministrarValidaciones():boolean
{
    const legajo:number=parseInt((<HTMLInputElement>document.getElementById("txtLegajo")).value);
    const turno:string=ObtenerTurnoSeleccionado();
    const dni:number=parseInt((<HTMLInputElement>document.getElementById("txtDni")).value);
    const sueldo:number=parseInt((<HTMLInputElement>document.getElementById("txtSueldo")).value);
    const maximo:number=ObtenerSueldoMaximo(turno);
    if(!ValidarCamposVacios("txtDni") || !ValidarRangoNumerico(dni,1000000,55000000))
        return false;
    if(!ValidarCamposVacios("txtApellido"))
        return false;
    if(!ValidarCamposVacios("txtNombre"))
        return false;
    if(!ValidarCombo("selGenero","default"))
        return false;
    if(!ValidarRangoNumerico(legajo,100,550) || !ValidarCamposVacios("txtLegajo"))
        return false;
    if(!ValidarCamposVacios("txtSueldo") || !ValidarRangoNumerico(sueldo,8000,maximo))
        return false;
    if(turno=="")
    {
        alert("No se selecciono ningun turno.");
        return false;
    }


    return true;
}

function ValidarCamposVacios(idCampo:string):boolean
{
    if((<HTMLInputElement>document.getElementById(idCampo)).value=="")
    {
        alert("Hay un campo vacío sin rellenar.");
        return false;
    }
    return true;
}
function ValidarRangoNumerico(numero:number,min:number,max:number):boolean
{
    if(numero<min)
    {
        alert("El numero "+numero+" es menor a "+min);
        return false;
    }
    else if(numero>max)
    {
        alert("El numero "+numero+" es mayor a "+max);
        return false;
    }
        
    return true;
}
function ValidarCombo(idCampo:string,valorInvalido:string):boolean
{
    if((<HTMLInputElement>document.getElementById(idCampo)).value==valorInvalido)
    {
        alert("El valor no puede ser "+valorInvalido);
        return false;
    }
       
    return true;
}
function ObtenerTurnoSeleccionado():string
{
    if((<HTMLInputElement>document.getElementById("tManiana")).checked)
        return "Maniana";
    else if((<HTMLInputElement>document.getElementById("tTarde")).checked)
        return "Tarde";
    else if((<HTMLInputElement>document.getElementById("tNoche")).checked)
        return "Noche";
    else
        return "";
}
function ObtenerSueldoMaximo(turno:string):number
{
    switch(turno)
    {
        case "Maniana":
        return 20000;
        case "Tarde":
        return 18500;
        case "Noche":
        return 25000;
    }
    return 0;
}