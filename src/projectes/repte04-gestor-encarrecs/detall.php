<?php

session_start();

require_once 'dades.php';

if (!isset($_SESSION["encarrecs"])) {
    $_SESSION["encarrecs"] = $encarrecs;
}

$encarrecs = $_SESSION["encarrecs"];

$id = filter_input(INPUT_GET, "id", FILTER_VALIDATE_INT);

if ($id !== false && $id !== null && array_key_exists($id, $encarrecs)) {
    $encarrec = $encarrecs[$id];
} 

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalle del encargo</title>
    <link rel="stylesheet" href="style.css">

    <style>

        body {
            font-family: Arial, sans-serif;
            background-color: #f3f6fc;
            color: #192d42;
            padding: 10px;
        }

        .detall-tornar {
            display: inline-block;
            color: #153454;
            text-decoration: none;
            font-weight: bold;
            margin-bottom: 30px;
        }

        .detall-targeta {
            background-color: #ffffff;
            border: 1px solid #e0e6eb;
            border-radius: 22px;
            overflow: hidden;
        }

        .detall-capcalera {
            background-color: #1b3e64;
            color: #ffffff;
            padding: 45px 50px;
            border-bottom: 4px solid #dce7f0;
            display: flex;
            flex-direction: column;
        }

        .detall-estat {
            align-self: flex-end;
        }

        .detall-capcalera h1 {
            font-size: 42px;
            margin: 12px 0;
        }

        .detall-capcalera .detall-subtitol {
            color: #d5e2ee;
            font-size: 18px;
            margin-top: 14px;
        }

        .detall-numero {
            color: #f0a34a;
            font-size: 14px;
            font-weight: bold;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .detall-estat {
            top: 45px;
            right: 50px;
            background-color: #fff0c2;
            color: #72551a;
            padding: 12px 18px;
            border-radius: 30px;
            font-weight: bold;
        }

        .estat-acabat {
            background-color: #d1fae5;
            color: #065f46;
        }

        .estat-pendent {
            background-color: #fff0c2;
            color: #72551a;
        }

        .estat-proces {
            background-color: #dbeafe;
            color: #1e40af;
        }

        .detall-contingut {
            padding: 20px 35px;
        }

        .detall-fila {
            display: flex;
            gap: 22px;
        }

        .detall-camp {
            width: 50%;
            padding: 20px 0;
            border-bottom: 1px solid #e0e6eb;
        }

        .detall-nom {
            display: block;
            color: #77818b;
            font-size: 14px;
            margin-bottom: 10px;
            text-transform: uppercase;
        }

        .detall-valor {
            color: #192d42;
            font-size: 17px;
            font-weight: bold;
        }
    </style>
</head>

<body>

    <a href="index.php" class="detall-tornar">← Tornar al gestor</a>

    <div class="detall-targeta">

        <div class="detall-capcalera">

            <span class="detall-numero">
                DETALL DE L'ENCÀRREC #<?php echo $id; ?>
            </span>

            <span class="detall-estat <?php
                echo match ($encarrec["estat"]) {
                    "Acabat" => "estat-acabat",
                    "Pendent" => "estat-pendent",
                    default => "estat-proces"
                };
            ?>">
                <?php echo htmlspecialchars($encarrec["estat"]); ?>
            </span>

            <h1>
                <?php echo htmlspecialchars($encarrec["titol"]); ?>
            </h1>

            <p class="detall-subtitol">
                Projecte encarregat per
                <strong><?php echo htmlspecialchars($encarrec["client"]); ?></strong>
            </p>

        </div>

        <div class="detall-contingut">

            <div class="detall-fila">

                <div class="detall-camp">
                    <span class="detall-nom">Client</span>

                    <div class="detall-valor">
                        <?php echo htmlspecialchars($encarrec["client"]); ?>
                    </div>
                </div>

                <div class="detall-camp">
                    <span class="detall-nom">Hores estimades</span>

                    <div class="detall-valor">
                        <?php echo htmlspecialchars($encarrec["hores"]); ?> hores
                    </div>
                </div>

            </div>

            <div class="detall-fila">

                <div class="detall-camp">
                    <span class="detall-nom">Estat</span>

                    <div class="detall-valor">
                        <?php echo htmlspecialchars($encarrec["estat"]); ?>
                    </div>
                </div>

                <div class="detall-camp">
                    <span class="detall-nom">Etiquetes</span>

                    <div class="detall-valor">
                        <?php echo htmlspecialchars(implode(", ", $encarrec["etiquetes"])); ?>
                    </div>
                </div>

            </div>

        </div>

    </div>

</body>
</html>