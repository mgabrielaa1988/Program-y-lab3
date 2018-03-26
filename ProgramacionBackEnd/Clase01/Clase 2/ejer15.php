<?php
    function Potencia()
    {
        for($i =1;$i<=4;$i++)
        {
            for( $j=1;$j<=4;$j++)
            {
                echo "Potencia de".$i." a la ".$j."= ".pow($i,$j)."</br>";
            }
            
        }
    }
  Potencia();  
?>