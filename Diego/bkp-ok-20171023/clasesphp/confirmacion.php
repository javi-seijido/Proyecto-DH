<?php
var_dump($_POST);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if(count($_POST) > 0) {
    $nombre = $_POST["name"];
    $apellido = $_POST["apellido"];
    $anios = $_POST["anios"];
    $mail = $_POST["mail"];
  //  echo "Muchas Gracias por registrarte". $nombre. " ". $apellido.", nos has dicho que tienes". $anios ."de edad. Hemos registrado tu email,". $mail ." ¡Gracias!";
    echo "Muchas Gracias por registrarte $nombre $apellido , nos has dicho que tienes $anios de edad. Hemos registrado tu email, $mail ¡Gracias!";

  }
}else {
  echo "asdfghjk";
    header("Location: registro_usuario.php", true, 301);
}

 ?>
