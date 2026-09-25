<?php
    $limite = 12;
?>

<?php for($i = 1; $i < $limite; $i++): ?>
    <h1>Tabla del <?= $i?></h1>
    <div>
    <ul>
    <?php for($cont= 1 ; $cont < $limite; $cont++): ?>
        <?php $resultado = $i * $cont ?>
        <?php echo("<li>" . $i . "X" . $cont . "=" . $resultado . "</li>")?>
    <?php endfor;?>
    </ul>
    </div>
<?php endfor;?>