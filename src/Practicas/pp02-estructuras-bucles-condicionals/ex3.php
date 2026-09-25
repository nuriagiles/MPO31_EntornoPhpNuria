<?php
    $numero = random_int(0, 100);
    echo $numero;
?>

<?php if($numero%2 == 0): ?>
    <div style="background-color: green; width: 60px;">Es parell</div>
<?php else: ?>
    <div style="background-color: red; width: 60px;">Es senar</div>
<?php endif;?>