<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // print_r($_POST);

    if (isset($_POST['enviar'])) {

        $nombre = $_POST['nombre'];
        $edad = $_POST["edad"];
        $correo = $_POST['correo'];
        $pase = $_POST['pase'];
        $pago= $_POST['pago'];
        $foto= $_FILES['foto'];

        if ($foto['error'] == 0) {

            $nombreFoto = $foto['name'];

            if (move_uploaded_file($foto['tmp_name'], "images/" . $nombreFoto)) {
                // nada
            } else {
                echo "ERROR AL MOVER LA FOTO";
            }

        } else {
            echo "ERROR EN LA SUBIDA: " . $foto['error'];
        }

        $total = 0;

        if (isset($_POST["dias"])) {
            $dias = $_POST['dias'];
        } else {
            $dias = "";
        }

        $activo = true;

        if ($edad < 18) {

            $activo = false;
            echo "Tu edad debe ser mayor o igual a 18";

        } else {

            ?>
            <!DOCTYPE html>
            <html lang="en">
            <head>
                <meta charset="UTF-8">
                <title>GetaFest</title>
                <link rel="stylesheet" href="procesar.css">
            </head>

            <body>

            <div class="card">

                <div class="titulo">
                    <h2>Tu entrada GetaFest</h2>
                    <img src="images/<?php echo $nombreFoto; ?>" alt="Foto">
                </div>

                <div class="datos">

                    <div class="dato">
                        <p><strong>Nombre:</strong></p>
                        <p><?php echo $nombre; ?></p>
                    </div>

                    <div class="dato">
                        <p><strong>Correo electrónico:</strong></p>
                        <p><?php echo $correo; ?></p>
                    </div>

                    <div class="dato">
                        <p><strong>Edad:</strong></p>
                        <p><?php echo $edad; ?></p>
                    </div>

                    <div class="dato">
                        <p><strong>Pase:</strong></p>
                        <p><?php echo $pase; ?></p>
                    </div>

                </div>

                <div class="dias">

                    <p><strong>DÍAS:</strong></p>

                    <ul>
                        <?php
                        if ($_POST['dias'] != "") {

                            foreach ($_POST['dias'] as $dia) {
                                echo "<li><strong>" . $dia . "</strong></li>";
                            }
                        }
                        ?>
                    </ul>

                    <div class="dato">
                        <p><strong>Método de pago:</strong></p>
                        <p><?php echo $pago; ?></p>
                    </div>

                </div>

                <?php

                if ($pase == "General") {
                    $total = 50;
                }

                if ($pase == "VIP") {
                    $total = 120;
                }

                if ($pase == "SUPER") {
                    $total = 180;
                }

                $totalDias = count($dias) * 10;
                $totalCompleto = $total + $totalDias;

                ?>

                <div class="total">
                    <p><strong>Total:</strong></p>
                    <p><strong><?php echo $totalCompleto; ?> €</strong></p>
                </div>

            </div>

            </body>
            </html>

            <?php

        }

    } else {

        ?>

        <div class="card empty-card">
            <p>Completa el formulario para generar la tarjeta</p>
        </div>

        <?php

    }

} else {

    echo "<pre>";
    echo "ACCESO NO PERMITIDO";

}

?>