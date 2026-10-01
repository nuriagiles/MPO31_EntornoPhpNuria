<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Indice - Nuria Giles</title>
    <style>
        *{
            margin: 0;
            padding: 0;
        }
        body{
            min-height: 100vh;
            display: grid;
            grid-template-rows: auto 1fr auto;
            background-color: #264b6e;
        }
        /*Header*/
        header{
            background-color: #1c3853;
        }
        .logo-div{
            padding-bottom: 20px;
            padding-top: 20px;
            padding-left: 50px;
            
        }
        /*main*/
        main{
            justify-items: center;
            margin-top: 40px;
        }
        .teoria-container{
            display: flex;
            gap: 10px;
            align-items: center;
            padding-left: 30px;
            padding-right: 30px;
        }
        .teoria-tarjetas{
            border: 1px solid grey;
            border-radius: 5px;
            background-color: #fcfcfc;
            width: 200px;
            height: 100px;
            text-align: center;
            align-content: center;
            box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;
            margin-top: 20px;
        }
        .teoria-tarjetas a{
            text-decoration: none;
            color: black; 
        }
        .espacio{
            margin-bottom: 100px;
        }
        .Indice{
            text-align: center;
            background-image: url('Practicas/Mini-reto1/img/indice.jpg');
            background-size: cover;
            background-position: center;
            width: 900px;
            height: 350px;
            color: white;
            align-content: center;
            margin-bottom: 50px;
            border-radius: 10px;
            filter: brightness(90%);

        }
        .teoria-titulo{
            color: white;
            
        }
    </style>
</head>
<body>
    <header>
        <div class="logo-div">
            <img src="Practicas/pp01-primera-app/img/logollefia_blanco.png" alt="">
        </div>
        
    </header>

    <main>
        <div class="Indice">
            <h1>Indice - Nuria Giles</h1>            
        </div>

        <h2 class="teoria-titulo">Teoria</h2>
        <div class="teoria-container espacio">
            <div class="teoria-tarjetas"><a href="Teoria/sesion1/hola.php">Sesión 1 - php básico</a></div>
            <div class="teoria-tarjetas"><a href="Teoria/sesion2_bucles_condicionales">Sesión 2 - bucles y condicionales</a></div>
            <div class="teoria-tarjetas">Proximamente...</div>
        </div>
        <h2 class="teoria-titulo">Practicas</h2>
            <h3 class="teoria-titulo">PP01 - PRIMERA APP</h3>
            <div class="teoria-container espacio">
                <div class="teoria-tarjetas"><a href="Practicas/pp01-primera-app/presentacion.php">Presentacion.php</a></div>
            </div>
            <h3 class="teoria-titulo">PP02-ESTRUCTURA DE BUCLES Y CONDICIONALES</h3>
            <div class="teoria-container espacio">
                <div class="teoria-tarjetas"><a href="Practicas/pp02-estructuras-bucles-condicionals/ex1.php">Ex1.php</a></div>
                <div class="teoria-tarjetas"><a href="Practicas/pp02-estructuras-bucles-condicionals/ex2.php">Ex2.php</a></div>
                <div class="teoria-tarjetas"><a href="Practicas/pp02-estructuras-bucles-condicionals/ex3.php">Ex3.php</a></div>
                <div class="teoria-tarjetas"><a href="Practicas/pp02-estructuras-bucles-condicionals/ex4.php">Ex4.php</a></div>
                <div class="teoria-tarjetas"><a href="Practicas/pp02-estructuras-bucles-condicionals/ex5.php">Ex5.php</a></div>
            </div>
        <h2 class="teoria-titulo">Mini retos</h2>
        <div class="teoria-container espacio">
            <div class="teoria-tarjetas"><a href="Practicas/Mini-reto1/Exercici1.php">Mini-reto1</a></div>
        </div>
    </main>
</body>
</html>