<?php 

session_start();

include 'dades.php';

if (isset($_POST["dificultat"]) && isset($_POST["username"])) {
    $_SESSION["username"] = $_POST["username"];
    $_SESSION["dificultat"] = $_POST["dificultat"];
    $_SESSION["nivells"] = 0;
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

if (isset($_POST["answer"])) {
    $respuesta = $_POST["answer"];

    if ($_SESSION["dificultat"] == "facil") {
        $respuestaCorrecta = $habitacions['facil'][$nivells]['resposta'] ?? "";
    }
    if ($_SESSION["dificultat"] == "mig") {
        $respuestaCorrecta = $habitacions['mig'][$nivells]['resposta'] ?? "";
    }
    if ($_SESSION["dificultat"] == "dificil") {
        $respuestaCorrecta = $habitacions['dificil'][$nivells]['resposta'] ?? "";
    }

    if ($respuesta == $respuestaCorrecta && $respuestaCorrecta != "") {
        $_SESSION["nivells"]++;
        $nivells = $_SESSION["nivells"];
        $missatge = "Has superat la habitació " . $nivells . " del nivell " . $_SESSION["dificultat"];
    } else {
        $missatge = "Resposta incorrecta!";
    }
}

if ($nivells < 3) {
    $pregunta = $habitacions[$_SESSION["dificultat"]][$nivells]['pregunta'];
    $respuestaCorrecta = $habitacions[$_SESSION["dificultat"]][$nivells]['resposta'];
} else {
    header("Location: ganador.php");
    exit;
}

if (isset($_POST["rendirse"])) {
    session_destroy();
    header("Location: index.php");
    exit;
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Habitaciónes</title>
    <style>
        .boton-rendirse {
            display: inline-block;
            padding: 12px 24px;
            background-color: #dc3545;
            color: white;
            text-decoration: none;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            margin-top: 15px;
        }

        .boton-rendirse:hover {
            background-color: #b02a37;
        }
    </style>
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
        <form method="POST" action="room.php">
            <button type="submit" name="rendirse" class="boton-rendirse">Rendirse</button>
        </form>
    </div>
</body>
</html>
