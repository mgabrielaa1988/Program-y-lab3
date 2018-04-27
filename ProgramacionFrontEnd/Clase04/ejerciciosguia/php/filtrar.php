<?php
if(isset($_POST['orden']))
{
    $archivo=fopen("../usersemails.txt","r");
    $stringRetornar="";
    if($_POST['orden']=='todos')
    {
        while(!feof($archivo))
        {
           $stringRetornar+=trim(fgets($archivo));
        }


        echo $stringRetornar;
    }
}


?>