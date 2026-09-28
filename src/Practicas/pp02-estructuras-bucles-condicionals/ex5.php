
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
        .fred-div{
            background-color: #0D6EFD;
            border-radius: 5px;
            width: 200px;
            height: 80px;
            color: white;
            text-align: center;
            align-content: center;
        }
        .calor-div{
            background-color: #DC3545;
            border-radius: 5px;
            width: 200px;
            height: 80px;
            color: white;
            text-align: center;
            align-content: center;
        }
        .suau-div{
            background-color: #FFC107;
            border: 1px solid #DAA506;
            border-radius: 5px;
            width: 200px;
            height: 80px;
            color: #212529;
            text-align: center;
            align-content: center;
        }
        .container-divs{
            width: 800px;
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            align-items: center;
            justify-self: center;
            gap: 20px;

        }
        body{
            justify-content: center;
            align-items: center;
            justify-self: center;
            text-align: center;
            font-family: "Georama", sans-serif;
        }
        p{
            margin-top: 40px;
            font-size: 20px;
        }
        h1{
            font-size: 24px;
        }
        
    </style>
</head>
<body>
    <h1>Classificació de Temperatures</h1>
    <div class="container-divs">
        <?php for($i = 0; $i < 10; $i++) :?>
                <?php $temperatura[$i] = random_int(-10, 40); ?>
                <?php if($temperatura[$i]<10):?>
                    <div class="fred-div"><?= $temperatura[$i]?>ºC <br> Fred</div>
                    <?php elseif($temperatura[$i] > 25):?>
                        <div class="calor-div"><?= $temperatura[$i]?>ºC <br> Calor</div>
                    <?php else:?>
                        <div class="suau-div"> <?= $temperatura[$i]?>ºC <br> Temperatura Suau</div>
                    <?php endif;?>
        <?php endfor;?>
    </div>

    <?php 
        $total_elementos = count($temperatura); //count() Cuenta cuantos elementos hay dentro del array

        if($total_elementos > 0){
            $suma = array_sum($temperatura); //array_sum() suma todos los valores numericos
            $media = $suma / $total_elementos;
            echo("<p><b>Mitjana de les temperatures:" . " " . $media ."ºC</b></p>");
        }
    ?>
</body>
</html>
