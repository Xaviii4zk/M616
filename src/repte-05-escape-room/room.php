<?php 
session_start();

include 'dades.php';

if (isset($_POST["dificultat"])) {
    $_SESSION["dificultat"] = $_POST["dificultat"];
}

if (!isset($_SESSION["dificultat"])) {
    header("Location: index.php");
    exit;
}

if (!isset($_SESSION["nivells"])) {
    $_SESSION["nivells"] = 0;
}

$nivells = $_SESSION["nivells"];
$pregunta = "";
$respuestaCorrecta = "";
$missatge = "";

if ($_SESSION["dificultat"] == "facil" && $nivells == 0) {
    $pregunta = $habitacions['facil'][0]['pregunta'];
    $respuestaCorrecta = $habitacions['facil'][0]['resposta'];
}
if ($_SESSION["dificultat"] == "facil" && $nivells == 1) {
    $pregunta = $habitacions['facil'][1]['pregunta'];
    $respuestaCorrecta = $habitacions['facil'][1]['resposta'];
}
if ($_SESSION["dificultat"] == "facil" && $nivells == 2) {
    $pregunta = $habitacions['facil'][2]['pregunta'];
    $respuestaCorrecta = $habitacions['facil'][2]['resposta'];
}

if ($_SESSION["dificultat"] == "mig" && $nivells == 0) {
    $pregunta = $habitacions['mig'][0]['pregunta'];
    $respuestaCorrecta = $habitacions['mig'][0]['resposta'];
}
if ($_SESSION["dificultat"] == "mig" && $nivells == 1) {
    $pregunta = $habitacions['mig'][1]['pregunta'];
    $respuestaCorrecta = $habitacions['mig'][1]['resposta'];
}
if ($_SESSION["dificultat"] == "mig" && $nivells == 2) {
    $pregunta = $habitacions['mig'][2]['pregunta'];
    $respuestaCorrecta = $habitacions['mig'][2]['resposta'];
}

if ($_SESSION["dificultat"] == "dificil" && $nivells == 0) {
    $pregunta = $habitacions['dificil'][0]['pregunta'];
    $respuestaCorrecta = $habitacions['dificil'][0]['resposta'];
}
if ($_SESSION["dificultat"] == "dificil" && $nivells == 1) {
    $pregunta = $habitacions['dificil'][1]['pregunta'];
    $respuestaCorrecta = $habitacions['dificil'][1]['resposta'];
}
if ($_SESSION["dificultat"] == "dificil" && $nivells == 2) {
    $pregunta = $habitacions['dificil'][2]['pregunta'];
    $respuestaCorrecta = $habitacions['dificil'][2]['resposta'];
}

if (isset($_POST["answer"])) {
    $respuesta = $_POST["answer"];

    if ($respuesta == $respuestaCorrecta) {
        $_SESSION["nivells"]++;
        $nivells = $_SESSION["nivells"];
        $missatge = "Has superado la habitación " . $nivells . " del nivell " . $_SESSION["dificultat"];
    } else {
        $missatge = "Respuesta incorrecta!";
    }
}
?>



<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Habitaciónes</title>
</head>
<body class="d-flex justify-content-center align-items-center vh-100">
    <div class="card p-4" style="width: 22rem;">
        <h2 class="card-title text-center">Habitación <?= $nivells+1; ?></h2>
        <p class="card-text"><?= $pregunta; ?></p>
        <form method="POST">
            <div class="mb-3">
                <input type="text" name="answer" class="form-control" required placeholder="Respuesta">
            </div>
            <button type="submit" class="btn btn-success w-100">Enviar</button>
        </form>
        <!-- /* <div class="alert alert-success mt-3">¡Felicidades! ¡Has completado el juego!</div>

        <div class='alert alert-danger mt-3'>Respuesta incorrecta. ¡Inténtalo de nuevo!</div>
        */ --> 

        <?= $missatge; ?><!-- Muestra el mensaje de éxito o error -->
    </div>
</body>
</html>
