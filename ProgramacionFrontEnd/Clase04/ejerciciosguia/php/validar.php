<?php 

if(isset($_POST['iUsuario'],$_POST['iPass']))
{
    $seEncontro=false;
    $archivo=fopen("../usuarios.txt","r");
    while(!feof($archivo))
    {
        $usuarios=explode("-",fgets($archivo));
        if($_POST['iUsuario']==$usuarios[0] && $_POST['iPass']==$usuarios[1])
        {
            echo "ok";
            $seEncontro=true;
            break;
        }
     
    }
    if(!$seEncontro)
    echo "error";
    
}

?>