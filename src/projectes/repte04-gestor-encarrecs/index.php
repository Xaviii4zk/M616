<?php

session_start();

include_once 'dades.php';

if (!isset($_SESSION["encarrecs"])) {
    $_SESSION["encarrecs"] = $encarrecs;
}

$encarrecs = $_SESSION["encarrecs"];

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["titol"])) {
    $titol = trim($_POST["titol"]);
    $client = trim($_POST["client"]); 
    $hores = trim($_POST["hores"]);
    $estat = trim($_POST["estat"]);
    $etiquetes = trim($_POST["etiquetes"]);

    $textetiquetes = explode("·", $etiquetes);

    $nouEncarrec = 
    [
        "titol" =>  $titol,
        "client" => $client,
        "hores" => $hores,
        "estat" => $estat,
        "etiquetes" => $textetiquetes
    ];

    $encarrecs[] = $nouEncarrec;
    $_SESSION["encarrecs"] = $encarrecs;
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["accio"]) && $_POST["accio"] == "eliminar") {
    $id = $_POST["id"];

    if (array_key_exists($id, $encarrecs)) {
        unset($encarrecs[$id]);
        $encarrecs = array_values($encarrecs);
        $_SESSION["encarrecs"] = $encarrecs;
    }
}

$horesTotals=0;

foreach ($encarrecs as $encarrec) {
    $horesTotals += $encarrec["hores"];
}


$projectes = count($encarrecs);

?>



<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestor d'encàrrecs</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php include_once 'includes/header.php'; ?>

    <main class="contenidor">

        <section class="presentacio">
            <div class="presentacio-text">
                <p class="etiqueta">AGÈNCIA WEB · TAULER DE PROJECTES</p>
                <h1>Gestor d'encàrrecs</h1>
                <p class="descripcio">Consulta la feina de l'equip, revisa les hores previstes i registra encàrrecs nous.</p>
            </div>

            <P class="boto">+ Nou encàrrec</p>
        </section>

        <section class="estadistiques">
            <div class="estadistica">
                <p>Total d'encàrrecs</p>
                <span><?php echo $projectes; ?></span>
            </div>

            <div class="estadistica">
                <p>Hores estimades</p>
                <span><?php echo $horesTotals; ?></span>
            </div>
        </section>

        <section class="projectes">
            <p class="etiqueta">PROJECTES ACTIUS</p>
            <h2>Llistat d'encàrrecs</h2>
        </section>
        <div class="llistat-projectes">
            <?php 
            foreach($encarrecs as $id => $encarrec) {

            $classeEstat = match ($encarrec["estat"]) { 

                "Acabat" => "estat--acabat", 
                "En procés" => "estat--proces", 
                default => "estat--pendent" 
            }; 
            echo '<div class="projecte">';
                echo '<div class="estadoyhoras"> <span class="estat '.$classeEstat.'">'.
                    htmlspecialchars($encarrec["estat"]).'</span>'; 
                echo '<h3>'.htmlspecialchars($encarrec["hores"]).' h</h3>';
                echo '</div>';
                echo '<div class="contingut">';
                echo '<h2>'. $encarrec["titol"] .'</h2>';
                echo '<p><span>Client:</span> '. htmlspecialchars($encarrec["client"]) .'</p>';
                echo '<span class="etiqueta">'. implode("· ", $encarrec["etiquetes"]).'</span>';
                echo '</div>';
                echo '<div class="botones">';

                    echo '<a href="detall.php?id='.$id.'" target="_blank">Veure detall</a>';

                    echo '<form method="POST">';
                        echo '<input type="hidden" name="id" value="'.$id.'">';
                        echo '<input type="hidden" name="accio" value="eliminar">';
                        echo '<button type="submit">Eliminar</button>';
                    echo '</form>';

                echo '</div>';
            echo '</div>';

            }
            
            ?>
        </div>
        <?php include_once 'includes/footer.php'; 
        ?>
    </main>
</body>
</html>