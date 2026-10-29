<?php

session_start();

$username = $_SESSION["username"] ?? "Jugador";
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>¡Has ganado!</title>
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: #151b25;
            color: white;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .card {
            background-color: #243447;
            text-align: center;
            padding: 40px;
            border-radius: 15px;
            width: 320px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.4);
        }

        h1 {
            color: #4ade80;
            font-size: 32px;
        }

        p {
            font-size: 18px;
            line-height: 1.5;
        }

        .emoji {
            font-size: 55px;
        }
        .boton-inicio {
            display: inline-block;
            padding: 12px 24px;
            background-color: #198754;
            color: white;
            text-decoration: none;
            border-radius: 8px;
            margin-top: 20px;
        }

        .boton-inicio:hover {
            background-color: #146c43;
        }
    </style>
</head>
<body>
    <div class="card">
        <div class="emoji">🏆</div>
        <h1>¡Felicitats, <?= htmlspecialchars($username) ?>!</h1>
        <p>¡Has aconseguit escapar de totes les habitacions!</p>
        <p>Has superat tots els reptes i guanyat la partida. ¡Enhorabona!</p>
        <a href="index.php" class="boton-inicio">Tornar al inici</a>
    </div>
</body>
</html>


