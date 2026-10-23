<?php

    function generarTablaProductos($productos){
        foreach($productos as $elementos){
           echo("<div class=\"tarjetas-stock\">"); 
            echo("<h2>" . $elementos['Nombre'] . "</h2>"); 
            echo("<h3>"); 
            echo number_format($elementos['Precio'], 2, ',', ' '), PHP_EOL; 
            echo("€" . "</h3>"); 
            echo("<p>" . $elementos['Descripcion'] . "</p>");
            echo("<p>"); 
            echo($elementos['Disponibilidad'] ? 'En stock' : 'Agotado'); 
            echo("</p>"); 
            echo("</div>"); 
        }
    }

    function muestraInfoContacto($nombre, $telefono, $foto){
        echo("<div class=\"tarjetas-datos\">");
        echo('<img src="' . $foto . '">');
        echo("<div class=\"tarjetas-info\">");
        echo("<h2>" . $nombre . "</h2>");
        echo("<h3>" . "Numero:" . $telefono . "</h3>");
        echo("</div>");
        echo("</div>");
    }
?>