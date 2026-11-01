<?php
session_start();

if (!isset($_SESSION['encarrecs'])) {
    require_once 'dades.php';
    $_SESSION['encarrecs'] = $encarrecs;
}


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    

    if (isset($_POST['accio']) && $_POST['accio'] == 'afegir') {
        $titol = trim($_POST['titol']);
        $client = trim($_POST['client']);
        $hores = $_POST['hores'];
        $estat = trim($_POST['estat']);
        $textEtiquetes = trim($_POST['etiquetes']);

        if ($titol != "" && $client != "" && $hores > 0) {           

            $etiquetesArray = explode(',', $textEtiquetes);
            
            foreach ($etiquetesArray as $posicio => $etiqueta) {
                $etiquetesArray[$posicio] = trim($etiqueta);
            }
            
            $nouEncarrec = [
                "titol" => $titol,
                "client" => $client,
                "hores" => $hores,
                "estat" => $estat,
                "etiquetes" => $etiquetesArray
            ];

            $_SESSION['encarrecs'][] = $nouEncarrec;
            
            header("Location: index.php");
            exit;
        }
    }

    if (isset($_POST['accio']) && $_POST['accio'] == 'eliminar') {
        $id_eliminar = $_POST['id'];
        
        if (array_key_exists($id_eliminar, $_SESSION['encarrecs'])) {

            unset($_SESSION['encarrecs'][$id_eliminar]);
            
            $_SESSION['encarrecs'] = array_values($_SESSION['encarrecs']);
            
            header("Location: index.php");
            exit;
        }
    }
}

$totalEncarrecs = count($_SESSION['encarrecs']);
$horesTotals = 0;
foreach ($_SESSION['encarrecs'] as $incarrec) {
    $horesTotals += $incarrec["hores"];
}

include 'includes/header.php';
?>

<div class="hero-banner">
    <div>
        <span class="sub-hero">AGÈNCIA WEB · TAULER DE PROJECTES</span>
        <h1>Gestor d'encàrrecs</h1>
        <p>Consulta la feina de l'equip, revisa les hores previstes i registra encàrrecs nous.</p>
    </div>
    <a href="#formulari-alta" class="btn-orange">+ Nou encàrrec</a>
</div>

<div class="stats-container">
    <div class="stat-card">
        <span class="stat-title">Total d'encàrrecs</span>
        <span class="stat-number"><?= $totalEncarrecs ?></span>
    </div>
    <div class="stat-card">
        <span class="stat-title">Hores estimades</span>
        <span class="stat-number"><?= $horesTotals ?> h</span>
    </div>
</div>

<h2 class="section-title">PROJECTES ACTIUS</h2>
<p class="section-subtitle">Llistat d'encàrrecs</p>

<div class="grid-projects">
    <?php foreach ($_SESSION['encarrecs'] as $id => $incarrec): 
        if ($incarrec["estat"] == "Acabat") {
            $classeEstat = "estat--acabat";
        } elseif ($incarrec["estat"] == "En procés") {
            $classeEstat = "estat--proces";
        } else {
            $classeEstat = "estat--pendent";
        }
    ?>
        <div class="project-card">
            <div class="card-header">
                <span class="badge-estat <?= $classeEstat ?>"><?= $incarrec["estat"] ?></span>
                <span class="card-hours"><?= $incarrec["hores"] ?> h</span>
            </div>
            
            <h3 class="card-title"><?= $incarrec["titol"] ?></h3>
            <p class="card-client">Client: <strong><?= $incarrec["client"] ?></strong></p>
            
            <p class="card-tags"><?= implode(" · ", $incarrec["etiquetes"]) ?></p>
            
            <div class="card-actions">
                <a href="detall.php?id=<?= $id ?>" class="btn-detail">Veure detall</a>
                
                <form action="index.php" method="POST">
                    <input type="hidden" name="accio" value="eliminar">
                    <input type="hidden" name="id" value="<?= $id ?>">
                    <button type="submit" class="btn-delete">Eliminar</button>
                </form>
            </div>
        </div>
    <?php endforeach; ?>
</div>

<div id="formulari-alta" class="form-container">
    <div class="form-sidebar">
        <span class="sub-hero">ALTA DE PROJECTE</span>
        <h2>Afegir un encàrrec</h2>
        <p>Emplena totes les dades. Les etiquetes s'han d'escriure separades per comes.</p>
    </div>
    
    <div class="form-main">
        <form action="index.php" method="POST">
            <input type="hidden" name="accio" value="afegir">
            
            <div class="form-group">
                <label for="titol">Títol</label>
                <input type="text" id="titol" name="titol" placeholder="Ex.: Redisseny d'una botiga" required>
            </div>
            
            <div class="form-group">
                <label for="client">Client</label>
                <input type="text" id="client" name="client" placeholder="Nom del client" required>
            </div>
            
            <div class="form-row">
                <div class="form-group">
                    <label for="hores">Hores estimades</label>
                    <input type="number" id="hores" name="hores" min="1" placeholder="Ex: 10" required>
                </div>
                
                <div class="form-group">
                    <label for="estat">Estat</label>
                    <select id="estat" name="estat">
                        <option value="Pendent">Pendent</option>
                        <option value="En procés">En procés</option>
                        <option value="Acabat">Acabat</option>
                    </select>
                </div>
            </div>
            
            <div class="form-group">
                <label for="etiquetes">Etiquetes</label>
                <input type="text" id="etiquetes" name="etiquetes" placeholder="PHP, Docker, Responsive">
            </div>
            
            <button type="submit" class="btn-submit">Afegir encàrrec</button>
        </form>
    </div>
</div>

<?php include 'includes/footer.php'; ?>
