<?php
    $limite = 12;

    function colorRgbAleatorio(){
        $r = random_int(0, 255);
        $g = random_int(0, 255);
        $b = random_int(0, 255);

        return "rgb($r, $g, $b)";
    }
?>

<?php for($i = 1; $i < $limite; $i++): ?>
    <h1>Tabla del <?= $i?></h1>
    <div style="background-color: <?= colorRgbAleatorio()?>;">
        <ul>
            <?php for($cont= 1 ; $cont < $limite; $cont++): ?>
                <?php $resultado = $i * $cont ?>
                <?php echo("<li>" . $i . "X" . $cont . "=" . $resultado . "</li>")?>
            <?php endfor;?>
        </ul>
    </div>
<?php endfor;?>

