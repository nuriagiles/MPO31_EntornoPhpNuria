<?php
    $NomProjectes = [
        "Landing per a clinica dental", 
        "Catàleg de productes artesans",
        "Blog corporatiu escola",
        "Auditoria responsive",
        "Fitxa de servei amb CTA",
        "Galeria de projectes",
        "Botiga online bàsica",
        "Optimització d'imatges"
    ];
    $ImgProjectes = [
        "img/diente.png",
        "img/carrito.png",
        "img/documento.png",
        "img/movil.png",
        "img/megafono.png",
        "img/galeria.png",
        "img/config.png",
        "img/bolso.png"
    ];
    $Descripcion = [
        "Landing page moderna i responsive.",
        "Catàleg de productes artesans.",
        "Blog amb notícies i articles.",
        "Revisió i millores de versió mòbil.",
        "Pàgina de servei amb formulari.",
        "Galeria filtrable de projectes.",
        "Connexió amb API externa.",
        "Botiga amb productes i pagament."
    ];
    $LIMITE = 8;
    $Mitjana = 4;
    $Baixa = 3;
    $Alta = 7;
    $count = 0;
    $count2 = 0;
    $count3 = 0;

    $TipoProjectes = [
        "Web",
        "Ecommerce",
        "CMS",
        "Qualitat",
        "Web",
        "CMS",
        "Ecommerce",
        "Qualitat"
    ];

    $HorasEstimadas = [6, 4, 3, 5, 2, 4, 8, 3];
    $Prioridades = [7, 5, 2, 8, 4, 3, 9, 6];
    $Tecnologias = ["HTML", "CSS", "PHP", "Docker", "WordPress", "Shopify"];
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body{
            background-color: #FDFDFD;
            font-family: sans-serif;
        }
        /*HEADER*/
        header{
            display: flex;
            gap: 20px;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
            padding-left: 40px;
            padding-right: 20px;
        }
        .logo-panell {
            display: flex;
            gap: 20px;
            align-items: center;
            line-height: 15px;
        }
        .logo-panell p{
           color: #858DA3;
        }
        .menu {
            display: flex;
            gap: 40px;
            margin-right: 210px;
        }
        .menu-item {
            display: flex;
            gap: 10px;
            align-items: center;
        }
        .casita{
            background-color: #E9F3FE;
            border-radius: 15px;
            width: 100px;
            color: #1A73E8;
            justify-content: center;
        }
        .logo{
            border-radius: 15px;            
        } 
        /*PANEL INTERNO DE PROYECTOS*/ 
        .proyectos-totales{
            display: flex;
            gap: 20px;
            margin-bottom: 35px;
            padding-left: 40px;
        }
        .projectes-actius{
            display: flex;
            flex-wrap: wrap;
            padding-left: 30px;
        }
        .projecte-header-tarjeta{
            display: flex;
            gap: 20px;
            justify-content: space-between;
            align-items: center;
        }
        .proyectos-total{
            background-color: #EBF4FE;
            height: 150px;
            width: 340px;
            border-radius: 15px;
            display: flex;
            align-items: center;
            padding-left: 30px;
            padding-right: 20px;
            line-height: 11px;
        }
        .proyectos-total-img{
            background-color: #D9E9FE;
            height: 50px;
            width: 50px;
            border-radius: 15px;
            align-content: center;
            text-align: center;
            
        }
        .proyectos-prioritat-alta{
            background-color: #FDEFF2;
            height: 150px;
            width: 340px;
            border-radius: 15px;
            display: flex;
            align-items: center;
            padding-left: 30px;
            padding-right: 20px;
            line-height: 11px;
        }
        .proyectos-prioritat-alta-img{
            background-color: #FDE0E6;
            height: 50px;
            width: 50px;
            border-radius: 15px;
            align-content: center;
            text-align: center;
            margin-right: 30px;
        }
        .proyectos-horas-estimadas{
            background-color: #EDF9F2;
            height: 150px;
            width: 340px;
            border-radius: 15px;
            display: flex;
            align-items: center;
            padding-left: 30px;
            padding-right: 20px;
            line-height: 11px;
        }
        .proyectos-horas-estimadas-img{
            background-color: #D9F3E6;
            height: 50px;
            width: 50px;
            border-radius: 15px;
            align-content: center;
            text-align: center;
            margin-right: 30px;
        }
        .proyectos-tecnologias{
            background-color: #F2EFFE;
            height: 150px;
            width: 340px;
            border-radius: 15px;
            display: flex;
            align-items: center;
            padding-left: 30px;
            padding-right: 20px;
            line-height: 11px;
        }
        .proyectos-tecnologias-img{
            background-color: #DFD7FD;
            height: 50px;
            width: 50px;
            border-radius: 15px;
            align-content: center;
            text-align: center;
            margin-right: 30px;
        }
        /*TARJETAS DE PROJECTOS*/
        .filtrar-div{
            border: 1px solid #F2F3F6;
            height: 50px;
            border-radius: 10px;
        }
        #filtrar{
            border-left: none;
            border-top: none;
            border-bottom: none;
            border-radius: 10px;
            border-right: 15px solid #FFFFFF;
            height: 50px;
            padding-left: 20px;
            padding-right: 20px;
            color: #57647E;
        }
        .proyectos-activos-header{
            display: flex;
            gap: 20px;
            justify-content: space-between;
            align-items: center;
            margin-right: 225px;
        }
        .proyectos-activos-text{
            padding-left: 40px;
            line-height: 11px;

        }
        .projecte-targeta {
            border: 2px solid #F0F2F5;
            border-radius: 15px;
            padding: 10px;
            margin: 10px;
            width: 347px;
            padding-left: 20px;
            padding-right: 20px;
        }
        .projecte-header-tarjeta h3{
            font-size: 15px;
        }
        .projecte-img-tarjeta{
            background-color: #E8F3FD;
            height: 60px;
            width: 60px;
            border-radius: 10px;
            align-content: center;
            text-align: center;
        }
        .projecte-body-tarjeta{
            display: flex;
            gap: 20px;
            align-items: center;
        }
        .hores-prioritat-container{
            display: flex;
            gap: 30px;
        }
        .hores-div{
            display: flex;
            gap: 10px;
            align-items: center;
        }
        .prioritat-div{
            display: flex;
            gap: 10px;
            align-items: center;
        }
        /*Prioridades*/
        .prioritat-alta {
            background-color: #ffcccc;
            color: #990000;
            width: 50px;
            height: 30px;
            border-radius: 10px;
            text-align: center;
            align-content: center;
        }
        .prioritat-alta p, .prioritat-mitjana p, .prioritat-baixa p{
            margin: 0;
        }
        .prioritat-mitjana {
            background-color: #FDECB2;
            color: #C66C3C;
            width: 70px;
            height: 30px;
            border-radius: 10px;
            text-align: center;
            align-content: center;
        }
        .prioritat-baixa {
            background-color: #ccffcc;
            color: #28835C;
            width: 65px;
            height: 30px;
            border-radius: 10px;
            text-align: center;
            align-content: center;
        }
        .resum-container{
            border: 2px solid #E9F1FD;
            background-color: #F2F9FE;
            border-radius: 15px;
            padding: 10px;
            margin: 10px;
            width: 758px;
            padding-left: 20px;
            padding-right: 20px;
            align-content: center;
        }
        .resum-header{
            display: flex;
            gap: 20px;
            align-items: center;
            margin-bottom: 20px;
        }
        .resum-estadistiques{
            display: flex;
            gap: 20px;
            justify-content: space-between;
        }
        .resum-img-div{
            background-color: #D8EBFE;
            width: 50px;
            height: 50px;
            border-radius: 10px;
            align-content: center;
            text-align: center;
        }
        .resum-text{
            line-height: 11px;
        }
        /*TECNOLÓGICAS*/
        .tecnologies-text{
            line-height: 11px;
        }
        .tecn-resum{
            display: flex;
            padding-left: 30px;
        }
        .tecn-img-div{
            background-color: #E3DCFD;
            width: 50px;
            height: 50px;
            border-radius: 10px;
            align-content: center;
            text-align: center;
        }
        .tecnologies-div{
            display: flex;
            gap: 20px;
            justify-content: space-between;
        }
        .etiquetas-tecn{
            text-align: center;
            text-align: center;
            align-content: center;
        }
        .etiquetas-tecn h3{
            margin: 0;
        }
        .HTML{
            background-color: #E9772A;
            color: #FFFFFF;
            width: 100px;
            height: 45px;
            border-radius: 15px;
        }
        .CSS{
            background-color: #2A5EE9;
            color: #FFFFFF;
            width: 80px;
            height: 45px;
            border-radius: 15px;
        }
        .PHP{
            background-color: #7C64D9;
            color: #FFFFFF;
            width: 90px;
            height: 45px;
            border-radius: 15px;
        }
        .Docker{
            background-color: #2BA5B8;
            color: #FFFFFF;
            width: 100px;
            height: 45px;
            border-radius: 15px;
        }
        .WordPress{
            background-color: #46536C;
            color: #FFFFFF;
            width: 130px;
            height: 45px;
            border-radius: 15px;
        }
        .Shopify{
            background-color: #498552;
            color: #FFFFFF;
            width: 110px;
            height: 45px;
            border-radius: 15px;
        }
        .tecnologies-header{
            display: flex;
            gap: 20px;
            align-items: center;
            margin-bottom: 20px;
        }
        .tecnologies-container{
            border: 2px solid #F0EDFD;
            background-color: #F6F4FE;
            border-radius: 15px;
            padding: 10px;
            margin: 10px;
            width: 758px;
            height: 200px;
            padding-left: 20px;
            padding-right: 20px;
            align-content: center;
        }
        .Parell{
            background-color: green;
            height: 25px;
            color: white;
            border-radius: 5px;
            padding-left: 10px;
            padding-right: 10px;
        }
        .Senar{
            background-color: red;
            height: 25px;
            color: white;
            border-radius: 5px;
            padding-left: 10px;
            padding-right: 10px;
        }
        .grey{
            color: grey;
        }
        .red{
            color: #720E1A;
        }
        .blue{
            color: #0A0A51;
        }
    </style>

