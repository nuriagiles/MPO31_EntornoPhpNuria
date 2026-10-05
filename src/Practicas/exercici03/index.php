<?php 
    $Lista = ["PHP", "JavaScript", "CSS", "HTML", "Docker", "M0487", "M485"];
    $Descripciones = [
        "#BFDBFE", "#FEF3C7", "#CFFAFE", "#DCFCE7", 
        "#DDD6FE", "#FECACA", "#FBCFE8"
        ];
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <table>
    <?php foreach($Lista as $elementos):?>
            <tr style="background-color: <?= $Descripciones[$elementos]?>">
                <th><?= $elementos?></th>
            </tr>
    <?php endforeach;?>
    </table>
</body>
</html>