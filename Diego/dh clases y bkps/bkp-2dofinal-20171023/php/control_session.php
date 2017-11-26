<?php
session_start();

require_once('funciones_log.php');

if(!estaLogueado()){
   header('Location: index.php'); exit;
}
// echo "<pre>";
// var_dump($_SESSION);
// echo "</pre>";
$usrname = $_SESSION['name'];

$images = glob('../avatares/' . $_SESSION['email'] . '*');

?>
