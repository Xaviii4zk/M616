<?php 

$asignatures1 = ["Totes", "PHP", "JavaScript", "React", "HTML/CSS", "Docker", "BBDD", "Projectes"];
$asignatures2 = ["PHP", "JavaScript", "React", "HTML/CSS", "Docker", "BBDD", "Projectes"];
$AsignaturasTar = ["PHP", "PHP", "JavaScript", "JavaScript", "React", "HTML/CSS", "Docker", "BBDD"];
$contenidoTar = ["Variables", "If / else", "Manipular el DOM", "Array i Length", "Components", "Estructura HTML5", "Docker compose", "Consultes SQL bàsiques"];
$textoTar = ["Se controlar un codi mitjançant una condició o una altra depenent del valor d'una variable com aquest exemple.",
"Amb variables he aprés a guardar contingut per després poder generar-ho de la forma que vulgui depenent del codi i la meva estructura.",
"Em fa poder modificar el DOM mitjançant variables desde un arxiu js anext a la pàgina html a dins de l'etiqueta script",
"He après a crear arrays i a recórrer els seus elements com a bucle for en JavaScript.",
"Encara no he fet Reacto però el que aprens serà poder crear components a React per reutilitzar parts duna pàgina.",
"He après a estructurar una pàgina web amb etiquetes HTML.",
"He après a construir les imatges i arrencar els serveis amb Docker Compose.",
"He après a consultar i ordenar dades duna base de dades utilitzant SQL."];
$iconosTar = ['<i class="fa-brands fa-php"></i>', "<i class='fa-brands fa-php'></i>",
"<i class='fa-brands fa-square-js'></i>", "<i class='fa-brands fa-square-js'></i>",
"<i class='fa-brands fa-react'></i>", '<i class="fa-regular fa-file"></i>',
"<i class='fa-solid fa-cube'></i>", "<i class='fa-solid fa-database'></i>"];
$imagenesTar = [
    "img/php1.png",
    "img/php2.png",
    "img/js1.png",
    "img/js2.png",
    "img/react1.png",
    "img/htmlcss1.png",
    "img/docker1.png",
    "img/bbdd1.png"
];
$clasesTar = ["php2", "php2", "javascript2", "javascript2", "react2", "htmlcss2", "docker2", "bbdd2"];
$cont=0;

$totalConceptes = count($contenidoTar);

$php = 0;
$javascript = 0;
$react = 0;
$htmlcss = 0;
$docker = 0;
$bbdd = 0;
$projectes = 0;

foreach ($AsignaturasTar as $assignatura) {
    if ($assignatura == "PHP") {
        $php++;
    } elseif ($assignatura == "JavaScript") {
        $javascript++;
    } elseif ($assignatura == "React") {
        $react++;
    } elseif ($assignatura == "HTML/CSS") {
        $htmlcss++;
    } elseif ($assignatura == "Docker") {
        $docker++;
    } elseif ($assignatura == "BBDD") {
        $bbdd++;
    } elseif ($assignatura == "Projectes") {
        $projectes++;
    }
}


$conceptesDestacats = [
    "Variables PHP",
    "If / else",
    "Manipular el DOM",
    "Components en React",
    "Consultar dades amb SQL"
];

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercici 3. Targetes d'aprenentatges</title>
    <link rel="stylesheet" href="estilos.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
