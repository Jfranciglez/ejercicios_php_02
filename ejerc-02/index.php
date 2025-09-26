<?php
session_start();
if (!isset($_SESSION['total'])) {
    $_SESSION['total'] = 0;
}
?>



<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ejerc-02</title>
  <link rel="stylesheet" href="style.css">
</head>

<body>
  <h1>Apuesta y gana</h1>


  <?php
  $muestraFormulario = true;
  $mostrarBotones = false;
  $mostrarSoloReiniciar = false;

  
  if (isset($_POST["apuesta"])) {
    $apuesta = $_POST["apuesta"];
    
  
    $imagen = [   //array de imágenes
      "calavera.png",
      "mediolimon.jpg",
      "gatochinosuerte.gif"
    ];


    $imagenes = $imagen[array_rand($imagen)];//imágenes aleatorias
    echo "<img src='$imagenes'>";


    if ($imagenes == "mediolimon.jpg") {
      $total = $apuesta / 2;
      echo "<br>Ha perdido la mitad de su dinero $total";

    } elseif ($imagenes == 'gatochinosuerte.gif') {
      $total = $apuesta * 2;
      echo "<br>Ha duplicado  su dinero $total";

    } elseif ($imagenes == 'calavera.png') {
      $total = 0;
      echo "<br>Ha perdido todo.";
      $mostrarSoloReiniciar = true;

    } else {
      echo "<br>Imagen desconocida";
      $_SESSION["total"] = $total;
    }
    $_SESSION["total"] = $total;// va guardando el total para poderlo usar después 
    $muestraFormulario = false;
    $mostrarBotones = true;
  }

     //acciones de cada botón
    if (isset($_POST["seguir"])) {
    $total = $_SESSION["total"] ?? 0;

     $imagen = [   //array de imágenes
      "calavera.png",
      "mediolimon.jpg",
      "gatochinosuerte.gif"
    ];
      $imagenes = $imagen[array_rand($imagen)];

      echo "<img src='$imagenes'><br>";
      
    if ($imagenes == "mediolimon.jpg") {
      $total = $_SESSION["total"] / 2;
      echo "<br>Ha perdido la mitad de su dinero $total";

    } elseif ($imagenes == 'gatochinosuerte.gif') {
      $total = $_SESSION["total"]  * 2;
      echo "<br>Ha duplicado  su dinero $total";

    } elseif ($imagenes == 'calavera.png') {
      $total = 0;
      echo "<br>Ha perdido todo.";
      $mostrarSoloReiniciar = true;

    } else {
      echo "<br>Imagen desconocida";
    }
     
      $_SESSION["total"] = $total;
      $muestraFormulario = false;
      $mostrarBotones = true;
    }
    

    if (isset($_POST["reiniciar"])) {
       session_unset();
       session_destroy();
      $muestraFormulario = true;
    }

    if (isset($_POST["plantarse"])) {
      $total = $_SESSION["total"] ?? 0;
      echo "<h2>Has ganado  $total.</h2>";
      $mostrarSoloReiniciar = true;
    
    }
  
  ?>

  <?php if ($muestraFormulario) { ?> <!--botones-->
    <form method="post">
      <label for="apuesta">Introduzca la cantidad que quiere apostar</label>
      <input type="number" name="apuesta" min="1" required>
      <input type="submit" value="Aceptar">
    </form>
  <?php } elseif ($mostrarSoloReiniciar) { ?>
    <form method="post">
      <button type="submit" name="reiniciar">Volver a Jugar</button>
    </form>
  <?php } elseif ($mostrarBotones) { ?>
    <form method="post">
      <button type="submit" name="seguir">Seguir Jugando</button><br><br>
      <button type="submit" name="plantarse">Me Planto</button>
    </form>
  <?php } ?>


</body>
</html>