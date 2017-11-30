<?php

$num1 = 0;
$num2 = 0;

if (count($_POST)) {
  $num1 = $_POST["num1"];
  $num2 = $_POST["num2"];

  try {
    echo area_cuadrado($num1) . "<br>";
    echo area_cuadrado($num2) . "<br>";

  } catch (Exception $error) {
    echo 'Excepción capturada: '. $error->getMessage() ."<br>";
    echo 'Excepción capturada: '. $error->getline() . "<br>";
    echo 'Excepción capturada: '. $error->getfile() . "<br>";
  } finally {
    echo "finalizo el control";
  }

}

function area_cuadrado($lado1){
  if ($lado1 < 0){
    throw new Exception('Debes insertar un número positivo.');
  }
  return $lado1*$lado1;
}




 ?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>ejercicio</title>
  </head>
  <body>
     <form class="" action="" method="post">
        <input type="text" name="num1" value=<?= $num1 ?>>
        <input type="text" name="num2" value=<?= $num2 ?>>
        <button type="submit" name="button"> Ver</button>
     </form>
  </body>
</html>
