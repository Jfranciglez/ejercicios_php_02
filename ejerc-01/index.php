<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ejerc-01</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div id="principal">
        <h1>Pide la comida más sana a domicilio !!</h1>
        
        <br>
        <br>
        <form action="index.php" method="post">
            <div id="hamburgesa">
                <img src="hamburguesa.png">
            </div>
            <p>Hamburguesa vegana <br>
                6.95
            </p>
            <input type="number" name="productos[Hamburguesa vegana]" min="1">
            
            <div id="pasta">
                <img src="pasta.png">
            </div>
            <p>Pasta al pesto <br>
                8.50
            </p>
            <input type="number" name="productos[Pasta al pesto]" min="1">
            <div id="pizza">
                <img src="pizza.png">
            </div>
            <p>Pizza caprese<br>
                7.90
            </p>
            <input type="number" name="productos[Pizza caprese]" min="1">
            <div id="quinoa">
                <img src="quinoa.png">
            </div>
            <p>Quinoa con verduras<br>
                9.20
            </p>
            <input type="number" name="productos[Quinoa con verdura]" min="1">
            <div id="agua">
                <img src="agua.png">
            </div>
            <p>Agua <br>
                1.20
            </p>
            <input type="number" name="productos[Agua]" min="1">
            <div id="cerveza">
                <img src="cerveza.png">
            </div>
            <p>Cerveza <br>
                1.80
            </p>
            <input type="number" name="productos[Cerveza]" min="1">
            <div id="refresco">
                <img src="refresco.png">
            </div>
            <p>Refresco <br>
                1.80
            </p>
            <input type="number" name="productos[Refresco]" min="1">
            <br><br>
            <input type="submit" value="Hacer Pedido">
        </form>
    </div>
    <?php
    if (isset($_POST["productos"])) {
        $productos = $_POST["productos"];
     

        $precios = [
            "Hamburguesa vegana" => 6.95,
            "Pasta al pesto" => 8.50,
            "Pizza caprese" => 7.90,
            "Quinoa con verdura" => 9.20,
            "Agua" => 1.20,
            "Cerveza" => 1.80,
            "Refresco" => 1.80

        ];

        echo "<h2>Su pedido:</h2>";
        echo "<table border='1' cellpadding='5'>";
        echo "<tr><th>Comida/Bebida</th><th>PVP</th><th>Cantidad</th><th>Subtotal</th></tr>";


        $total = 0;

        foreach ($productos as $nombre => $cantidad) {
            $cantidad = (int) $cantidad;

            if ($cantidad > 0) {
                $precio = $precios[$nombre];
                $subtotal = $cantidad * $precio;
                $total += $subtotal;

                echo "<tr>
                    <td>$nombre</td>
                    <td>€$precio</td>
                    <td>$cantidad</td>
                    <td>€$subtotal</td>
                  </tr>";

            }
        }
        echo "<tr><td colspan='3'><strong>Total</strong></td><td><strong>€ $total</strong></td></tr>";
        echo "</table>";
    }
    ?>
</body>

</html>