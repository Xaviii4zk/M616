<?php
session_start();
include 'dades.php';

$errorDinero = "";
$errorApuesta = "";
$Acierto = "";
$Fallo = "";
$Dinero = 0;

if (!isset($_SESSION['HistorialPartidas'])) {
    $_SESSION['HistorialPartidas'] = [];
}

if (!isset($_SESSION['contador'])) {
    $_SESSION['contador'] = 0;
}

$HistorialPartidas = $_SESSION['HistorialPartidas'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    if (isset($_POST['tipoapuesta']) && isset($_POST['valor_apuesta']) && isset($_POST['dineroApostado']) &&
        $_POST['dineroApostado'] > 0) {

        $nRandom = rand(0, 36);

        $_SESSION['nRandom'] = $nRandom;

        $_SESSION['valor_apuesta'] = $_POST['valor_apuesta'];
        $_SESSION['dineroApostado'] = $_POST['dineroApostado'];
        $_SESSION['tipoapuesta'] = $_POST['tipoapuesta'];

        if ($_SESSION['tipoapuesta'] == 'Rojo') {

            $Dinero = $_SESSION['dineroApostado'];

            if ($ArrayCasillas[$nRandom]['ficha']['color'] == 'rojo') {

                $Dinero = $Dinero * 1;

                $Acierto = "¡Has acertado! Has ganado $Dinero €";

            } else {

                $Dinero = $Dinero * -1;

                $Fallo = "Has perdido. La casilla era $nRandom";
            }

            $DiferenciaMonetaria = $Dinero;

            $_SESSION['contador']++;

            array_push($_SESSION['HistorialPartidas'], [
                'Partida' => $_SESSION['contador'],
                'Tipo de apuesta' => $_SESSION['tipoapuesta'],
                'Numeros apostados' => $_SESSION['valor_apuesta'],
                'Dinero apostado' => $_POST['dineroApostado'],
                'Diferencia apostada' => $DiferenciaMonetaria
            ]);

            $_SESSION['resultado'] = [
                'acierto' => $Acierto,
                'fallo' => $Fallo,
                'numero' => $nRandom
            ];

            header("Location: index.php");
            exit();
        }

    } else {
        $errorApuesta = "Introduce todos los datos y una cantidad positiva.";
    }
}

