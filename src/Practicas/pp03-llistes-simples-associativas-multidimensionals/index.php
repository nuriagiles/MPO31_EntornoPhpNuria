<?php
    require 'pelicules.php'
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OCINE - magic</title>
    <style>
        body{
            font-family: sans-serif;
        }
        header{
            display: flex;
            align-items: center;
            justify-content: space-evenly;

        }
        main{
            justify-self: center;
        }
        nav ul{
            display: flex;
            gap: 20px;
        }
        nav ul li{
            list-style: none;            
        }
        nav ul li a{
            text-decoration: none;
            color: black;
        }

        .cine-banner{
            border-radius: 5px;
            filter: brightness(0.5);
            margin-top: 60px;
        }
        .img-banner{
            justify-self: center;
            margin-bottom: 70px;
        }
        .cartelera-peliculas a{
            text-decoration: none;
            color: red;
        }
        .cartelera-peliculas img{
            width: 250px;
            height: 400px;
        }
        
        .cartelera-peliculas {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
        gap: 24px; 
        padding: 20px;
        justify-items: center;
        }

        /*Tarjeta de cada Película*/
        .pelicula-card {
        position: relative; 
        width: 100%;
        max-width: 250px;
        aspect-ratio: 250 / 400; 
        border-radius: 8px;
        overflow: hidden;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.5);
        font-family: sans-serif;
        cursor: pointer;
        }

        .pelicula-card .pelicula-img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        display: block;
        transition: transform 0.4s ease;
        }


        .pelicula-card:hover .pelicula-img {
        transform: scale(1.05);
        }

        .info-overlay {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.85); 
        padding: 20px;
        box-sizing: border-box;
        display: flex;
        flex-direction: column;
        align-items: flex-start; 
        
        /*Estado invisible, tendré que repasar esto*/
        opacity: 0;
        transition: opacity 0.3s ease;
        }

        .pelicula-card:hover .info-overlay {
        opacity: 1;
        }

        /*informacion del div interno*/
        .pelicula-titulo {
        color: #ff0000; 
        margin: 0 0 15px 0;
        font-size: 16px;
        font-weight: bold;
        line-height: 1.2;
        }

        .pelicula-fecha {
        color: #ffffff;
        font-size: 14px;
        margin: 0 0 10px 0;
        }

        /*horario*/
        .hora-badge {
        background-color: #d61c1c;
        color: white;
        padding: 6px 12px;
        font-size: 14px;
        font-weight: bold;
        border-radius: 2px;
        display: inline-block;
        margin-bottom: 20px;
        }

        /*Ver mas dias*/
        .btn-ver-mas {
        background: transparent;
        color: #ffffff;
        border: 1px solid #ffffff;
        padding: 8px 12px;
        font-size: 12px;
        font-weight: bold;
        cursor: pointer;
        width: auto;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        margin-bottom: auto; 
        }

        /* Contenedor inferior para Trailer e Info */
        .botones-inferiores {
        width: 100%;
        display: flex;
        justify-content: space-between;
        gap: 10px;
        }

        .btn-accion {
        background: transparent;
        color: #ff0000;
        border: 1px solid #ff0000;
        padding: 6px 10px;
        font-size: 11px;
        font-weight: bold;
        cursor: pointer;
        flex: 1;
        text-align: center;
        }

        .btn-accion:hover, .btn-ver-mas:hover {
        filter: brightness(1.2);
        }

    </style>
</head>
<body>
    <header>
        <img src="img/ocine.png" alt="">        
        <nav>
            <ul>
                <li><a href="#">CARTELLERA</a></li>
                <li><a href="#">BAR</a></li>
                <li><a href="#">EL CINEMA</a></li>
                <li><a href="#">SCREEN X</a></li>
                <li><a href="#">SALA KIDS</a></li>
                <li><a href="#">FIDELITY</a></li>
                <li><a href="#">ALTRES CINES</a></li>
            </ul>
        </nav>

    </header>
    <main>
        <div class="img-banner">
            <img src="https://www.panoramaaudiovisual.com/wp-content/uploads/2024/12/Christie-Ocine-Lleida.jpg" alt="" class="cine-banner">
        </div>
        
        <h2>Cartelerra</h2>
        <hr>

        <div class="cartelera-peliculas">
            <?php foreach($peliculas as $pelicula): ?>
                <div class="pelicula-card">
                    <img src="<?= $pelicula['ImatgeURL'] ?>" alt="<?= $pelicula['Titol'] ?>" class="pelicula-img">
                    
                    <div class="info-overlay">
                        <h3 class="pelicula-titulo"><?= $pelicula['NomPelicula']?></h3>
                        
                        <p class="pelicula-fecha">avui, 26 de set..</p>
                        
                        <div class="pelicula-horarios">
                            <span class="hora-badge"><?= $pelicula['HorarisProjeccion']?></span>
                        </div>
                        
                        <button class="btn-ver-mas">VEURE MÉS DIES</button>
                        
                        <div class="botones-inferiores">
                            <button class="btn-accion btn-trailer"><a href="<?= $pelicula['youtubeURL']?>">▶ TRAILER</a></button>
                            <button class="btn-accion btn-info"><a href="detall.php?id=<?= $pelicula['id'] ?>">🗎 INFO</a></button>
                        </div>
                    </div>
                </div>   
            <?php endforeach; ?>
        </div>
    </main>
</body>
</html>