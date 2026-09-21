<?php
    $Edad = 19;
    $Nombre = "Nuria";
    $Appellido = "Giles";
    $SegundoApellido = "Fuentes";
    $Texto = "Lorem ipsum dolor sit amet consectetur adipisicing elit. Rerum rem, consectetur doloremque possimus quasi tenetur nam recusandae quam sed quaerat aspernatur, maiores temporibus maxime odio earum nihil quis, unde omnis.";
    $Instituto = "FPLlefia";    
    $Ciclo = "DAW2";
    $hoy = date("d-m-Y"); //Muestra la fecha actual.
    $entornFunciona = true;    

?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Presentacion</title>
        <style>
            *{
                margin: 0%;
                padding: 0%;
            }
            h1{
                text-align: center;
            }
            header{
                background-color: #212529;
                color: #FDFFFF;
                padding: 20px 20px 20px 20px;
                justify-items: center;
            }
            .header-content{
                display: flex;
                align-items: center;
                gap: 100px;
            }
            main{
                margin-top: 50px;
                margin-bottom: 500px;
                justify-items: center;
            }
            .img-perfil{
                width: 200px;
                height: 200px;
                border-radius: 50%;
            }
            .container{
                display: flex;
                gap: 200px;
                padding-left: 20px;
                padding-right: 20px;
            }
            .div-b{
                width: 500px;
            }
            footer{
                background-color: #212529;
                color: #FDFFFF;
                padding: 20px 20px 20px 20px;
                text-align: center;
                margin-top: auto;
            }
        </style>
    </head>
    <body>
        <header>
            <div class="header-content">
                <img src="img/logollefia_blanco.png" alt="">
                <?php
                    echo('<h1> Módulo 7 - Práctica 1. Mi primera aplicación en PHP</h1>');
                ?>
            </div>
            
        </header>
        <main>
            <div class="container">
                <div>
                    <img src="https://i.blogs.es/812f68/marc-adamus-ice-shadows-high/200_200.jpg" alt="" class="img-perfil">
                    <h1><?php echo $Nombre . " " . $Appellido; ?></h1>
                </div>
                <div class="div-b">
                    <p>Hola, soy <?= $Nombre . " " . $Appellido?> y tengo <?= $Edad?> voy al <?= $Instituto?> y estoy haciendo <?= $Ciclo?> Lorem ipsum dolor sit, amet consectetur adipisicing elit. 
                    Pariatur quas, natus quo animi accusantium corrupti hic earum tempore numquam dolor nobis molestias placeat, nostrum aspernatur consequatur ratione culpa rem. Rerum?</p> <!--Es igual a decir: echo-->
                </div>
                
            </div>
            

        </main>
        <footer>
            <p><?php echo $Nombre . " " . $Appellido . " " . $SegundoApellido; ?></p>
            <p><?php echo $hoy; ?></p>
        </footer>
    </body>
    </html>
