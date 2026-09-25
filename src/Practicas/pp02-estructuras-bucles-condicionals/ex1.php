<?php
    $limite = 500;


    
?>

<?php for($i = 50 ; $i<$limite; $i++):?>
    <?php if($i%2==0):?>
        <div><?= $i?></div>
    <?php endif;?>
<?php endfor;?>