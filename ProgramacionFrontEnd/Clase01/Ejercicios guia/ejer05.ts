function MostrarNombreApellido(nombre : string,apellido : string):void
{
    console.log(apellido.toUpperCase() + ", " + nombre.charAt(0).toUpperCase()+nombre.slice(1).toLowerCase())
}

let nombre="lucas";
let apellido="massa";
MostrarNombreApellido(nombre,apellido);
