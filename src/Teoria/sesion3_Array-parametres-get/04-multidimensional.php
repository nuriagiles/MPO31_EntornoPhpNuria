<?php

$alumnos = [
    //Elemento 1
    [
        "nom" => "Nuria",
        "edad" => 19,
        "anyo" => 2007
    ],

    //Elemento 2
    [
        "nom" => "Jose",
        "edad" => 20,
        "anyo" => 2006
    ],

    //Elemento 3
    [
        "nom" => "Anna",
        "edad" => 21,
        "anyo" => 2005
    ]
];
echo '<pre>';
var_dump($alumnos);
echo '</pre>';

print_r($alumnos[0]);

foreach($alumnos as $id=>$alumnos):?>

<div>
    <h1><?= $id?></h1>
    <p><?= $alumnos['nom']?></p>
    <a href="llistes.php?nom=<?= $alumnos['nom']?>&edad=<?= $alumnos['edad']?>"><?= $alumnos['nom']?></a>
    <a href="llistes.php?id=<?= $id=0 ?>"><?= $alumnos['nom']?></a>
</div>

<?endforeach?>
