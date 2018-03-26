<?php
    function InvertirPalabra($vectorCar)
    {
        echo "Palabra recibida: ".implode($vectorCar)."</br>";
    
        for($i=count($vectorCar)-1;$i>=0;$i--)
        {
            echo $vectorCar[$i];
        }
    }

    $palabra =array('h','o','l','a');
    InvertirPalabra($palabra);
?>