</head>
<body>
    <header>
        <div class="logo-panell">
            <img src="img/logo.png" alt="Logo de l'agència" width="80px" height="80px" class="logo">
            <div>
                <h1>Panell intern de projectes</h1>
                <p>Agència digital · Gestió de projectes d'estudi</p>
            </div>  
        </div>
        
        <div class="menu">
            <div class="menu-item casita">
                <img src="img/casa.png" alt="Inici" width="20px">
                <p>Inici</p>
            </div>
            <div class="menu-item">
                <img src="img/indice.png" alt="Projectes" width="20px">
                <p>Projectes</p>
            </div>
            <div class="menu-item">
                <img src="img/tecn.png" alt="Tecnologies" width="20px">
                <p>Tecnologies</p>
            </div>
            <div class="menu-item">
                <img src="img/sobre.png" alt="Sobre" width="20px">
                <p>Sobre</p>
            </div>
        </div>
        
    </header>
    <main>
        <section class="proyectos-totales">
            
            <div class="proyectos-total">
                <div class="proyectos-total-img">
                    <img src="img/proyecto.png" alt="Projectes" width="35px">
                </div>
                
                <div class="proyectos-activos-text">
                    <h1><?= count($NomProjectes)?></h1>
                    <h2>Projectes</h2>
                    <p class="grey">Projectes registrats al panell</p> 
                </div>
                
            </div>

            <div class="proyectos-prioritat-alta">
                <?php for($i = 0; $i<count($Prioridades); $i++):?>                    
                        <?php if($Prioridades[$i] == $Alta || $Prioridades[$i] > $Alta):?>
                            <?php $count++;?>                                                
                        <?php endif;?>
                        
                <?php endfor;?>
            
                <div class="proyectos-prioritat-alta-img">
                    <img src="img/alerta.png" alt="Prioritat alta" width="35px">
                </div>
                <div>
                    <h1 class="red"><?= $count?></h1>
                    <h2>Prioritat alta</h2>
                    <p class="grey">Projectes amb prioritat alta</p>
                </div>
                
            </div>
            <div class="proyectos-horas-estimadas">
                <div class="proyectos-horas-estimadas-img">
                    <img src="img/horas.png" alt="Hores estimades" width="35px">
                </div>
                <div>
                    <h1><?= array_sum($HorasEstimadas)?> h</h1>
                    <h2>Hores estimades</h2>
                    <p class="grey">Suma total d'hores dels projectes</p>
                </div>
            </div>
            <div class="proyectos-tecnologias">
                <div class="proyectos-tecnologias-img">
                    <img src="img/tecnologias.png" alt="Tecnologies" width="35px">
                </div>
                <div>
                    <h1 class="blue"><?= count($Tecnologias)?></h1>
                    <h2>Tecnologies</h2>
                    <p class="grey">Eines i tecnologies utilitzades</p>
                </div>
            </div>
        </section>

        <section class="proyectos-activos-container">
            <div class="proyectos-activos-header">
                <div class="proyectos-activos-text">
                    <h2>Projectes actius</h2>
                    <p>Llista de projectes del curs. Cada targeta mostra la informació principal i la seva prioritat.</p>
                </div>
                <div class="filtrar-div">
                    <select name="filtrar" id="filtrar">
                        <option value="">Ordenar por prioritat</option>
                    </select>
                </div>
            </div>
            <div class="projectes-actius">
                <?php for($i = 0; $i<$LIMITE; $i++):?>
                    <div class="projecte-targeta">
                        <div class="projecte-header-tarjeta">
                            <p class="grey">#<?= $i+1?></p>
                            <h3><?= $NomProjectes[$i]?></h3>

                            <?php if($Prioridades[$i] == $Alta || $Prioridades[$i] > $Alta):?>
                                <div class="prioritat-alta"> 
                                    <p>Alta</p>
                                </div>
                                <?php elseif($Prioridades[$i] == $Mitjana || $Prioridades[$i] > $Mitjana):?>
                                    <div class="prioritat-mitjana">
                                        <p>Mitjana</p>
                                    </div>
                                    <?php $count2++;?>
                                <?php elseif($Prioridades[$i] == $Baixa || $Prioridades[$i] < $Baixa):?>
                                    <div class="prioritat-baixa">
                                        <p>Baixa</p>
                                    </div>
                                    <?php $count3++;?>
                            <?php endif;?>
                        </div>
                        <div class="projecte-body-tarjeta">
                            <div class="projecte-img-tarjeta">
                                <img src="<?= $ImgProjectes[$i] ?>" alt="Projecte" width="30px">
                            </div>
                            <div>
                                <p>Tipus: <?= $TipoProjectes[$i]?></p>
                                <p class="grey"><?= $Descripcion[$i]?></p>
                            </div>
                        </div>
                        
                        <div class="hores-prioritat-container">
                            <div class="hores-div">
                                <img src="img/reloj.png" width="20px" alt="Hores estimades">                    
                                <p><?= $HorasEstimadas[$i]?> h</p>
                            </div>

                            <div class="prioritat-div">
                                <?php if($Prioridades[$i] == $Alta || $Prioridades[$i] > $Alta):?>
                                    <img src="img/alta.png" width="15px" alt="Alta">
                                        <?php elseif($Prioridades[$i] == $Mitjana || $Prioridades[$i] > $Mitjana):?>
                                            <img src="img/media.png" width="15px" alt="Mitjana">
                                        <?php elseif($Prioridades[$i] == $Baixa || $Prioridades[$i] < $Baixa):?>
                                            <img src="img/baja.png" width="15px" alt="Baixa">
                                <?php endif;?>
                                <p>Prioritat: <?= $Prioridades[$i]?>/10</p>
                            </div>
                            <div>
                                <?php if($HorasEstimadas[$i]%2 == 0):?>
                                    <div class="Parell">
                                        <p>Parell</p>
                                    </div>
                                    <?php else:?>
                                        
                                    <div class="Senar">
                                        <p>Senar</p>
                                    </div>
                                <?php endif;?>
                                
                            </div>
                        </div>
                    </div>
                <?php endfor;?>
            </div>
        </section>
        
        <section class="tecn-resum">
            <div class="resum-container">
                <div class="resum-header">
                    <div class="resum-img-div">
                        <img src="img/resum.png" alt="Resum" width="30px">
                    </div>
                    
                    <div class="resum-text">
                        <h2>Resum automàtic</h2>
                        <p class="grey">Estadístiques generals dels projectes</p>
                    </div>
                </div>
                <div class="resum-estadistiques">
                    <h3><?= count($NomProjectes)?></h3>
                    <p>Projectes totals</p>

                    <h3><?= array_sum($HorasEstimadas)?> </h3>
                    <p>Horas totales</p>

                    <h3><?= $count?></h3>
                    <p>Prioritat alta</p>
                    
                    <h3><?= $count2?></h3>
                    <p>Prioritat mitja</p>
                    
                    <h3><?= $count3?></h3>
                    <p>Prioritat baixa</p>

                    <?php if(array_sum($HorasEstimadas) > 35):?>
                        <h3>Carrega de feina: Alta</h3>
                    <?php elseif(array_sum($HorasEstimadas) <= 35 && array_sum($HorasEstimadas) >= 20):?>
                        <h3>Carrega de feina: Mitjana</h3>
                    <?php elseif(array_sum($HorasEstimadas) < 20):?>
                        <h3>Carrega de feina: Baixa</h3>
                    <?php endif;?>
                </div>    

            </div>
            
            <div class="tecnologies-container">
                <div class="tecnologies-header">
                    <div class="tecn-img-div">
                        <img src="img/tecnologias.png" alt="Tecnologies" width="30px">
                    </div>
                    <div class="tecnologies-text">
                        <h2 class="blue">Tecnologies</h2>
                        <p>Eines utilitzades en els projectes del curs</p>
                    </div>
                </div>
                <div class="tecnologies-div">                
                    <?php foreach($Tecnologias as $tecnologia):?>
                        <div class="etiquetas-tecn <?= $tecnologia ?>">                    
                            <h3><?= $tecnologia?></h3>
                        </div>        
                    <?php endforeach;?>
                </div>
            </div>    
        </section>

        <section class="Encargos-altos">
            <h2 class="proyectos-activos-text">Encargos Alts</h2>
            <div class="projectes-actius">            
                <?php for($i = 0; $i<$LIMITE; $i++):?>
                    <?php if($Prioridades[$i] == $Alta || $Prioridades[$i] > $Alta):?>
                        <div class="projecte-targeta">
                            <div class="projecte-header-tarjeta">
                                <p class="grey">#<?= $i+1?></p>
                                <h3><?= $NomProjectes[$i]?></h3>                                                        
                                <div class="prioritat-alta"> 
                                    <p>Alta</p>
                                </div>                                
                                
                            </div>
                            <div class="projecte-body-tarjeta">
                                <div class="projecte-img-tarjeta">
                                    <img src="<?= $ImgProjectes[$i] ?>" alt="Projecte" width="30px">
                                </div>
                                <div>
                                    <p>Tipus: <?= $TipoProjectes[$i]?></p>
                                    <p class="grey"><?= $Descripcion[$i]?></p>
                                </div>
                            </div>
                            
                            <div class="hores-prioritat-container">
                                <div class="hores-div">
                                    <img src="img/reloj.png" width="20px" alt="Hores estimades">                    
                                    <p><?= $HorasEstimadas[$i]?> h</p>
                                </div>

                                <div class="prioritat-div">
                                    <?php if($Prioridades[$i] == $Alta || $Prioridades[$i] > $Alta):?>
                                        <img src="img/alta.png" width="15px" alt="Alta">
                                            <?php elseif($Prioridades[$i] == $Mitjana || $Prioridades[$i] > $Mitjana):?>
                                                <img src="img/media.png" width="15px" alt="Mitjana">
                                            <?php elseif($Prioridades[$i] == $Baixa || $Prioridades[$i] < $Baixa):?>
                                                <img src="img/baja.png" width="15px" alt="Baixa">
                                    <?php endif;?>
                                    <p>Prioritat: <?= $Prioridades[$i]?>/10</p>
                                </div>
                                <div>
                                    <?php if($HorasEstimadas[$i]%2 == 0):?>
                                        <div class="Parell">
                                            <p>Parell</p>
                                        </div>
                                        <?php else:?>
                                            
                                        <div class="Senar">
                                            <p>Senar</p>
                                        </div>
                                    <?php endif;?>
                                    
                                </div>
                            </div>
                        </div>
                    <?php endif;?>
                <?php endfor;?>
            </div>
        </section>
    </main>
</body>
</html>