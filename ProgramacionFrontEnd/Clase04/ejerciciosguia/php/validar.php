<?php 

if(isset($_POST['iUsuario'],$_POST['iPass']))
{
    $seEncontro=false;
    $archivo=fopen("../usuarios.txt","r");
    while(!feof($archivo))
    {
        $usuarios=explode("-",trim(fgets($archivo)));
            if($_POST['iUsuario']==$usuarios[0] && $_POST['iPass']==$usuarios[1])
            {
                echo "ok";
                $seEncontro=true;
                break;
            }
        
       
     
    }
    fclose($archivo);
    if(!$seEncontro)
    echo "error";
   
}

?>