<?php
if(isset($_POST['orden']))
{
    $archivo=fopen("../usersemails.txt","r");
    if($_POST['orden']=='todos')
    {
        if(filesize("../usersemails.txt")==0)
        {
            echo "error";
        }
        else
        {
            while(!feof($archivo))
            {
                echo trim(fgets($archivo))."</br>";
            }
        }
        
        
        
    }
    else if($_POST['orden']=='pornombre' && isset($_POST['nombre'])) {
        $encontreUno=false;
        while(!feof($archivo))
        {

            $usuarioArray=explode("-",fgets($archivo)); 
            if(isset($usuarioArray[1]))
            {
                if($usuarioArray[1]==$_POST['nombre'])
                {
                    echo implode("-",$usuarioArray)."</br>";    
                    $encontreUno=true;
                }
                unset($usuarioArray);
            }
            
        }
        if(!$encontreUno)
        {
            echo "error";
        }
    }
    else if($_POST['orden']=='argentina')
    {
        $encontreUno=false;
        while(!feof($archivo))
        {
            $usuarioArray=explode("-",fgets($archivo)); 
            if(isset($usuarioArray[5]))
            {
                if(trim($usuarioArray[5])=="Argentina")
                {
                    echo implode("-",$usuarioArray)."</br>";    
                    $encontreUno=true;
                }
                unset($usuarioArray);
            }
            
        }
        if(!$encontreUno)
        {
            echo "error";
        }
    }
    fclose($archivo);
}



?>