<?php
session_start();

require_once('funciones_log.php');

if(!estaLogueado()){
   header('Location: index.php'); exit;
}

$usrname = $_SESSION['name'];

$images = glob('../avatares/' . $_SESSION['email'] . '*');

?>

<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Menú Principal GIB</title>
<meta name="viewport" content="width=device-width,initial-scale=1">
    <link href="https://fonts.googleapis.com/css?family=Merriweather" rel="stylesheet">
    <link rel="stylesheet" href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="../css/normalize.css">
    <link rel="stylesheet" href="../css/style_menu.css">
</head>
<body>
      <?php require 'menu_cabecera.php'; ?>

</body>
</html>
