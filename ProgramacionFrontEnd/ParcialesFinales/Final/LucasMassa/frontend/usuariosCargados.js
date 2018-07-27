window.onload = function () {
    if (localStorage.getItem('JWTKey')) {
        console.log("Ya existen elementos en el local storage: " + localStorage.getItem('JWTKey'));
    }
    else {
        var usuarios = {
            'usuarios': [{
                    "correo": "adsouad@gmail.com",
                    "clave": "123",
                    "nombre": "Juan",
                    "apellido": "Masoe",
                    "legajo": 12345,
                    "perfil": "Aaiouadsd",
                    "foto": "exdi.jpg"
                },
                {
                    "correo": "qweqwieasd@hotmail.com",
                    "clave": "123",
                    "nombre": "Carlos",
                    "apellido": "Pena",
                    "legajo": 675,
                    "perfil": "wqewqeg",
                    "foto": "qweqds.jpg"
                },
                {
                    "correo": "lucasmassa@gmail.com",
                    "clave": "12345",
                    "nombre": "Lucas",
                    "apellido": "Massa",
                    "legajo": 123456,
                    "perfil": "asdsad",
                    "foto": "qweo0iqweda.jpg"
                }
            ]
        };
        localStorage.setItem('JWTKey', JSON.stringify(usuarios));
        console.log(localStorage.getItem('JWTKey'));
    }
};
