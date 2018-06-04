function Saludar() {
    var saludo = $('#idNombre').val();
    $('#divMostrar').html("Hola: " + saludo);
}

function SaludarAjaxJSON() {
    $.ajax({
        type: "POST",
        url: "./devolver.php",
        data: "nombre=" + $('#idNombre').val(),
        datatype: "JSON",
        async: true
    })
        .done((objPersona) => {
            $("#divMostrar").html(objPersona);
        })
}

function MandarJSON() {

    let objeto = {
        nombre: $('#idNombre').val()
    };
    $.ajax({
        type: "POST",
        url: "./devolver.php",
        data: { json: objeto },
        datatype: "JSON",
        async: true
    })
        .done((objPersona) => {
            $("#divMostrar").html(objPersona);
        })
}
function MandarAPI() {
    let nombre = $('#idNombre').val();
    let perfil = $('#idPerfil').val();
    $.ajax({
        type: "POST",
        url: "http://localhost:8080/Clase08/credenciales",
        data: `nombre=${nombre}&perfil=${perfil}`,
        datatype: "text",
        async: true
    })
        .done((texto) => {
            $("#divMostrar").html(texto);
        })
}
