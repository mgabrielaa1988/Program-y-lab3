<?php
if (isset($_POST['legajo']) && isset($_POST['correo'])) {
    $destino = $_POST['correo'] . "-" . $_POST['legajo'] . ".jpg";
    rename("./fotos/usuarios/" . $destino, "./fotos/borrados/" . $destino);
    echo "eliminado";
} else {
    echo "error";
}

?>