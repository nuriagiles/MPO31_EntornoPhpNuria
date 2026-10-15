<?php
require 'pelicules.php';

//Comprobamos si el ID viene en la URL
if (isset($_GET['id'])) {
    $id_url = $_GET['id'];
    $pelicula_seleccionada = null;

    foreach ($peliculas as $p) {
        if ($p['id'] == $id_url) {
            $pelicula_seleccionada = $p;
            break;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <title>Detall - <?= $pelicula_seleccionada['NomPelicula'] ?></title>  
    <style>
        body{
            font-family: sans-serif;
            justify-items: center;
        }
        img{
            width: 400px;
        }
        .detalle-contenedor{
            display: flex; 
            gap: 20px;
            margin-top: 50px;
        }
        .boton-trailer{
            border: 1px solid black;
            height: 50px;
            text-align: center;
            align-content: center;
        }
        .boton-trailer a{
            text-decoration: none;
            color: black;
        }
        .horas-projeccion-container{
            margin-top: 50px;
            display: flex;
            gap: 10px;
            background-color: #027C87;
            padding-bottom: 10px;
            padding-top: 10px;
            width: 400px;
            justify-content: center;
            align-items: center;
            color: white;
            border-radius: 5px;
        }
        .horas-projeccion{
            background-color: #DD1C19;
            color: white;
            width: 50px;
            text-align: center;
            height: 20px;
        }
        select{
            color: red;
            height: 40px;
            border-radius: 5px;
        }
        .volver{
            text-decoration: none;
            color: black;
        }
        .video-container{
            position: absolute;
            transform: translateY(-600px);
        }
        .oscurecer{
            background-color: rgb(0 0 0 / 85%);
            width: 100%;
            height: 100%;
            position: fixed;
            top: 0%;
            right: 0%;
        }
        .ocultar{
            display: none;
        }
        .quitar{
            transform: translateY(-470px);
        }
        .container{
            max-width: 900px;
        }
    </style>    
</head>
<body>
    <div class="container">
                
            <a href="index.php" class="volver">← Tornar a la cartellera</a>        
            
            <div class="detalles-pelicula-div">
                <div>
                    <h1><?= $pelicula_seleccionada['NomPelicula'] ?></h1>
                    <hr> 
                </div>
                    
                    
                <div class="detalle-contenedor  d-flex justify-content-center align-items-start gap-4">
                    <div class="ver-trailer">                        
                                                
                            <img src="<?= $pelicula_seleccionada['ImatgeURL'] ?>" alt="<?= $pelicula_seleccionada['NomPelicula'] ?>" width="300">
                            <div class="boton-trailer">
                                <a href="detall.php?id=<?= $pelicula_seleccionada['id'] ?>&ver=trailer" class="btn-trailer" onclick="abrir()">
                                    ▶ Trailer
                                </a>
                                <?php
                                    $reproducir_trailer = (isset($_GET['ver']) && $_GET['ver'] === 'trailer');
                                ?>
                            </div>
                            <?php if ($reproducir_trailer): ?>

                                <div id="div-oscuro" class="<?= $reproducir_trailer ? 'oscurecer' : '' ?>"></div>
                                <div class="video-container" id="video-div">                                
                                    <iframe 
                                        id="reproductor-youtube"
                                        src="<?= $pelicula_seleccionada['youtubeURL'] ?>?autoplay=1" 
                                        width="800" 
                                        style="aspect-ratio: 16 / 9; border: none; border-radius: 8px;" 
                                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
                                        allowfullscreen>
                                    </iframe>
                                    <button class="quitar" onclick="cerrarTrailer()">X</button>
                                </div>
                                
                            <?php endif; ?>
                    </div>

                    <div> 
                        <p><?= $pelicula_seleccionada['Sinopsi'] ?></p>
                        <p><strong>Durada:</strong> <?= $pelicula_seleccionada['Durada'] ?></p>
                        <p><strong>Director: <?= $pelicula_seleccionada['Director'] ?></strong></p>
                        <p><strong>Actors</strong> <?= $pelicula_seleccionada['Repartiment'] ?></p>
                        <p><strong>Qualificació:</strong> <?= $pelicula_seleccionada['Qualificacio'] ?></p>
                        <p><strong>Gènere: </strong> <?= $pelicula_seleccionada['Genero'] ?></p>

                        <select name="" id="">
                            <option value="26-9">avui, 26 de setembre</option>
                        </select>
                            
                        <div class="horas-projeccion-container">   
                            <p><strong>HORAS:</strong></p>                 
                                <?php 
                                    $array_horas = explode(", ", $pelicula_seleccionada['HorarisProjeccion']);                     
                                    
                                    foreach($array_horas as $hora): 
                                ?>
                                        <div class="horas-projeccion"><?= $hora ?></div>
                                <?php endforeach; ?>
                        </div>
                    </div>                    
                </div>
        </div>
    </div> 
    <script>
        function cerrarTrailer(){
            const video = document.querySelector("#video-div")
            const iframe = document.querySelector('#reproductor-youtube');
            const oscuro = document.querySelector("#div-oscuro");

            video.classList.add('ocultar');
            oscuro.classList.remove('oscurecer');
            iframe.src = "";
        }
        function abrir(){
            const oscuro = document.querySelector("#div-oscuro")
            oscuro.classList.add('oscurecer');
            oscuro.classList.remove('ocultar');
            video.classList.remove('ocultar');
        }
    </script>
</body>
</html>
