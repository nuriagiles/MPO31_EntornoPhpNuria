<?php
session_start();

//Generar numero aleatorio y color
function generarRuleta() {
    $numeroAleatorio = rand(0, 36);
    $rojos = [1, 3, 5, 7, 9, 12, 14, 16, 18, 19, 21, 23, 25, 27, 30, 32, 34, 36];

    if ($numeroAleatorio === 0) {
        $color = "Verd";
    } elseif (in_array($numeroAleatorio, $rojos)) {
        $color = "Rojo";
    } else {
        $color = "Negre";
    }

    return ['numero' => $numeroAleatorio, 'color' => $color];
}

$missatgeResultat = "";
$error = "";

// Processament del formulari POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['netejar_historial'])) {
        $_SESSION['historial'] = [];
    }

    $tipoApuesta = $_POST['tipoApuesta'] ?? '';
    $valorApuesta = trim($_POST['valorApuesta'] ?? '');
    $cantidad = floatval($_POST['cantidad'] ?? 0); //sirve para convertir casi cualquier tipo de dato (como un texto o un número entero) en un número decimal

    //Validacion
    if (empty($tipoApuesta)) {
        $error = "Si us plau, selecciona un tipus d'apuesta.";
    } elseif ($cantidad <= 0) {
        $error = "La quantitat de diners ha de ser superior a 0.";
    } else {
        //Tirada de la ruleta
        $tirada = generarRuleta();
        $numGanador = $tirada['numero'];
        $colorGanador = $tirada['color'];

        $ganada = false;
        $multiplicador = 0;

        //El caso segun el tipo de apuesta, se calcula
        switch ($tipoApuesta) {
            case 'Rojo/Negre':
                if (strtolower($valorApuesta) === strtolower($colorGanador)) { //Sirve para convertir todas las letras de un texto a minúsculas
                    $ganada = true;
                    $multiplicador = 1;
                }
                break;

            case 'Parell/Imparell':
                if ($numGanador !== 0) {
                    $esParell = ($numGanador % 2 === 0);
                    if (($valorApuesta === 'Parell' && $esParell) || ($valorApuesta === 'Imparell' && !$esParell)) {
                        $ganada = true;
                        $multiplicador = 1;
                    }
                }
                break;

            case 'Pasa/Falta':
                if ($numGanador !== 0) {
                    $esFalta = ($numGanador >= 1 && $numGanador <= 18);
                    $esPasa = ($numGanador >= 19 && $numGanador <= 36);
                    if (($valorApuesta === 'Falta' && $esFalta) || ($valorApuesta === 'Pasa' && $esPasa)) {
                        $ganada = true;
                        $multiplicador = 1;
                    }
                }
                break;

            case 'Pleno':
                if (intval($valorApuesta) === $numGanador) {
                    $ganada = true;
                    $multiplicador = 35;
                }
                break;

            case 'Docena':
                $docenaGanadora = ($numGanador == 0) ? 0 : ceil($numGanador / 12); //ceil=> sirve para redondear un número decimal siempre hacia arriba, sin importar qué tan pequeño sea el decimal
                $docenaElegida = intval(str_replace('D', '', $valorApuesta)); //intval => sirve para convertir cualquier valor (como un texto o un número decimal) en un número entero. 
                //str_replace => Sirve para buscar una palabra o texto dentro de una cadena y reemplazarlo por otro diferente
                if ($docenaGanadora === $docenaElegida) {
                    $ganada = true;
                    $multiplicador = 2;
                }
                break;

            case 'Columna':
                if ($numGanador !== 0) {
                    $columnaGanadora = ($numGanador % 3 === 0) ? 3 : ($numGanador % 3);
                    $columnaElegida = intval($valorApuesta);
                    if ($columnaGanadora === $columnaElegida) {
                        $ganada = true;
                        $multiplicador = 2;
                    }
                }
                break;

            case 'Dos docenes':
                if ($numGanador !== 0) {
                    $docena = ceil($numGanador / 12);
                    if ($valorApuesta === 'D1-D2' && ($docena == 1 || $docena == 2)) {
                        $ganada = true;
                        $multiplicador = 0.5;
                    } elseif ($valorApuesta === 'D2-D3' && ($docena == 2 || $docena == 3)) {
                        $ganada = true;
                        $multiplicador = 0.5;
                    }
                }
                break;

            case 'Dos columnes':
                if ($numGanador !== 0) {
                    $columna = ($numGanador % 3 === 0) ? 3 : ($numGanador % 3);
                    if ($valorApuesta === 'C1-C2' && ($columna == 1 || $columna == 2)) {
                        $ganada = true;
                        $multiplicador = 0.5;
                    } elseif ($valorApuesta === 'C2-C3' && ($columna == 2 || $columna == 3)) {
                        $ganada = true;
                        $multiplicador = 0.5;
                    }
                }
                break;

            case 'Seisena':
                $inicioSeisena = intval($valorApuesta);
                $seisena = range($inicioSeisena, $inicioSeisena + 5); //Sirve para crear un array con una secuencia de números o letras de forma automática
                if (in_array($numGanador, $seisena)) {
                    $ganada = true;
                    $multiplicador = 5;
                }
                break;

            case 'Cuadro':
                $base = intval($valorApuesta);
                $cuadro = [$base, $base + 1, $base + 3, $base + 4];
                if (in_array($numGanador, $cuadro)) {
                    $ganada = true;
                    $multiplicador = 8;
                }
                break;

            case 'Transversal':
                $inicioTransversal = intval($valorApuesta);
                $transversal = [$inicioTransversal, $inicioTransversal + 1, $inicioTransversal + 2];
                if (in_array($numGanador, $transversal)) {
                    $ganada = true;
                    $multiplicador = 11;
                }
                break;

            case 'Caballo':
                $numsCaballo = array_map('intval', explode(',', $valorApuesta)); //Sirve para aplicar una misma acción o transformación a cada uno de los elementos de un array
                if (in_array($numGanador, $numsCaballo) && count($numsCaballo) === 2) {
                    $ganada = true;
                    $multiplicador = 17;
                }
                break;

            default:
                $error = "Error, apuesta no encontrada.";
                break;
        }

        $premioTotal = $ganada ? ($cantidad * $multiplicador) : 0;

        //METEMOS EL RESULTADO AL HISTORIAL
        $resultadoPartida = [
            'tipo' => $tipoApuesta,
            'valor' => $valorApuesta,
            'apuesta_cantidad' => $cantidad,
            'numero' => $numGanador,
            'color' => $colorGanador,
            'ganada' => $ganada,
            'premio' => $premioTotal,
            'data' => date('H:i:s')
        ];

        array_unshift($_SESSION['historial'], $resultadoPartida); //Sirve para agregar uno o más elementos al inicio de un array en PHP
        if (count($_SESSION['historial']) > 10) {
            array_pop($_SESSION['historial']); //extrae y devuelve el último elemento de un array, reduciendo la longitud del array original en una unidad
        }

        $missatgeResultat = $resultadoPartida;
    }
}
?>
<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Repte 6: Anem al Casino - Simulador de Ruleta</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @keyframes girarRuleta {
            from{ 
                transform: rotate(0deg); 
            }to{ 
                transform: rotate(360deg); 
            }
        }
        .animate-spin-slow {
            animation: girarRuleta 6s linear infinite;
        }
    </style>
