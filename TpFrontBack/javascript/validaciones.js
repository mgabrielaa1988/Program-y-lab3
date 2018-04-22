function CalcularSueldoMaximo() {
    if (document.getElementById("tManiana").checked)
        document.getElementById("txtSueldo").max = "20000";
    else if (document.getElementById("tTarde").checked)
        document.getElementById("txtSueldo").max = "18500";
    else
        document.getElementById("txtSueldo").max = "25000";
}
// -------------------------------------------EVENTO CLICK INDEX ---------------------------------------------
function AdministrarValidaciones() {
    var legajo = parseInt(document.getElementById("txtLegajo").value);
    var turno = ObtenerTurnoSeleccionado();
    var dni = parseInt(document.getElementById("txtDni").value);
    var sueldo = parseInt(document.getElementById("txtSueldo").value);
    var maximo = ObtenerSueldoMaximo(turno);
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
    return VerificarValidacionesLogin();
}
// FUNCIONES INDEX 
function ValidarCamposVacios(idCampo) {
    if (document.getElementById(idCampo).value == "") {
        return false;
    }
    return true;
}
function ValidarRangoNumerico(numero, min, max) {
    if (numero < min)
        return false;
    else if (numero > max)
        return false;
    return true;
}
function ValidarCombo(idCampo, valorInvalido) {
    if (document.getElementById(idCampo).value == valorInvalido)
        return false;
    return true;
}
function ObtenerTurnoSeleccionado() {
    if (document.getElementById("tManiana").checked)
        return "Maniana";
    else if (document.getElementById("tTarde").checked)
        return "Tarde";
    else if (document.getElementById("tNoche").checked)
        return "Noche";
    else
        return "";
}
function ObtenerSueldoMaximo(turno) {
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
function AdministrarValidacionesLogin() {
    var dni = parseInt(document.getElementById("txtDni").value);
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
function AdministrarSpanError(id, ocultarElementos) {
    if (!ocultarElementos)
        document.getElementById(id).setAttribute("style", "display:block");
    else
        document.getElementById(id).setAttribute("style", "display:none");
}
function VerificarValidacionesLogin() {
    var campos = document.getElementsByTagName("span");
    for (var i = 0; i < campos.length; i++) {
        if (campos[i].getAttribute("style") == "display:block")
            return false;
    }
    return true;
}
//FUNCIONES LOGIN END
