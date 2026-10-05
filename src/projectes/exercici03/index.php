<?php 

$asignatures1 = ["Totes", "PHP", "JavaScript", "React", "HTML/CSS", "Docker", "BBDD", "Projectes"];
$asignatures2 = ["PHP", "JavaScript", "React", "HTML/CSS", "Docker", "BBDD", "Projectes"];
$AsignaturasTar = ["PHP", "PHP", "JavaScript", "JavaScript", "React", "HTML/CSS", "Docker", "BBDD"];
$contenidoTar = ["Variables", "If / else", "Manipular el DOM", "Array i forEach", "Components", "Estructura HTML5", "Docker compose", "Consultes SQL bàsiques"];
$textoTar = ["Serveixen per guardar informació que després podem utilitzar.",
"Permet executar un codi o un altre segons una condició.",
"Permet modificar el contigut de la pàgina des de JavaScript.",
"Permet i recórrer tots els elements d'un array.",
"Permeten dividir la interficie en peces reutilitzables.",
"Utilitzem etiquetes semàntiques per organitzar el contingut.",
"Permet aixecar diversos serveis alhora (per exemple, una web i una base de dades).",
"Permeten obtenir informació de la base de dades"];
$iconosTar = ['<i class="fa-brands fa-php"></i>', "<i class='fa-brands fa-php'></i>",
"<i class='fa-brands fa-square-js'></i>", "<i class='fa-brands fa-square-js'></i>",
"<i class='fa-brands fa-react'></i>", '<i class="fa-regular fa-file"></i>',
"<i class='fa-solid fa-cube'></i>", "<i class='fa-solid fa-database'></i>"];
$imagenesTar = []; 
$cont=0;


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
                echo '<div class="cabeceraTar">';
                echo '<i> '. $iconosTar[$cont] .' </i>';
                echo '<p>'. $AsignaturasTar[$cont].'</p>';
                echo '</div>';
                
                echo '<div class="cuerpoTar">';
                echo '<span class="titulosCat"> '. $contenidoTar[$cont] .'</span>';
                echo '<p> '. $textoTar[$cont] .'</p>';
                echo '</div>';


                $cont++;
            }
            ?>
        </div>
    </main>
</body>
</html>





