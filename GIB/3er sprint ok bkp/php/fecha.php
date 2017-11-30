<?php
// $date = date_create('31-12-1974');
// echo date_format($date, 'Y-m-d');
// $fnacimiento='09-03-2007';
// $date = new DateTime($fnacimiento);
// echo $date->format('Y-m-d')

// $
require('conexion.php');
// function guardarUsuario($email, $db){
//  echo "<pre>";
//  var_dump($db);
//  echo "</pre>";
//  exit;
$email='javier.seijido@gmail.com';
function comprobarEmail ($email, $db){
$query = $db->prepare("SELECT count(*) as cantidad
  FROM personal p

  WHERE p.email LIKE :busqueda

  ");


$query->bindValue(':busqueda', '%'.$email.'%', PDO::PARAM_STR);
$query->execute();
$cantidad = $query->fetch(PDO::FETCH_ASSOC);

$numero=intval ($cantidad);
if ($numero == 1) {
  return true;
}
return false;
}
?>
