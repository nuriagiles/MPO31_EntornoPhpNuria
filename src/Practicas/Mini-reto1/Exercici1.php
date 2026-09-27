<?php
    $Equipo1 = "Valencia C. F.";
    $Equipo2 = "Barcelona";
    $Partido = "Copa del rey";
    $listaGolesEquipo2 = [5, 5];
    $listaGolesEquipo1 = [0, 0];
    $Escudos = ["img/barca.png", "img/valencia.png"];
    $Fecha = ["6/9", "6/2/25", "31/1/27"];
    $img = ["img/img1.png", "img/img2.png"];
    $estado = ["Por definir", "Jugando", "Fin"];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .container {
            width: 747px;
            height: 530px;
            border: 1px solid #DDDEE2;
            border-top-left-radius: 11px;
            border-top-right-radius: 11px;
            border-bottom-left-radius: 11px;
            border-bottom-right-radius: 11px;
                        
        }
        .title-container{
            width: 726px;
            padding-left: 20px;
            border: 1px solid #212121;
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;
            background-color: #212121;
            color: #FFFFFF;
        }

        .partido1-div{
            background-color: #FAFAFA;
            border: 1px solid #DDDEE2;
            height: 150px;
            width: 350px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding-left: 15px;
            padding-right: 15px;
            padding-top: 20px;
            padding-bottom: 20px;
        }

        .partido2-div{
            background-color: #FFFFFF;
            border: 1px solid #DDDEE2;
            height: 150px;
            width: 350px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding-left: 15px;
            padding-right: 15px;
            padding-top: 20px;
            padding-bottom: 20px;
        }
        .resultado-div{
            display: flex;
            gap: 80px;
            align-items: center;
        }
        .div-a{
            display: flex;
        }
        .div-b{
            display: flex;
        }
        .div-info p{
            color: #7B8198;
        }
        .div-info{
            padding-top: 20px;
            padding-left: 20px;
        }
        .fecha-div{
            text-align: center;
        }
        
        .img-videos{
            width: 80px;
            margin: 10px;
        }
        .img-escudos{
            width: 25px;
            height: 25px;
        }
        p{
            margin: 0;
        }
        .gris{
            color: #7B8198;
            margin-top: 3px;
        }
        .separar{
            margin-top: 15px;
        }
        .linea-gris{
            background-color: #E0E0E0;
            height: 100px; 
            width: 2px;
        }
        .goles-container{
            display: flex; 
            align-items: center;
        }
        .goles{
            margin-right: 12px;
            margin-left: 15px;
        }
        .escudos-div{
            display: flex;
            gap: 10px;
            align-items: center;
        }
        .nombre-partido{
            color: grey;
            font-size: 13px;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="title-container">
           <h1><?= $Equipo1 ?> contra <?= $Equipo2 ?></h1> 
        </div>
        <div class="div-a">
            <div class="partido1-div">
                <div class="resultado-div">
                    <div>
                        <div class="escudos-div">
                            <img src="<?= $Escudos[1]?>" alt="" class="img-escudos">
                            <p><?= $Equipo1?></p>
                        </div>
                        
                        <div class="escudos-div">
                            <img src="<?= $Escudos[0]?>" alt="" class="img-escudos separar">
                            <p class="separar"><?= $Equipo2?></p>
                        </div>
                        
                    </div>
                    <div class="goles-container">
                        <div>
                            <p><?= $listaGolesEquipo1[0]?></p>
                            <p class="separar"><?= $listaGolesEquipo2[0]?></p>                        
                        </div>

                        <div class="linea-gris goles"></div> 
                    </div>
                    
                    
                </div>
                <div class="fecha-div">

                    <p><?= $estado[2]?></p>
                    <p class="gris"><?= $Fecha[0]?></p>
                    <img src="<?= $img[0]?>" alt="" class="img-videos">
                </div>
            </div>
            <div class="partido2-div">                                                               
                <div class="resultado-div">
                         
                    <div>                        
                        <div class="escudos-div"> 
                                                                           
                            <img src="<?= $Escudos[1]?>" alt="" class="img-escudos">
                            <p><?= $Equipo1?></p>
                        </div>
                        <div class="escudos-div">
                            <img src="<?= $Escudos[0]?>" alt="" class="img-escudos separar">
                            <p class="separar"><?= $Equipo2?></p>
                        </div>
                        
                        
                    </div>
                    <div class="goles-container">
                        <div>
                            <p><?= $listaGolesEquipo1[0]?></p>
                            <p class="separar"><?= $listaGolesEquipo2[0]?></p>
                        </div>
                        
                        <div class="linea-gris goles"></div>                        
                    </div>

                    
                </div>
                <div class="fecha-div">
                    <p><?= $estado[2]?></p>
                    <p class="gris"><?= $Fecha[1]?></p>

                    <img src="<?= $img[1]?>" alt="" class="img-videos">
                </div>
            </div>
        </div>
        <div class="div-b">
            <div class="partido2-div">
                <div class="resultado-div">
                    <div>
                        <div class="escudos-div">
                            <img src="<?= $Escudos[1]?>" alt="" class="img-escudos">
                            <p><?= $Equipo1?></p>
                        </div>
                        <div class="escudos-div">
                            <img src="<?= $Escudos[0]?>" alt="" class="img-escudos separar">
                            <p class="separar"><?= $Equipo2?></p>
                        </div>
                        
                    </div>
                    
                </div>
                <div class="fecha-div">                
                    <p class="gris"><?= $Fecha[2]?></p>
                    <p><?= $estado[0]?></p>   
                    
                </div>
            </div>
            <div class="partido1-div"></div>
        </div>

        <div class="div-info">
            <p>Horarios en Hora de Verano de Europa Central</p>
        </div>
    </div>
</body>
</html>