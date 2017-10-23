<?php
$num1 = 1;
$num2 = 16;
$numeroMagico = rand(0,20);
echo "$numeroMagico <br><br><br>";

function f_array($base, $limite = 0){
  global $numeroMagico;
  if ($limite == 0) {
    $limite = $numeroMagico;
  }
  $array = [];
  for ($i=$base; $i <= $limite ; $i++) {
    $array[$i]= $i;
  }
  return $array;
}

print_r (f_array($num1, 10));


 ?>
