<?php
function Conectarse(){
$servidor="10.20.42.112";
$basededatos="gib";
$usuario="root";
$clave="1111";
$cn=mysql_connect($servidor,$usuario,$clave) or die ("Error conectando a la base de datos");
mysql_select_db($basededatos ,$cn) or die("Error seleccionando la Base de datos");
mysql_query ("SET NAMES 'utf8'");
return $cn;}
?>
