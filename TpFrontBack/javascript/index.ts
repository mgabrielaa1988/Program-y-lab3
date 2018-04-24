function CalcularSueldoMaximo(): void {
    if ((<HTMLInputElement>document.getElementById("tManiana")).checked)
        (<HTMLInputElement>document.getElementById("txtSueldo")).max = "20000";

    else if ((<HTMLInputElement>document.getElementById("tTarde")).checked)
        (<HTMLInputElement>document.getElementById("txtSueldo")).max = "18500";

    else
        (<HTMLInputElement>document.getElementById("txtSueldo")).max = "25000";

}

// -------------------------------------------EVENTO CLICK INDEX ---------------------------------------------
function AdministrarValidaciones(): boolean {
    const legajo: number = parseInt((<HTMLInputElement>document.getElementById("txtLegajo")).value);
    const turno: string = ObtenerTurnoSeleccionado();
    const dni: number = parseInt((<HTMLInputElement>document.getElementById("txtDni")).value);
    const sueldo: number = parseInt((<HTMLInputElement>document.getElementById("txtSueldo")).value);
    const maximo: number = ObtenerSueldoMaximo(turno);
    if (!ValidarCamposVacios("txtDni") || !ValidarRangoNumerico(dni, 1000000, 55000000))
        AdministrarSpanError("errDni", false);
    else
        AdministrarSpanError("errDni", true);

    if (!ValidarCamposVacios("txtApellido"))
        AdministrarSpanError("errApellido", false);
    else
        AdministrarSpanError("errApellido", true);

    if (!ValidarCamposVacios("txtNombre"))
        AdministrarSpanError("errNombre", false);
    else
        AdministrarSpanError("errNombre", true);

    if (!ValidarCombo("selGenero", "default"))
        AdministrarSpanError("errGenero", false);
    else
        AdministrarSpanError("errGenero", true);

    if (!ValidarRangoNumerico(legajo, 100, 550) || !ValidarCamposVacios("txtLegajo"))
        AdministrarSpanError("errLegajo", false);
    else
        AdministrarSpanError("errLegajo", true);

    if (!ValidarCamposVacios("txtSueldo") || !ValidarRangoNumerico(sueldo, 8000, maximo))
        AdministrarSpanError("errSueldo", false);
    else
        AdministrarSpanError("errSueldo", true);
    if ((<HTMLInputElement>document.getElementById('fileFoto')).value == "")
        AdministrarSpanError("errFoto", false);
    else
        AdministrarSpanError("errFoto", true);


    return VerificarValidacionesLogin();
}

// FUNCIONES INDEX 

function ValidarCamposVacios(idCampo: string): boolean {

    if ((<HTMLInputElement>document.getElementById(idCampo)).value == "") {
        return false;
    }


    return true;
}
function ValidarRangoNumerico(numero: number, min: number, max: number): boolean {
    if (numero < min)
        return false;

    else if (numero > max)
        return false;

    return true;
}
function ValidarCombo(idCampo: string, valorInvalido: string): boolean {
    if ((<HTMLInputElement>document.getElementById(idCampo)).value == valorInvalido)
        return false;


    return true;
}
function ObtenerTurnoSeleccionado(): string {
    if ((<HTMLInputElement>document.getElementById("tManiana")).checked)
        return "Maniana";
    else if ((<HTMLInputElement>document.getElementById("tTarde")).checked)
        return "Tarde";
    else if ((<HTMLInputElement>document.getElementById("tNoche")).checked)
        return "Noche";
    else
        return "";
}
function ObtenerSueldoMaximo(turno: string): number {
    switch (turno) {
        case "Maniana":
            return 20000;
        case "Tarde":
            return 18500;
        case "Noche":
            return 25000;
    }
    return 0;
}
//FUNCIONES INDEX END

//-----------------------------------------------------EVENTO CLICK LOGIN -------------------------------------------------------
function AdministrarValidacionesLogin(): boolean {
    const dni: number = parseInt((<HTMLInputElement>document.getElementById("txtDni")).value);

    if (!ValidarCamposVacios("txtDni") || !ValidarRangoNumerico(dni, 1000000, 55000000))
        AdministrarSpanError("errDni", false);
    else
        AdministrarSpanError("errDni", true);

    if (!ValidarCamposVacios("txtApellido"))
        AdministrarSpanError("errApellido", false);
    else
        AdministrarSpanError("errApellido", true);

    return VerificarValidacionesLogin();
}

//FUNCIONES LOGIN


function AdministrarSpanError(id: string, ocultarElementos: boolean): void {
    if (!ocultarElementos)
        (<HTMLInputElement>document.getElementById(id)).setAttribute("style", "display:block");
    else
        (<HTMLInputElement>document.getElementById(id)).setAttribute("style", "display:none");

}

function VerificarValidacionesLogin(): boolean {

    let campos: NodeListOf<HTMLSpanElement> = document.getElementsByTagName("span");
    for (let i: number = 0; i < campos.length; i++) {
        if ((<HTMLSpanElement>campos[i]).getAttribute("style") == "display:block")
            return false;
    }

    return true;
}



//FUNCIONES LOGIN END

// FUNCION MOSTRAR PHP

function AdministrarModificar(dni: number): void {

    (<HTMLInputElement>document.getElementById('hdnEnviar')).setAttribute('value', dni.toString());
    (<HTMLFormElement>document.getElementById('hdnForm')).submit();
}


//FUNCION MOSTRAR PHP END

