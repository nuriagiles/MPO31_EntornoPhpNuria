<?php

    function generarTablaProductos($productos){
        foreach($productos as $elementos){
            echo("<div>");
            echo("<h2>" . $elementos['Nombre'] . "</h2>");
            echo("<h3>");
            echo number_format($elementos['Precio'], 2, ',', ' '), PHP_EOL;
            echo("€" . "</h3>");
            echo("<p>");
            echo($elementos['Disponibilidad']? 'En stock' : 'agotado');
            echo("</p>");
            echo("</div>");  
        }
        
    }

    function muestraInfoContacto($nombre, $telefono, $foto){
        echo("<div>");
        echo('<img src="' . $foto . '">');
        echo("<h2>" . $nombre . "</h2>");
        echo("<h3>" . $telefono . "</h3>");
        echo("</div>");
    }
?>