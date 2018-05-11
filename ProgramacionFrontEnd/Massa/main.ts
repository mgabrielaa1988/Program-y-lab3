namespace Entidades {
    export class Persona {
        protected _nombre: string;
        protected _apellido: string;
        protected _edad: number;

        public constructor(nombre: string, apellido: string, edad: number) {
            this._nombre = nombre;
            this._apellido = apellido;
            this._edad = edad;
        }

        protected personaToString(): string {
            return this._nombre + "-" + this._apellido + "-" + this._edad + "\n";
        }

    }

    export class Ciudadano extends Persona {
        protected _dni: number;
        protected _pais: string;

        public constructor(nombre: string, apellido: string, edad: number, dni: number, pais: string) {
            super(nombre, apellido, edad);
            this._dni = dni;
            this._pais = pais;
        }
        public ciudadanoToJson() {
             return {"nombre":this._nombre,"apellido":this._apellido,"edad":this._edad.toString(),"dni":this._dni.toString(),"pais":this._pais};
        }
    }
}
    
namespace Test {

    export class Manejadora {
        public static AgregarCiudadano() {
            let nombre = (<HTMLInputElement>document.getElementById('txtNombre')).value;
            let apellido = (<HTMLInputElement>document.getElementById('txtApellido')).value;
            let edad = (<HTMLInputElement>document.getElementById('txtEdad')).value;
            let dni = (<HTMLInputElement>document.getElementById('txtDni')).value;
            let pais = (<HTMLSelectElement>document.getElementById('cboPais')).selected;
            let ciud=new Entidades.Ciudadano(nombre,apellido,parseInt(edad),parseInt(dni),pais);
            let xhttp: XMLHttpRequest = new XMLHttpRequest();
            xhttp.open("POST","./BACKEND/administrar.php");
            xhttp.setRequestHeader("content-type", "application/x-www-form-urlencoded");
            xhttp.send("caso=agregar&cadenaJson="+JSON.stringify(ciud.ciudadanoToJson()));

            xhttp.onreadystatechange = function () {
                if (xhttp.readyState == 4 && xhttp.status == 200) {
                    console.log(xhttp.responseText);
                }
            };
        }

        public static MostrarCiudadanos(){
            let xhttp: XMLHttpRequest = new XMLHttpRequest();
            xhttp.open("POST","./BACKEND/administrar.php");
            xhttp.setRequestHeader("content-type", "application/x-www-form-urlencoded");
            xhttp.send("caso=mostrar");
            let ciudJSON;
            xhttp.onreadystatechange = function () {
                if (xhttp.readyState == 4 && xhttp.status == 200) {
                    ciudJSON=JSON.parse(xhttp.responseText);
                        (<HTMLDivElement>document.getElementById("divTabla")).innerHTML=ciudJSON.nombre+ciudJSON.apellido+ciudJSON.edad+ciudJSON.dni+ciudJSON.pais;       
                    
                }
            };
        }
    }
}