</head>
<body class="bg-slate-900 text-slate-100 min-h-screen font-sans antialiased p-4 md:p-8">

    <div class="max-w-5xl mx-auto space-y-8">
        
        <header class="text-center space-y-4 flex flex-col items-center">
            <div class="relative w-36 h-36 md:w-48 md:h-48">
                <img src="ruleta.png" class="w-full h-full object-contain animate-spin-slow">
            </div>
            <div>
                <h1 class="text-4xl font-extrabold text-amber-400 tracking-wider">Casino Virtual - Simulador de Ruleta</h1>
            </div>
        </header>

        <!-- Resultado de la apuesta -->
        <?php if (!empty($error)): ?>
            <div class="bg-red-900/50 border border-red-500 text-red-200 px-4 py-3 rounded-lg shadow">
                <?php echo $error; ?>
            </div>
        <?php endif; ?>

        <?php if (!empty($missatgeResultat)): ?>
            <div class="bg-slate-800 border-2 <?php echo $missatgeResultat['ganada'] ? 'border-emerald-500 bg-emerald-950/20' : 'border-rose-500 bg-rose-950/20'; ?> rounded-xl p-6 shadow-xl space-y-3">
                <h2 class="text-2xl font-bold <?php echo $missatgeResultat['ganada'] ? 'text-emerald-400' : 'text-rose-400'; ?>">
                    <?php echo $missatgeResultat['ganada'] ? '¡Has guanyat l\'apuesta!' : 'Has perdut l\'apuesta.'; ?>
                </h2>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4 text-slate-300">
                    <div>
                        <span class="block text-sm text-slate-400">Número Guanyador:</span>
                        <span class="text-xl font-bold px-3 py-1 rounded <?php echo $missatgeResultat['color'] === 'Rojo' ? 'bg-red-600 text-white' : ($missatgeResultat['color'] === 'Negre' ? 'bg-black text-white border border-slate-600' : 'bg-emerald-600 text-white'); ?>">
                            <?php echo $missatgeResultat['numero']; ?> (<?php echo $missatgeResultat['color']; ?>)
                        </span>
                    </div>
                    <div>
                        <span class="block text-sm text-slate-400">Tipus d'Apuesta:</span>
                        <span class="font-semibold"><?php echo $missatgeResultat['tipo']; ?> (<?php echo $missatgeResultat['valor']; ?>)</span>
                    </div>
                    <div>
                        <span class="block text-sm text-slate-400">Import Guanyat:</span>
                        <span class="text-xl font-bold text-amber-400"><?php echo number_format($missatgeResultat['premio'], 2); ?> €</span>
                    </div>
                </div>
            </div>
        <?php endif; ?>

        <section class="bg-slate-800 border border-slate-700 rounded-xl p-6 shadow-lg">
            <h2 class="text-xl font-bold text-amber-300 mb-4">Realitzar una Apuesta</h2>
            <form method="POST" action="" class="grid grid-cols-1 md:grid-cols-4 gap-4 items-end">                
                <div>
                    <label class="block text-sm font-medium text-slate-300 mb-1">Tipus d'Apuesta</label>
                    <select name="tipoApuesta" id="tipoApuesta" required class="w-full bg-slate-900 border border-slate-700 rounded-lg p-2.5 text-slate-100 focus:ring-2 focus:ring-amber-500 focus:outline-none" onchange="actualitzarSubmenu()">
                        <option value="">-- Selecciona --</option>
                        <option value="Rojo/Negre">Rojo / Negre</option>
                        <option value="Parell/Imparell">Parell / Imparell</option>
                        <option value="Pasa/Falta">Pasa / Falta</option>
                        <option value="Pleno">Pleno (Número)</option>
                        <option value="Docena">Docena</option>
                        <option value="Columna">Columna</option>
                        <option value="Dos docenes">Dos Docenes</option>
                        <option value="Dos columnes">Dos Columnes</option>
                        <option value="Seisena">Seisena</option>
                        <option value="Cuadro">Cuadro</option>
                        <option value="Transversal">Transversal</option>
                        <option value="Caballo">Caballo</option>
                    </select>
                </div>

                <!-- Submenu -->
                <div>
                    <label class="block text-sm font-medium text-slate-300 mb-1">Valor de l'Apuesta</label>
                    <div id="contenedorValor">
                        <input type="text" name="valorApuesta" id="valorInput" placeholder="Selecciona tipus primer" required class="w-full bg-slate-900 border border-slate-700 rounded-lg p-2.5 text-slate-100 focus:ring-2 focus:ring-amber-500 focus:outline-none">
                    </div>
                </div>

                <div>
                    <label class="block text-sm font-medium text-slate-300 mb-1">Quantitat (€)</label>
                    <input type="number" step="0.01" min="0.50" name="cantidad" required placeholder="10.00" class="w-full bg-slate-900 border border-slate-700 rounded-lg p-2.5 text-slate-100 focus:ring-2 focus:ring-amber-500 focus:outline-none">
                </div>

                <div>
                    <button type="submit" class="w-full bg-amber-500 hover:bg-amber-600 text-slate-950 font-bold p-2.5 rounded-lg transition shadow-md">
                        Girar Ruleta 
                    </button>
                </div>

            </form>
        </section>

        <!--TABLA DE APUESTAS-->
        <section class="bg-slate-800 border border-slate-700 rounded-xl p-6 shadow-lg overflow-hidden">
            <h2 class="text-xl font-bold text-amber-300 mb-4">Taula de Guia d'Apostes (Array Multidimensional)</h2>
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="bg-slate-700 text-slate-200">
                            <th class="p-3 border-b border-slate-600">Apuesta</th>
                            <th class="p-3 border-b border-slate-600">Descripció / Com es juga</th>
                            <th class="p-3 border-b border-slate-600">Premi</th>
                            <th class="p-3 border-b border-slate-600">Exemple de Valor</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-700 text-sm">
                            <tr class="hover:bg-slate-750 transition">
                                <td>Rojo/Negro</td>
                                <td>Se apuesta al color del número ganador, si será rojo o negro. Con esta apuesta se está jugando a 18 números, ya que hay 18 números rojos y 18 negros.</td>
                                <td>1 x 1</td>
                                <td>1</td>
                            </tr>
                            <tr class="hover:bg-slate-750 transition">
                                <td>Par/Impar</td>
                                <td>Se apuesta a si el número donde cae la bola será par o impar. Con esta apuesta se está jugando a 18 números, bien a los 18 pares o impares.</td>
                                <td>1 x 1</td>
                                <td>2</td>
                            </tr>
                            <tr class="hover:bg-slate-750 transition">
                                <td>Pasa/Falta</td>
                                <td>Se trata de apostar si el número estará entre 1-18 (falta) o 19-36 (pasa). Por tanto, se juega a 18 números.</td>
                                <td>1 x 1</td>
                                <td>3</td>
                            </tr>
                            <tr class="hover:bg-slate-750 transition">
                                <td>Docena</td>
                                <td>Se apuesta a qué docena estará el número ganador. El tapete se divide en 3 docenas, cada una abarca 12 números. Se juega a 12 números.</td>
                                <td>2 x 1</td>
                                <td>4</td>
                            </tr>
                            <tr class="hover:bg-slate-750 transition">
                                <td>Columna</td>
                                <td>Se apuesta a qué columna estará el número ganador. El tapete se divide en 3 columnas, cada una alberga 12 números. Se juega a 12 números.</td>
                                <td>2 x 1</td>
                                <td>5</td>
                            </tr>
                            <tr class="hover:bg-slate-750 transition">
                                <td>Dos docenas</td>
                                <td>Se apuesta a dos docenas contiguas, es decir, se puede apostar a las docenas 1 y 2, o a las docenas 2 y 3. Se juega a 24 números.</td>
                                <td>0,5 x 1</td>
                                <td>6</td>
                            </tr>
                            <tr class="hover:bg-slate-750 transition">
                                <td>Dos columnas</td>
                                <td>Se apuesta a dos columnas contiguas. Se puede apostar a las columnas 1 y 2 o a las columnas 2 y 3. Se juega a 24 números.</td>
                                <td>0,5 x 1</td>
                                <td>7</td>
                            </tr>
                            <tr class="hover:bg-slate-750 transition">
                                <td>Seisena</td>
                                <td>Se apuesta a 6 números con una sola apuesta. Los 6 números están en dos filas contiguas.</td>
                                <td>5 x 1</td>
                                <td>8</td>
                            </tr>
                            <tr class="hover:bg-slate-750 transition">
                                <td>Cuadro</td>
                                <td>Se apuesta a 4 números con una sola apuesta. Esta apuesta se realiza sobre 4 números que forman un cuadrado en el tapete.</td>
                                <td>8 x 1</td>
                                <td>9</td>
                            </tr>
                            <tr class="hover:bg-slate-750 transition">
                                <td>Transversal</td>
                                <td>Se apuesta a 3 números en una fila. Existen dos variaciones: a los números 0, 1 y 2 o a 0, 2 y 3.</td>
                                <td>11 x 1</td>
                                <td>10, 11, 12</td>
                            </tr>
                            <tr class="hover:bg-slate-750 transition">
                                <td>Caballo</td>
                                <td>Se apuesta a 2 números contiguos en el tapete de manera horizontal o vertical.</td>
                                <td>17 x 1</td>
                                <td>13, 14</td>
                            </tr>
                            <tr class="hover:bg-slate-750 transition">
                                <td>Pleno</td>
                                <td>Se apuesta a un solo número.</td>
                                <td>35 x 1</td>
                                <td>15</td>
                            </tr>
                    </tbody>
                </table>
            </div>
        </section>

        <!--HISTORIAL DE PARTIDAS-->
        <?php if (!empty($_SESSION['historial'])): ?>
            <section class="bg-slate-800 border border-slate-700 rounded-xl p-6 shadow-lg space-y-4">
                <div class="flex justify-between items-center">
                    <h2 class="text-xl font-bold text-amber-300">Historial de Partides (Sessions)</h2>
                    <form method="POST">
                        <button type="submit" name="netejar_historial" class="text-xs bg-rose-900/60 hover:bg-rose-800 text-rose-200 px-3 py-1.5 rounded border border-rose-600 transition">
                            Netejar Historial
                        </button>
                    </form>
                </div>
                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse text-sm">
                        <thead>
                            <tr class="bg-slate-700 text-slate-200">
                                <th class="p-2.5">Hora</th>
                                <th class="p-2.5">Apuesta</th>
                                <th class="p-2.5">Valor</th>
                                <th class="p-2.5">Apostat</th>
                                <th class="p-2.5">Resultat Ruleta</th>
                                <th class="p-2.5">Estat</th>
                                <th class="p-2.5">Premi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-700">
                            <?php foreach ($_SESSION['historial'] as $partida): ?>
                                <tr class="hover:bg-slate-750">
                                    <td class="p-2.5 text-slate-400"><?php echo $partida['data']; ?></td>
                                    <td class="p-2.5 font-medium"><?php echo $partida['tipo']; ?></td>
                                    <td class="p-2.5"><?php echo $partida['valor']; ?></td>
                                    <td class="p-2.5"><?php echo number_format($partida['apuesta_cantidad'], 2); ?> €</td>
                                    <td class="p-2.5">
                                        <span class="px-2 py-0.5 rounded text-xs font-bold <?php echo $partida['color'] === 'Rojo' ? 'bg-red-600 text-white' : ($partida['color'] === 'Negre' ? 'bg-black text-white border border-slate-600' : 'bg-emerald-600 text-white'); ?>">
                                            <?php echo $partida['numero']; ?> (<?php echo $partida['color']; ?>)
                                        </span>
                                    </td>
                                    <td class="p-2.5 font-bold <?php echo $partida['ganada'] ? 'text-emerald-400' : 'text-rose-400'; ?>">
                                        <?php echo $partida['ganada'] ? 'Guanyada' : 'Perduda'; ?>
                                    </td>
                                    <td class="p-2.5 text-amber-400 font-semibold"><?php echo number_format($partida['premio'], 2); ?> €</td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </section>
        <?php endif; ?>

    </div>

    <script>
        function actualitzarSubmenu() {
            const tipo = document.getElementById('tipoApuesta').value;
            const contenedor = document.getElementById('contenedorValor');
            
            let html = '';

            switch(tipo) {
                case 'Rojo/Negre':
                    html = `<select name="valorApuesta" required class="w-full bg-slate-900 border border-slate-700 rounded-lg p-2.5 text-slate-100">
                                <option value="Rojo">Rojo</option>
                                <option value="Negre">Negre</option>
                            </select>`;
                    break;
                case 'Parell/Imparell':
                    html = `<select name="valorApuesta" required class="w-full bg-slate-900 border border-slate-700 rounded-lg p-2.5 text-slate-100">
                                <option value="Parell">Parell</option>
                                <option value="Imparell">Imparell</option>
                            </select>`;
                    break;
                case 'Pasa/Falta':
                    html = `<select name="valorApuesta" required class="w-full bg-slate-900 border border-slate-700 rounded-lg p-2.5 text-slate-100">
                                <option value="Falta">Falta (1-18)</option>
                                <option value="Pasa">Pasa (19-36)</option>
                            </select>`;
                    break;
                case 'Pleno':
                    html = `<input type="number" name="valorApuesta" min="0" max="36" placeholder="Número (0-36)" required class="w-full bg-slate-900 border border-slate-700 rounded-lg p-2.5 text-slate-100">`;
                    break;
                case 'Docena':
                    html = `<select name="valorApuesta" required class="w-full bg-slate-900 border border-slate-700 rounded-lg p-2.5 text-slate-100">
                                <option value="D1">1a Dotzena (1-12)</option>
                                <option value="D2">2a Dotzena (13-24)</option>
                                <option value="D3">3a Dotzena (25-36)</option>
                            </select>`;
                    break;
                case 'Columna':
                    html = `<select name="valorApuesta" required class="w-full bg-slate-900 border border-slate-700 rounded-lg p-2.5 text-slate-100">
                                <option value="1">Columna 1</option>
                                <option value="2">Columna 2</option>
                                <option value="3">Columna 3</option>
                            </select>`;
                    break;
                case 'Dos docenes':
                    html = `<select name="valorApuesta" required class="w-full bg-slate-900 border border-slate-700 rounded-lg p-2.5 text-slate-100">
                                <option value="D1-D2">1a i 2a Dotzena (D1-D2)</option>
                                <option value="D2-D3">2a i 3a Dotzena (D2-D3)</option>
                            </select>`;
                    break;
                case 'Dos columnes':
                    html = `<select name="valorApuesta" required class="w-full bg-slate-900 border border-slate-700 rounded-lg p-2.5 text-slate-100">
                                <option value="C1-C2">Columna 1 i 2 (C1-C2)</option>
                                <option value="C2-C3">Columna 2 i 3 (C2-C3)</option>
                            </select>`;
                    break;
                case 'Seisena':
                    html = `<input type="number" name="valorApuesta" min="1" max="31" step="1" placeholder="Inici de fila (ex: 1, 4, 7...)" required class="w-full bg-slate-900 border border-slate-700 rounded-lg p-2.5 text-slate-100">`;
                    break;
                case 'Cuadro':
                    html = `<input type="number" name="valorApuesta" min="1" max="32" step="1" placeholder="Número base (ex: 1, 2, 4...)" required class="w-full bg-slate-900 border border-slate-700 rounded-lg p-2.5 text-slate-100">`;
                    break;
                case 'Transversal':
                    html = `<input type="number" name="valorApuesta" min="1" max="34" step="3" placeholder="Inici de fila (1, 4, 7...)" required class="w-full bg-slate-900 border border-slate-700 rounded-lg p-2.5 text-slate-100">`;
                    break;
                case 'Caballo':
                    html = `<input type="text" name="valorApuesta" placeholder="Dos números separats per coma (ex: 5,8)" required class="w-full bg-slate-900 border border-slate-700 rounded-lg p-2.5 text-slate-100">`;
                    break;
                default:
                    html = `<input type="text" name="valorApuesta" placeholder="Selecciona tipus primer" required class="w-full bg-slate-900 border border-slate-700 rounded-lg p-2.5 text-slate-100">`;
            }

            contenedor.innerHTML = html;
        }
    </script>
</body>
</html>