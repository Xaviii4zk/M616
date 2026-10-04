<?php 


$projectes = ["Landing per a clínica dental",
  "Catàleg de productes",
  "Blog corporatiu escola",
  "Auditoria responsive",
  "Fitxa de servei amb CTA",
  "Galeria de projectes",
  "Botiga online bàsica",
  "Optimització d'imatges"
];

$tipusprojectes = ["Web",
   "Ecommerce",
   "CMS",
   "Qualitat",
   "Web",
   "CMS",
   "Web",
   "Ecommerce"
];

$horesestimades = [6, 4, 3, 5, 2, 4, 8, 3];
$prioritats = [7, 5, 2, 8, 4, 3, 9, 6];
$Tecnologies = ["HTML", "CSS", "PHP", "Docker", "WordPress", "Shopify"];

$iconos = [
    "fa-solid fa-tooth",
    "fa-solid fa-cart-shopping",
    "fa-regular fa-newspaper",
    "fa-solid fa-mobile-screen-button",
    "fa-solid fa-bullhorn",
    "fa-regular fa-image",
    "fa-solid fa-gear",
    "fa-solid fa-bag-shopping"
];

$contProjectes = count($projectes);

$contAlta = 0;
$contHores = 0;
$contWeb = 0;

foreach ($projectes as $i => $projecte) {
    if ($prioritats[$i] >= 7) {
        $contAlta++;
    }

    $contHores += $horesestimades[$i];

    if ($tipusprojectes[$i] == "Web") {
        $contWeb++;
    }
}

$contTecnologies = count($Tecnologies);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercici 2 Panell Intern de Projectes</title>
    <link rel="stylesheet" href="estilos.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
