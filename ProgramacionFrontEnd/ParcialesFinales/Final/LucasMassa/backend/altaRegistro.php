<?php
if ($_FILES['foto'] && isset($_POST['correo']) && isset($_POST['legajo'])) {
    $destino = "./fotos/usuarios/" . $_POST['correo'] . "-" . $_POST['legajo'] . ".jpg";
    move_uploaded_file($_FILES["foto"]["tmp_name"], $destino);
    return 'exito';
} else {
    return 'error';
}

?>