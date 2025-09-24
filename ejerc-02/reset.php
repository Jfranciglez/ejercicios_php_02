<?php //cuando solo en el documento va a haber php non es necesario poner etiqueta de cierre
session_start();
unset($_SESSION["apuesta"]);
header("Location: index.php");