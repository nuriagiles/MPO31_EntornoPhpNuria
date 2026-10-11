<?php 
    $Lista = [
        [
            "Tecnologias" => "PHP",
            "Color" => "#BFDBFE",
            "Conceptos" => [
                [
                    "Tema" => "Variables",
                    "Descripcion" => "Serveixen per guardar informació que després podem utilitzar.",
                    "Img" => "img/img1php.png",
                    "Destacado" => false
                ]
            ]
        ],
        [
            "Tecnologias" => "PHP",
            "Color" => "#BFDBFE",
            "Conceptos" => [
                [
                    "Tema" => "If/else",
                    "Descripcion" => "Permet executar un codi o un altre segons una condició.",
                    "Img" => "img/img2php.png",
                    "Destacado" => false
                ]
            ]
        ], 
        [
            "Tecnologias" => "JavaScript",
            "Color" => "#FEF3C7",
            "Conceptos" => [
                [
                    "Tema" => "Manipular el DOM",
                    "Descripcion" => "Permet modificar el contingut de la pagina des de JavaScript.",
                    "Img" => "img/img1js.png"
                ],
                [
                    "Tema" => "Array i forEach",
                    "Descripcion" => "Permet recórrer tots els elements d'un array.",
                    "Img" => "img/img2js.png",
                    "Destacado" => false
                ]
            ]
        ], 
        [
            "Tecnologias" => "CSS",
            "Color" => "#CFFAFE",
            "Conceptos" => [
                [
                    "Tema" => "Box-shadow",
                    "Descripcion" => "Se utiliza para proyectar uno o varios efectos de sombra alrededor de la caja de borde de un elemento.",
                    "Img" => "img/img2css.png",
                    "Destacado" => true
                ]
            ]
        ], 
        [
            "Tecnologias" => "HTML",
            "Color" => "#DCFCE7",
            "Conceptos" => [
                [
                    "Tema" => "Estructura HTML5",
                    "Descripcion" => "Utilitzem etiquetes semàntiques per organitzar el contingut.",
                    "Img" => "img/img1html.png",
                    "Destacado" => false
                ]
            ]
        ], 
        [
            "Tecnologias" => "Docker",
            "Color" => "#DDD6FE",
            "Conceptos" => [
                [
                    "Tema" => "Docker compose",
                    "Descripcion" => "Permet aixecar diversos serveis alhora (per exemple, una web i una base de dades).",
                    "Img" => "img/img1docker.png",
                    "Destacado" => true
                ]
            ]
        ], 
        [
            "Tecnologias" => "BBDD",
            "Color" => "#FECACA",
            "Conceptos" => [
                [
                    "Tema" => "Consultes SQL bàsiques",
                    "Descripcion" => "Permeten obtenir informació de la base de dades.",
                    "Img" => "img/img1bbdd.png",
                    "Destacado" => false
                ]
            ]
        ], 
        [
            "Tecnologias" => "React",
            "Color" => "#FBCFE8",
            "Conceptos" => [
                [
                    "Tema" => "Components",
                    "Descripcion" => "Permeten dividir la interfície en peces reutilitzables.",
                    "Img" => "img/img1react.png",
                    "Destacado" => true
                ]
            ]
        ]
];

    $i = 0;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <div class="header-title">
            <h1>Chuleta digital DAW2</h1>
            <p>Els conceptes clau del curs, en un sol lloc</p>
        </div>
        
    </header>
    <main>
        <div class="Tarjetas-conceptos">
            <?php foreach($Lista as $elementos):?>                
                    <div style="background-color: <?= $elementos['Color']?>; width: 441px; border-radius: 10px; justify-items: center; padding-top: 20px; margin: 20px;">
                        <h2><?= $elementos['Tecnologias']?></h2>
                        <div class="tarjeta-body">
                            <h3><?= $elementos['Conceptos'][$i]['Tema']?></h3>
                            <p><?= $elementos['Conceptos'][$i]['Descripcion']?></p>
                            <img src="<?= $elementos['Conceptos'][$i]['Img']?>" alt="">

                            <div class="etiqueta-teconologia">
                                <p><?= $elementos['Tecnologias']?></p>
                            </div>
                        </div>
                    </div>
            
            <?php endforeach;?>
        </div>
        <div class="resumen-conceptos">
            <div class="conceptos-destacados">
                <h2>Conceptos destacados</h2>
                <ul>            
                    <?php foreach($Lista as $destacados):?>
                        <?php if(!empty($destacados['Conceptos'][0]['Destacado'])):?>
                            <li><?= $destacados['Conceptos'][0]['Tema']?></li>
                        <?php endif;?>
                    <?php endforeach;?>
                </ul>
            </div>
            <div class="conceptos-destacados">
                <h2>Resum de conceptes</h2>
                <div class="flex">                
                    <?php for ($l = 1; $l < count($Lista); $l++): ?>
                        <div style="background-color: <?= $Lista[$l]['Color'] ?>; width: 100px; text-align: center; border-radius: 10px; margin-right: 10px; margin-bottom: 20px;"> 
                            <?= $Lista[$l]['Tecnologias'] ?> 
                        </div>
                    <?php endfor; ?>
                </div>
                <div>
                    <h3>Total de conceptos</h3>
                    <p><?= count($Lista)?></p>
                </div>
                            
            </div>
        </div>
        
    </main>
</body>
</html>