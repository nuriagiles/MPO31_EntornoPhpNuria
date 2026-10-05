<?php 
    $Lista = ["PHP", "JavaScript", "CSS", "HTML", "Docker", "M0487", "M485"];
    $Colores = [
        "#BFDBFE", "#FEF3C7", "#CFFAFE", "#DCFCE7", 
        "#DDD6FE", "#FECACA", "#FBCFE8"
        ];
    $i = 0;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php foreach($Lista as $elementos):?> 
               
            <div style="background-color: <?= $Colores[$i++]?>;">
                <p><?= $elementos?></p>
            </div>
       
    <?php endforeach;?>
</body>
</html>