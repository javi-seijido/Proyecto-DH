<?php
include_once("soporte.php");

if($auth->estaLogueado()){
  $usrname = $_SESSION['name'];

  $images = glob('../avatares/' . $_SESSION['email'] . '*');
}else {
     header('Location: index.php'); exit;
}

// echo "<pre>";
// var_dump($_SESSION);
// echo "</pre>";


?>
