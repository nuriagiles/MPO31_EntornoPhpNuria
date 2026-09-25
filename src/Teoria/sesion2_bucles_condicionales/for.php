<?php
    $limite  = 80;
?>

<?php for($i = 1; $i <= $limite; $i++): ?> //$i += 2 -> $i = $i + 2
    <div>Caixa <?= $i?></div>
<?php endfor; ?>