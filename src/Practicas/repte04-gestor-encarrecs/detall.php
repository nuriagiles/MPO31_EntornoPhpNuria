<?php
session_start();

if (!isset($_SESSION['encarrecs'])) {
    require_once 'dades.php';
    $_SESSION['encarrecs'] = $encarrecs;
}

$id = filter_input(INPUT_GET, "id", FILTER_VALIDATE_INT);

if ($id !== false && $id !== null && array_key_exists($id, $_SESSION['encarrecs'])) {
    $id_valid = true;
    $id_exhibicio = $id + 1; 
    $incarrec = $_SESSION['encarrecs'][$id];
    
    if ($incarrec["estat"] === "Acabat") {
        $classeEstat = "estat--acabat";
    } elseif ($incarrec["estat"] === "En procés") {
        $classeEstat = "estat--proces";
    } else {
        $classeEstat = "estat--pendent";
    }
    
} else {
    $id_valid = false;
}

include 'includes/header.php';
?>

<div class="back-link-container">
    <a href="index.php" class="btn-back">&larr; Tornar al gestor</a>
</div>

<?php if ($id_valid): ?>
    <div class="detail-container">
        <div class="detail-hero">
            <div>
                <span class="sub-hero">DETALL DE L'ENCÀRREC #<?= $id_exhibicio ?></span>
                <h1><?= $incarrec["titol"] ?></h1>
                <p>Projecte encarregat per <strong><?= $incarrec["client"] ?></strong></p>
            </div>
            <span class="badge-estat <?= $classeEstat ?>"><?= $incarrec["estat"] ?></span>
        </div>
        
        <div class="detail-content">
            <div class="detail-data-block">
                <span class="block-label">CLIENT</span>
                <span class="block-value"><?= $incarrec["client"] ?></span>
            </div>
            
            <div class="detail-data-block">
                <span class="block-label">HORES ESTIMADES</span>
                <span class="block-value"><?= $incarrec["hores"] ?> hores</span>
            </div>
            
            <div class="detail-data-block">
                <span class="block-label">ESTAT</span>
                <span class="block-value"><?= $incarrec["estat"] ?></span>
            </div>
            
            <div class="detail-data-block">
                <span class="block-label">ETIQUETES</span>
                <span class="block-value-tags">
                    <?php foreach ($incarrec["etiquetes"] as $tag): ?>
                        <span class="tag-pill"><?= $tag ?></span>
                    <?php endforeach; ?>
                </span>
            </div>
        </div>
    </div>
<?php else: ?>
    <div class="alert-danger">
        <h2>Error: L'encàrrec sol·licitat no existeix.</h2>
        <p>L'identificador és invàlid o el projecte ha deixat d'existir.</p>
    </div>
<?php endif; ?>

<?php include 'includes/footer.php'; ?>
