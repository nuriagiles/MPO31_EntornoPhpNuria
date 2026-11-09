<?php
    session_start();


    $numeroAleatorio = 0;
    $numeroColor = 0;
    
    //Generamos el numero al azar
    function generarNumero(){
        $numeroAleatorio = rand(0, 36);
        determinarColor($numeroAleatorio);     
    }

    //Determinaremos si es Negro o Rojo
    function determinarColor($numeroAleatorio){
        $Rojo = [1, 3, 5, 7, 9, 12, 14, 16, 18, 19, 21, 23, 25, 27, 30, 32, 34, 36];
        $Negro = [2, 4, 6, 8, 10, 11, 13, 15, 17, 20, 22, 24, 26, 28, 29, 31, 33, 35];

        if(in_array($numeroAleatorio, $Rojo)){
            $numeroColor = "Rojo";
        }else if (in_array($numeroAleatorio, $Negro)){
            $numeroColor = "Negro";
        }else{
            $numeroColor = "verde";
        }
        echo "Color aleatorio: " . $numeroColor . $numeroAleatorio;
    }
    
    generarNumero();

    if($_SERVER["REQUEST_METHOD"] === "POST"){
        $_SESSION['NumeroAleatorio'] = [$numeroAleatorio, $numeroColor];
        $_SESSION['tipoApuesta'] = $_POST['tipoApuesta'];
        $_SESSION['tipoSubmenu'] = $_POST['tipoSubmenu'];
        $_SESSION['NumeroElegido'] = $_POST['numeroElegido'];

        switch($_SESSION['tipoApuesta']){
        case "Color":
            if( $_SESSION['NumeroAleatorio']['$numeroAleatorio'] == $_SESSION['NumeroElegido']){
                echo "Ganaste";
            }else{
                echo "perdiste";
            }
            break;
        default:
            echo "No valor";
            break;
        }
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .tablero-apuestas{
            display: flex;
        }
        .negro{
            background-color: black;
            border: 1px solid white;
            color: white;
            width: 50px;
            height: 50px;
            text-align: center;
            align-content: center;
        }
        .rojo{
            background-color: red;
            width: 50px;
            height: 50px;
            border: 1px solid white;
            text-align: center;
            align-content: center;
        }
    </style>
</head>
<body>

    <form method="POST" action="index.php">
        <label>
            Tipo de Apuesta
            <select name="tipoApuesta" id="Apuestas">
                <option value=""></option>
                <option name="tipoApuesta" value="Color">Rojo/Negro</option>
                <option name="tipoApuesta" value="Par-Impar">Par/Impar</option>
                <option name="tipoApuesta" name="Pasa-Falta">Pasa/Falta</option>
                <option name="tipoApuesta" value="Docena">Docena</option>
                <option name="tipoApuesta" value="Columna">Columna</option>
                <option name="tipoApuesta" value="Dos-docenas">Dos docenas</option>
                <option name="tipoApuesta" value="Dos-columnas">Dos columnas</option>
                <option name="tipoApuesta" value="Seisena">Seisena</option>
                <option name="tipoApuesta" value="Cuadro">Cuadro</option>
                <option name="tipoApuesta" value="Transversal">Transversal</option>
                <option name="tipoApuesta" value="Caballo">Caballo</option>
                <option name="tipoApuesta" value="Pleno">Pleno</option>
            </select>

            <div id="submenu">
                <label>submenu</label>
                <select name="tipoSubmenu" id="">
                    <option name="tipoSubmenu" value=""></option>
                    <option name="tipoSubmenu" value="Negro">Negro</option>
                    <option name="tipoSubmenu" value="Rojo">Rojo</option>
                    <option name="tipoSubmenu" value="D1">D1</option>
                    <option name="tipoSubmenu" value="D2">D2</option>
                    <option name="tipoSubmenu" value="D3">D3</option>
                    <option name="tipoSubmenu" value="D1-D2">D1-D2</option>
                    <option name="tipoSubmenu" value="D2-D3">D2-D3</option>
                    <option name="tipoSubmenu" value="Par">Par</option>
                    <option name="tipoSubmenu" value="Impar">Impar</option>
                    <option name="tipoSubmenu" value="Pasa">Pasa</option>
                    <option name="tipoSubmenu" value="Falta">Falta</option>
                </select>
            </div>
        </label>
        <label>
            ¿A qué apuestas?
            <input type="number" step="any" name="numeroElegido">
        </label>
        <label>
            Cantidad de dinero
            <input type="number">
        </label>

        <button type="submit">Apostar</button>
    </form>
   <div class="tablero-apuestas">
        <div class="Docena-1">
            <div class="rojo">1</div>
            <div class="negro">2</div>
            <div class="rojo">3</div>
            <div class="negro">4</div>
            <div class="rojo">5</div>
            <div class="negro">6</div>
            <div class="rojo">7</div>
            <div class="negro">8</div>
            <div class="rojo">9</div>
            <div class="negro">10</div>
            <div class="negro">11</div>
            <div class="rojo">12</div>
        </div>


        <div class="Docena-2">
            <div class="negro">13</div>
            <div class="rojo">14</div>
            <div class="negro">15</div>
            <div class="rojo">16</div>
            <div class="negro">17</div>
            <div class="rojo">18</div>
            <div class="rojo">19</div>
            <div class="negro">20</div>
            <div class="rojo">21</div>
            <div class="negro">22</div>
            <div class="rojo">23</div>
            <div class="negro">24</div>
        </div>
            
                
        <div class="Docena-3">
            <div class="rojo">25</div>
            <div class="negro">26</div>
            <div class="rojo">27</div>
            <div class="negro">28</div>
            <div class="negro">29</div>
            <div class="rojo">30</div>
            <div class="negro">31</div>
            <div class="rojo">32</div>
            <div class="negro">33</div>
            <div class="rojo">34</div>
            <div class="negro">35</div>
            <div class="rojo">36</div>
        </div>
   </div>   
    <script src="script.js"></script>
</body>
</html>