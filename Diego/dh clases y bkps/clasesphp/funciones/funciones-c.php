<?php
$numeroMagico = rand(0,20);

$num1 = 2;
$num2 = 16;

function mayor($num1, $num2, $numeroMagico){
  $maximo = max($num1, $num2, $numeroMagico);
  echo $maximo;
}

mayor($num1, $num2, $numeroMagico);

 ?>
