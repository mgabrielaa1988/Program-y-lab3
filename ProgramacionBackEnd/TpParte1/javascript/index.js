function CalcularSueldoMaximo() {
    if (document.getElementById("tManiana").checked) {
        document.getElementById("txtSueldo").max = "20000";
    }
    else if (document.getElementById("tTarde").checked) {
        document.getElementById("txtSueldo").max = "18500";
    }
    else {
        document.getElementById("txtSueldo").max = "25000";
    }
}
function AdministrarValidaciones() {
    var legajo = parseInt(document.getElementById("txtLegajo").value);
    var turno = ObtenerTurnoSeleccionado();
    var dni = parseInt(document.getElementById("txtDni").value);
    var sueldo = parseInt(document.getElementById("txtSueldo").value);
    var maximo = ObtenerSueldoMaximo(turno);
    if (turno == "" || maximo == 0)
        return false;
    if (!ValidarCamposVacios("txtDni") || !ValidarRangoNumerico(dni, 1000000, 55000000))
        return false;
    if (!ValidarCamposVacios("txtApellido"))
        return false;
    if (!ValidarCamposVacios("txtNombre"))
        return false;
    if (!ValidarCombo("selGenero", "---"))
        return false;
    if (!ValidarRangoNumerico(legajo, 100, 550) || !ValidarCamposVacios("txtLegajo"))
        return false;
    if (!ValidarCamposVacios("txtSueldo") || !ValidarRangoNumerico(sueldo, 8000, maximo))
        return false;
    return true;
}
function ValidarCamposVacios(idCampo) {
    if (document.getElementById(idCampo).value == "") {
        alert("Hay un campo vacío sin rellenar.");
        return false;
    }
    return true;
}
function ValidarRangoNumerico(numero, min, max) {
    if (numero < min) {
        alert("El numero " + numero + " es menor a " + min);
        return false;
    }
    else if (numero > max) {
        alert("El numero " + numero + " es mayor a " + max);
        return false;
    }
    return true;
}
function ValidarCombo(idCampo, valorInvalido) {
    if (document.getElementById(idCampo).value == valorInvalido) {
        alert("El valor no puede ser " + valorInvalido);
        return false;
    }
    return true;
}
function ObtenerTurnoSeleccionado() {
    if (document.getElementById("tManiana").checked)
        return "Maniana";
    else if (document.getElementById("tTarde").checked)
        return "Tarde";
    else if (document.getElementById("tNoche").checked)
        return "Noche";
    else {
        alert("No seleccionó ningun turno.");
        return "";
    }
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
