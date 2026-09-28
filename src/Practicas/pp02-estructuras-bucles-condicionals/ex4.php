<?php
    $NumeroAleatorio = random_int(0, 100);
    $cont = 0; //El chivato, indica con cuantos numeros se han dividido
    $numero = 1;
    $mensajeNo = "no és un nombre primer.";
    $mensajeSi = "és un nombre primer";
    //Un número es primo si solo se puede dividir entre el 1 y entre él mismo.
    //1 y 0 no es un numero primo
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Georama:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <style>
        .resultados-container{
            background-color: #FDF5E6;
            height: 250px;
            width: 600px;
            justify-items: center;
            align-content: center;
            border: 1px solid #87CEEB;
            border-radius: 10px;
            font-family: "Georama", sans-serif;
        }
        .divisor-div{
            background-color: #B0E0E6;
            border: 1px solid #72A9C9;
            border-radius: 5px;
            width: 30px;
            height: 40px;
            text-align: center;
            align-content: center;
            font-size: 15px;
        }
        .divisors-container{
            display: flex;
            gap: 5px;
            
        }
        .color-rojo{
            color: #FF0000;
        }
        .color-verde{
            color: green;
        }
        h1{
            font-size: 20px;
        }
        h2{
            font-size: 15px;
        }
    </style>
</head>
<body>
    <?php if($NumeroAleatorio == 0 || $NumeroAleatorio == 1): ?>
        <div class="resultados-container">
            <h1>Nombre generat: <?= $NumeroAleatorio?></h1>
            <h2>Divisors de <?= $NumeroAleatorio?>:</h2>
            <div class="divisor-div"><?= $NumeroAleatorio?></div>
            <p class="color-rojo"><?=$NumeroAleatorio?> <?=$mensajeNo?></p>
        </div>
        <?php else:?>
            <div class="resultados-container">
            
                <h1>Nombre generat: <?=$NumeroAleatorio?></h1>
                <h2>Divisors de <?=$NumeroAleatorio?>:</h2>
                <div class="divisors-container">
                    <?php for($i = 0; $i < $NumeroAleatorio; $i++): ?>

                        <?php if($NumeroAleatorio % $numero == 0): ?>
                            <div class="divisor-div"><?= $numero ?></div>
                            <?php $cont++;?>
                            <?php $numero++;?>
                            <?php else:?>
                                <?php $numero++;?>   
                        <?php endif;?>
                    <?php endfor;?>
                </div>
                <?php if($cont == 2): ?>                
                    <p class="color-verde"><?= $NumeroAleatorio?> <?= $mensajeSi?></p>
                    
                <?php else:?>    
                    <p class="color-rojo"><?= $NumeroAleatorio?> <?=$mensajeNo?></p>
                <?php endif;?>
            </div>
    <?php endif;?>      
</body>
</html>
  
