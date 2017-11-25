<?php
$num1 = 1;
$num2 = 16;

function f_array($base, $limite){
  $array = [];
  for ($i=$base; $i <= $limite ; $i++) {
    $array[$i]= $i;
  }
  return $array;
}

print_r (f_array($num1, $num2));






 ?>