</head>
<body>
    <main>
        <header>
            <div class="header_izq">
                <?php 
                echo '<i class="fa-solid fa-code"></i>';
                echo '<h3>Chuleta DAW2</h3>';
                ?>
            </div>
            <div class="header_der">
                <?php
                echo '<p>Inici</p>';
                echo '<p>Conceptes</p>';
                echo '<p>Resum</p>';
                ?>
            </div>          
        </header>
        <div class="subheader">
            <div class="subheader_izq">
                <? echo '<h1>Chuleta digital DAW2</h1>' ?>
                <? echo '<h2>Els conceptes claus del curs, en un sol lloc. </h2>' ?>
            </div>
            <div class="subheader_der">
                <div class="subheader_img">
                    <? echo '<i class="fa-solid fa-graduation-cap"></i>' ?>
                </div>
                <div class="subheader_der_contenido">
                    <? echo '<p>Una pàgina per repassar de manera ràpida el que
                    hem après a DAW2. Feta per estudiar, no per copiar.</p>' ?>
                </div>
            </div>
        </div>
        <div class="main2">
            <div class="separar_asignaturas">
                <div class="asignaturas">
                    <?php 
                        forEach ($asignatures1 as $asignatura) {
                        if ($asignatura == "Totes") {
                            echo '<span class="negro">Totes</span>';
                        } elseif ($asignatura == "PHP") {
                            echo '<span class="php">PHP</span>';
                        } elseif ($asignatura == "JavaScript") {
                            echo '<span class="javascript">JavaScript</span>';
                        } elseif ($asignatura == "React") {
                            echo '<span class="react">React</span>';
                        } elseif ($asignatura == "HTML/CSS") {
                            echo '<span class="htmlcss">HTML/CSS</span>';
                        } elseif  ($asignatura == "Docker") {
                            echo '<span class="docker">Docker</span>';
                        } elseif ($asignatura == "BBDD") {
                            echo '<span class="bbdd">BBDD</span>';
                        }  else {
                            echo '<span class="projectes">Projectes</span>';
                        }
                    }
                    ?>
                </div>
            </div>
            <div class="tarjetas">
                <?php

                forEach ($contenidoTar as $contenido) {
                    echo '<div class="tarjeta">';
                        echo '<div class="cabeceraTar ' . $clasesTar[$cont] . '">';
                            echo $iconosTar[$cont];
                            echo '<p>' . $AsignaturasTar[$cont] . '</p>';
                        echo '</div>';

                        echo '<div class="cuerpoTar">';
                            echo '<span class="titulosCat">' . $contenido . '</span>';
                            echo '<p>' . $textoTar[$cont] . '</p>';
                            echo '<img src="' . $imagenesTar[$cont] . '" alt="">';
                        echo '</div>';
                        echo '<div class="pieTar ' . $clasesTar[$cont] . '">';
                            echo $iconosTar[$cont];
                            echo '<p>' . $AsignaturasTar[$cont] . '</p>';
                        echo '</div>';
                    echo '</div>';
                    $cont++;
                }
                ?>
            </div>
            <div class="panellsResum">
                <div class="panell resumConceptes">
                    <h2><i class="fa-solid fa-chart-simple"></i> Resum de conceptes</h2>
                    <div class="contingutResum">
                        <div class="llistaAssignatures">
                            <div class="filaResum"><span class="punt php"></span><span>PHP</span><strong><?php echo $php; ?></strong></div>
                            <div class="filaResum"><span class="punt javascript"></span><span>JavaScript</span><strong><?php echo $javascript; ?></strong></div>
                            <div class="filaResum"><span class="punt react"></span><span>React</span><strong><?php echo $react; ?></strong></div>
                            <div class="filaResum"><span class="punt htmlcss"></span><span>HTML/CSS</span><strong><?php echo $htmlcss; ?></strong></div>
                            <div class="filaResum"><span class="punt docker"></span><span>Docker</span><strong><?php echo $docker; ?></strong></div>
                            <div class="filaResum"><span class="punt bbdd"></span><span>BBDD</span><strong><?php echo $bbdd; ?></strong></div>
                            <div class="filaResum"><span class="punt projectes"></span><span>Projectes</span><strong><?php echo $projectes; ?></strong></div>
                        </div>
                        <div class="totalConceptes">
                            <p>Total de conceptes</p>
                            <strong><?php echo $totalConceptes; ?></strong>
                        </div>
                    </div>
                </div>

                <div class="panell panellAssignatures">
                    <h2><i class="fa-solid fa-book-open"></i> Assignatures</h2>
                    <div class="llistaEtiquetes">
                    <?php
                    foreach ($asignatures2 as $assignatura) {
                        if ($assignatura == "PHP") {
                            echo '<div class="etiqueta php">PHP</div>';
                        } elseif ($assignatura == "JavaScript") {
                            echo '<div class="etiqueta javascript">JavaScript</div>';
                        } elseif ($assignatura == "React") {
                            echo '<div class="etiqueta react">React</div>';
                        } elseif ($assignatura == "HTML/CSS") {
                            echo '<div class="etiqueta htmlcss">HTML/CSS</div>';
                        } elseif ($assignatura == "Docker") {
                            echo '<div class="etiqueta docker">Docker</div>';
                        } elseif ($assignatura == "BBDD") {
                            echo '<div class="etiqueta bbdd">BBDD</div>';
                        } else {
                            echo '<div class="etiqueta projectes">Projectes</div>';
                        }
                    }
                    ?>
                    </div>
                </div>

                <div class="panell panellDestacats">
                    <h2><i class="fa-solid fa-bullseye"></i> Conceptes destacats</h2>
                    <div class="llistaDestacats">
                        <?php foreach ($conceptesDestacats as $concepte) { ?>
                            <div class="filaDestacat">
                                <i class="fa-solid fa-star"></i>
                                <span><?php echo $concepte; ?></span>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </main>
</body>
</html>