</head>
<body>
<main>
        <header>
            <div class="fotoheader">
            <?php echo '<i class="fa-solid fa-layer-group"></i>'; ?>
            </div>
            <div class="infoheader">
                <?php
                echo "<h1>Panell intern de projectes</h1>";
                echo "<h3>Agència digital · Gestió de projectes d'estudi</h3>";
                ?>
            </div>
            <div class="seccionesheader">
                <div class="seccionesiniciales">
                <?php
                echo "<i class='fa-sharp fa-solid fa-house'></i>";
                echo "<p>Inici</p>";
                ?>   
                </div>
                <div class="seccionesiniciales">
                <?php
                echo '<i class="fa-solid fa-list"></i>';
                echo "<p>Projectes</p>";
                ?>   
                </div>
                <div class="seccionesiniciales">
                <?php
                echo '<i class="fa-solid fa-layer-group"></i>';
                echo "<p>Tecnologies</p>";
                ?>   
                </div>
                <div class="seccionesiniciales">
                <?php
                echo '<i class="fa-solid fa-circle-info"></i>';
                echo "<p>Sobre</p>";
                ?>   
                </div>
            </div>
        </header>
        <div class="infosecciones">
            <div class="seccionestudios azul">
                <?php 
                echo '<div class="infoI">';
                echo '<i class="fa-regular fa-folder-open"></i>';
                echo '</div>';
                echo '<div class="infotexto">';
                echo '<h1 class="negrita">' . $contProjectes . '</h1>';
                echo '<h3>Projectes</h3>';
                echo '<p>Projectes registrats al panell</p>';
                echo '</div>';
                ?>
            </div>
            <div class="seccionestudios rojobg">
                <?php 
                echo '<div class="infoI">';
                echo '<i class="fa-solid fa-triangle-exclamation"></i>';
                echo '</div>';
                echo '<div class="infotexto">';
                echo '<h1 class="negrita rojo">' . $contAlta . '</h1>';
                echo '<h3>Prioritat alta</h3>';
                echo '<p>Projectes amb prioritat alta</p>';
                echo '</div>';
                ?>
            </div>
            <div class="seccionestudios verde">
                <?php 
                echo '<div class="infoI">';
                echo '<i class="fa-regular fa-clock"></i>';
                echo '</div>';
                echo '<div class="infotexto">';
                echo '<h1 class="negrita">' . $contHores . ' h</h1>';
                echo '<h3>Hores estimades</h3>';
                echo '<p>Suma total d\'hores dels projectes</p>';
                echo '</div>';
                ?>
            </div>
            <div class="seccionestudios lila">
                <?php 
                echo '<div class="infoI">';
                echo '<i class="fa-solid fa-code"></i>';
                echo '</div>';
                echo '<div class="infotexto">';
                echo '<h1 class="negrita">' . $contTecnologies . '</h1>';
                echo '<h3>Tecnologies</h3>';
                echo '<p>Eines i tecnologies utilitzades</p>';
                echo '</div>';
                ?>
            </div>
        </div>
        <div class="separar_projectes">
            <div class="infoprojectes">
                <?php 
                echo '<h2>Projectes actius</h2>';
                echo '<p>Llista de projectes del curs. Cada targeta mostra la informació principal i la seva prioritat</p>';
                ?> 
            </div>
            <div class="seleccionar">
                <select name="" id="1select">
                    <option value="">Ordenar per prioritat</option>
                </select>
            </div>
        </div>
        <div class="divtarjetas">
            <?php foreach ($projectes as $i => $projecte) {
                echo '<div class="tarjeta">';
                echo '<div class="cabeceraTarjeta">';
                echo '<p class="ntarjeta">#' . ($i + 1) . '</p>';
                echo '<h3>' . $projectes[$i] . '</h3>';

                if ($prioritats[$i] >= 7) {
                    echo '<span class="alta">Alta</span>';
                } elseif ($prioritats[$i] >= 4) {
                    echo '<span class="mitjana">Mitjana</span>';
                } else {
                    echo '<span class="baixa">Baixa</span>';
                }

                echo '</div>';
                echo '<div class="infoTarjeta">';
                echo '<div class="iconoTarjeta">';
                echo '<i class="' . $iconos[$i] . '"></i>';
                echo '</div>';
                echo '<div>';
                echo '<p>Tipus: ' . $tipusprojectes[$i] . '</p>';
                echo '<p class="descripcion">Projecte de ' . $tipusprojectes[$i] . '.</p>';
                echo '</div>';
                echo '</div>';
                echo '<div class="pieTarjeta">';
                echo '<p><i class="fa-regular fa-clock"></i>' . $horesestimades[$i] . ' h</p>';
                echo '<p><i class="fa-solid fa-chart-simple"></i>Prioritat: ' . $prioritats[$i] . '/10</p>';
                echo '</div>';
                echo '</div>';
            }
            ?>
        </div>

        <div class="parteInferior">
            <div class="resumen">
                <?php
                echo '<div class="tituloResumen">';
                echo '<div class="iconoResumen">';
                echo '<i class="fa-solid fa-chart-simple"></i>';
                echo '</div>';
                echo '<div>';
                echo '<h2>Resum automàtic</h2>';
                echo '<p>Estadístiques generals dels projectes</p>';
                echo '</div>';
                echo '</div>';
                echo '<div class="datosResumen">';

                echo '<div class="datoResumen">';
                echo '<i class="fa-regular fa-folder"></i>';
                echo '<div>';
                echo '<h2>' . $contProjectes . '</h2>';
                echo '<p>Projectes totals</p>';
                echo '</div>';
                echo '</div>';

                echo '<div class="datoResumen">';
                echo '<i class="fa-solid fa-triangle-exclamation rojoo"></i>';
                echo '<div>';
                echo '<h2>' . $contAlta . '</h2>';
                echo '<p>Prioritat alta</p>';
                echo '</div>';
                echo '</div>';

                echo '<div class="datoResumen">';
                echo '<i class="fa-regular fa-clock"></i>';
                echo '<div>';
                echo '<h2>' . $contHores . ' h</h2>';
                echo '<p>Hores totals</p>';
                echo '</div>';
                echo '</div>';

                echo '<div class="datoResumen">';
                echo '<i class="fa-solid fa-globe"></i>';
                echo '<div>';
                echo '<h2>' . $contWeb . '</h2>';
                echo '<p>Projectes web</p>';
                echo '</div>';
                echo '</div>';

                echo '</div>';
                ?>
            </div>

            <div class="tecnologias">
                <?php
                echo '<div class="tituloTecnologias">';
                echo '<div class="iconoTecnologias">';
                echo '<i class="fa-solid fa-code"></i>';
                echo '</div>';
                echo '<div>';
                echo '<h2>Tecnologies</h2>';
                echo '<p>Eines utilitzades en els projectes del curs</p>';
                echo '</div>';
                echo '</div>';
                echo '<div class="listaTecnologias">';
                foreach ($Tecnologies as $Tecnologia) {
                    if ($Tecnologia == "HTML") {
                        echo '<span class="html">HTML</span>';
                    } elseif ($Tecnologia == "CSS") {
                        echo '<span class="css">CSS</span>';
                    } elseif ($Tecnologia == "PHP") {
                        echo '<span class="php">PHP</span>';
                    } elseif ($Tecnologia == "Docker") {
                        echo '<span class="docker">Docker</span>';
                    } elseif ($Tecnologia == "WordPress") {
                        echo '<span class="wordpress">WordPress</span>';
                    } else {
                        echo '<span class="shopify">Shopify</span>';
                    }
                }
                echo '</div>';
                ?>
            </div>
        </div>
    </main>
</body>
</html>