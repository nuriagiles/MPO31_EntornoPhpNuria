<?php
require_once('config.php');

//obtenim la connecio de bd
try{
    $pdo = db();
    echo 'todo bien';
}catch(PDOException $e){
    die('ERRROR DE CONEXIO!!! AMB BBDD'. $e->getMessage());
}
$sql = "SELECT * FROM videojocs";
$stmt = $pdo->query($sql);
?>

<pre>
    <? var_dump($stmt);?>
</pre>
<?
//uso el metodo el fetchAll para convertir este objeto en un array ITERABLE
$videojocs = $stmt->fetchAll();
?>
<pre>
    <? var_dump($videojocs);?>
</pre>
<?
echo '<h1>Videojocs de MySQL</h1>';
foreach ($videojocs as $joc) {
    echo '<p>'. $joc['nom'].'(' . $joc['genere'] . ')</p>';
}
?>
<!doctype html>
<html lang="ca">
<head>
  <meta charset="utf-8">
  <title>Personatges DB</title>
</head>
<body>
  <h1>Col·lecció de personatges</h1>
  <?php foreach($personatges as $personatge):?>
    <article>
     <h2><?= $personatge['nom'] ?></h2>
     <p>
       Videojoc:
       <?= $personatge['videojoc'] ?>
     </p>
     <p>
       Propietari:
       <?= $personatge['propietari'] ?>
     </p>
     <p>
       <?= $personatge['descripcio'] ?>
     </p>
    </article>
    <hr>
  <?php endforeach;?>
</body>
</html>

