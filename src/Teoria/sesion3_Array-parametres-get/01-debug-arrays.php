<?php 
    #NO PODEMOS MOSTRAR UN ARRAY CON UN ECHO TAL CUAL. PODEMOS RECORRER SUS VALORES CON UN FOREACH

    $array = [1, 2,'santiago', 4, 5, True, False];

    //manera 1 de printear un array o lista -> print_r()
    echo '<pre>';
    print_r($array); //funcion nativa
    echo '</pre>';



    //Manera2 de printear un array o lista
    echo '<pre>';
    var_dump($array); //funcion nativa
    echo '</pre>';
?>