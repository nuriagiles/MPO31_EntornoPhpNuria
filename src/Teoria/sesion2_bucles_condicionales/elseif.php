<?php
    $puntuacion = 7;

?>
//si cae en un numero par sale un mensaje has ganado un numero par y sino a caido en un numero par
//Si cae en el cero, ha caido en el cero.

<?php if ($puntuacion==0): ?>
    <p>Ha caido en el cero</p>
<?php elseif ($puntuacion%2==0) : ?>
    <p>Numero par</p>
<?php else : ?>
    <p>Numero impar</p>
<?php endif;?>

