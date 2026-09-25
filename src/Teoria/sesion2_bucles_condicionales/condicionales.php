<?php
//echo 'hola';

$edat = 24;
//$asignatura = 2;

#condicional simple if else
//if($edat >= 18){
//   echo ("Ets major d'edat"); //ten cuidado a la hora de escribir en catalan
//}else{
//   echo 'Ets menor';
//}

//if($asignatura<=10){
 //   echo 'Suspendes';
//}else{
    //echo 'Aprobado';
//}
?>


#sintaxis alternativa
<?php if($edat >= 18):?>
<p>ERES MAYOR DE EDAD</p>
<?php else:?>
    <p>Eres menor de edad</p>
    <?php endif;?>