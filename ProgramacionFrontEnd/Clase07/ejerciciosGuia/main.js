function Saludar(){
    var saludo=$('#idNombre').val();
    $('#divMostrar').html("Hola: "+saludo);
}

function SaludarAjaxJSON(){
    $.ajax({
        type:"POST",
        url:"./devolver.php",
        data:"nombre="+$('#idNombre').val(),
        datatype:"JSON",
        async:true
    })
    .done((objPersona)=>{
        $("#divMostrar").html(objPersona);
    })
}

function MandarJSON(){

    let objeto={
        nombre:$('#idNombre').val()
    };
    $.ajax({
        type:"POST",
        url:"./devolver.php",
        data:{json:objeto},
        datatype:"JSON",
        async:true
    })
    .done((objPersona)=>{
        $("#divMostrar").html(objPersona);
    })
}
