<?php
echo "Ejercicio 7:";
echo "<br>";

$array = [];

for ($i=0; $i < 10 ; $i++) {
  $array[$i]=rand(0,10);
}

// for ($i=0 ; $i <  count($array); $i++ ) {
//   if ($array[$i] ==  5) {
//     echo "Se encontro un 5 en la posicion:   ". $i;
//     echo "<br>";
//     exit;
//   } else {
//     echo "valor en pos $i es:     ". $array[$i] ;
//     echo "<br>";
//   }



$a = 0;

while ($a < count($array)) {
  if ($array[$a] ==  5) {
    echo "Se encontro un 5 en la posicion:   ". $a;
    echo "<br>";
    exit;
  } else {
    echo "valor en pos $a es:     ". $array[$a] ;
    echo "<br>";
  }
  $a++;
}




 ?>