if (isset($_SESSION['resultado'])) {
    $Acierto = $_SESSION['resultado']['acierto'];
    $Fallo = $_SESSION['resultado']['fallo'];
    $nRandom = $_SESSION['resultado']['numero'];
} else {
    $nRandom = null;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ruleta Online</title>
    <link rel="stylesheet" href="estilos.css">
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3"
        crossorigin="anonymous">
</head>
<body>
    <main>
        <h1><?= $errorApuesta ?></h1>
        <h1><?= $errorDinero ?></h1>
        <div class="imagenes">
            <img class="rulee" src="ruleta.jpg" alt="ruleta">
            <img class="tablero" src="apuestas.jpg" alt="apuestas">
            <section class="resultado-apuesta">
                <h2>Resultado de la apuesta</h2>

                <?php
                    echo $Acierto;
                    echo $Fallo;

                    if ($nRandom !== null) {
                        echo "<p>Número ganador: $nRandom</p>";
                    }
                ?>
            </section>
        </div>
            <!-- Tabla de apuestas -->
        <h2 class="text-center mb-4">Tabla de Apuestas</h2>

        <table class="table table-bordered table-striped">
            <thead class="table-primary">
                <tr>
                    <th>Apuesta</th>
                    <th>Se juega a</th>
                    <th>Premio</th>
                    <th>Ejemplo en la imagen (ficha)</th>
                </tr>
            </thead>

            <tbody>
                <tr>
                    <td>Rojo/Negro</td>
                    <td>
                        Se apuesta al color del número ganador, si será rojo o negro.
                        Con esta apuesta se está jugando a 18 números, ya que hay
                        18 números rojos y 18 negros.
                    </td>
                    <td>1 x 1</td>
                    <td>1</td>
                </tr>

                <tr>
                    <td>Par/Impar</td>
                    <td>
                        Se apuesta a si el número donde cae la bola será par o impar.
                        Con esta apuesta se está jugando a 18 números, bien a los
                        18 pares o impares.
                    </td>
                    <td>1 x 1</td>
                    <td>2</td>
                </tr>

                <tr>
                    <td>Pasa/Falta</td>
                    <td>
                        Se trata de apostar si el número estará entre 1-18 (falta)
                        o 19-36 (pasa). Por tanto, se juega a 18 números.
                    </td>
                    <td>1 x 1</td>
                    <td>3</td>
                </tr>

                <tr>
                    <td>Docena</td>
                    <td>
                        Se apuesta a qué docena estará el número ganador.
                        El tapete se divide en 3 docenas, cada una abarca 12 números.
                        Se juega a 12 números.
                    </td>
                    <td>2 x 1</td>
                    <td>4</td>
                </tr>

                <tr>
                    <td>Columna</td>
                    <td>
                        Se apuesta a qué columna estará el número ganador.
                        El tapete se divide en 3 columnas, cada una alberga 12 números.
                        Se juega a 12 números.
                    </td>
                    <td>2 x 1</td>
                    <td>5</td>
                </tr>

                <tr>
                    <td>Dos docenas</td>
                    <td>
                        Se apuesta a dos docenas contiguas, es decir, se puede apostar
                        a las docenas 1 y 2, o a las docenas 2 y 3.
                        Se juega a 24 números.
                    </td>
                    <td>0,5 x 1</td>
                    <td>6</td>
                </tr>

                <tr>
                    <td>Dos columnas</td>
                    <td>
                        Se apuesta a dos columnas contiguas. Se puede apostar
                        a las columnas 1 y 2 o a las columnas 2 y 3.
                        Se juega a 24 números.
                    </td>
                    <td>0,5 x 1</td>
                    <td>7</td>
                </tr>

                <tr>
                    <td>Seisena</td>
                    <td>
                        Se apuesta a 6 números con una sola apuesta.
                        Los 6 números están en dos filas contiguas.
                    </td>
                    <td>5 x 1</td>
                    <td>8</td>
                </tr>

                <tr>
                    <td>Cuadro</td>
                    <td>
                        Se apuesta a 4 números con una sola apuesta.
                        Esta apuesta se realiza sobre 4 números que forman
                        un cuadrado en el tapete.
                    </td>
                    <td>8 x 1</td>
                    <td>9</td>
                </tr>

                <tr>
                    <td>Transversal</td>
                    <td>
                        Se apuesta a 3 números en una fila. Existen dos variaciones:
                        a los números 0, 1 y 2 o a 0, 2 y 3.
                    </td>
                    <td>11 x 1</td>
                    <td>10, 11, 12</td>
                </tr>

                <tr>
                    <td>Caballo</td>
                    <td>
                        Se apuesta a 2 números contiguos en el tapete
                        de manera horizontal o vertical.
                    </td>
                    <td>17 x 1</td>
                    <td>13, 14</td>
                </tr>

                <tr>
                    <td>Pleno</td>
                    <td>Se apuesta a un solo número.</td>
                    <td>35 x 1</td>
                    <td>15</td>
                </tr>
            </tbody>
        </table>

        <h1>Formulario de apuestas</h1>

        <form action="index.php" method="POST">
            <label for="">Tipo de apuesta
                <select name="tipoapuesta" id="">
                    <option value="Rojo">Rojo</option>
                    <option value="Negro">Negro</option>
                    <option value="Par">Par</option>
                    <option value="Impar">Impar</option>
                    <option value="Pasa">Pasa</option>
                    <option value="Falta">Falta</option>
                    <option value="Docena">Docena</option>
                    <option value="Columna">Columna</option>
                    <option value="Columna">Columna</option>
                    <option value="Dos_docenas">Dos docenas</option>
                    <option value="Dos_columnas">Dos columnas</option>
                    <option value="Seisena">Seisena</option>
                    <option value="Cuadro">Cuadro</option>
                    <option value="Transversal">Transversal</option>
                    <option value="Caballo">Caballo</option>
                    <option value="Pleno">Pleno</option>
                </select>
            </label>
            <label for="">¿A qué apuestas?
                <input type="text" name="valor_apuesta" placeholder="A qué apuestas?">
            </label>
            <label for="">Cantidad de dinero (€)
                <input type="number" name="dineroApostado" placeholder="Cantidad de dinero?">
            </label>
            <button type="submit">Enviar apuesta</button>
        </form>
    </main>
</body>
</html>