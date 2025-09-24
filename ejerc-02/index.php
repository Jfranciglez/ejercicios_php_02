<?php
session_start();
if (isset($_SESSION["apuesta"])) {
    $_SESSION["apuesta"];

}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ejerc-02</title>
</head>

<body>
    <h1>Apuesta y gana</h1>
    <form action="index.php" method="post">
        <label for="apuesta">Introduzca la cantidad que quiere apostar</label>
        <input type="number" name="apuesta" €>
        <input type="submit" value="Aceptar">
    </form>
    <?php
    if (isset($_SESSION["apuesta"])) {
        $apuesta = $_POST["apuesta"];

        $imagen = [   //array de imágenes
            "calavera.png",
            "mediolimon.jpg",
            "gatochinosuerte.gif"
        ];
        
        $imagenes = $imagen[array_random($imagen)];//imágenes aleatorias

        
          if ($imagenes == "mediolimon.jpg") {
             $total = $apuesta / 2;
              echo "Ha perdido la mitad de su dinero $total";

           } elseif  ($imagenes == 'gatochinosuerte.gif'){
             $total = $apuesta * 2;
              echo "Ha duplicado  su dinero $total";

           } elseif  ($imagenes == 'calavera.png'){
             $total = 0;
              echo "Ha duplicado  su dinero $total";
             
           } else {
             echo"Imagen desconocida";  

          } //solo me falta el boton de  volver al inicio
            // me falta el boton me planto

    }
    ?>
</body>

</html>