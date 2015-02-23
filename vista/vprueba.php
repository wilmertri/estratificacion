<?php
  include("../controlador/cprueba.php")
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Prueba consecutivo</title>
</head>
<body>
  <h1>Consecutivos</h1>
  <p>
  <?php 
    for ($i=1; $i <200; $i++) { 
      $var = consec($i,$fecha);
      echo $var." ";
    }
  ?>
  </p>
</body>
</html>