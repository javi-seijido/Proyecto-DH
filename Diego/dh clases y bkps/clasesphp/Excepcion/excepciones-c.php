<?php

$num1 = 0;
$num2 = 0;
$array_cargado[];

if (count($_POST)) {
  $num1 = $_POST["num1"];
  $num2 = $_POST["num2"];

  try {
    $array_cargado = cargar_array($num1,$num2) . "<br>";

    echo ver_array($array_cargado) . "<br>";

  } catch (Exception $error) {
    echo 'Excepción capturada: '. $error->getMessage() ."<br>";
    echo 'Excepción capturada: '. $error->getline() . "<br>";
    echo 'Excepción capturada: '. $error->getfile() . "<br>";
  } finally {
    echo "finalizo el control";
  }

}

function ver_array($array_cargado){
  foreach ($array_cargado as $key => $value) {
    if ($value < 0) {
      throw new Exception('Debes insertar un número positivo.');
    }
    else {
      return $value;
    }
  }

}

function cargar_array($valor1, $valor2){
   $i = 0;
   for ($i=$valor1; $i < $valor2; $i++) {
      $array[$i] = rand($valor1,$valor2);
   }
   return $array;
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
